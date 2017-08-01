<?php namespace Anomaly\ProductsModule\Configuration;

use Anomaly\ProductsModule\Configuration\Command\SetSalePrice;
use Anomaly\ProductsModule\Configuration\Contract\ConfigurationInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryObserver;

/**
 * Class ConfigurationObserver
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ConfigurationObserver extends EntryObserver
{

    /**
     * Fired just before saving the entry.
     *
     * @param EntryInterface|ConfigurationInterface $entry
     * @return bool
     */
    public function saving(EntryInterface $entry)
    {
        $this->dispatch(new SetSalePrice($entry));

        return parent::saving($entry);
    }
}
