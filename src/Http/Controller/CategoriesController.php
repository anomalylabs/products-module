<?php namespace Anomaly\ProductsModule\Http\Controller;

use Anomaly\ProductsModule\Category\Command\LoadBreadcrumbs;
use Anomaly\ProductsModule\Category\Command\SetMetadata;
use Anomaly\ProductsModule\Category\Contract\CategoryRepositoryInterface;
use Anomaly\ProductsModule\Command\StartBreadcrumbs;
use Anomaly\Streams\Platform\Http\Controller\PublicController;

/**
 * Class CategoriesController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\ProductsModule\Http\Controller
 */
class CategoriesController extends PublicController
{

    /**
     * View products within a category.
     *
     * @param CategoryRepositoryInterface $categories
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function view(CategoryRepositoryInterface $categories)
    {
        if (!$category = $categories->findByPath($this->route->getParameter('path'))) {
            abort(404);
        }

        $this->breadcrumbs->add(
            'anomaly.module.products::breadcrumb.products',
            $this->url->route('anomaly.module.products::products.index')
        );

        $this->dispatch(new SetMetadata($category));
        $this->dispatch(new LoadBreadcrumbs($category));

        return $this->view->make(
            'anomaly.module.products::categories/view',
            compact('category')
        );
    }
}
