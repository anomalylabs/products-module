<?php namespace Anomaly\ProductsModule\Product\Form;

/**
 * Class ProductAssemblyFormButtons
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ProductAssemblyFormButtons
{

    /**
     * Handle the buttons.
     *
     * @param ProductAssemblyFormBuilder $builder
     */
    public function handle(ProductAssemblyFormBuilder $builder)
    {
        $builder->setButtons(
            [
                'cancel',
                'view'           => [
                    'target'   => '_blank',
                    'disabled' => 'create',
                    'href'     => function () use ($builder) {
                        return 'admin/products/view/' . $builder->getChildFormEntryId('product');
                    },
                ],
                'configurations' => [
                    'icon'     => 'cogs',
                    'disabled' => 'create',
                    'type'     => 'primary',
                    'href'     => function () use ($builder) {
                        return 'admin/products/' . $builder->getChildFormEntryId('product') . '/configurations';
                    },
                ],
            ]
        );
    }
}
