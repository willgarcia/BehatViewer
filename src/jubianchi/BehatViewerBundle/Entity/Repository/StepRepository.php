<?php

namespace jubianchi\BehatViewerBundle\Entity\Repository;

use \Doctrine\ORM\EntityRepository,
    \Doctrine\ORM\Query\Expr,
    \jubianchi\BehatViewerBundle\Entity;

class StepRepository extends EntityRepository
{
    public function getForFeature(Entity\Feature $feature)
    {
        return $this->createQueryBuilder('s')
            ->select(array('s', 'sc'))
            ->join('s.scenario', 'sc', Expr\Join::WITH, 'sc = s.scenario')
            ->where('sc.feature = :feature')
            ->addOrderBy('s.id', "ASC")
            ->setParameter('feature', $feature)
            ->getQuery()
            ->getArrayResult();
    }

    public function getHasStatusForFeature($status, Entity\Feature $feature)
    {
        return $this->createQueryBuilder('s')
            ->select(array('s', 'sc'))
            ->join('s.scenario', 'sc', Expr\Join::WITH, 'sc = s.scenario')
            ->where('sc.feature = :feature')
            ->andWhere('s.status = :status')
            ->addOrderBy('s.id', "ASC")
            ->setParameter('feature', $feature)
            ->setParameter('status', $status)
            ->getQuery()
            ->getArrayResult();
    }

    public function getPassedForFeature(Entity\Feature $feature)
    {
        return $this->getHasStatusForFeature('passed', $feature);
    }

    public function getFailedForFeature(Entity\Feature $feature)
    {
        return $this->getHasStatusForFeature('failed', $feature);
    }

    public function getSkippedForFeature(Entity\Feature $feature)
    {
        return $this->getHasStatusForFeature('skipped', $feature);
    }

    public function getPendingForFeature(Entity\Feature $feature)
    {
        return $this->getHasStatusForFeature('pending', $feature);
    }

    public function getUndefinedForFeature(Entity\Feature $feature)
    {
        return $this->getHasStatusForFeature('undefined', $feature);
    }
}