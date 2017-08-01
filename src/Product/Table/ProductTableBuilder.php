<?php namespace Anomaly\ProductsModule\Product\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;
use Illuminate\Database\Eloquent\Builder;

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
        'type',
    ];

    /**
     * The table columns.
     *
     * @var array|string
     */
    protected $columns = [
        'entry.default_configuration.images.first().preview' => [
            'heading' => 'anomaly.module.products::field.product.name',
        ],
        'name'                                               => [
            'sort_column' => 'name',
            'wrapper'     => '
                    <strong>{value.name}</strong>
                    <br>
                    <small class="text-muted">{value.sku}</small>
                    <br>
                    <span>{value.tags}</span>',
            'value'       => [
                'sku'  => 'entry.default_configuration.sku',
                'name' => 'entry.name',
                'tags' => 'entry.tags.labels("tag-info")|join',
            ],
        ],
        'brand',
        'price'                                              => [
            'value' => 'entry.default_configuration.regular_price.currency',
        ],
        'entry.type.title',
    ];

    /**
     * The table buttons.
     *
     * @var array|string
     */
    protected $buttons = [
        'edit',
        'view'           => [
            'target' => '_blank',
        ],
        'configurations' => [
            'icon' => 'cogs',
            'type' => 'primary',
            'href' => 'admin/products/{entry.id}/configurations',
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

    /**
     * Fired just before
     * querying table entries.
     *
     * @param Builder $query
     */
    public function onQuerying(Builder $query)
    {
        // Only base products.
        $query->whereNull('parent_id');
    }

}
