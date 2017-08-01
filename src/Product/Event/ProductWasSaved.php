<?php namespace Anomaly\ProductsModule\Product\Event;

use Anomaly\ProductsModule\Product\Contract\ProductInterface;

/**
 * Class ProductWasSaved
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ProductWasSaved
{

    /**
     * The product instance.
     *
     * @var ProductInterface
     */
    protected $product;

    /**
     * Create a new ProductWasSaved instance.
     *
     * @param ProductInterface $product
     */
    public function __construct(ProductInterface $product)
    {
        $this->product = $product;
    }

    /**
     * Get the product.
     *
     * @return ProductInterface
     */
    public function getProduct()
    {
        return $this->product;
    }
}
