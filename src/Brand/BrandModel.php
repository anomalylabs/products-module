<?php namespace Anomaly\ProductsModule\Brand;

use Anomaly\ProductsModule\Brand\Contract\BrandInterface;
use Anomaly\ProductsModule\Product\ProductCollection;
use Anomaly\Streams\Platform\Model\Products\ProductsBrandsEntryModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class BrandModel
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class BrandModel extends ProductsBrandsEntryModel implements BrandInterface
{

    /**
     * Get the name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the meta title.
     *
     * @return string
     */
    public function getMetaTitle()
    {
        return $this->meta_title;
    }

    /**
     * Get the meta keywords.
     *
     * @return array
     */
    public function getMetaKeywords()
    {
        return $this->meta_keywords;
    }

    /**
     * Get the meta description.
     *
     * @return string
     */
    public function getMetaDescription()
    {
        return $this->meta_description;
    }

    /**
     * Get the related products.
     *
     * @return ProductCollection
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Return the products relationship.
     *
     * @return HasMany
     */
    public function products()
    {
        return $this->hasMany('Anomaly\ProductsModule\Product\ProductModel', 'brand_id');
    }
}
