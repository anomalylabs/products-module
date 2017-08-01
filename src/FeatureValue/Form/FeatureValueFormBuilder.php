<?php namespace Anomaly\ProductsModule\FeatureValue\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class FeatureValueFormBuilder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class FeatureValueFormBuilder extends FormBuilder
{

    /**
     * Fields to skip.
     *
     * @var array|string
     */
    protected $skips = [
        'feature',
    ];

}
