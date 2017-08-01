<?php namespace Anomaly\ProductsModule\OptionValue;

use Anomaly\ProductsModule\Option\Contract\OptionInterface;
use Anomaly\ProductsModule\OptionValue\Contract\OptionValueInterface;
use Anomaly\Streams\Platform\Entry\EntryCollection;

/**
 * Class OptionValueCollection
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class OptionValueCollection extends EntryCollection
{

    /**
     * Filter option values by an option.
     *
     * @param $option
     * @return $this|static
     */
    public function filterByOption($option)
    {
        /* @var OptionInterface $option */
        return $this->filter(
            function ($value) use ($option) {

                /* @var OptionValueInterface $value */
                return $value->getOptionId() == $option->getId();
            }
        );
    }
}
