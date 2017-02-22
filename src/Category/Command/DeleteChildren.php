<?php namespace Anomaly\ProductsModule\Category\Command;

use Anomaly\ProductsModule\Category\Contract\CategoryInterface;
use Anomaly\ProductsModule\Category\Contract\CategoryRepositoryInterface;

/**
 * Class DeleteChildren
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\ProductsModule\Category\Command
 */
class DeleteChildren
{

    /**
     * The category instance.
     *
     * @var CategoryInterface
     */
    protected $category;

    /**
     * Create a new DeleteChildren instance.
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
            $categories->delete($category);
        }
    }
}
