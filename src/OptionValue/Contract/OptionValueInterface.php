<?php namespace Anomaly\ProductsModule\OptionValue\Contract;

use Anomaly\ProductsModule\Option\Contract\OptionInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;

/**
 * Interface OptionValueInterface
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
interface OptionValueInterface extends EntryInterface
{

    /**
     * Get the label.
     *
     * @return string
     */
    public function getLabel();

    /**
     * Get the related option.
     *
     * @return OptionInterface
     */
    public function getOption();

    /**
     * Get the related option ID.
     *
     * @return int|null
     */
    public function getOptionId();

}
