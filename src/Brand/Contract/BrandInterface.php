<?php namespace Anomaly\ProductsModule\Brand\Contract;

use Anomaly\ProductsModule\Product\ProductCollection;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Interface BrandInterface
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
interface BrandInterface extends EntryInterface
{

    /**
     * Get the name.
     *
     * @return string
     */
    public function getName();

    /**
     * Get the description.
     *
     * @return string
     */
    public function getDescription();

    /**
     * Get the meta title.
     *
     * @return string
     */
    public function getMetaTitle();

    /**
     * Get the meta keywords.
     *
     * @return array
     */
    public function getMetaKeywords();

    /**
     * Get the meta description.
     *
     * @return string
     */
    public function getMetaDescription();

    /**
     * Get the related products.
     *
     * @return ProductCollection
     */
    public function getProducts();

    /**
     * Return the products relationship.
     *
     * @return HasMany
     */
    public function products();
}
