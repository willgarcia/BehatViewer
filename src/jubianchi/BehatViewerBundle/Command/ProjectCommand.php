<?php
namespace jubianchi\BehatViewerBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand,
    Symfony\Component\Console\Output\OutputInterface,
    Symfony\Component\Console\Input\InputArgument,
    Symfony\Component\Console\Input\InputInterface;

abstract class ProjectCommand extends Command
{
    /**
     * @var \jubianchi\BehatViewerBundle\Entity\Project
     */
    private $project;

    protected function configure()
    {
        $this->addArgument('project', InputArgument::REQUIRED, 'The project identifier');
    }

    protected function validate(InputInterface $input)
    {
        $repository = $this->getDoctrine()->getRepository('BehatViewerBundle:Project');
        if (true === is_numeric($input->getArgument('project'))) {
            $this->project = $repository->findOneById((int)$input->getArgument('project'));
        } else {
            $this->project = $repository->findOneBySlug($input->getArgument('project'));
        }

        if(null === $this->project) {
            throw new \InvalidArgumentException('Unknown project ' . $input->getArgument('project'));
        }
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->validate($input);
    }

    /**
     * @return \jubianchi\BehatViewerBundle\Entity\Project
     */
    public function getProject()
    {
        return $this->project;
    }
}
