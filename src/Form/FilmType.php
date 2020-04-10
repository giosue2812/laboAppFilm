<?php

namespace App\Form;

use App\Entity\Film;
use App\Entity\Personne;
use App\Models\FilmForm;
use App\Repository\PersonneRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilmType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre',TextType::class)
            ->add('description',TextareaType::class)
            ->add('date_sortie',DateType::class,[
                'required' => false,
                'widget' => 'single_text',
                'format' => 'yyyy-mm-dd',
                'html5' => false
            ])
            ->add('bande_annoce',TextType::class)
            ->add('image',TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => FilmForm::class,
        ]);
    }
}
