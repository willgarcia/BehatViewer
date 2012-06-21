<?php

namespace jubianchi\BehatViewerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * jubianchi\BehatViewerBundle\Entity\Definition
 *
 * @ORM\Table(name="definition")
 * @ORM\Entity(repositoryClass="jubianchi\BehatViewerBundle\Entity\Repository\DefinitionRepository")
 */
class Definition extends Base
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
     * @var text $snippet
     *
     * @ORM\Column(name="snippet", type="text")
     */
    private $snippet;

    /**
     * @var string $context
     *
     * @ORM\Column(name="context", type="string", length=255)
     */
    private $context;

    /**
     * @var string $method
     *
     * @ORM\Column(name="method", type="string", length=255)
     */
    private $method;

    /**
     * @var text $description
     *
     * @ORM\Column(name="description", type="text", nullable="true")
     */
    private $description;

    /**
     * @var jubianchi\BehatViewerBundle\Entity\Project $project
     *
     * @ORM\ManyToOne(targetEntity="Project", inversedBy="definitions")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     */
    private $project;

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
     * Set snippet
     *
     * @param text $snippet
     */
    public function setSnippet($snippet)
    {
        $this->snippet = $snippet;
    }

    /**
     * Get snippet
     *
     * @return text
     */
    public function getSnippet()
    {
        return $this->snippet;
    }

    /**
     * Set context
     *
     * @param string $context
     */
    public function setContext($context)
    {
        $this->context = $context;
    }

    /**
     * Get context
     *
     * @return string
     */
    public function getContext()
    {
        return $this->context;
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

    /**
     * Set project
     *
     * @param jubianchi\BehatViewerBundle\Entity\Project $project
     */
    public function setProject(\jubianchi\BehatViewerBundle\Entity\Project $project)
    {
        $this->project = $project;
    }

    /**
     * Get project
     *
     * @return jubianchi\BehatViewerBundle\Entity\Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Set method
     *
     * @param string $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * Get method
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }
}