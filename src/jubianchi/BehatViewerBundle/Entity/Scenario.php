<?php

namespace jubianchi\BehatViewerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * jubianchi\BehatViewerBundle\Entity\Scenario
 *
 * @ORM\Table(name="scenario")
 * @ORM\Entity(repositoryClass="jubianchi\BehatViewerBundle\Entity\Repository\ScenarioRepository")
 */
class Scenario extends Base
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
     * @var string $status
     *
     * @ORM\Column(name="status", type="string", length=20)
     */
    private $status;

    /**
     * @var \jubianchi\BehatViewerBundle\Entity\Feature $feature
     *
     * @ORM\ManyToOne(targetEntity="Feature", inversedBy="scenarios", cascade={"persist"})
     * @ORM\JoinColumn(name="feature_id", referencedColumnName="id")
     */
    private $feature;

    /**
     * @ORM\OneToMany(targetEntity="Step", mappedBy="scenario", cascade={"remove","persist"})
     */
    private $steps;

    /**
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="scenarios", cascade={"remove", "persist"})
     * @ORM\JoinTable(name="scenario_tags")
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
     * Set status
     *
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    public function __construct()
    {
        $this->step = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set feature
     *
     * @param jubianchi\BehatViewerBundle\Entity\Feature $feature
     */
    public function setFeature(\jubianchi\BehatViewerBundle\Entity\Feature $feature)
    {
        $this->feature = $feature;
    }

    /**
     * Get feature
     *
     * @return jubianchi\BehatViewerBundle\Entity\Feature
     */
    public function getFeature()
    {
        return $this->feature;
    }

    /**
     * Add step
     *
     * @param jubianchi\BehatViewerBundle\Entity\Step $step
     */
    public function addStep(\jubianchi\BehatViewerBundle\Entity\Step $step)
    {
        $this->steps[] = $step;
    }

    /**
     * Get step
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getSteps()
    {
        return $this->steps;
    }

    public function getStepsCount()
    {
        return sizeof($this->getSteps());
    }

    public function getStepsHavingStatus($status = null)
    {
        $steps = array();
        foreach ($this->getSteps() as $step) {
            if ($status === null || $step->getStatus() === $status) {
                $steps[] = $step;
            }
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
     * @param jubianchi\BehatViewerBundle\Entity\Tag $tags
     */
    public function addTag(\jubianchi\BehatViewerBundle\Entity\Tag $tags)
    {
        $this->tags[] = $tags;
    }

    /**
     * Add tags
     *
     * @param jubianchi\BehatViewerBundle\Entity\Tag $tags
     */
    public function addTags(array $tags)
    {
        $this->tags = array_merge($tags, (array) $this->tags);
    }

    /**
     * Get tags
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->tags;
    }
}
