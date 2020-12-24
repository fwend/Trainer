<?php

namespace App\Form;

use App\Entity\ChallengeRun;
use App\Entity\ChallengeSection;
use App\Entity\RunMode;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChallengeRunType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('section', EntityType::class, [
                'class' => ChallengeSection::class
            ])
            ->add('mode', EntityType::class, [
                'class' => RunMode::class,
                'choice_label' => function (RunMode $mode) {
                    return $mode->getName();
                },
                'placeholder' => 'Choose a mode'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ChallengeRun::class,
        ]);
    }
}
