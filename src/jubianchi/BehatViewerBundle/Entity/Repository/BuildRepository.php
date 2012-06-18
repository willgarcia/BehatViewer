<?php

namespace jubianchi\BehatViewerBundle\Entity\Repository;

use \Doctrine\ORM\EntityRepository,
    \jubianchi\BehatViewerBundle\Entity;

class BuildRepository extends EntityRepository
{
    public function findLastForProject(Entity\Project $project)
    {
        return $this->createQueryBuilder('b')
            ->where('b.project = :project')
            ->setParameter('project', $project)
            ->setMaxResults(1)
            ->orderBy('b.id', 'DESC')
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findLastBuildsForProject(Entity\Project $project, $limit = 10)
    {
        $limit = $this->createQueryBuilder('bb')
            ->orderBy('bb.id', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();

        if(sizeof($limit) > 0) {
            $query = $this->createQueryBuilder('b')
                ->where('b.project = :project')
                ->andWhere('b.id >= :limit')
                ->setParameter('project', $project)
                ->setParameter('limit', end($limit)->getId());

            return $query->getQuery()->getResult();
        }

        return array();
    }
}