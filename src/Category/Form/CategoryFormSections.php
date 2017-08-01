<?php namespace Anomaly\ProductsModule\Category\Form;

class CategoryFormSections
{

    public function handle(CategoryFormBuilder $builder)
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
