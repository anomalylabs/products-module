<?php namespace Anomaly\ProductsModule\Product\Type;

use Anomaly\ProductsModule\Product\Contract\ProductInterface;
use Anomaly\ProductsModule\Product\Form\ProductFormBuilder;
use Anomaly\Streams\Platform\Addon\Extension\Extension;

/**
 * Class ProductTypeExtension
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ProductTypeExtension extends Extension
{

    /**
     * Return the product form builder.
     *
     * @param ProductInterface $product
     * @return ProductFormBuilder
     */
    public function builder(ProductInterface $product = null)
    {
        return app(ProductFormBuilder::class);
    }

}
