<?php

namespace App\Form;

use App\Entity\Vehicle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Vich\UploaderBundle\Form\Type\VichFileType;

class VehicleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom du véhicule : ',
            ])

            ->add('description', TextareaType::class, [
                'label' => 'Description du véhicule : ',
            ])

            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Utilitaire' => 'Utilitaire',
                    'Particulier' => 'Particulier',
                ],
                'label' => 'Le type du véhicule : ',
                'expanded' => true,
            ])

            ->add('fiscalPower', IntegerType::class, [
                'label' => 'Puissance fiscale (ch) : ',
                'required' => false,
            ])

            ->add('actualPower', IntegerType::class, [
                'label' => 'Puissance réelle (ch) : ',
                'required' => false,
            ])

            ->add('tankCapacityCNG', IntegerType::class, [
                'label' => 'Capacité reservoir GNV (kg) : ',
                'required' => false,
            ])

            ->add('consumptionCNG', IntegerType::class, [
                'label' => 'Consommation GNV (kg/100km) : ',
                'required' => false,
            ])

            ->add('tankCapacityFuel', IntegerType::class, [
                'label' => 'Capacité carburant (L) : ',
                'required' => false,
            ])

            ->add('consumptionFuel', IntegerType::class, [
                'label' => 'Consomation carburant (L/100km) : ',
                'required' => false,
            ])

            ->add('autonomy', IntegerType::class, [
                'label' => 'Autonomie (km) : ',
                'required' => false,
            ])

            ->add('rearVolume', IntegerType::class, [
                'label' => 'Volume compartiment arrière (m3) : ',
                'required' => false,
            ])

            ->add('vehiclePhoto', VichFileType::class, [
                'required'      => false,
                'allow_delete'  => false,
                'download_uri' => false,
                'label' => 'Image'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicle::class,
        ]);
    }
}
