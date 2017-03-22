<?php namespace Anomaly\ProductsModule\Brand\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class BrandFormBuilder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class BrandFormBuilder extends FormBuilder
{

    /**
     * The form sections.
     *
     * @var array
     */
    protected $sections = [
        'general' => [
            'tabs' => [
                'general' => [
                    'title'  => 'anomaly.module.products::tab.general',
                    'fields' => [
                        'name',
                        'slug',
                        'description',
                    ],
                ],
                'media'   => [
                    'title'  => 'anomaly.module.products::tab.media',
                    'fields' => [
                        'images',
                    ],
                ],
                'seo'     => [
                    'title'  => 'anomaly.module.products::tab.seo',
                    'fields' => [
                        'meta_title',
                        'meta_description',
                        'meta_keywords',
                    ],
                ],
            ],
        ],
    ];
}
