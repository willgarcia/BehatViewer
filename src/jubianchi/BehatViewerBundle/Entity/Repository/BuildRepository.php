<?php

namespace jubianchi\BehatViewerBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository,
    jubianchi\BehatViewerBundle\Entity;

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

        if (sizeof($limit) > 0) {
            $query = $this->createQueryBuilder('b')
                ->where('b.project = :project')
                ->andWhere('b.id >= :limit')
                ->setParameter('project', $project)
                ->setParameter('limit', end($limit)->getId());

            return $query->getQuery()->getResult();
        }

        return array();
    }

    public function removeBuilds(array $builds)
    {
        foreach ($builds as $build) {
            $this->getEntityManager()->remove($build);
        }

        $this->getEntityManager()->flush();

        return count($builds);
    }

    public function removeWeekBuildsForProject(Entity\Project $project)
    {
        $sql = '
                SELECT id
                FROM behatviewer_build b1
                WHERE b1.id=(
                    SELECT id
                    FROM behatviewer_build b2
                    WHERE WEEK(b1.date) = WEEK(b2.date)
                    AND b1.project_id = ' . $project->getId() . '
                    ORDER BY b2.date DESC
                    LIMIT 1
                )
        ';

        $stmt = $this->getEntityManager()->getConnection()->prepare($sql);
        $stmt->execute();

        $ids = $stmt->fetchAll(\PDO::FETCH_COLUMN);
        if (0 === sizeof($ids)) {
            return 0;
        }

        return $this->removeBuilds(
            $this->createQueryBuilder('b')
                ->select()
                ->where('b.id NOT IN(' . implode(',', $ids) . ')')
                ->andWhere('b.project = :project')
                ->setParameter('project', $project)
                ->getQuery()
                ->getResult()
        );
    }

    public function removeBuildsByIdIntervalForProject($start, $end, Entity\Project $project)
    {
        return $this->removeBuilds(
            $this->createQueryBuilder('b')
                ->select()
                ->where('b.id BETWEEN :start AND :end')
                ->andWhere('b.project = :project')
                ->setParameter('project', $project)
                ->setParameter('start', $start)
                ->setParameter('end', $end)
                ->getQuery()
                ->getResult()
        );
    }

    public function removeBuildsByDateIntervalForProject(\DateTime $start, \DateTime $end, Entity\Project $project)
    {
        return $this->removeBuilds(
            $this->createQueryBuilder('b')
                ->select()
                ->where('b.date BETWEEN :start AND :end')
                ->andWhere('b.project = :project')
                ->setParameter('project', $project)
                ->setParameter('start', $start)
                ->setParameter('end', $end)
                ->getQuery()
                ->getResult()
        );
    }
}
