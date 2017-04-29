<?php namespace Anomaly\ProductsModule\Variant\Form;

/**
 * Class VariantFormSections
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class VariantFormSections
{

    /**
     * Handle the sections.
     *
     * @param VariantFormBuilder $builder
     */
    public function handle(VariantFormBuilder $builder)
    {
        $builder->setSections(
            [
                'options' => [
                    'fields' => array_filter(
                        $builder->getFormFieldSlugs(),
                        function ($field) {
                            return starts_with($field, 'option_');
                        }
                    ),
                ],
                'variant' => [
                    'fields' => array_filter(
                        $builder->getFormFieldSlugs(),
                        function ($field) {
                            return !starts_with($field, 'option_');
                        }
                    ),
                ],
            ]
        );
    }
}
