<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Yves\ShopUiCompatibility;

use Spryker\Yves\Kernel\AbstractFactory;
use SprykerEco\Yves\ShopUiCompatibility\Twig\ShopUiCompatibilityTwigExtension;

class ShopUiCompatibilityFactory extends AbstractFactory
{
    /**
     * @return \Spryker\Shared\Twig\TwigExtension
     */
    public function createShopUiCompatibilityTwigExtension()
    {
        return new ShopUiCompatibilityTwigExtension();
    }
}
