<?php namespace Anomaly\ProductsModule\Type;

use Anomaly\ProductsModule\Type\Command\CreateStream;
use Anomaly\ProductsModule\Type\Command\DeleteStream;
use Anomaly\ProductsModule\Type\Command\UpdateProducts;
use Anomaly\ProductsModule\Type\Command\UpdateStream;
use Anomaly\ProductsModule\Type\Contract\TypeInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryObserver;

/**
 * Class TypeObserver
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class TypeObserver extends EntryObserver
{

    /**
     * Fired after a product type is created.
     *
     * @param EntryInterface|TypeInterface $entry
     */
    public function created(EntryInterface $entry)
    {
        $this->commands->dispatch(new CreateStream($entry));

        parent::created($entry);
    }

    /**
     * Fired before a product type is updated.
     *
     * @param EntryInterface|TypeInterface $entry
     */
    public function updating(EntryInterface $entry)
    {
        $this->commands->dispatch(new UpdateStream($entry));
        $this->commands->dispatch(new UpdateProducts($entry));

        parent::updating($entry);
    }

    /**
     * Fired after a product type is deleted.
     *
     * @param EntryInterface|TypeInterface $entry
     */
    public function deleted(EntryInterface $entry)
    {
        $this->commands->dispatch(new DeleteStream($entry));

        parent::deleted($entry);
    }
}
