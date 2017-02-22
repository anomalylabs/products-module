<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleProductsCreateCategoriesStream
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class AnomalyModuleProductsCreateCategoriesStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'categories',
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
        'parent',
        'name'             => [
            'translatable' => true,
            'required'     => true,
        ],
        'slug'             => [
            'required' => true,
        ],
        'path'             => [
            'required' => true,
        ],
        'description'      => [
            'translatable' => true,
        ],
        'images',
        'meta_title'       => [
            'translatable' => true,
        ],
        'meta_description' => [
            'translatable' => true,
        ],
        'meta_keywords'    => [
            'translatable' => true,
        ],
    ];

}
