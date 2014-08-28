<?php

namespace Fullpipe\BannerBundle\Entity;

class Place
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $place_name;

    /**
     * @var string
     */
    private $html;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $banners;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->banners = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Place
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set place_name
     *
     * @param string $placeName
     * @return Place
     */
    public function setPlaceName($placeName)
    {
        $this->place_name = $placeName;

        return $this;
    }

    /**
     * Get place_name
     *
     * @return string
     */
    public function getPlaceName()
    {
        return $this->place_name;
    }

    /**
     * Set html
     *
     * @param string $html
     * @return Place
     */
    public function setHtml($html)
    {
        $this->html = $html;

        return $this;
    }

    /**
     * Get html
     *
     * @return string
     */
    public function getHtml()
    {
        return $this->html;
    }

    /**
     * Add banner
     *
     * @param \Fullpipe\BannerBundle\Entity\Banner $banner
     * @return Place
     */
    public function addBanner(\Fullpipe\BannerBundle\Entity\Banner $banner)
    {
        $this->banners[] = $banner;
        $banner->setPlace($this);

        return $this;
    }

    /**
     * Remove banner
     *
     * @param \Fullpipe\BannerBundle\Entity\Banner $banner
     */
    public function removeBanner(\Fullpipe\BannerBundle\Entity\Banner $banner)
    {
        $this->banners->removeElement($banner);
    }

    /**
     * Get banners
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBanners()
    {
        return $this->banners;
    }
}
