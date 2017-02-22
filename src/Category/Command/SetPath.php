<?php namespace Anomaly\ProductsModule\Category\Command;

use Anomaly\ProductsModule\Category\Contract\CategoryInterface;


/**
 * Class SetPath
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\ProductsModule\Category\Command
 */
class SetPath
{

    /**
     * The category instance.
     *
     * @var CategoryInterface
     */
    protected $category;

    /**
     * Create a new SetPath instance.
     *
     * @param CategoryInterface $category
     */
    public function __construct(CategoryInterface $category)
    {
        $this->category = $category;
    }

    /**
     * Handle the command.
     */
    public function handle()
    {
        if ($parent = $this->category->getParent()) {
            $path = $parent->getPath() . '/' . $this->category->getSlug();
        } else {
            $path = $this->category->getSlug();
        }

        $this->category->setAttribute('path', $path);
    }
}
