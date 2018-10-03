<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
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
