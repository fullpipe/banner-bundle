<?php

namespace Fullpipe\BannerBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;

class BannerExtension extends \Twig_Extension
{
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('banners_in_place', array($this, 'getBannersInPlace')),
            new \Twig_SimpleFunction('banner_list', array($this, 'renderList'), array('is_safe' => array('html'))),
            new \Twig_SimpleFunction('banner_place', array($this, 'renderBannerPlace'), array('is_safe' => array('html'))),
        );
    }

    public function getBannersInPlace($placeName, $limit = null)
    {
        return $this->getRepository()->findActiveInPlace($placeName, $limit);
    }


    /**
     * Render Banners in list
     * @param  string $placeName
     * @param  integer $limit
     * @param  array  $attr
     */
    public function renderList($placeName, $limit = null, array $attr = array())
    {
        return $this->getTemplating()->render('FullpipeBannerBundle:Twig:list.html.twig', array(
            'banners' => $this->getBannersInPlace($placeName, $limit),
            'place'   => $placeName,
            'attr'    => $attr
        ));
    }

    /**
     * Render Banner place html
     * @param  string $placeName
     * @param  array  $attr
     */
    public function renderBannerPlace($placeName, array $attr = array())
    {
        return $this->getTemplating()->render('FullpipeBannerBundle:Twig:place.html.twig', array(
            'place'   => $this->getBannerPlace($placeName),
            'attr'    => $attr
        ));
    }

    public function getBannerPlace($placeName)
    {
        return $this->getPlaceRepository()->findOneBy(array('place_name' => $placeName));
    }

    /**
     * Get Banner repository
     * @return Fullpipe\BannerBundle\Entity\BannerRepository [description]
     */
    public function getRepository()
    {
        return $this->container->get('fullpipe_banner.repository.banner');
    }

    public function getPlaceRepository()
    {
        return $this->container->get('fullpipe_banner.repository.place');
    }

    /**
     * Get templating
     */
    public function getTemplating()
    {
        return $this->container->get('templating');
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'fullpipe_banner_extention';
    }
}
