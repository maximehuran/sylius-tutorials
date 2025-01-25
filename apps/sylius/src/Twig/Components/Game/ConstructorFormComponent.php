<?php

declare(strict_types=1);

namespace App\Twig\Components\Game;

use App\Repository\Game\ConstructorRepositoryInterface;
use Sylius\Bundle\UiBundle\Twig\Component\ResourceFormComponent;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\Form\FormFactoryInterface;
use App\Form\Type\Game\ConstructorType;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

#[AsLiveComponent]
#[AutoconfigureTag(attributes:['name' => 'sylius.live_component.admin', 'key' => 'sylius_admin:constructor:form'])]
class ConstructorFormComponent extends ResourceFormComponent
{
    public function __construct(
        #[Autowire(service: 'app.repository.constructor')]
        ConstructorRepositoryInterface $repository,
        FormFactoryInterface $formFactory,
        #[Autowire('%app.model.constructor.class%')]
        string $resourceClass,
        #[Autowire(ConstructorType::class)]
        string $formClass
    ) {
        parent::__construct($repository, $formFactory, $resourceClass, $formClass);
    }
}
