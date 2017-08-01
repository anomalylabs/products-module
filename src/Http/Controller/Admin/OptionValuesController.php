<?php namespace Anomaly\ProductsModule\Http\Controller\Admin;

use Anomaly\ProductsModule\Option\Contract\OptionInterface;
use Anomaly\ProductsModule\Option\Contract\OptionRepositoryInterface;
use Anomaly\ProductsModule\OptionValue\Form\OptionValueFormBuilder;
use Anomaly\ProductsModule\OptionValue\Table\OptionValueTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class OptionValuesController
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class OptionValuesController extends AdminController
{

    /**
     * The option repository.
     *
     * @var OptionRepositoryInterface
     */
    protected $options;

    /**
     * Create a new OptionOptionValuesController instance.
     *
     * @param OptionRepositoryInterface $options
     */
    public function __construct(OptionRepositoryInterface $options)
    {
        $this->options = $options;

        parent::__construct();
    }

    /**
     * Display an index of existing entries.
     *
     * @param OptionValueTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(OptionValueTableBuilder $table)
    {
        /* @var OptionInterface $option */
        if ($option = $this->options->find($this->route->parameter('option'))) {

            $table->on(
                'querying',
                function (Builder $query) use ($table, $option) {
                    $query->where('option_id', $option->getId());
                }
            );

            $table->setOption('title', $option->getName());
            $table->setOption('description', $option->getDescription());
        }

        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param OptionValueFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(OptionValueFormBuilder $form)
    {
        /* @var OptionInterface $option */
        if ($option = $this->options->find($this->route->parameter('option'))) {

            $form->on(
                'saving',
                function () use ($form, $option) {
                    $form->setFormEntryAttribute('option', $option);
                }
            );
        }

        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param OptionValueFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(OptionValueFormBuilder $form)
    {
        return $form->render($this->route->parameter('id'));
    }
}
