<?php namespace Anomaly\ProductsModule\Product\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class ProductFormBuilder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ProductFormBuilder extends FormBuilder
{

    /**
     * Fields to skip.
     *
     * @var array|string
     */
    protected $skips = [
        'str_id',
    ];

    /**
     * The form buttons.
     *
     * @var array
     */
    protected $buttons = [
        'cancel',

        'modifiers'  => [
            'icon'    => 'sliders',
            'type'    => 'primary',
            'enabled' => 'edit',
            'text'    => 'anomaly.module.products::button.modifiers',
        ],
        'variants'   => [
            'icon'    => 'code-fork',
            'type'    => 'primary',
            'enabled' => 'edit',
            'text'    => 'anomaly.module.products::button.variants',
        ],

        'view' => [
            'enabled' => 'edit',
            'target'  => '_blank',
            'href'    => 'admin/products/view/{request.route.parameters.id}',
        ],
    ];
}
