<?php

namespace FrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class annoncesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titre')
        ->add('desc1')
        ->add('desc2')
        ->add('desc3')
        ->add('desc4')
        ->add('desc5')
        ->add('desc6')
        ->add('fichier','file')
        ->add('prix')
        ->add('offre','choice',array('choices'=>array('gratuit'=>'gratuit',
                                                                 'offre'=>'offre')))
      
        ->add('categorieAnnonce','choice',array('choices'=>array('Livre'=>'Livre',
                                                                 'application'=>'application',
                                                                 'cours'=>'cours','événemment'=>'événemment')))
        ->add('niveau','choice',array('choices'=>array('GL'=>'Génie logiciel',
                                                                 'BI'=>'BI')))
    ->add('etat','hidden',array('attr'=>array('value'=>'en cours')))
    ->add('dateAnnonce','hidden',array('attr'=>array('value'=>date('Y-m-d'))))
    ->add('numCommande','hidden')
    ->add('user','hidden')
    ->add('numJaime','hidden');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FrontendBundle\Entity\annonces'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'frontendbundle_annonces';
    }


}
