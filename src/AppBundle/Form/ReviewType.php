<?php

namespace AppBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReviewType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'userRated',
            EntityType::class,
            [
                'label' => 'Utilisateur noté : ',
                'class' => 'AppBundle\Entity\User',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder( 'user')->orderBy('user.lastName', 'ASC');
                },
                'choice_label' => 'lastName'
            ]
        )
        ->add(
        'reviewAuthor',
            EntityType::class,
            [
                'label' => 'Auteur : ',
                'class' => 'AppBundle\Entity\User',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder( 'user')->orderBy('user.lastName', 'ASC');
                },
                'choice_label' => 'lastName'
            ]
        )
        ->add(
            'note',
            IntegerType::class,
            [
                'label' => 'Note (0 à 5) : ',
                'attr' => [
                    'min' => 0,
                    'max' => 5
                ]
            ]
        )
        ->add(
            'publicationDate',
            DateTimeType::class,
            [
                'label' => 'Date de publication : ',
                'data' => new \DateTime('now')
            ]
        )
        ->add(
            'text',
            TextareaType::class,
            [
                'label' => 'Avis : ',
                'attr' => [
                    'maxlength' => 255
                ]
            ]
        );
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Review'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_review';
    }
}
