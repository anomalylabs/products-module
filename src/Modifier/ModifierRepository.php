<?php namespace Anomaly\ProductsModule\Modifier;

use Anomaly\ProductsModule\Modifier\Contract\ModifierRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class ModifierRepository extends EntryRepository implements ModifierRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var ModifierModel
     */
    protected $model;

    /**
     * Create a new ModifierRepository instance.
     *
     * @param ModifierModel $model
     */
    public function __construct(ModifierModel $model)
    {
        $this->model = $model;
    }
}
