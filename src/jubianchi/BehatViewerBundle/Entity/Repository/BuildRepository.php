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

    public function removeWeekBuilds() {
        $sql = '
                SELECT id
                FROM behatviewer_build b1
                WHERE b1.id=(
                    SELECT id
                    FROM behatviewer_build b2
                    WHERE WEEK(b1.date) = WEEK(b2.date)
                    ORDER BY b2.date DESC
                    LIMIT 1
                )
        ';

        $stmt = $this->getEntityManager()
            ->getConnection()
            ->prepare($sql);
        $stmt->execute();

        $limit = $this->createQueryBuilder('b')
            ->delete()
            ->where('b.id NOT IN(' . implode(',', $stmt->fetchAll(\PDO::FETCH_COLUMN)) . ')')
            ->getQuery()
            ->execute();
    }
}