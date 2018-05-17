<?php namespace Anomaly\ProductsModule\Http\Controller;

use Anomaly\ProductsModule\Configuration\Contract\ConfigurationInterface;
use Anomaly\ProductsModule\Configuration\Contract\ConfigurationRepositoryInterface;
use Anomaly\CartsModule\Cart\Contract\CartInterface;
use Anomaly\ProductsModule\Contract\PurchasableInterface;
use Anomaly\StoreModule\Service\ServiceManager;
use Anomaly\Streams\Platform\Http\Controller\PublicController;

/**
 * Class CartController
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class CartController extends PublicController
{

    /**
     * Add a product to the cart.
     *
     * @param ConfigurationRepositoryInterface $configurations
     * @return array|\Illuminate\Http\RedirectResponse|null
     */
    public function add(ConfigurationRepositoryInterface $configurations, ServiceManager $services)
    {
        /* @var CartInterface $cart */
        $cart = $services->make('cart');

        /* @var ConfigurationInterface|PurchasableInterface $configuration */
        $configuration = $configurations->find($this->route->parameter('id'));

        $cart->add($configuration, $this->request->get('quantity', 1));

        return $this->redirect->route('store::cart');
    }
}
