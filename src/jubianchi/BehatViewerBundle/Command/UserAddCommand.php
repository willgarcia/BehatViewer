<?php
namespace jubianchi\BehatViewerBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand,
    Symfony\Component\Console\Input\InputInterface,
    Symfony\Component\Console\Output\OutputInterface,
    Symfony\Component\Console\Input\InputArgument,
    Symfony\Component\EventDispatcher\EventSubscriberInterface,
    Symfony\Component\EventDispatcher\Event,
    Symfony\Component\Console\Formatter\OutputFormatterStyle,
    Symfony\Component\Console\Input\InputOption,
    jubianchi\BehatViewerBundle\Entity;

class UserAddCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('behat-viewer:user:add');
    }

    /**
     * @return \Symfony\Bundle\DoctrineBundle\Registry
     */
    public function getDoctrine()
    {
        return $this->getContainer()->get('doctrine');
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEntityManager()
    {
        return $this->getDoctrine()->getEntityManager();
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface   $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $self = $this;
        $user = new Entity\User();
        $factory = $this->getContainer()->get('security.encoder_factory');
        $encoder = $factory->getEncoder($user);

        $error = null;
        $user->setUsername(
            $this->getHelper('dialog')->ask(
                $output,
                'Please enter a <info>username</info>: '
            )
        );

        do {
            $error = null;
            $password = $this->getHelper('dialog')->ask($output, 'Please enter a <info>password</info>: ');
            $password = $this->getHelper('dialog')->askAndValidate(
                $output,
                'Please <info>confirm</info> the password: ',
                function($value) use ($password, &$error, $output, $self) {
                    if ($value !== $password) {
                        $error = new \Exception('Passwords are not identical');

                        $output->writeln(
                            $self->getHelper('formatter')->formatBlock(
                                $error->getMessage(),
                                'error',
                                true
                            )
                        );
                    }

                    return $value;
                }
            );
        } while ($error !== null);

        $user->setPassword(
            $encoder->encodePassword(
                $password,
                $user->getSalt()
            )
        );

        $user->setEmail($this->getHelper('dialog')->ask($output, 'Please enter an <info>email</info>: '));

        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();

        $output->writeln(sprintf('User <info>%s</info> successfully created <comment>(%s)</comment>', $user->getUsername(), $user->getSalt()));
    }
}
