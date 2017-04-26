<?php namespace Anomaly\ProductsModule\Http\Controller\Admin;

use Anomaly\ProductsModule\Feature\Form\FeatureFormBuilder;
use Anomaly\ProductsModule\Feature\Table\FeatureTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class FeaturesController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param FeatureTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(FeatureTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param FeatureFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(FeatureFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param FeatureFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(FeatureFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
