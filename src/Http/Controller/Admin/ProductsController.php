<?php namespace Anomaly\ProductsModule\Http\Controller\Admin;

use Anomaly\ProductsModule\Product\Contract\ProductInterface;
use Anomaly\ProductsModule\Product\Contract\ProductRepositoryInterface;
use Anomaly\ProductsModule\Product\Form\ProductFormBuilder;
use Anomaly\ProductsModule\Product\Table\ProductTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class ProductsController
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ProductsController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param ProductTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ProductTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param ProductFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(ProductFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param ProductFormBuilder $form
     * @param                    $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(ProductFormBuilder $form, $id)
    {
        return $form->render($id);
    }

    /**
     * View an entry on the front-end.
     *
     * @param ProductRepositoryInterface $products
     * @param                            $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function view(ProductRepositoryInterface $products, $id)
    {
        /* @var ProductInterface $product */
        $product = $products->find($id);

        if (!$product->isEnabled()) {
            return $this->redirect->to($product->route('preview'));
        }

        return $this->redirect->to($product->route('view'));
    }
}
