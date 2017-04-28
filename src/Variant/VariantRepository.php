<?php namespace Anomaly\ProductsModule\Variant;

use Anomaly\ProductsModule\Variant\Contract\VariantRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class VariantRepository extends EntryRepository implements VariantRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var VariantModel
     */
    protected $model;

    /**
     * Create a new VariantRepository instance.
     *
     * @param VariantModel $model
     */
    public function __construct(VariantModel $model)
    {
        $this->model = $model;
    }
}
