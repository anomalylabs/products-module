<?php namespace Anomaly\ProductsModule\Category\Command;

use Anomaly\PostsModule\Category\Contract\CategoryRepositoryInterface;
use Anomaly\ProductsModule\Category\Contract\CategoryInterface;


/**
 * Class UpdatePaths
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\ProductsModule\Category\Command
 */
class UpdatePaths
{

    /**
     * The category instance.
     *
     * @var CategoryInterface
     */
    protected $category;

    /**
     * Create a new UpdatePaths instance.
     *
     * @param CategoryInterface $category
     */
    public function __construct(CategoryInterface $category)
    {
        $this->category = $category;
    }

    /**
     * Handle the command.
     *
     * @param CategoryRepositoryInterface $categories
     */
    public function handle(CategoryRepositoryInterface $categories)
    {
        foreach ($this->category->getChildren() as $category) {
            if ($category instanceof CategoryInterface) {
                $categories->save(
                    $category->setAttribute('path', $this->category->getPath() . '/' . $category->getSlug())
                );
            }
        }
    }
}
