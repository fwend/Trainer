<?php

namespace App\Form;

use App\Entity\ChallengeRun;
use App\Entity\ChallengeSection;
use App\Entity\RunMode;
use Doctrine\ORM\EntityRepository;
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
                'class' => ChallengeSection::class,
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('e')->orderBy('e.position', 'ASC');
                },
            ])
            ->add('mode', EntityType::class, [
                'class' => RunMode::class,
                'choice_label' => function (RunMode $mode) {
                    return $mode->getName();
                },
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('e')->orderBy('e.position', 'ASC');
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
