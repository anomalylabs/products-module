<?php namespace Anomaly\ProductsModule\Configuration\Form;

/**
 * Class ConfigurationAssemblyFormSections
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ConfigurationAssemblyFormSections
{

    /**
     * Handle the sections.
     *
     * @param ConfigurationAssemblyFormBuilder $builder
     */
    public function handle(ConfigurationAssemblyFormBuilder $builder)
    {
        $options = $builder->getChildFormFieldSlugs('options', 'options_');

        $builder->setSections(
            [
                'options'       => [
                    'fields' => $options,
                ],
                'configuration' => [
                    'stacked' => true,
                    'tabs'    => [
                        'pricing'   => [
                            'title'  => 'anomaly.module.products::tab.pricing',
                            'fields' => [
                                'configuration_regular_price',
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
                                'configuration_quantity',
                            ],
                        ],
                        'images'    => [
                            'title'  => 'anomaly.module.products::tab.images',
                            'fields' => [
                                'configuration_images',
                            ],
                        ],
                    ],
                ],
            ]
        );
    }
}
