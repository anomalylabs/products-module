<?php namespace Anomaly\ProductsModule\Http\Controller;

use Anomaly\CartsModule\Cart\CartModel;
use Anomaly\CartsModule\Cart\Command\GetCart;
use Anomaly\CartsModule\Cart\Contract\CartInterface;
use Anomaly\ProductsModule\Configuration\Contract\ConfigurationInterface;
use Anomaly\ProductsModule\Configuration\Contract\ConfigurationRepositoryInterface;
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
    public function add(ConfigurationRepositoryInterface $configurations)
    {
        /* @var CartInterface $cart */
        $cart = $this->dispatch(new GetCart());

        /* @var ConfigurationInterface $configuration */
        $configuration = $configurations->find($this->route->parameter('id'));

        $cart->add($configuration, $this->request->get('quantity', 1));

        return $this->redirect->route('store::cart');
    }
}
