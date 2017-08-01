<?php namespace Anomaly\ProductsModule\Http\Controller\Admin;

use Anomaly\ProductsModule\Brand\Contract\BrandRepositoryInterface;
use Anomaly\ProductsModule\Brand\Form\BrandFormBuilder;
use Anomaly\ProductsModule\Brand\Table\BrandTableBuilder;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class BrandsController
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class BrandsController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param BrandTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(BrandTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param BrandFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(BrandFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param BrandFormBuilder $form
     * @param                  $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(BrandFormBuilder $form, $id)
    {
        return $form->render($id);
    }

    /**
     * Redirect to a brand view.
     *
     * @param BrandRepositoryInterface $brands
     * @return \Illuminate\Http\RedirectResponse
     */
    public function view(BrandRepositoryInterface $brands)
    {
        /* @var EntryInterface $brand */
        if (!$brand = $brands->find($this->route->parameter('id'))) {
            abort(404);
        }

        return $this->redirect->to($brand->route('view'));
    }
}
