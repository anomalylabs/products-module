<?php namespace Anomaly\ProductsModule\Http\Controller\Admin;

use Anomaly\ProductsModule\Modifier\Contract\ModifierInterface;
use Anomaly\ProductsModule\Modifier\Contract\ModifierRepositoryInterface;
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
     * The modifier repository.
     *
     * @var ModifierRepositoryInterface
     */
    protected $modifiers;

    /**
     * Create a new OptionsController instance.
     *
     * @param ModifierRepositoryInterface $modifiers
     */
    public function __construct(ModifierRepositoryInterface $modifiers)
    {
        $this->modifiers = $modifiers;

        parent::__construct();
    }

    /**
     * Display an index of existing entries.
     *
     * @param OptionTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(OptionTableBuilder $table)
    {
        /* @var ModifierInterface $modifier */
        if ($modifier = $this->modifiers->find($this->route->parameter('modifier'))) {
            $table->setModifier($modifier);
        }

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
        /* @var ModifierInterface $modifier */
        if ($modifier = $this->modifiers->find($this->route->parameter('modifier'))) {
            $form->setModifier($modifier);
        }

        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param OptionFormBuilder $form
     * @param                   $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(OptionFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
