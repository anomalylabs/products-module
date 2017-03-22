<?php namespace Anomaly\ProductsModule\Product;

use Anomaly\ProductsModule\Product\Command\SetSalePrice;
use Anomaly\ProductsModule\Product\Contract\ProductInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryObserver;

/**
 * Class ProductObserver
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ProductObserver extends EntryObserver
{

    /**
     * Fired just before saving the entry.
     *
     * @param EntryInterface|ProductInterface $entry
     */
    public function creating(EntryInterface $entry)
    {
        if (!$entry->getStrId()) {
            $entry->setAttribute('str_id', str_random());
        }

        parent::creating($entry);
    }

    /**
     * Fired just before saving the entry.
     *
     * @param EntryInterface|ProductInterface $entry
     * @return bool
     */
    public function saving(EntryInterface $entry)
    {
        $this->dispatch(new SetSalePrice($entry));

        return parent::saving($entry);
    }
}
