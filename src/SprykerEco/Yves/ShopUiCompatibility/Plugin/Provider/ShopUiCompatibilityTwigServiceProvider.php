<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerEco\Yves\ShopUiCompatibility\Plugin\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Spryker\Yves\Kernel\AbstractPlugin;
use Twig_Environment;

/**
 * @method \SprykerEco\Yves\ShopUiCompatibility\ShopUiCompatibilityFactory getFactory()
 */
class ShopUiCompatibilityTwigServiceProvider extends AbstractPlugin implements ServiceProviderInterface
{
    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    public function register(Application $app)
    {
        $twigExtension = $this->getFactory()->createShopUiCompatibilityTwigExtension();

        $app['twig'] = $app->share(
            $app->extend('twig', function (Twig_Environment $twig) use ($twigExtension) {
                $twig->addExtension($twigExtension);

                return $twig;
            })
        );
    }

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    public function boot(Application $app)
    {
    }
}
