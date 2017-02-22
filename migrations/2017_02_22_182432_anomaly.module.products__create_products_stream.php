<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleProductsCreateProductsStream
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class AnomalyModuleProductsCreateProductsStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'products',
        'title_column' => 'name',
        'translatable' => true,
        'trashable'    => true,
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'str_id'           => [
            'required' => true,
            'unique'   => true,
        ],
        'name'             => [
            'required'     => true,
            'translatable' => true,
        ],
        'slug'             => [
            'required' => true,
            'unique'   => true,
        ],
        'description'      => [
            'translatable' => true,
        ],
        'tags',
        'brand',
        'related',
        'categories',
        'featured',
        'enabled',
        'images',
        'regular_price'    => [
            'required' => true,
        ],
        'sale_price',
        'sku'              => [
            'unique'   => true,
            'required' => true,
        ],
        'barcode'          => [
            'unique' => true,
        ],
        'weight',
        'length',
        'width',
        'height',
        'meta_title'       => [
            'translatable' => true,
        ],
        'meta_description' => [
            'translatable' => true,
        ],
        'meta_keywords'    => [
            'translatable' => true,
        ],
        'downloads',
        'variants',
        'properties',
        'details'          => [
            'en' => [
                'instructions' => 'Tell customers all about your product.',
            ],
        ],
    ];

}
