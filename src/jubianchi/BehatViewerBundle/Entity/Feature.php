<?php

namespace jubianchi\BehatViewerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * jubianchi\BehatViewerBundle\Entity\Feature
 *
 * @ORM\Table(name="feature")
 * @ORM\Entity(repositoryClass="jubianchi\BehatViewerBundle\Entity\Repository\FeatureRepository")
 */
class Feature extends Base
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string $slug
     *
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

    /**
     * @var text $description
     *
     * @ORM\Column(name="description", type="text", nullable="true")
     */
    private $description;

    /**
     * @var \jubianchi\BehatViewerBundle\Entity\Build $build
     *
     * @ORM\ManyToOne(targetEntity="Build", inversedBy="features", cascade={"persist"})
     * @ORM\JoinColumn(name="build_id", referencedColumnName="id")
     */
    private $build;

    /**
     * @ORM\OneToMany(targetEntity="Scenario", mappedBy="feature", cascade={"remove", "persist"})
     */
    private $scenarios;

    /**
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="features", cascade={"remove", "persist"})
     * @ORM\JoinTable(name="feature_tags")
     */
    private $tags;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text
     */
    public function getDescription()
    {
        return $this->description;
    }

    public function __construct()
    {
        $this->scenarios = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add scenarios
     *
     * @param jubianchi\BehatViewerBundle\Entity\Scenario $scenarios
     */
    public function addScenario(\jubianchi\BehatViewerBundle\Entity\Scenario $scenarios)
    {
        $this->scenarios[] = $scenarios;
    }

    /**
     * Get scenarios
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getScenarios()
    {
        return $this->scenarios;
    }

    public function getScenariosCount()
    {
        return sizeof($this->getScenarios());
    }

    public function getHavingStatusScenarios($status)
    {
        $scenarios = array();
        foreach ($this->getScenarios() as $scenario) {
            if ($scenario->getStatus() === $status) {
                $scenarios[] = $scenario;
            }
        }

        return $scenarios;
    }

    public function getPassedScenarios()
    {
        return $this->getHavingStatusScenarios('passed');
    }

    public function getPassedScenariosCount()
    {
        return sizeof($this->getPassedScenarios());
    }

    public function getFailedScenarios()
    {
        return $this->getHavingStatusScenarios('failed');
    }

    public function getFailedScenariosCount()
    {
        return sizeof($this->getFailedScenarios());
    }

    public function getStepsHavingStatus($status = null)
    {
        $steps = array();
        foreach ($this->getScenarios() as $scenario) {
            $steps = array_merge($scenario->getStepsHavingStatus($status), $steps);
        }

        return $steps;
    }

    public function getStepsHavingStatusCount($status = null)
    {
        return sizeof($this->getStepsHavingStatus($status));
    }

    /**
     * Set slug
     *
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Add tags
     *
     * @param \jubianchi\BehatViewerBundle\Entity\Tag $tags
     */
    public function addTag(\jubianchi\BehatViewerBundle\Entity\Tag $tags)
    {
        $this->tags[] = $tags;
    }

    /**
     * Add tags
     *
     * @param \jubianchi\BehatViewerBundle\Entity\Tag $tags
     */
    public function addTags(array $tags)
    {
        $this->tags = array_merge($tags, (array) $this->tags);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->tags;
    }

    public function getFile()
    {
        $scenarios = $this->getScenarios();
        $steps = $scenarios[0]->getSteps();

        return $steps[0]->getFile();
    }

    /**
     * Add builds
     *
     * @param \jubianchi\BehatViewerBundle\Entity\Build $builds
     */
    public function setBuild(\jubianchi\BehatViewerBundle\Entity\Build $build)
    {
        $this->build = $build;
    }

    /**
     * Get builds
     *
     * @return \jubianchi\BehatViewerBundle\Entity\Build
     */
    public function getBuild()
    {
        return $this->build;
    }
}
