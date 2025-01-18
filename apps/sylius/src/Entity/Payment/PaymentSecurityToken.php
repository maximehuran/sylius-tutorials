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

namespace App\Entity\Payment;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Bundle\PayumBundle\Model\PaymentSecurityToken as BasePaymentSecurityToken;

#[ORM\Entity]
#[ORM\Table(name: 'sylius_payment_security_token')]
class PaymentSecurityToken extends BasePaymentSecurityToken
{
}
