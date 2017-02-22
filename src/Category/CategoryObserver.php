<?php namespace Anomaly\ProductsModule\Category;

use Anomaly\ProductsModule\Category\Command\DeleteChildren;
use Anomaly\ProductsModule\Category\Command\SetPath;
use Anomaly\ProductsModule\Category\Command\UpdatePaths;
use Anomaly\ProductsModule\Category\Contract\CategoryInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryModel;
use Anomaly\Streams\Platform\Entry\EntryObserver;

/**
 * Class CategoryObserver
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\ProductsModule\Category
 */
class CategoryObserver extends EntryObserver
{

    /**
     * Fired before saving the category.
     *
     * @param EntryInterface|CategoryInterface|EntryModel $entry
     * @return bool|void
     */
    public function saving(EntryInterface $entry)
    {
        $this->dispatch(new SetPath($entry));

        parent::saving($entry);
    }

    /**
     * Fired after saving the category.
     *
     * @param EntryInterface|CategoryInterface|EntryModel $entry
     */
    public function saved(EntryInterface $entry)
    {
        $this->dispatch(new UpdatePaths($entry));

        parent::saved($entry);
    }

    /**
     * Fired after a category is deleted.
     *
     * @param EntryInterface|CategoryInterface $entry
     */
    public function deleted(EntryInterface $entry)
    {
        $this->dispatch(new DeleteChildren($entry));

        parent::deleted($entry);
    }
}
