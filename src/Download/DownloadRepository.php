<?php namespace Anomaly\ProductsModule\Download;

use Anomaly\ProductsModule\Download\Contract\DownloadRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class DownloadRepository extends EntryRepository implements DownloadRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var DownloadModel
     */
    protected $model;

    /**
     * Create a new DownloadRepository instance.
     *
     * @param DownloadModel $model
     */
    public function __construct(DownloadModel $model)
    {
        $this->model = $model;
    }
}
