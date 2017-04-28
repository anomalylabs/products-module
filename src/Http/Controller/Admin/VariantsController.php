<?php namespace Anomaly\ProductsModule\Http\Controller\Admin;

use Anomaly\ProductsModule\Variant\Form\VariantFormBuilder;
use Anomaly\ProductsModule\Variant\Table\VariantTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class VariantsController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param VariantTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(VariantTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param VariantFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(VariantFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param VariantFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(VariantFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
