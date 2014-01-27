<?php
namespace Fullpipe\BannerBundle\EventListener;

use Fullpipe\BannerBundle\Uploader\ImageUploaderInterface;
use Fullpipe\BannerBundle\Entity\ImageInterface;
// use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;

class ImageUploadListener implements EventSubscriber
{
    protected $uploader;

    public function __construct(ImageUploaderInterface $uploader)
    {
        $this->uploader = $uploader;
    }

    public function getSubscribedEvents()
    {
        return array(
            'prePersist',
            'preUpdate',
            'preRemove'
        );
    }

    public function prePersist(LifecycleEventArgs $event)
    {
        $entity = $event->getEntity();

        if ($entity instanceOf ImageInterface) {
            if ($entity->hasFile()) {
                $this->uploader->upload($entity);
            }
        }
    }

    public function preUpdate(LifecycleEventArgs $event)
    {
        $entity = $event->getEntity();

        if ($entity instanceOf ImageInterface) {
            if ($entity->hasFile()) {
                $this->uploader->upload($entity);
            }
        }
    }

    public function preRemove(LifecycleEventArgs $event)
    {
        $entity = $event->getEntity();

        if ($entity instanceOf ImageInterface) {
            $this->uploader->remove($entity);
        }
    }
}
