<?php namespace Anomaly\ProductsModule\Option\Contract;

use Anomaly\ProductsModule\Modifier\Contract\ModifierInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;

/**
 * Interface OptionInterface
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
interface OptionInterface extends EntryInterface
{

    /**
     * Get the name.
     *
     * @return string
     */
    public function getName();

    /**
     * Get the related modifier.
     *
     * @return ModifierInterface
     */
    public function getModifier();

    /**
     * Get the related modifier ID.
     *
     * @return int|null
     */
    public function getModifierId();

}
