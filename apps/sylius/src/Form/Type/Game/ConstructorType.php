<?php

/*
 * This file is part of a proprietary project.
 *
 * (c) Maxime Huran <m.huran@monsieurbiz.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Form\Type\Game;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\UX\LiveComponent\Form\Type\LiveCollectionType;
use Sylius\Bundle\AddressingBundle\Form\Type\ProvinceType;

class ConstructorType extends AbstractResourceType
{
    public function __construct(
        #[Autowire('%app.model.constructor.class%')]
        string $dataClass,
        #[Autowire(['app'])]
        array $validationGroups = [],
    ) {
        parent::__construct($dataClass, $validationGroups);
    }

    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'app.ui.name',
                'required' => true,
            ])
            ->add('logo', TextType::class, [
                'label' => 'app.ui.logo',
                'required' => false,
            ])
            ->add('texts', LiveCollectionType::class, [
                'mapped' => false,
                'label' => 'app.ui.texts',
                'entry_type' => TextType::class,
                // 'prototype_name' => '__text__',
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                // 'attr' => [
                //     'class' => 'ui segment secondary collection--flex',
                // ],
            ])
        ;
    }

    public function getBlockPrefix(): string
    {
        return 'app_constructor';
    }
}
