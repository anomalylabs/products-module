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
     * Get the inventory.
     *
     * @return integer|null
     */
    public function getInventory();

    /**
     * Increment inventory.
     *
     * @param $amount
     * @return $this
     */
    public function incrementInventory($amount);

    /**
     * Decrement inventory.
     *
     * @param $amount
     * @return $this
     */
    public function decrementInventory($amount);

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
