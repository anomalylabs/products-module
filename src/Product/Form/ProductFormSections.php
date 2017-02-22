<?php namespace Anomaly\ProductsModule\Product\Form;

/**
 * Class ProductFormSections
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ProductFormSections
{

    /**
     * Handle the form sections.
     *
     * @param ProductFormBuilder $builder
     */
    public function handle(ProductFormBuilder $builder)
    {
        $stream = $builder->getFormStream();
        $fields = $stream->getUnlockedAssignments();
        $builder->setSections([]);
        return;
        $builder->setSections(
            [
                'product'  => [
                    'fields' => [
                        'name',
                        'slug',
                        'description',
                    ],
                ],
                'images'   => [
                    'fields' => [
                        'images',
                    ],
                ],
                'fields'   => [
                    'fields' => $fields->fieldSlugs(),
                ],
                'options'  => [
                    'orientation' => 'vertical',
                    'tabs'        => [
                        'price'     => [
                            'title'  => 'anomaly.module.products::form.tab.price',
                            'fields' => [
                                'regular_price',
                                'sale_price',
                            ],
                        ],
                        'inventory' => [
                            'title'  => 'anomaly.module.products::form.tab.inventory',
                            'fields' => [
                                'sku',
                                'barcode',
                            ],
                        ],
                        'shipping'  => [
                            'title'  => 'anomaly.module.products::form.tab.shipping',
                            'fields' => [
                                'weight',
                                'length',
                                'width',
                                'height',
                            ],
                        ],
                        'links'     => [
                            'title'  => 'anomaly.module.products::form.tab.links',
                            'fields' => [
                                'tags',
                                'categories',
                                'brand',
                                'related',
                            ],
                        ],
                        'downloads' => [
                            'title'  => 'anomaly.module.products::form.tab.downloads',
                            'fields' => [
                                'downloads',
                            ],
                        ],
                        'seo'       => [
                            'title'  => 'anomaly.module.products::form.tab.seo',
                            'fields' => [
                                'meta_title',
                                'meta_description',
                                'meta_keywords',
                            ],
                        ],
                        'options'   => [
                            'title'  => 'anomaly.module.products::form.tab.options',
                            'fields' => [
                                'enabled',
                                'featured',
                            ],
                        ],
                    ],
                ],
                'variants' => [
                    'fields' => [
                        'variants',
                    ],
                ],
            ]
        );
    }
}
