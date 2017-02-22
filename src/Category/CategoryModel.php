<?php namespace Anomaly\ProductsModule\Category;

use Anomaly\ProductsModule\Category\Contract\CategoryInterface;
use Anomaly\ProductsModule\Product\ProductCollection;
use Anomaly\ProductsModule\Product\ProductModel;
use Anomaly\Streams\Platform\Model\Products\ProductsCategoriesEntryModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class CategoryModel
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class CategoryModel extends ProductsCategoriesEntryModel implements CategoryInterface
{

    /**
     * Get the slug.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

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
     * Get the related parent category.
     *
     * @return null|CategoryInterface
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Get the parent ID.
     *
     * @return null|int
     */
    public function getParentId()
    {
        return $this->parent_id;
    }

    /**
     * Get the related children categories.
     *
     * @return CategoryCollection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Return the children relation.
     *
     * @return HasMany
     */
    public function relatives()
    {
        return $this
            ->children()
            ->where('id', '!=', $this->getId())
            ->orWhere('path', 'LIKE', $this->getPath() . '%');
    }

    /**
     * Return the children relation.
     *
     * @return HasMany
     */
    public function children()
    {
        return $this
            ->hasMany(CategoryModel::class, 'parent_id', 'id')
            ->orderBy('sort_order', 'ASC');
    }

    /**
     * Get the path.
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
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
     * Return the products relation.
     *
     * @return HasMany
     */
    public function products()
    {
        $relatives = $this->getRelatives();

        return $this->belongsToMany(
            ProductModel::class,
            'products_products_categories',
            'related_id',
            'entry_id'
        )->wherePivotIn('related_id', $relatives->ids());
    }

    /**
     * Get the distant related categories.
     *
     * @return CategoryCollection
     */
    public function getRelatives()
    {
        return $this->relatives;
    }
}
