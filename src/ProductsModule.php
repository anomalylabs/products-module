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
                'product_assignments' => [
                    'href'    => 'admin/products/assignments/products',
                    'title'   => 'anomaly.module.products::section.assignments.title',
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
            'buttons'  => [
                'new_category',
            ],
            'sections' => [
                'categories_assignments' => [
                    'href'    => 'admin/products/categories/assignments/categories',
                    'title'   => 'anomaly.module.products::section.assignments.title',
                    'buttons' => [
                        'assign_fields' => [
                            'data-toggle' => 'modal',
                            'data-target' => '#modal',
                            'href'        => 'admin/products/categories/assignments/categories/choose',
                        ],
                    ],
                ],
            ],
        ],
        'brands'     => [
            'buttons'  => [
                'new_brand',
            ],
            'sections' => [
                'brands_assignments' => [
                    'href'    => 'admin/products/brands/assignments/brands',
                    'title'   => 'anomaly.module.products::section.assignments.title',
                    'buttons' => [
                        'assign_fields' => [
                            'data-toggle' => 'modal',
                            'data-target' => '#modal',
                            'href'        => 'admin/products/brands/assignments/brands/choose',
                        ],
                    ],
                ],
            ],
        ],
        'modifiers'  => [
            'buttons'  => [
                'new_modifier',
            ],
            'sections' => [
                'options' => [
                    'hidden'  => true,
                    'href'    => 'admin/products/modifiers/options/{request.route.parameters.modifier}',
                    'buttons' => [
                        'add_option',
                    ],
                ],
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
