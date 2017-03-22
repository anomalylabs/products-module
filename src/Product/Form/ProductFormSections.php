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

        $builder->setSections(
            [
                'product'   => [
                    'stacked' => true,
                    'tabs'    => [
                        'general'   => [
                            'title'  => 'anomaly.module.products::tab.general',
                            'fields' => [
                                'name',
                                'slug',
                                'description',
                            ],
                        ],
                        'pricing'   => [
                            'title'  => 'anomaly.module.products::tab.pricing',
                            'fields' => [
                                'regular_price',
                                'on_sale',
                                'sale_amount',
                                'cost',
                            ],
                        ],
                        'inventory' => [
                            'title'  => 'anomaly.module.products::tab.inventory',
                            'fields' => [
                                'sku',
                                'barcode',
                            ],
                        ],
                        'shipping'  => [
                            'title'  => 'anomaly.module.products::tab.shipping',
                            'fields' => [
                                'weight',
                                'length',
                                'width',
                                'height',
                            ],
                        ],
                        'images'    => [
                            'title'  => 'anomaly.module.products::tab.images',
                            'fields' => [
                                'images',
                            ],
                        ],
                        'links'     => [
                            'title'  => 'anomaly.module.products::tab.links',
                            'fields' => [
                                'tags',
                                'categories',
                                'brand',
                                'related',
                            ],
                        ],
                        'options'   => [
                            'title'  => 'anomaly.module.products::tab.options',
                            'fields' => [
                                'enabled',
                                'featured',
                            ],
                        ],
                        'seo'       => [
                            'title'  => 'anomaly.module.products::tab.seo',
                            'fields' => [
                                'meta_title',
                                'meta_description',
                                'meta_keywords',
                            ],
                        ],
                    ],
                ],
                'fields'    => [
                    'fields' => $fields->fieldSlugs(),
                ],
                'downloads' => [
                    'fields' => [
                        'downloads',
                    ],
                ],
            ]
        );
    }
}
