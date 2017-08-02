<?php

use Anomaly\ProductsModule\Brand\BrandModel;
use Anomaly\ProductsModule\Category\CategoryModel;
use Anomaly\ProductsModule\Feature\FeatureModel;
use Anomaly\ProductsModule\FeatureValue\FeatureValueModel;
use Anomaly\ProductsModule\Option\OptionModel;
use Anomaly\ProductsModule\OptionValue\OptionValueModel;
use Anomaly\ProductsModule\Product\ProductModel;
use Anomaly\ProductsModule\Type\TypeModel;
use Anomaly\ShippingModule\Group\GroupModel;
use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleProductsCreateProductsFields
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class AnomalyModuleProductsCreateProductsFields extends Migration
{

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [
        'str_id'        => 'anomaly.field_type.text',
        'name'          => 'anomaly.field_type.text',
        'description'   => 'anomaly.field_type.textarea',
        'slug'          => [
            'type'   => 'anomaly.field_type.slug',
            'config' => [
                'type'    => '-',
                'slugify' => 'name',
            ],
        ],
        'tags'          => 'anomaly.field_type.tags',
        'images'        => 'anomaly.field_type.files',
        'regular_price' => [
            'type'   => 'anomaly.field_type.decimal',
            'config' => [
                'min' => 0,
            ],
        ],
        'sale_amount'   => 'anomaly.field_type.text',
        'sale_price'    => [
            'type'   => 'anomaly.field_type.decimal',
            'config' => [
                'min' => 0,
            ],
        ],
        'on_sale'       => 'anomaly.field_type.boolean',
        'cost'          => [
            'type'   => 'anomaly.field_type.decimal',
            'config' => [
                'min' => 0,
            ],
        ],
        'handling_fee'  => [
            'type'   => 'anomaly.field_type.decimal',
            'config' => [
                'min' => 0,
            ],
        ],

        'sku'                     => 'anomaly.field_type.text',
        'barcode'                 => 'anomaly.field_type.text',
        'track_inventory'         => 'anomaly.field_type.boolean',
        'backorder_policy'        => [
            'type'   => 'anomaly.field_type.select',
            'config' => [
                'options' => [
                    'allow' => 'anomaly.module.products::field.backorder_policy.option.allow',
                    'deny'  => 'anomaly.module.products::field.backorder_policy.option.deny',
                ],
            ],
        ],
        'low_inventory_threshold' => 'anomaly.field_type.integer',
        'quantity'                => [
            'type'   => 'anomaly.field_type.integer',
            'config' => [
                'min' => 0,
            ],
        ],

        'weight'           => [
            'type'   => 'anomaly.field_type.decimal',
            'config' => [
                'min'      => 0,
                'decimals' => 1,
            ],
        ],
        'length'           => [
            'type'   => 'anomaly.field_type.decimal',
            'config' => [
                'min'      => 0,
                'decimals' => 1,
            ],
        ],
        'width'            => [
            'type'   => 'anomaly.field_type.decimal',
            'config' => [
                'min'      => 0,
                'decimals' => 1,
            ],
        ],
        'height'           => [
            'type'   => 'anomaly.field_type.decimal',
            'config' => [
                'min'      => 0,
                'decimals' => 1,
            ],
        ],
        'enabled'          => [
            'type'   => 'anomaly.field_type.boolean',
            'config' => [
                'default_value' => true,
            ],
        ],
        'featured'         => 'anomaly.field_type.boolean',
        'meta_title'       => 'anomaly.field_type.text',
        'meta_description' => 'anomaly.field_type.textarea',
        'categories'       => [
            'type'   => 'anomaly.field_type.multiple',
            'config' => [
                'mode'    => 'lookup',
                'related' => CategoryModel::class,
            ],
        ],
        'brand'            => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'mode'    => 'lookup',
                'related' => BrandModel::class,
            ],
        ],
        'related'          => [
            'type'   => 'anomaly.field_type.multiple',
            'config' => [
                'mode'    => 'lookup',
                'related' => ProductModel::class,
            ],
        ],
        'product'          => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'mode'    => 'lookup',
                'related' => ProductModel::class,
            ],
        ],
        'parent'           => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'mode'    => 'lookup',
                'related' => ProductModel::class,
            ],
        ],
        'options'          => [
            'type'   => 'anomaly.field_type.multiple',
            'config' => [
                'mode'    => 'lookup',
                'related' => OptionModel::class,
            ],
        ],
        'option_values'    => [
            'type'   => 'anomaly.field_type.multiple',
            'config' => [
                'mode'    => 'lookup',
                'related' => OptionValueModel::class,
            ],
        ],
        'features'         => [
            'type'   => 'anomaly.field_type.multiple',
            'config' => [
                'mode'    => 'lookup',
                'related' => FeatureModel::class,
            ],
        ],
        'feature_values'   => [
            'type'   => 'anomaly.field_type.multiple',
            'config' => [
                'mode'    => 'lookup',
                'related' => FeatureValueModel::class,
            ],
        ],
        'path'             => 'anomaly.field_type.text',
        'details'          => [
            'type'   => 'anomaly.field_type.wysiwyg',
            'locked' => false, // Used for seeding
            'en'     => [
                'name' => 'Details',
            ],
        ],
        'content'          => [
            'type'   => 'anomaly.field_type.wysiwyg',
            'locked' => false, // Used for seeding
            'en'     => [
                'name' => 'Content',
            ],
        ],
        'address'          => 'anomaly.field_type.text',
        'city'             => 'anomaly.field_type.text',
        'postal_code'      => 'anomaly.field_type.text',
        'country'          => [
            'type'   => 'anomaly.field_type.country',
            'config' => [
                'mode'        => 'search',
                'top_options' => [
                    'US',
                ],
            ],
        ],
        'state'            => [
            'type'   => 'anomaly.field_type.state',
            'config' => [
                'mode' => 'search',
            ],
        ],
        'website'          => 'anomaly.field_type.url',
        'phone'            => 'anomaly.field_type.text',
        'fax'              => 'anomaly.field_type.text',
        'label'            => 'anomaly.field_type.text',
        'required'         => 'anomaly.field_type.boolean',
        'config'           => 'anomaly.field_type.textarea',
        'entry'            => 'anomaly.field_type.polymorphic',
        'option'           => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => OptionModel::class,
            ],
        ],
        'feature'          => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => FeatureModel::class,
            ],
        ],
        'shipping_group'   => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'mode'    => 'search',
                'related' => GroupModel::class,
            ],
        ],
        'tax_category'     => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'mode'    => 'search',
                'related' => \Anomaly\TaxesModule\Category\CategoryModel::class,
            ],
        ],
        'type'             => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => TypeModel::class,
            ],
        ],
        'extension'        => [
            'type'   => 'anomaly.field_type.addon',
            'config' => [
                'type'   => 'extension',
                'search' => 'anomaly.module.products::product.*',
            ],
        ],
        'layout'           => [
            'type'   => 'anomaly.field_type.editor',
            'config' => [
                'default_value' => '{{ product.details|raw }}',
                'mode'          => 'twig',
            ],
        ],
        'theme_layout'     => [
            'type'   => 'anomaly.field_type.select',
            'config' => [
                'default_value' => 'theme::layouts/default.twig',
                'handler'       => 'layouts',
            ],
        ],
    ];
}
