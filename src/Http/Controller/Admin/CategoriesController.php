<?php namespace Anomaly\ProductsModule\Http\Controller\Admin;

use Anomaly\ProductsModule\Category\Form\CategoryFormBuilder;
use Anomaly\ProductsModule\Category\Tree\CategoryTreeBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

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
}
