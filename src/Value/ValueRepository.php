<?php namespace Anomaly\ProductsModule\Value;

use Anomaly\ProductsModule\Value\Contract\ValueRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class ValueRepository extends EntryRepository implements ValueRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var ValueModel
     */
    protected $model;

    /**
     * Create a new ValueRepository instance.
     *
     * @param ValueModel $model
     */
    public function __construct(ValueModel $model)
    {
        $this->model = $model;
    }
}
