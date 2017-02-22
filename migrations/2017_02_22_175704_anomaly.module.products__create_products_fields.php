<?php

use Anomaly\ProductsModule\Category\CategoryModel;
use Anomaly\ProductsModule\Product\ProductModel;
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
        'str_id'           => 'anomaly.field_type.text',
        'name'             => 'anomaly.field_type.text',
        'description'      => 'anomaly.field_type.textarea',
        'slug'             => [
            'type'   => 'anomaly.field_type.slug',
            'config' => [
                'type'    => '-',
                'slugify' => 'name',
            ],
        ],
        'tags'             => 'anomaly.field_type.tags',
        'images'           => 'anomaly.field_type.files',
        'regular_price'    => 'anomaly.field_type.decimal',
        'sale_price'       => 'anomaly.field_type.decimal',
        'sku'              => 'anomaly.field_type.text',
        'barcode'          => 'anomaly.field_type.text',
        'weight'           => [
            'type'   => 'anomaly.field_type.decimal',
            'config' => [
                'decimals' => 1,
            ],
        ],
        'length'           => [
            'type'   => 'anomaly.field_type.decimal',
            'config' => [
                'decimals' => 1,
            ],
        ],
        'width'            => [
            'type'   => 'anomaly.field_type.decimal',
            'config' => [
                'decimals' => 1,
            ],
        ],
        'height'           => [
            'type'   => 'anomaly.field_type.decimal',
            'config' => [
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
        'meta_keywords'    => 'anomaly.field_type.tags',
        'categories'       => [
            'type'   => 'anomaly.field_type.multiple',
            'config' => [
                'mode'    => 'lookup',
                'related' => CategoryModel::class,
            ],
        ],
//        'brand'            => [
//            'type'   => 'anomaly.field_type.relationship',
//            'config' => [
//                'mode'    => 'lookup',
//                'related' => BrandModel::class,
//            ],
//        ],
        'related'          => [
            'type'   => 'anomaly.field_type.multiple',
            'config' => [
                'mode'    => 'lookup',
                'related' => ProductModel::class,
            ],
        ],
//        'downloads'        => [
//            'type'   => 'anomaly.field_type.repeater',
//            'config' => [
//                'manage'  => false,
//                'add_row' => 'anomaly.module.products::button.add_download',
//                'related' => 'Anomaly\ProductsModule\Download\DownloadModel',
//            ],
//        ],
//        'variants'         => [
//            'type'   => 'anomaly.field_type.repeater',
//            'config' => [
//                'manage'  => false,
//                'add_row' => 'anomaly.module.products::button.add_variant',
//                'related' => 'Anomaly\ProductsModule\Variant\VariantModel',
//            ],
//        ],
//        'properties'       => [
//            'type'   => 'anomaly.field_type.repeater',
//            'config' => [
//                'manage'  => false,
//                'add_row' => 'anomaly.module.products::button.add_property',
//                'related' => 'Anomaly\ProductsModule\Property\PropertyModel',
//            ],
//        ],
        'path'             => 'anomaly.field_type.text',
        'parent'           => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => CategoryModel::class,
            ],
        ],

        'details' => [
            'type'   => 'anomaly.field_type.wysiwyg',
            'locked' => false, // Used for seeding
            'en'     => [
                'name' => 'Details',
            ],
        ],
        'content' => [
            'type'   => 'anomaly.field_type.wysiwyg',
            'locked' => false, // Used for seeding
            'en'     => [
                'name' => 'Content',
            ],
        ],
    ];
}
