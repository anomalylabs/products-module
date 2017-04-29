<?php namespace Anomaly\ProductsModule\Variant\Form;

use Anomaly\ProductsModule\Modifier\Contract\ModifierInterface;
use Anomaly\ProductsModule\Modifier\Contract\ModifierRepositoryInterface;
use Anomaly\ProductsModule\Variant\Contract\VariantInterface;

class VariantFormFields
{

    /**
     * Handle the fields.
     *
     * @param VariantFormBuilder $builder
     */
    public function handle(VariantFormBuilder $builder)
    {
        /* @var VariantInterface $entry */
        if (!$product = $builder->getProduct()) {

            $entry   = $builder->getFormEntry();
            $product = $entry->getProduct();
        }

        //$modifiers = $product->getModifiers();
        $modifiers = app(ModifierRepositoryInterface::class)->all();

        $stream = $builder->getFormStream();
        $fields = $stream->getAssignmentFieldSlugs();

        /* @var ModifierInterface $modifier */
        foreach ($modifiers as $modifier) {

            $options = $modifier->getOptions();

            $builder->skipField('option_' . $modifier->getId());

            $fields[] = [
                'required' => true,
                'ignored'  => true,
                'label'    => $modifier->getName(),
                'field'    => 'option_' . $modifier->getId(),
                'type'     => 'anomaly.field_type.select',
                'config'   => [
                    'options' => $options->pluck('name', 'id')->all(),
                ],
            ];
        }

        $builder->setFields($fields);
    }
}
