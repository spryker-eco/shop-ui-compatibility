<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Yves\ShopUiCompatibility;

use Spryker\Yves\Kernel\AbstractFactory;
use SprykerEco\Yves\ShopUiCompatibility\Twig\ShopUiCompatibilityTwigExtension;
use Twig_ExtensionInterface;

class ShopUiCompatibilityFactory extends AbstractFactory
{
    /**
     * @return Twig_ExtensionInterface
     */
    public function createShopUiCompatibilityTwigExtension(): Twig_ExtensionInterface
    {
        return new ShopUiCompatibilityTwigExtension();
    }
}
