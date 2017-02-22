<?php namespace Anomaly\ProductsModule\Brand\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryRepositoryInterface;

/**
 * Interface BrandRepositoryInterface
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
interface BrandRepositoryInterface extends EntryRepositoryInterface
{

    /**
     * Find a brand by it's slug.
     *
     * @param $slug
     * @return BrandInterface|null
     */
    public function findBySlug($slug);
}
