<?php

namespace jubianchi\BehatViewerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * jubianchi\BehatViewerBundle\Entity\Step
 *
 * @ORM\Table(name="step")
 * @ORM\Entity(repositoryClass="jubianchi\BehatViewerBundle\Entity\Repository\StepRepository")
 */
class Step extends Base
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
     * @var string $type
     *
     * @ORM\Column(name="type", type="string", length=50)
     */
    private $type;

    /**
     * @var boolean $background
     *
     * @ORM\Column(name="background", type="boolean")
     */
    private $background;

    /**
     * @var text $clean_text
     *
     * @ORM\Column(name="clean_text", type="text")
     */
    private $clean_text;

    /**
     * @var text $text
     *
     * @ORM\Column(name="text", type="text")
     */
    private $text;

    /**
     * @var string $file
     *
     * @ORM\Column(name="file", type="string", length=255)
     */
    private $file;

    /**
     * @var integer $line
     *
     * @ORM\Column(name="line", type="integer")
     */
    private $line;

    /**
     * @var string $status
     *
     * @ORM\Column(name="status", type="string", length=20)
     */
    private $status;

    /**
     * @var text $definition
     *
     * @ORM\Column(name="definition", type="text")
     */
    private $definition;

    /**
     * @var text $argument
     *
     * @ORM\Column(name="argument", type="text")
     */
    private $argument;

    /**
     * @var text $snippet
     *
     * @ORM\Column(name="snippet", type="text")
     */
    private $snippet;

    /**
     * @var text $screen
     *
     * @ORM\Column(name="screen", type="text")
     */
    private $screen;

    /**
     * @var text $exception
     *
     * @ORM\Column(name="exception", type="text")
     */
    private $exception;

    /**
     * @var jubianchi\BehatViewerBundle\Entity\Scenario $scenario
     *
     * @ORM\ManyToOne(targetEntity="Scenario", inversedBy="steps", cascade={"remove", "persist"})
     * @ORM\JoinColumn(name="scenario_id", referencedColumnName="id")
     */
    private $scenario;

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
     * Set type
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set background
     *
     * @param boolean $background
     */
    public function setBackground($background)
    {
        $this->background = $background;
    }

    /**
     * Get background
     *
     * @return boolean
     */
    public function getBackground()
    {
        return $this->background;
    }

    /**
     * Set clean_test
     *
     * @param text $cleanTest
     */
    public function setCleanText($cleanText)
    {
        $this->clean_text = $cleanText;
    }

    /**
     * Get clean_test
     *
     * @return text
     */
    public function getCleanText()
    {
        return $this->clean_text;
    }

    /**
     * Set text
     *
     * @param text $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * Get text
     *
     * @return text
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set file
     *
     * @param string $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * Get file
     *
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set line
     *
     * @param integer $line
     */
    public function setLine($line)
    {
        $this->line = $line;
    }

    /**
     * Get line
     *
     * @return integer
     */
    public function getLine()
    {
        return $this->line;
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

    /**
     * Set definition
     *
     * @param text $definition
     */
    public function setDefinition($definition)
    {
        $this->definition = $definition;
    }

    /**
     * Get definition
     *
     * @return text
     */
    public function getDefinition()
    {
        return $this->definition;
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
     * Set screen
     *
     * @param object $screen
     */
    public function setScreen($screen)
    {
        $this->screen = $screen;
    }

    /**
     * Get screen
     *
     * @return object
     */
    public function getScreen()
    {
        return $this->screen;
    }

    /**
     * Set exception
     *
     * @param text $exception
     */
    public function setException($exception)
    {
        $this->exception = $exception;
    }

    /**
     * Get exception
     *
     * @return text
     */
    public function getException()
    {
        return $this->exception;
    }

    /**
     * Set scenario
     *
     * @param jubianchi\BehatViewerBundle\Entity\Scenario $scenario
     */
    public function setScenario(\jubianchi\BehatViewerBundle\Entity\Scenario $scenario)
    {
        $this->scenario = $scenario;
    }

    /**
     * Get scenario
     *
     * @return jubianchi\BehatViewerBundle\Entity\Scenario
     */
    public function getScenario()
    {
        return $this->scenario;
    }

    /**
     * Set argument
     *
     * @param text $argument
     */
    public function setArgument($argument)
    {
        $this->argument = $argument;
    }

    /**
     * Get argument
     *
     * @return text
     */
    public function getArgument()
    {
        return $this->argument;
    }
}