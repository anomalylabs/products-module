<?php namespace Anomaly\ProductsModule\Option;

use Anomaly\ProductsModule\Modifier\Contract\ModifierInterface;
use Anomaly\ProductsModule\Option\Contract\OptionInterface;
use Anomaly\Streams\Platform\Model\Products\ProductsOptionsEntryModel;

/**
 * Class OptionModel
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class OptionModel extends ProductsOptionsEntryModel implements OptionInterface
{

    /**
     * Get the name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the related modifier.
     *
     * @return ModifierInterface
     */
    public function getModifier()
    {
        return $this->modifier;
    }

    /**
     * Get the related modifier ID.
     *
     * @return int|null
     */
    public function getModifierId()
    {
        return $this->modifier_id;
    }
}
