<?php

namespace Fullpipe\BannerBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PlaceType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array(
                'label' => 'fullpipe_banner.form.place.name'
            ))
            ->add('place_name', null, array(
                'label' => 'fullpipe_banner.form.place.place_name'
            ))
            ->add('html', null, array(
                'label' => 'fullpipe_banner.form.place.html'
            ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Fullpipe\BannerBundle\Entity\Place'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'fullpipe_bannerbundle_place';
    }
}
