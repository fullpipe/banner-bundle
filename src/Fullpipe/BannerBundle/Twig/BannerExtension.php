<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
        );
    }


    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return array(
            // new \Twig_SimpleFilter('banner_list', array($this, 'renderList'), array('is_safe' => array('html'))),
        );
    }

    public function getBannersInPlace($place)
    {
        return $this->getRepository()->findActiveInPlace($place);
    }

    public function renderList($place, array $attr)
    {
        return $this->getTemplating()->render('FullpipeBannerBundle:Twig:list.html.twig', array(
            'banners' => $this->getBannersInPlace($place),
            'place'   => $place,
            'attr'    => $attr
        ));
    }

    public function getRepository()
    {
        return $this->container->get('fullpipe_banner.repository.banner');
    }

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
