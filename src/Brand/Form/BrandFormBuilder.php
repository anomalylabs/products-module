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
                        'website',
                    ],
                ],
                'address' => [
                    'title'  => 'anomaly.module.products::tab.address',
                    'fields' => [
                        'address',
                        'city',
                        'postal_code',
                        'country',
                        'state',
                    ],
                ],
                'contact' => [
                    'title'  => 'anomaly.module.products::tab.contact',
                    'fields' => [
                        'website',
                        'phone',
                        'fax',
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
