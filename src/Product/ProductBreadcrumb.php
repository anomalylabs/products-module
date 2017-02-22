<?php namespace Anomaly\ProductsModule\Product;

use Anomaly\ProductsModule\Category\Contract\CategoryInterface;
use Anomaly\ProductsModule\Product\Contract\ProductInterface;
use Anomaly\Streams\Platform\Routing\UrlGenerator;
use Anomaly\Streams\Platform\Ui\Breadcrumb\BreadcrumbCollection;

/**
 * Class ProductBreadcrumb
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\ProductsModule\Product
 */
class ProductBreadcrumb
{

    /**
     * The URL generator.
     *
     * @var UrlGenerator
     */
    protected $url;

    /**
     * The breadcrumb collection.
     *
     * @var BreadcrumbCollection
     */
    protected $breadcrumbs;

    /**
     * Create a new ProductBreadcrumb instance.
     *
     * @param UrlGenerator         $url
     * @param BreadcrumbCollection $breadcrumbs
     */
    public function __construct(UrlGenerator $url, BreadcrumbCollection $breadcrumbs)
    {
        $this->url         = $url;
        $this->breadcrumbs = $breadcrumbs;
    }

    /**
     * Make the product breadcrumbs.
     *
     * @param ProductInterface $product
     */
    public function make(ProductInterface $product)
    {
        $this->breadcrumbs->add(
            'anomaly.module.products::breadcrumb.products',
            $this->url->route('anomaly.module.products::products.index')
        );

        /* @var CategoryInterface $category */
        if ($category = $product->getDefaultCategory()) {
            $this->loadCategoryBreadcrumb($category);
        }

        $this->breadcrumbs->add($product->getTitle(), $product->route('view'));
    }

    /**
     * Load the category breadcrumb.
     *
     * @param CategoryInterface $category
     */
    protected function loadCategoryBreadcrumb(CategoryInterface $category)
    {
        if ($parent = $category->getParent()) {
            $this->loadCategoryBreadcrumb($parent);
        }

        $this->breadcrumbs->add(
            $category->getName(),
            $category->route('view')
        );
    }
}
