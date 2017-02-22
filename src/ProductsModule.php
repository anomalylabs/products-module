<?php namespace Anomaly\ProductsModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

class ProductsModule extends Module
{

    /**
     * The addon icon.
     *
     * @var string
     */
    protected $icon = 'glyphicons glyphicons-package';

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'products'   => [
            'buttons' => [
                'new_product',
            ],
        ],
        'categories' => [
            'buttons' => [
                'new_category',
            ],
        ],
        'fields'     => [
            'buttons' => [
                'new_field' => [
                    'data-toggle' => 'modal',
                    'data-target' => '#modal',
                    'href'        => 'admin/products/fields/choose',
                ],
            ],
        ],
    ];
}
