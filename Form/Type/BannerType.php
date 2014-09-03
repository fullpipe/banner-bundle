<?php

namespace Fullpipe\BannerBundle\Form\Type;

use Fullpipe\ImageBundle\Form\Type\ImageType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Banner type.
 */
class BannerType extends ImageType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array(
                'label' => 'fullpipe_banner.form.banner.name'
            ))
            ->add('place', 'entity', array(
                'class' => 'Fullpipe\BannerBundle\Entity\Place',
                'required' => true,
                'property' => 'name',
                'label' => 'fullpipe_banner.form.banner.place'
            ))
            ->add('url', null, array(
                'label' => 'fullpipe_banner.form.banner.url'
            ))
            ->add('position', null, array(
                'label' => 'fullpipe_banner.form.banner.position'
            ))
            ->add('html', null, array(
                'label' => 'fullpipe_banner.form.banner.html'
            ))
            ->add('startsAt', 'date', array(
                'label' => 'sylius.form.promotion.starts_at',
                'empty_value' => /** @Ignore */ array('year' => '-', 'month' => '-', 'day' => '-'),
                'label' => 'fullpipe_banner.form.banner.startsAt'
            ))
            ->add('endsAt', 'date', array(
                'label' => 'sylius.form.promotion.ends_at',
                'empty_value' => /** @Ignore */ array('year' => '-', 'month' => '-', 'day' => '-'),
                'label' => 'fullpipe_banner.form.banner.endsAt'
            ))
        ;

        parent::buildForm($builder, $options);
    }

    public function getName()
    {
        return 'fullpipe_bannerbundle_banner';
    }
}
