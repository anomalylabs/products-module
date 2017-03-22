<?php namespace Anomaly\ProductsModule\Product;

use Anomaly\ProductsModule\Product\Contract\ProductInterface;

/**
 * Class ProductPrice
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ProductPrice
{

    /**
     * Calculate the price of the product.
     *
     * @param ProductInterface $product
     * @return float
     */
    public function calculate(ProductInterface $product)
    {
        $price = $product->getRegularPrice();

        if (!$product->isOnSale()) {
            return $price;
        }

        $amount = $product->getSaleAmount();

        if (starts_with($amount, '-')) {
            return $price - substr($amount, 1);
        }

        if (ends_with($amount, '%')) {
            return $price - ((substr($amount, 0, -1) / 100) * $price);
        }

        return $amount;
    }
}
