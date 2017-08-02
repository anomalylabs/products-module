<?php namespace Anomaly\ProductsModule\Product\Form;

/**
 * Class ProductAssemblyFormSections
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ProductAssemblyFormSections
{

    /**
     * Handle the form sections.
     *
     * @param ProductFormBuilder $builder
     */
    public function handle(ProductAssemblyFormBuilder $builder)
    {
        $stream = $builder->getChildFormStream('entry');
        $fields = $stream->getUnlockedAssignments();

        $features = $builder->getChildFormFieldSlugs('features', 'features_');

        $builder->setSections(
            [
                'product' => [
                    'stacked' => true,
                    'tabs'    => [
                        'general'   => [
                            'title'  => 'anomaly.module.products::tab.general',
                            'fields' => [
                                'product_name',
                                'product_slug',
                                'product_description',
                                'product_enabled',
                                'product_featured',
                            ],
                        ],
                        'pricing'   => [
                            'title'  => 'anomaly.module.products::tab.pricing',
                            'fields' => [
                                'configuration_regular_price',
                                'product_tax_category',
                                'configuration_on_sale',
                                'configuration_sale_amount',
                                'configuration_cost',
                            ],
                        ],
                        'inventory' => [
                            'title'  => 'anomaly.module.products::tab.inventory',
                            'fields' => [
                                'configuration_sku',
                                'configuration_barcode',
                                'product_track_inventory',
                                'configuration_quantity',
                                'product_backorder_policy',
                                'product_low_inventory_threshold',
                            ],
                        ],
                        'shipping'  => [
                            'title'  => 'anomaly.module.products::tab.shipping',
                            'fields' => [
                                'product_shipping_group',
                                'product_weight',
                                'product_length',
                                'product_width',
                                'product_height',
                                'product_handling_fee',
                            ],
                        ],
                        'images'    => [
                            'title'  => 'anomaly.module.products::tab.images',
                            'fields' => [
                                'configuration_images',
                            ],
                        ],
                        'links'     => [
                            'title'  => 'anomaly.module.products::tab.links',
                            'fields' => [
                                'product_tags',
                                'product_categories',
                                'product_brand',
                                'product_related',
                            ],
                        ],
                        'seo'       => [
                            'title'  => 'anomaly.module.products::tab.seo',
                            'fields' => [
                                'product_meta_title',
                                'product_meta_description',
                            ],
                        ],
                        'options'   => [
                            'title'  => 'anomaly.module.products::tab.options',
                            'fields' => [
                                'product_options',
                                'product_option_values',
                            ],
                        ],
                        'features'  => [
                            'title'  => 'anomaly.module.products::tab.features',
                            'fields' => $features,
                        ],
                    ],
                ],
                'fields'  => [
                    'fields' => $fields->fieldSlugs('entry_'),
                ],
            ]
        );
    }
}
