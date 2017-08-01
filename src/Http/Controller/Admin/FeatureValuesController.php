<?php namespace Anomaly\ProductsModule\Http\Controller\Admin;

use Anomaly\ProductsModule\Feature\Contract\FeatureInterface;
use Anomaly\ProductsModule\Feature\Contract\FeatureRepositoryInterface;
use Anomaly\ProductsModule\FeatureValue\Form\FeatureValueFormBuilder;
use Anomaly\ProductsModule\FeatureValue\Table\FeatureValueTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class FeatureValuesController
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class FeatureValuesController extends AdminController
{

    /**
     * The feature repository.
     *
     * @var FeatureRepositoryInterface
     */
    protected $features;

    /**
     * Create a new FeatureFeatureValuesController instance.
     *
     * @param FeatureRepositoryInterface $features
     */
    public function __construct(FeatureRepositoryInterface $features)
    {
        $this->features = $features;

        parent::__construct();
    }

    /**
     * Display an index of existing entries.
     *
     * @param FeatureValueTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(FeatureValueTableBuilder $table)
    {
        /* @var FeatureInterface $feature */
        if ($feature = $this->features->find($this->route->parameter('feature'))) {

            $table->on(
                'querying',
                function (Builder $query) use ($table, $feature) {
                    $query->where('feature_id', $feature->getId());
                }
            );

            $table->setOption('title', $feature->getName());
            $table->setOption('description', $feature->getDescription());
        }

        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param FeatureValueFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(FeatureValueFormBuilder $form)
    {
        /* @var FeatureInterface $feature */
        if ($feature = $this->features->find($this->route->parameter('feature'))) {

            $form->on(
                'saving',
                function () use ($form, $feature) {
                    $form->setFormEntryAttribute('feature', $feature);
                }
            );
        }

        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param FeatureValueFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(FeatureValueFormBuilder $form)
    {
        return $form->render($this->route->parameter('id'));
    }
}
