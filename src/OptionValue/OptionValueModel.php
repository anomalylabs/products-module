<?php namespace Anomaly\ProductsModule\OptionValue;

use Anomaly\ProductsModule\Option\Contract\OptionInterface;
use Anomaly\ProductsModule\OptionValue\Contract\OptionValueInterface;
use Anomaly\Streams\Platform\Model\Products\ProductsOptionValuesEntryModel;

/**
 * Class OptionValueModel
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class OptionValueModel extends ProductsOptionValuesEntryModel implements OptionValueInterface
{

    /**
     * Get the label.
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Get the related option.
     *
     * @return OptionInterface
     */
    public function getOption()
    {
        return $this->option;
    }

    /**
     * Get the related option ID.
     *
     * @return int|null
     */
    public function getOptionId()
    {
        return $this->option_id;
    }
}
