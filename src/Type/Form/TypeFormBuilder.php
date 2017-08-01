<?php namespace Anomaly\ProductsModule\Type\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class TypeFormBuilder
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class TypeFormBuilder extends FormBuilder
{

    /**
     * The form fields.
     *
     * @var array
     */
    protected $fields = [
        '*',
        'slug' => [
            'disabled' => 'edit',
        ],
    ];

    /**
     * The form sections.
     *
     * @var array
     */
    protected $sections = [
        'type' => [
            'tabs' => [
                'general' => [
                    'title'  => 'anomaly.module.products::tab.general',
                    'fields' => [
                        'name',
                        'slug',
                        'description',
                    ],
                ],
                'layout'  => [
                    'title'  => 'anomaly.module.products::tab.layout',
                    'fields' => [
                        'theme_layout',
                        'layout',
                    ],
                ],
            ],
        ],
    ];
}
