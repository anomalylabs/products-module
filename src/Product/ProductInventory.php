<?php namespace Anomaly\ProductsModule\Product;

use Anomaly\ProductsModule\Product\Contract\ProductInterface;

/**
 * Class ProductInventory
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ProductInventory
{

    /**
     * The product instance.
     *
     * @var ProductInterface
     */
    protected $product;

    /**
     * Create a new ProductInventory instance.
     *
     * @param ProductInterface $product
     */
    public function __construct(ProductInterface $product)
    {
        $this->product = $product;
    }

    /**
     * Adjust the product quantity.
     *
     * @param $quantity
     * @return $this
     */
    public function adjust($quantity)
    {
        $this->product->setAttribute('quantity', $this->product->getAttribute('quantity') + $quantity);

        return $this;
    }

    /**
     * Return if the product is low on inventory or not.
     *
     * @return bool
     */
    public function isLowInventory()
    {
        if (!$threshold = $this->product->getLowInventoryThreshold()) {
            $threshold = config('anomaly.module.products::products.low_inventory_threshold', 5);
        }

        return $this->product->getQuantity() <= $threshold;
    }

    /**
     * Return if the product can
     * be backordered or not.
     *
     * @return bool
     */
    public function canBackorder()
    {
        if (!$policy = $this->product->getBackorderPolicy()) {
            $policy = config('anomaly.module.products::products.backorder_policy', 'allow');
        }

        return $policy == 'allow';
    }
}
