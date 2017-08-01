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
        'type'             => [
            'required' => true,
        ],
        'entry'            => [
            'required' => true,
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
        'parent',
        'related',
        'categories',
        'featured',
        'enabled',
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
        'details'          => [
            'en' => [
                'instructions' => 'Tell customers all about your product.',
            ],
        ],
        'handling_fee',
        'shipping_group',
        'tax_category',
        'options',
        'option_values',
        'feature_values',
        'downloads',
    ];

}
