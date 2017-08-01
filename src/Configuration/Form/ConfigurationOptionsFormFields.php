<?php namespace Anomaly\ProductsModule\Configuration\Form;

use Anomaly\ProductsModule\Option\Contract\OptionInterface;

/**
 * Class ConfigurationOptionsFormFields
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ConfigurationOptionsFormFields
{

    /**
     * Handle the fields.
     *
     * @param ConfigurationOptionsFormBuilder $builder
     */
    public function handle(ConfigurationOptionsFormBuilder $builder)
    {
        $fields = [];
        $values = [];

        if ($configuration = $builder->getConfiguration()) {
            $values = $configuration->getOptionValues()->pluck('id', 'option_id')->all();
        }

        $product = $builder->getProduct();

        /* @var OptionInterface $option */
        foreach ($product->getOptions() as $option) {

            $builder->skipField('option_' . $option->getId());

            $available = $product->getAvailableOptionValues($option);

            $fields[] = [
                'required' => true,
                'label'    => $option->getName(),
                'field'    => 'value_' . $option->getId(),
                'type'     => 'anomaly.field_type.select',
                'value'    => array_get($values, $option->getId()),
                'config'   => [
                    'options' => $available
                        ->pluck('label', 'id')
                        ->all(),
                ],
            ];
        }

        $builder->setFields($fields);
    }
}
