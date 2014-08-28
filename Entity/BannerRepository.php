<?php

namespace Fullpipe\BannerBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * BannerRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BannerRepository extends EntityRepository
{

    public function findActiveInPlace($place)
    {
        $qb = $this->getActiveQueryBuilder();

        $qb
            ->andWhere('banner.place = :place')
            ->setParameter('place', $place)
            ;

        return $qb->getQuery()->getResult();
    }

    public function getActiveQueryBuilder()
    {
        $qb = $this->getQueryBuilder();
        $qb
            ->andWhere('banner.startsAt < :now')
            ->andWhere('banner.endsAt > :now')
            ->setParameter('now', new \DateTime())
            ;

        return $qb;
    }

    public function getQueryBuilder()
    {
        return $this->createQueryBuilder('banner');
    }
}