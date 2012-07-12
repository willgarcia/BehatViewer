<?php
namespace jubianchi\BehatViewerBundle\Analyzer;

use \Symfony\Component\EventDispatcher\EventDispatcher,
    \Symfony\Component\DependencyInjection\ContainerAwareInterface,
    \Symfony\Component\DependencyInjection\ContainerInterface,
    \jubianchi\BehatViewerBundle\Entity;

/**
 *
 */
class BehatViewerAnalyzer extends EventDispatcher implements ContainerAwareInterface
{
    protected $container;

    /**
     * @param \jubianchi\BehatViewerBundle\Entity\Project $project
     * @param array                                       $data
     */
    public function analyze(Entity\Project $project, array $data, Entity\Feature $feature = null)
    {
        $build = $this->getBuildFromData($data, $feature);

        if (null === $feature) {
            $build->setProject($project);
            $project->addBuild($build);
        }

        $this->getEntityManager()->persist($build);
        $this->getEntityManager()->persist($project);
        $this->getEntityManager()->flush();
    }

    /**
     * @param null|\Symfony\Component\DependencyInjection\ContainerInterface $container
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * @return \Symfony\Bundle\DoctrineBundle\Registry
     */
    public function getDoctrine()
    {
        return $this->container->get('doctrine');
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEntityManager()
    {
        return $this->getDoctrine()->getEntityManager();
    }

    /**
     * @param string $name
     * @param mixed  $data
     *
     * @return \Symfony\Component\EventDispatcher\Event
     */
    public function getEvent($name, $data = null)
    {
        $event = new \Symfony\Component\EventDispatcher\Event();
        $event->name = $name;
        $event->data = $data;

        return $event;
    }

    /**
     * @param string $name
     * @param mixed  $data
     */
    public function dispatchEvent($name, $data = null)
    {
        $this->dispatch($name, $this->getEvent($name, $data));
    }

    /**
     * @param array $data
     *
     * @return \jubianchi\BehatViewerBundle\Entity\Build
     */
    public function getBuildFromData(array $data, Entity\Feature $feature = null)
    {
        if (null !== $feature) {
            $build = $feature->getBuild();
        } else {
            $build = new Entity\Build();
        }

        $build->setDate(new \DateTime('now'));

        foreach ($data as $featureData) {
            $myFeature = $this->getFeatureFromData($featureData, $feature);

            $this->dispatchEvent('foundFeature', $featureData);

            foreach ($featureData['scenarios'] as $scenarioData) {
                $scenario = $this->getScenarioFromData($scenarioData);

                $this->dispatchEvent('foundScenario', $scenarioData);

                foreach ($scenarioData['steps'] as $stepData) {
                    $step = $this->getStepFromData($stepData);

                    $this->dispatchEvent('foundStep', $stepData);

                    $step->setScenario($scenario);
                    $scenario->addStep($step);
                }

                $scenario->setFeature($myFeature);
                $myFeature->addScenario($scenario);

                $this->getEntityManager()->persist($scenario);
            }

            $myFeature->setBuild($build);

            $this->getEntityManager()->persist($myFeature);
        }

        return $build;
    }

    /**
     * @param array $data
     *
     * @return \jubianchi\BehatViewerBundle\Entity\Feature
     */
    protected function getFeatureFromData(array $data, Entity\Feature $feature = null)
    {
        if (null !== $feature) {
            $this->getDoctrine()
              ->getRepository('BehatViewerBundle:Scenario')
              ->removeForFeature($feature);

            $this->getEntityManager()->refresh($feature);
        } else {
            $feature = new Entity\Feature();
        }

        $feature->setName($data['name']);
        $feature->setSlug($this->slugify($data['name']));
        $feature->setDescription($data['desc']);

        $tags = $this->getTagsFromData($data['tags']);
        if (sizeof($tags)) {
            foreach ($tags as $tag) {
                if (null === $feature->getTags() || (null !== $feature->getTags() && false === in_array($tag, (array) $feature->getTags()))) {
                    $feature->addTag($tag);
                }
            }
        }

        return $feature;
    }

    /**
     * @param array $data
     *
     * @return \jubianchi\BehatViewerBundle\Entity\Scenario
     */
    protected function getScenarioFromData(array $data)
    {
        $scenario = new Entity\Scenario();
        $scenario->setName($data['name']);
        $scenario->setSlug($this->slugify($data['name']));
        $scenario->setStatus($data['status']);

        $tags = $this->getTagsFromData($data['tags']);
        $scenario->addTags($tags);

        return $scenario;
    }

    /**
     * @param array $data
     *
     * @return \jubianchi\BehatViewerBundle\Entity\Step
     */
    protected function getStepFromData(array $data)
    {
        $step = new Entity\Step();
        $step->setType($data['type']);
        $step->setBackground($data['background']);
        $step->SetCleanText($data['clean']);
        $step->setText($data['text']);
        $step->setFile($data['file']);
        $step->SetLine($data['line']);
        $step->setStatus($data['status']);
        $step->setDefinition($data['definition']);
        $step->setSnippet($data['snippet']);
        $step->setScreen($data['screen']);
        $step->setException($data['exception']);
        $step->setArgument($data['argument']);

        return $step;
    }

    /**
     * @param array $data
     *
     * @return array
     */
    protected function getTagsFromData(array $data)
    {
        $tags = array();
        $repository = $this->getDoctrine()->getRepository('BehatViewerBundle:Tag');

        if (sizeof($data)) {
            $this->dispatchEvent('foundTags', $data);

            foreach ((array) $data as $name) {
                $tag = $repository->findOneByName($name);

                if ($tag === null) {
                    $tag = new Entity\Tag();
                    $tag->setName($name);
                    $tag->setSlug($this->slugify($name));

                    $this->getEntityManager()->persist($tag);
                    //$this->getEntityManager()->flush();
                }

                $tags[] = $tag;
            }
        }

        return $tags;
    }

    /**
     * @param string $text
     *
     * @return string
     */
    protected function slugify($text)
    {
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
        $text = trim($text, '-');

        if (function_exists('iconv')) {
            $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        }

        $text = strtolower($text);
        $text = preg_replace('~[^-\w]+~', '', $text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
}
