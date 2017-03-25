<?php namespace Anomaly\ProductsModule\Http\Controller;

use Anomaly\ProductsModule\Product\Contract\ProductRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Symfony\Component\HttpFoundation\Response;

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
     * @param ProductRepositoryInterface $products
     * @return array|\Illuminate\Http\RedirectResponse|null
     */
    public function add(ProductRepositoryInterface $products)
    {
        $response = $this->events->fire(
            'store::cart.add',
            [
                $products->first(),
                $this->request->get('quantity', 1),
            ]
        );

        $response = end($response);

        if ($response instanceof Response) {
            return $response;
        }

        return $this->redirect->route('store::cart.view');
    }
}
