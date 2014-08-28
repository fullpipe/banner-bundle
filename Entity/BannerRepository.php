<?php

namespace Fullpipe\BannerBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * Banner repository
 */
class BannerRepository extends EntityRepository
{
    public function findActiveInPlace($placeName)
    {
        $qb = $this->getActiveQueryBuilder();

        $qb
            ->leftJoin('banner.place', 'place')
            ->andWhere('place.place_name = :place_name')
            ->setParameter('place_name', $placeName)
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
