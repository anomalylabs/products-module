<?php namespace Anomaly\ProductsModule\OptionValue\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class OptionValueFormBuilder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class OptionValueFormBuilder extends FormBuilder
{

    /**
     * Fields to skip.
     *
     * @var array|string
     */
    protected $skips = [
        'option',
    ];

}
