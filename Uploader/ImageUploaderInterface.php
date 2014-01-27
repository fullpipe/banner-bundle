<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fullpipe\BannerBundle\Uploader;

use Fullpipe\BannerBundle\Entity\ImageInterface;

interface ImageUploaderInterface
{
    public function upload(ImageInterface $image);
    public function remove(ImageInterface $image);
}
