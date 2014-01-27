<?php

namespace Fullpipe\BannerBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Banner type.
 */
class BannerType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('place')
            ->add('url')
            ->add('html')
            ->add('startsAt', 'date', array(
                'label' => 'sylius.form.promotion.starts_at',
                'empty_value' => /** @Ignore */ array('year' => '-', 'month' => '-', 'day' => '-')
            ))
            ->add('endsAt', 'date', array(
                'label' => 'sylius.form.promotion.ends_at',
                'empty_value' => /** @Ignore */ array('year' => '-', 'month' => '-', 'day' => '-')
            ))
            ->add('file', 'file', array(
                'label'        => 'fullpipe.form.banner.file'
            ))
        ;
    }

    public function getName()
    {
        return 'fullpipe_banner_banner';
    }
}
