<?php

namespace Fullpipe\BannerBundle\Entity;

use Fullpipe\ImageBundle\Entity\Image;

/**
 * Banner
 */
class Banner extends Image
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $place;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $html;

    /**
     * @var \DateTime
     */
    private $startsAt;

    /**
     * @var \DateTime
     */
    private $endsAt;

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
     * Contructor
     */
    public function __construct()
    {
        $this->startsAt = new \DateTime();
        $this->endsAt = new \DateTime('+ 1 month');
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Banner
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
     * Set place
     *
     * @param string $place
     * @return Banner
     */
    public function setPlace($place)
    {
        $this->place = $place;

        return $this;
    }

    /**
     * Get place
     *
     * @return string
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Banner
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set html
     *
     * @param string $html
     * @return Banner
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
     * Set startsAt
     *
     * @param \DateTime $startsAt
     * @return Banner
     */
    public function setStartsAt($startsAt)
    {
        $this->startsAt = $startsAt;

        return $this;
    }

    /**
     * Get startsAt
     *
     * @return \DateTime
     */
    public function getStartsAt()
    {
        return $this->startsAt;
    }

    /**
     * Set endsAt
     *
     * @param \DateTime $endsAt
     * @return Banner
     */
    public function setEndsAt($endsAt)
    {
        $this->endsAt = $endsAt;

        return $this;
    }

    /**
     * Get endsAt
     *
     * @return \DateTime
     */
    public function getEndsAt()
    {
        return $this->endsAt;
    }

    /**
     * {@inheritdoc}
     */
    public function hasFile()
    {
        return null !== $this->file;
    }

    /**
     * {@inheritdoc}
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * {@inheritdoc}
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;

        return $this;
    }

}
