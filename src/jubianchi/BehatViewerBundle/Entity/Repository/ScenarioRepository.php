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
            ->select(array('s', 'st', 'f', 'fb'))
            ->join('s.tags', 'st', Expr\Join::WITH, 'st = :tag')
            ->join('s.feature', 'f', Expr\Join::WITH, 'f = s.feature')
            ->join('f.builds', 'fb', Expr\Join::WITH, 'fb = :build')
            ->setParameter('tag', $tag)
            ->setParameter('build', $build)
            ->getQuery()
            ->getResult();
    }
}