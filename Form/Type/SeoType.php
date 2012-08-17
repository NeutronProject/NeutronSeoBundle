<?php
namespace Neutron\SeoBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Symfony\Component\Form\AbstractType;

class SeoType extends AbstractType
{

     /**
      * @param FormBuilderInterface $builder
      * @param array $options
      */
     public function buildForm(FormBuilderInterface $builder, array $options) 
     {
         $builder
             ->add('metaTitle', 'neutron_input_limiter', array(
                 'label' => 'form.meta_title',
                 'attr' => array('style' => 'width: 500px'),
                 'translation_domain' => 'NeutronSeoBundle',
                 'configs' => array(
                     'limit' => 255
                 )
             ))
             ->add('metaKeywords', 'neutron_input_limiter', array(
                 'label' => 'form.meta_keywords',
                 'attr' => array('style' => 'width: 500px'),
                 'translation_domain' => 'NeutronSeoBundle',
                 'configs' => array(
                     'limit' => 255
                 )
             ))
             ->add('metaDescription', 'neutron_input_limiter', array(
                 'label' => 'form.meta_description',
                 'attr' => array('style' => 'width: 500px'),
                 'translation_domain' => 'NeutronSeoBundle',
                 'configs' => array(
                     'limit' => 500
                 )
             ))
    
         ;
     }
     
     public function setDefaultOptions(OptionsResolverInterface $resolver)
     {
         $resolver->setDefaults(array(
             'data_class' => 'Neutron\SeoBundle\Entity\Seo',
             'validation_groups' => array('seo')       
         ));
     }
     
     public function getName()
     {
         return 'neutron_seo';
     }

}