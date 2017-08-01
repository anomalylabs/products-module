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
    protected $icon = 'fa fa-shopping-basket';

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'products'   => [
            'buttons'  => [
                'new_product' => [
                    'data-toggle' => 'modal',
                    'data-target' => '#modal',
                    'href'        => 'admin/products/choose',
                ],
            ],
            'sections' => [
                'product_configurations' => [
                    'hidden'  => true,
                    'href'    => 'admin/products/{request.route.parameters.product}/configurations',
                    'title'   => 'anomaly.module.products::section.configurations.title',
                    'buttons' => [
                        'new_configuration',
                    ],
                ],
                'configurations'         => [
                    'href'  => 'admin/products/configurations',
                    'title' => 'anomaly.module.products::section.configurations.title',
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
        'features'   => [
            'buttons'  => [
                'add_feature',
            ],
            'sections' => [
                'feature_values' => [
                    'hidden'  => true,
                    'href'    => 'admin/products/features/values/{request.route.parameters.feature}',
                    'buttons' => [
                        'add_value',
                    ],
                ],
            ],
        ],
        'options'    => [
            'buttons'  => [
                'add_option',
            ],
            'sections' => [
                'option_values' => [
                    'hidden'  => true,
                    'href'    => 'admin/products/options/values/{request.route.parameters.option}',
                    'buttons' => [
                        'add_value',
                    ],
                ],
            ],
        ],
        'types'      => [
            'buttons'  => [
                'new_type',
            ],
            'sections' => [
                'assignments' => [
                    'hidden'  => true,
                    'href'    => 'admin/products/types/assignments/{request.route.parameters.stream}',
                    'buttons' => [
                        'assign_fields' => [
                            'data-toggle' => 'modal',
                            'data-target' => '#modal',
                            'href'        => 'admin/products/types/assignments/{request.route.parameters.stream}/choose',
                        ],
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
