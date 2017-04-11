<?php
/**
 * Created by PhpStorm.
 * User: michele
 * Date: 11/04/17
 * Time: 07:37
 */

namespace AppBundle\Repository;


use Doctrine\ORM\EntityRepository;

class GenusRepository extends EntityRepository
{
    public function findAllPublishedOrderBySize()
    {
        return $this->createQueryBuilder('genus')
            ->setParameter('isPublished', true)
            ->andWhere('genus.isPublished = :isPublished')
            ->orderBy('genus.speciesCount', 'DESC')
            ->getQuery()
            ->execute();
    }
}