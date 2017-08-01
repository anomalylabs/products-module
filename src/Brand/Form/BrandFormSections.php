<?php namespace Anomaly\ProductsModule\Brand\Form;

class BrandFormSections
{

    public function handle(BrandFormBuilder $builder)
    {
        $builder->setSections(
            [
                'general' => [
                    'tabs' => [
                        'general' => [
                            'title'  => 'anomaly.module.products::tab.general',
                            'fields' => [
                                'name',
                                'slug',
                                'images',
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
                            ],
                        ],
                    ],
                ],
            ]
        );

        $stream = $builder->getFormStream();

        if ($assignments = $stream->getUnlockedAssignments()) {

            $builder->addSection(
                'fields',
                [
                    'fields' => $assignments->fieldSlugs(),
                ]
            );
        }
    }
}
