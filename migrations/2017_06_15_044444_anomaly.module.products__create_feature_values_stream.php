<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleProductsCreateFeatureValuesStream
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class AnomalyModuleProductsCreateFeatureValuesStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'feature_values',
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
        'feature'     => [
            'required' => true,
        ],
    ];

}
