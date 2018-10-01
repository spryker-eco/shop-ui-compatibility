<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
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
