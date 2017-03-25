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
        'view' => [
            'enabled' => 'edit',
            'target'  => '_blank',
            'href'    => 'admin/products/view/{request.route.parameters.id}',
        ],
    ];
}
