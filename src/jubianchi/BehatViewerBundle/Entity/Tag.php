<?php

namespace jubianchi\BehatViewerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * jubianchi\BehatViewerBundle\Entity\Tag
 *
 * @ORM\Table(name="tag")
 * @ORM\Entity(repositoryClass="jubianchi\BehatViewerBundle\Entity\Repository\TagRepository")
 */
class Tag extends Base
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
     * @ORM\ManyToMany(targetEntity="Feature", mappedBy="tags")
     */
    private $features;

    /**
     * @ORM\ManyToMany(targetEntity="Scenario", mappedBy="tags")
     */
    private $scenarios;

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

    public function __construct()
    {
        $this->features = new \Doctrine\Common\Collections\ArrayCollection();
        $this->scenarios = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add features
     *
     * @param jubianchi\BehatViewerBundle\Entity\Feature $features
     */
    public function addFeature(\jubianchi\BehatViewerBundle\Entity\Feature $features)
    {
        $this->features[] = $features;
    }

    /**
     * Get features
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getFeatures()
    {
        return $this->features;
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
}