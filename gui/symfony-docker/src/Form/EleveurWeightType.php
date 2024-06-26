<?php

namespace App\Form;

use App\Entity\ProductionSite;
use App\Entity\Resource;
use App\Entity\ResourceName;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use App\Service\BlockChainService;

class EleveurWeightType extends AbstractType
{
    private BlockChainService $blockChainService;

    public function __construct(BlockChainService $blockChainService)
    {
        $this->blockChainService = $blockChainService;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $weight = $options['weight'];
        $builder
            ->add('weight', IntegerType::class, ['data' => $weight,
            'attr' => ['type' => 'number', 'min' => 0]
        ],)
            ->add('Peser', SubmitType::class, [
            ])
        ;
    }
        public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // other defaults...
            'id' => null, // Define the default value or requirement for 'id'
            'weight' => 0,
        ]);
    }
}
