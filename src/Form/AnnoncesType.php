<?php

namespace App\Form;

use App\Entity\Annonces;
use App\Entity\Categorie;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;

class AnnoncesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('description')
            ->add('prix')
            ->add('images', FileType::class, [
                'label' => 'Image (JPG, PNG file)',
                'mapped' => false,
                'required' => true,
                'constraints' => [
                    new File(
                        maxSize: '3024k',
                        extensions: ['jpg', 'jpeg', 'png'],
                        extensionsMessage: 'Please upload a valid image file (JPG, JPEG, PNG).'
                    )
                ]
            ])
            ->add('localisation')
            ->add('id_categorie', EntityType::class, [
                'class' => Categorie::class,
                'data' => $options['data']->getIdCategorie(),
                'choice_label' => 'nom',
                'label' => 'Catégorie',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Annonces::class,
        ]);
    }
}
