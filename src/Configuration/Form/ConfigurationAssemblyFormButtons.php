<?php namespace Anomaly\ProductsModule\Configuration\Form;

/**
 * Class ConfigurationAssemblyFormButtons
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ConfigurationAssemblyFormButtons
{

    /**
     * Handle the buttons.
     *
     * @param ConfigurationAssemblyFormBuilder $builder
     */
    public function handle(ConfigurationAssemblyFormBuilder $builder)
    {
        $id = $builder->getChildFormEntryId('configuration');

        $builder->setButtons(
            [
                'cancel',
                'view' => [
                    'target'   => '_blank',
                    'disabled' => 'create',
                    'href'     => '/admin/products/configurations/view/' . $id,
                ],
            ]
        );
    }
}
