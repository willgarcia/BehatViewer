<?php

namespace jubianchi\BehatViewerBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository,
    \Doctrine\ORM\Query\Expr,
    \jubianchi\BehatViewerBundle\Entity;

class ScenarioRepository extends EntityRepository
{
    public function findByTagAndBuild(Entity\Tag $tag, Entity\Build $build)
    {
        return $this->createQueryBuilder('s')
            ->select(array('s', 'st', 'f'))
            ->join('s.tags', 'st', Expr\Join::WITH, 'st = :tag')
            ->join('s.feature', 'f', Expr\Join::WITH, 'f = s.feature')
            ->where('f.build = :build')
            ->setParameter('tag', $tag)
            ->setParameter('build', $build)
            ->getQuery()
            ->getResult();
    }

    public function removeForFeature(Entity\Feature $feature) {
        $scenarios = $this->createQueryBuilder('s')
            ->where('s.feature = :feature')
            ->setParameter('feature', $feature)
            ->getQuery()
            ->getResult();

        foreach($scenarios as $scenario) {
            $this->getEntityManager()->remove($scenario);
        }

        $this->getEntityManager()->flush();

        return count($scenarios);
    }
}