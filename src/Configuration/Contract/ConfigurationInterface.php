<?php namespace Anomaly\ProductsModule\Configuration\Contract;

use Anomaly\ProductsModule\OptionValue\OptionValueCollection;
use Anomaly\ProductsModule\Product\Contract\ProductInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;

/**
 * Interface ConfigurationInterface
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
interface ConfigurationInterface extends EntryInterface
{

    /**
     * Return the active price.
     *
     * @return float
     */
    public function price();

    /**
     * Get the SKU.
     *
     * @return string
     */
    public function getSku();

    /**
     * Get the quantity.
     *
     * @return int
     */
    public function getQuantity();

    /**
     * Get the product.
     *
     * @return ProductInterface
     */
    public function getProduct();

    /**
     * Get the product ID.
     *
     * @return int
     */
    public function getProductId();

    /**
     * Return if the product
     * is on sale or not.
     *
     * @return boolean
     */
    public function isOnSale();

    /**
     * Get the sale price.
     *
     * @return float
     */
    public function getSalePrice();

    /**
     * Get the sale amount.
     *
     * @return mixed
     */
    public function getSaleAmount();

    /**
     * Get the regular price.
     *
     * @return float
     */
    public function getRegularPrice();

    /**
     * Return if low inventory or not.
     *
     * @return bool
     */
    public function isLowInventory();

    /**
     * Return if out of stock or not.
     *
     * @return bool
     */
    public function isOutOfStock();

    /**
     * Return if can be backordered or not.
     *
     * @return bool
     */
    public function canBackorder();

    /**
     * Get the related option values.
     *
     * @return OptionValueCollection
     */
    public function getOptionValues();

    /**
     * Get the related option value IDs.
     *
     * @return array
     */
    public function getOptionValueIds();
}
