<?php namespace Anomaly\ProductsModule\Product;

use Anomaly\ProductsModule\Product\Contract\ProductInterface;
use Anomaly\Streams\Platform\View\ViewTemplate;

/**
 * Class ProductLoader
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\ProductsModule\Product
 */
class ProductLoader
{

    /**
     * The template data.
     *
     * @var ViewTemplate
     */
    protected $template;

    /**
     * Create a new ProductLoader instance.
     *
     * @param ViewTemplate $template
     */
    public function __construct(ViewTemplate $template)
    {
        $this->template = $template;
    }

    /**
     * Load product data to the template.
     *
     * @param ProductInterface $product
     */
    public function load(ProductInterface $product)
    {
        $this->template->set('title', $product->getTitle());
        $this->template->set('meta_title', $product->getMetaTitle());
        $this->template->set('meta_keywords', $product->getMetaKeywords());
        $this->template->set('meta_description', $product->getMetaDescription());
    }
}
