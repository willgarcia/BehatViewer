<?php

namespace jubianchi\BehatViewerBundle\Features\Context;

use \Symfony\Component\HttpKernel\KernelInterface;

class FixtureContext extends BehatViewerContext
{
    private $manager;
    private $connection;
    private $platform;

    public function setKernel(KernelInterface $kernel)
    {
      parent::setKernel($kernel);

      $this->manager = $this->kernel->getContainer()->get('doctrine')->getEntityManager();
      $this->connection = $this->manager->getConnection();
      $this->platform = $this->connection->getDatabasePlatform();
    }

    /**
     * @BeforeScenario @reset
     */
    public function BeforeScenarioReset(\Behat\Behat\Event\EventInterface $event)
    {
        $entities = array(
            'BehatViewerBundle:Step',
            'BehatViewerBundle:Scenario',
            'BehatViewerBundle:Feature',
            'BehatViewerBundle:Build',
            'BehatViewerBundle:Definition',
            'BehatViewerBundle:Project',
            'BehatViewerBundle:User'
        );

        $this->connection->query(sprintf('SET FOREIGN_KEY_CHECKS = 0;'));

        foreach ($entities as $entity) {
            $this->connection->executeUpdate(
                $this->platform->getTruncateTableSQL(
                    $this->manager->getClassMetadata($entity)->getTableName(),
                    true
                )
            );
        }

        $this->BeforeScenarioFixture($event);
    }

    /**
     * @BeforeScenario @fixture
     */
    public function BeforeScenarioFixture(\Behat\Behat\Event\EventInterface $event)
    {
        $tags = array();
        switch (true) {
            case ($event instanceof \Behat\Behat\Event\ScenarioEvent):
                $tags = $event->getScenario()->getTags();
                break;
            case ($event instanceof \Behat\Behat\Event\OutlineEvent):
                $tags = $event->getOutline()->getTags();
                break;
        }

        foreach ($tags as $tag) {
            if (preg_match('/^fixture:(.*)$/', $tag, $match)) {
                $this->iLoadTheFixture($match[1]);
            }
        }
    }

    /**
     * @Given /^I load the "(?P<fixture>[^"]*)" fixture$/
     */
    public function iLoadTheFixture($fixture)
    {
        $dir = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Fixtures';
        $file = $dir . DIRECTORY_SEPARATOR . $fixture;

        if (!file_exists($file)) {
            throw new \RuntimeException(sprintf('Fixture %s does not exist', $fixture));
        }

        $this->connection->executeUpdate(file_get_contents($file));
    }
}
