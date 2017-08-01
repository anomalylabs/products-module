<?php namespace Anomaly\ProductsModule\Category\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryRepositoryInterface;

/**
 * Interface CategoryRepositoryInterface
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\ProductsModule\Category\Contract
 */
interface CategoryRepositoryInterface extends EntryRepositoryInterface
{

    /**
     * Find a category by it's slug.
     *
     * @param $slug
     * @return CategoryInterface|null
     */
    public function findBySlug($slug);

    /**
     * Find a category by it's path.
     *
     * @param $path
     * @return CategoryInterface|null
     */
    public function findByPath($path);
}
