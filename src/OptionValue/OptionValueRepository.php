<?php namespace Anomaly\ProductsModule\OptionValue;

use Anomaly\ProductsModule\OptionValue\Contract\OptionValueRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class OptionValueRepository extends EntryRepository implements OptionValueRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var OptionValueModel
     */
    protected $model;

    /**
     * Create a new OptionValueRepository instance.
     *
     * @param OptionValueModel $model
     */
    public function __construct(OptionValueModel $model)
    {
        $this->model = $model;
    }
}
