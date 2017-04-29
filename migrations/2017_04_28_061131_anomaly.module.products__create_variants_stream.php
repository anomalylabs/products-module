<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleProductsCreateVariantsStream
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class AnomalyModuleProductsCreateVariantsStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'variants',
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
        'product'       => [
            'required' => true,
        ],
        'images',
        'regular_price' => [
            'required' => true,
        ],
        'sale_amount',
        'on_sale',
        'sale_price',
        'cost',
        'sku'           => [
            'unique'   => true,
            'required' => true,
        ],
        'barcode'       => [
            'unique' => true,
        ],
        'weight',
        'length',
        'width',
        'height',
        'options',
        'downloads',
        'properties',
    ];

}
