<?php namespace Anomaly\ProductsModule\FeatureValue;

use Anomaly\ProductsModule\FeatureValue\Contract\FeatureValueRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class FeatureValueRepository extends EntryRepository implements FeatureValueRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var FeatureValueModel
     */
    protected $model;

    /**
     * Create a new FeatureValueRepository instance.
     *
     * @param FeatureValueModel $model
     */
    public function __construct(FeatureValueModel $model)
    {
        $this->model = $model;
    }
}
