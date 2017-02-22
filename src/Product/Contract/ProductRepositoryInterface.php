<?php namespace Anomaly\ProductsModule\Product\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryRepositoryInterface;

/**
 * Interface ProductRepositoryInterface
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
interface ProductRepositoryInterface extends EntryRepositoryInterface
{

    /**
     * Find a product by it's string ID.
     *
     * @param $strId
     * @return ProductInterface|null
     */
    public function findByStrId($id);

    /**
     * Find a product by it's slug.
     *
     * @param $slug
     * @return ProductInterface|null
     */
    public function findBySlug($slug);
}
