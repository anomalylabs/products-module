<?php namespace Anomaly\ProductsModule\Category;

use Anomaly\ProductsModule\Category\Contract\CategoryInterface;
use Anomaly\ProductsModule\Category\Contract\CategoryRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

/**
 * Class CategoryRepository
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\ProductsModule\Category
 */
class CategoryRepository extends EntryRepository implements CategoryRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var CategoryModel
     */
    protected $model;

    /**
     * Create a new CategoryRepository instance.
     *
     * @param CategoryModel $model
     */
    public function __construct(CategoryModel $model)
    {
        $this->model = $model;
    }

    /**
     * Find a category by it's slug.
     *
     * @param $slug
     * @return CategoryInterface|null
     */
    public function findBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }

    /**
     * Find a category by it's path.
     *
     * @param $path
     * @return CategoryInterface|null
     */
    public function findByPath($path)
    {
        return $this->model->where('path', $path)->first();
    }
}
