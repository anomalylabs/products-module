<?php namespace Anomaly\ProductsModule\Category\Contract;

use Anomaly\ProductsModule\Category\CategoryCollection;
use Anomaly\ProductsModule\Product\ProductCollection;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Interface CategoryInterface
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\ProductsModule\Category\Contract
 */
interface CategoryInterface extends EntryInterface
{

    /**
     * Get the path.
     *
     * @return string
     */
    public function getPath();

    /**
     * Get the slug.
     *
     * @return string
     */
    public function getSlug();

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
     * Get the meta description.
     *
     * @return string
     */
    public function getMetaDescription();

    /**
     * Get the related parent category.
     *
     * @return null|CategoryInterface
     */
    public function getParent();

    /**
     * Get the parent ID.
     *
     * @return null|int
     */
    public function getParentId();

    /**
     * Get the related children categories.
     *
     * @return CategoryCollection
     */
    public function getChildren();

    /**
     * Return the children relation.
     *
     * @return HasMany
     */
    public function children();

    /**
     * Get the distant related categories.
     *
     * @return CategoryCollection
     */
    public function getRelatives();

    /**
     * Return the children relation.
     *
     * @return HasMany
     */
    public function relatives();

    /**
     * Get the related products.
     *
     * @return ProductCollection
     */
    public function getProducts();

    /**
     * Return the products relation.
     *
     * @return HasMany|Builder
     */
    public function products();
}
