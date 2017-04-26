<?php namespace Anomaly\ProductsModule\Http\Controller\Admin;

use Anomaly\ProductsModule\Value\Form\ValueFormBuilder;
use Anomaly\ProductsModule\Value\Table\ValueTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class ValuesController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param ValueTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ValueTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param ValueFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(ValueFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param ValueFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(ValueFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
