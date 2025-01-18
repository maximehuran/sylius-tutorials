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

namespace App\Entity\Promotion;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Promotion\Model\CatalogPromotionTranslation as BaseCatalogPromotionTranslation;

#[ORM\Entity]
#[ORM\Table(name: 'sylius_catalog_promotion_translation')]
class CatalogPromotionTranslation extends BaseCatalogPromotionTranslation
{
}
