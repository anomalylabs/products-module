<?php namespace Anomaly\ProductsModule\Http\Controller\Admin;

use Anomaly\ProductsModule\Modifier\Form\ModifierFormBuilder;
use Anomaly\ProductsModule\Modifier\Table\ModifierTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class ModifiersController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param ModifierTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ModifierTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param ModifierFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(ModifierFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param ModifierFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(ModifierFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
