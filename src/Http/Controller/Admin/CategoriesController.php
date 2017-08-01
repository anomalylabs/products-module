<?php namespace Anomaly\ProductsModule\Http\Controller\Admin;

use Anomaly\ProductsModule\Category\Contract\CategoryInterface;
use Anomaly\ProductsModule\Category\Contract\CategoryRepositoryInterface;
use Anomaly\ProductsModule\Category\Form\CategoryFormBuilder;
use Anomaly\ProductsModule\Category\Tree\CategoryTreeBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\Streams\Platform\Support\Authorizer;

/**
 * Class CategoriesController
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class CategoriesController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param CategoryTreeBuilder $tree
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(CategoryTreeBuilder $tree)
    {
        return $tree->render();
    }

    /**
     * Create a new entry.
     *
     * @param CategoryFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(CategoryFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param CategoryFormBuilder $form
     * @param                     $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(CategoryFormBuilder $form, $id)
    {
        return $form->render($id);
    }

    /**
     * Redirect to the category view.
     *
     * @param CategoryRepositoryInterface $categories
     * @return \Illuminate\Http\RedirectResponse
     */
    public function view(CategoryRepositoryInterface $categories)
    {
        /* @var CategoryInterface $category */
        if (!$category = $categories->find($this->route->parameter('id'))) {
            abort(404);
        }

        return $this->redirect->to($category->route('view'));
    }

    /**
     * Delete a category and go back.
     *
     * @param  CategoryRepositoryInterface $categories
     * @param  Authorizer $authorizer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(CategoryRepositoryInterface $categories, Authorizer $authorizer)
    {
        if (!$authorizer->authorize('anomaly.module.products::categories.delete')) {

            $this->messages->error('streams::message.access_denied');

            return $this->redirect->back();
        }

        /*
         * Force delete until we get
         * views into the tree UI.
         */
        $categories->forceDelete($categories->find($this->route->parameter('id')));

        return $this->redirect->back();
    }
}
