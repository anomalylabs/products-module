<?php namespace Anomaly\ProductsModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

/**
 * Class ProductsModule
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
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
            'buttons'  => [
                'new_product',
            ],
            'sections' => [
                'assignments' => [
                    'href'    => 'admin/products/assignments/products',
                    'buttons' => [
                        'assign_fields' => [
                            'data-toggle' => 'modal',
                            'data-target' => '#modal',
                            'href'        => 'admin/products/assignments/products/choose',
                        ],
                    ],
                ],
            ],
        ],
        'categories' => [
            'buttons' => [
                'new_category',
            ],
        ],
        'brands'     => [
            'buttons' => [
                'new_brand',
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
