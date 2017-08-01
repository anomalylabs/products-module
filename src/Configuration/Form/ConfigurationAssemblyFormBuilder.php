<?php namespace Anomaly\ProductsModule\Configuration\Form;

use Anomaly\ProductsModule\Configuration\ConfigurationModel;
use Anomaly\ProductsModule\Configuration\Contract\ConfigurationInterface;
use Anomaly\Streams\Platform\Ui\Form\Multiple\MultipleFormBuilder;

/**
 * Class ConfigurationAssemblyFormBuilder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ConfigurationAssemblyFormBuilder extends MultipleFormBuilder
{

    /**
     * Fired after saving
     * the product form.
     */
    public function onSavedConfiguration()
    {
        /* @var ConfigurationInterface|ConfigurationModel $configuration */
        $configuration = $this->getChildFormEntry('configuration');

        $builder = $this->getChildForm('options');

        $configuration->optionValues()->sync(
            $builder->getFormValues()->values()->all()
        );
    }
}
