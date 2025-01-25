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

use App\Entity\Game\Constructor;
use Doctrine\ORM\EntityRepository;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ConsoleType extends AbstractResourceType
{
    public function __construct(
        #[Autowire('%app.model.console.class%')]
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
            ->add('constructor', EntityType::class, [
                'class' => Constructor::class,
                'label' => 'app.ui.constructor',
                'required' => false,
                'choice_label' => 'name',
                'autocomplete' => true,
                'query_builder' => function (EntityRepository $repository) {
                    return $repository->createQueryBuilder('o')
                        ->orderBy('o.name', 'ASC')
                    ;
                },
            ])
        ;
    }

    public function getBlockPrefix(): string
    {
        return 'app_console';
    }
}
