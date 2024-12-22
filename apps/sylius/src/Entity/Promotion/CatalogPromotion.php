<?php

/*
 * This file is part of a proprietary project.
 *
 * (c) Monsieur Biz <sylius@monsieurbiz.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Entity\Promotion;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\CatalogPromotion as BaseCatalogPromotion;
use Sylius\Component\Promotion\Model\CatalogPromotionTranslationInterface;

#[ORM\Entity]
#[ORM\Table(name: 'sylius_catalog_promotion')]
class CatalogPromotion extends BaseCatalogPromotion
{
    protected function createTranslation(): CatalogPromotionTranslationInterface
    {
        return new CatalogPromotionTranslation();
    }
}
