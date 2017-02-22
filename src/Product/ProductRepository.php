<?php namespace Anomaly\ProductsModule\Product;

use Anomaly\ProductsModule\Product\Contract\ProductInterface;
use Anomaly\ProductsModule\Product\Contract\ProductRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

/**
 * Class ProductRepository
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ProductRepository extends EntryRepository implements ProductRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var ProductModel
     */
    protected $model;

    /**
     * Create a new ProductRepository instance.
     *
     * @param ProductModel $model
     */
    public function __construct(ProductModel $model)
    {
        $this->model = $model;
    }

    /**
     * Find a product by it's string ID.
     *
     * @param $strId
     * @return ProductInterface|null
     */
    public function findByStrId($id)
    {
        return $this->model->where('str_id', $id)->first();
    }

    /**
     * Find a product by it's slug.
     *
     * @param $slug
     * @return ProductInterface|null
     */
    public function findBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }
}
