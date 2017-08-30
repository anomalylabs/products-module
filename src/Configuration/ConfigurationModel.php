<?php namespace Anomaly\ProductsModule\Configuration;

use Anomaly\FilesModule\File\Contract\FileInterface;
use Anomaly\ProductsModule\Configuration\Contract\ConfigurationInterface;
use Anomaly\ProductsModule\OptionValue\OptionValueCollection;
use Anomaly\ProductsModule\Product\Contract\ProductInterface;
use Anomaly\ShippingModule\Group\Contract\GroupInterface;
use Anomaly\StoreModule\Contract\PurchasableInterface;
use Anomaly\StoreModule\Contract\ShippableInterface;
use Anomaly\StoreModule\Contract\TaxableInterface;
use Anomaly\Streams\Platform\Image\Image;
use Anomaly\Streams\Platform\Model\Products\ProductsConfigurationsEntryModel;
use Anomaly\TaxesModule\Category\Contract\CategoryInterface;

/**
 * Class ConfigurationModel
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ConfigurationModel extends ProductsConfigurationsEntryModel implements ConfigurationInterface, PurchasableInterface, TaxableInterface, ShippableInterface
{

    /**
     * The cascading relations.
     *
     * @var array
     */
    protected $cascades = [
        'optionValues',
    ];

    /**
     * Eager loaded relations.
     *
     * @var array
     */
    protected $with = [
        'images',
        'optionValues',
    ];

    /**
     * Get the SKU.
     *
     * @return string
     */
    public function getSku()
    {
        return $this->sku;
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

    /**
     * Get the product ID.
     *
     * @return int
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * Get the sale amount.
     *
     * @return mixed
     */
    public function getSaleAmount()
    {
        return $this->sale_amount;
    }

    /**
     * Return the active price.
     *
     * @return float
     */
    public function price()
    {
        return $this->isOnSale() ? $this->getSalePrice() : $this->getRegularPrice();
    }

    /**
     * Return if the product
     * is on sale or not.
     *
     * @return boolean
     */
    public function isOnSale()
    {
        return $this->on_sale;
    }

    /**
     * Get the sale price.
     *
     * @return float
     */
    public function getSalePrice()
    {
        return $this->sale_price;
    }

    /**
     * Get the regular price.
     *
     * @return float
     */
    public function getRegularPrice()
    {
        return $this->regular_price;
    }

    /**
     * Get the related option value IDs.
     *
     * @return array
     */
    public function getOptionValueIds()
    {
        return $this
            ->getOptionValues()
            ->pluck('id')
            ->sort()
            ->all();
    }

    /**
     * Get the related option values.
     *
     * @return OptionValueCollection
     */
    public function getOptionValues()
    {
        return $this->option_values;
    }

    /**
     * Get the name.
     *
     * @return string
     */
    public function getName()
    {
        return $this
            ->getProduct()
            ->getName();
    }

    /**
     * Get the price.
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price();
    }

    /**
     * Get the quantity.
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Return if low inventory or not.
     *
     * @return bool
     */
    public function isLowInventory()
    {
        $product = $this->getProduct();

        if (!$threshold = $product->getLowInventoryThreshold()) {
            $threshold = config('anomaly.module.products::products.low_inventory_threshold', 5);
        }

        return $this->getQuantity() <= $threshold;
    }

    /**
     * Return if out of stock or not.
     *
     * @return bool
     */
    public function isOutOfStock()
    {
        return $this->getQuantity() <= 0;
    }

    /**
     * Get the track inventory flag.
     *
     * @return bool
     */
    public function getTrackInventory()
    {
        return $this->track_inventory;
    }

    /**
     * Return if can be backordered or not.
     *
     * @return bool
     */
    public function canBackorder()
    {
        $product = $this->getProduct();

        if (!$policy = $product->getBackorderPolicy()) {
            $policy = config('anomaly.module.products::products.backorder_policy', 'allow');
        }

        return $policy == 'allow';
    }

    /**
     * Return if purchasable or not.
     *
     * @return bool
     */
    public function isPurchasable()
    {
        if (!$this->getTrackInventory()) {
            return true;
        }

        return !$this->isOutOfStock() || $this->canBackorder();
    }

    /**
     * Get the SKU.
     *
     * @return string
     */
    public function getPurchasableSku()
    {
        return $this->getSku();
    }

    /**
     * Get the product name.
     *
     * @return string
     */
    public function getPurchasableName()
    {
        return $this
            ->getProduct()
            ->getName();
    }

    /**
     * Get the product description.
     *
     * @return string
     */
    public function getPurchasableDescription()
    {
        return $this
            ->getProduct()
            ->getDescription();
    }

    /**
     * Get the price.
     *
     * @return float
     */
    public function getPurchasablePrice()
    {
        return $this->price();
    }

    /**
     * Get the image.
     *
     * @return null|Image
     */
    public function getPurchasableImage()
    {
        /* @var FileInterface $image */
        if (!$image = $this->images->first()) {
            return null;
        }

        return $image->make();
    }

    /**
     * Return if taxable or not.
     *
     * @return bool
     */
    public function isTaxable()
    {
        return (bool)$this->tax_category_id;
    }

    /**
     * Return the tax class.
     *
     * @return CategoryInterface
     */
    public function getTaxableCategory()
    {
        return $this->getProduct()->getTaxCategory();
    }

    /**
     * Return if shippable or not.
     *
     * @return bool
     */
    public function isShippable()
    {
        $product = $this->getProduct();

        return (bool)$product->getShippingGroup();
    }

    /**
     * Get the shipping group.
     *
     * @return GroupInterface
     */
    public function getShippingGroup()
    {
        return $this
            ->getProduct()
            ->getShippingGroup();
    }

    /**
     * Get the width.
     *
     * @return float
     */
    public function getShippableWidth()
    {
        return $this
            ->getProduct()
            ->getWidth();
    }

    /**
     * Get the height.
     *
     * @return float
     */
    public function getShippableHeight()
    {
        return $this
            ->getProduct()
            ->getHeight();
    }

    /**
     * Get the length.
     *
     * @return float
     */
    public function getShippableLength()
    {
        return $this
            ->getProduct()
            ->getLength();
    }

    /**
     * Get the weight.
     *
     * @return float
     */
    public function getShippableWeight()
    {
        return $this
            ->getProduct()
            ->getWeight();
    }

    /**
     * Get the volume.
     *
     * @return float
     */
    public function getShippableVolume()
    {
        return $this
            ->getProduct()
            ->getVolume();
    }
}
