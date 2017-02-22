<?php namespace Anomaly\ProductsModule\Category\Tree;

use Anomaly\Streams\Platform\Ui\Tree\TreeBuilder;

/**
 * Class CategoryTreeBuilder
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\ProductsModule\Category\Tree
 */
class CategoryTreeBuilder extends TreeBuilder
{

    /**
     * The tree segments.
     *
     * @var array|string
     */
    protected $segments = [
        'entry.image.preview(30)',
        'entry.edit_link',
    ];

    /**
     * The tree buttons.
     *
     * @var array|string
     */
    protected $buttons = [
        'add'  => [
            'href' => 'admin/products/categories/create?parent={entry.id}',
            'text' => 'anomaly.module.products::button.create_child',
        ],
        'view' => [
            'target' => '_blank',
        ],
        'delete',
    ];

    /**
     * The tree actions.
     *
     * @var array|string
     */
    protected $actions = [
        'delete',
    ];

}
