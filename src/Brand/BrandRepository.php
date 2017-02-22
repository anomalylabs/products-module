<?php namespace Anomaly\ProductsModule\Brand;

use Anomaly\ProductsModule\Brand\Contract\BrandInterface;
use Anomaly\ProductsModule\Brand\Contract\BrandRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

/**
 * Class BrandRepository
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class BrandRepository extends EntryRepository implements BrandRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var BrandModel
     */
    protected $model;

    /**
     * Create a new BrandRepository instance.
     *
     * @param BrandModel $model
     */
    public function __construct(BrandModel $model)
    {
        $this->model = $model;
    }

    /**
     * Find a brand by it's slug.
     *
     * @param $slug
     * @return BrandInterface|null
     */
    public function findBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }
}
