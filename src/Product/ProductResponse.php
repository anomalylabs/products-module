<?php namespace Anomaly\ProductsModule\Product;

use Anomaly\ProductsModule\Product\Contract\ProductInterface;
use Illuminate\Contracts\Routing\ResponseFactory;

/**
 * Class ProductResponse
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\ProductsModule\Product
 */
class ProductResponse
{

    /**
     * The response factory.
     *
     * @var ResponseFactory
     */
    protected $container;

    /**
     * Create a new ProductResponse instance.
     *
     * @param ResponseFactory $response
     */
    function __construct(ResponseFactory $response)
    {
        $this->response = $response;
    }

    /**
     * Make the product response.
     *
     * @param ProductInterface $product
     */
    public function make(ProductInterface $product)
    {
        if (!$product->getResponse()) {
            $product->setResponse(
                $this->response->view(
                    'anomaly.module.products::products/view',
                    compact('product')
                )
            );
        }
    }
}
