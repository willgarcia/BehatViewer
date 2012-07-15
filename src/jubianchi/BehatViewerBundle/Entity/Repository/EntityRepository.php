<?php
namespace jubianchi\BehatViewerBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository as BaseRepository;

class EntityRepository extends BaseRepository
{
    public function findAllOrderByLimit(array $orderBy = null, $limit = null, $offset = null)
    {
        return $this->findBy(array(), $orderBy, $limit, $offset);
    }
}
