<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleProductsCreateBrandsStream
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class AnomalyModuleProductsCreateBrandsStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'brands',
        'title_column' => 'name',
        'translatable' => true,
        'searchable'   => true,
        'trashable'    => true,
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'name'             => [
            'translatable' => true,
            'required'     => true,
        ],
        'slug'             => [
            'required' => true,
        ],
        'description'      => [
            'translatable' => true,
        ],
        'website',
        'images',
        'meta_title'       => [
            'translatable' => true,
        ],
        'meta_description' => [
            'translatable' => true,
        ],
        'address',
        'city',
        'postal_code',
        'country',
        'state',
        'website',
        'phone',
        'fax',
    ];

}
