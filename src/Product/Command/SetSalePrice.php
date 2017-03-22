<?php namespace Anomaly\ProductsModule\Product\Command;

use Anomaly\ProductsModule\Product\Contract\ProductInterface;
use Anomaly\ProductsModule\Product\ProductPrice;

/**
 * Class SetSalePrice
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class SetSalePrice
{

    /**
     * The product instance.
     *
     * @var ProductInterface
     */
    protected $product;

    /**
     * Create a new SetSalePrice instance.
     *
     * @param ProductInterface $product
     */
    public function __construct(ProductInterface $product)
    {
        $this->product = $product;
    }

    /**
     * Handle the command.
     *
     * @param ProductPrice $price
     */
    public function handle(ProductPrice $price)
    {
        $this->product->setAttribute('sale_price', $price->calculate($this->product));
    }
}
