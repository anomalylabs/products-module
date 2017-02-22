<?php namespace Anomaly\ProductsModule\Product\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class ProductTableBuilder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ProductTableBuilder extends TableBuilder
{

    /**
     * The table filters.
     *
     * @var array|string
     */
    protected $filters = [
        'search' => [
            'fields' => [
                'name',
                'slug',
                'tags',
                'description',
            ],
        ],
    ];

    /**
     * The table columns.
     *
     * @var array|string
     */
    protected $columns = [
        'entry.images.first().preview' => [
            'heading' => 'anomaly.module.store::table.heading.product',
        ],
        'name'                         => [
            'sort_column' => 'name',
            'wrapper'     => '
                    <strong>{value.name}</strong>
                    <br>
                    <small class="text-muted">{value.sku}</small>
                    <br>
                    <span>{value.tags}</span>',
            'value'       => [
                'sku'  => 'entry.sku',
                'name' => 'entry.name',
                'tags' => 'entry.tags.labels("tag-info")|join',
            ],
        ],
        'price'                        => [
            'value' => '{{ currency_format(entry.sale_price ?: entry.regular_price) }}',
        ],
        'enabled'                      => [
            'value' => 'entry.enabled.toggle',
        ],
    ];

    /**
     * The table buttons.
     *
     * @var array|string
     */
    protected $buttons = [
        'edit',
        'view' => [
            'target' => '_blank',
        ],
    ];

    /**
     * The table actions.
     *
     * @var array|string
     */
    protected $actions = [
        'delete',
    ];
}
