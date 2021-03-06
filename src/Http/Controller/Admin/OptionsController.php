<?php namespace Anomaly\ProductsModule\Http\Controller\Admin;

use Anomaly\ProductsModule\Option\Form\OptionFormBuilder;
use Anomaly\ProductsModule\Option\Table\OptionTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class OptionsController
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class OptionsController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param OptionTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(OptionTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param OptionFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(OptionFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param OptionFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(OptionFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
