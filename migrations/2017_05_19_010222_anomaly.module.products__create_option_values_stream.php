<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleProductsCreateOptionValuesStream
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class AnomalyModuleProductsCreateOptionValuesStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'option_values',
        'title_column' => 'label',
        'translatable' => true,
        'trashable'    => true,
        'sortable'     => true,
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'label'       => [
            'translatable' => true,
            'required'     => true,
        ],
        'slug'        => [
            'required' => true,
            'config'   => [
                'slugify' => 'label',
            ],
        ],
        'description' => [
            'translatable' => true,
        ],
        'option'      => [
            'required' => true,
        ],
    ];

}
