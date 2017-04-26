<?php namespace Anomaly\ProductsModule\Feature;

use Anomaly\ProductsModule\Feature\Contract\FeatureRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class FeatureRepository extends EntryRepository implements FeatureRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var FeatureModel
     */
    protected $model;

    /**
     * Create a new FeatureRepository instance.
     *
     * @param FeatureModel $model
     */
    public function __construct(FeatureModel $model)
    {
        $this->model = $model;
    }
}
