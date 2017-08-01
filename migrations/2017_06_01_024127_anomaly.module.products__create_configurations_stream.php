<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleProductsCreateConfigurationsStream
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class AnomalyModuleProductsCreateConfigurationsStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'configurations',
        'title_column' => 'sku',
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
        'quantity',
        'option_values',
    ];

}
