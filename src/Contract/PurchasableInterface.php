<?php namespace Anomaly\ProductsModule\Contract;

use Anomaly\Streams\Platform\Image\Image;

/**
 * Interface PurchasableInterface
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
interface PurchasableInterface
{

    /**
     * Return if purchasable or not.
     *
     * @return bool
     */
    public function isPurchasable();

    /**
     * Get the SKU.
     *
     * @return string
     */
    public function getPurchasableSku();

    /**
     * Get the name.
     *
     * @return string
     */
    public function getPurchasableName();

    /**
     * Get the description.
     *
     * @return string
     */
    public function getPurchasableDescription();

    /**
     * Get the price.
     *
     * @return float
     */
    public function getPurchasablePrice();

    /**
     * Get the image.
     *
     * @return null|Image
     */
    public function getPurchasableImage();

}
