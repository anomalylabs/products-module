<?php namespace Anomaly\ProductsModule\Feature\Command;

use Anomaly\ProductsModule\Feature\Contract\FeatureInterface;
use Anomaly\ProductsModule\Feature\Contract\FeatureRepositoryInterface;
use Anomaly\ProductsModule\Feature\FeaturePresenter;

/**
 * Class GetFeature
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class GetFeature
{

    /**
     * The feature identifier.
     *
     * @var mixed
     */
    protected $identifier;

    /**
     * Create a new GetFeature instance.
     *
     * @param mixed $identifier
     */
    public function __construct($identifier)
    {
        $this->identifier = $identifier;
    }

    /**
     * Handle the command.
     *
     * @param FeatureRepositoryInterface $features
     * @return FeatureInterface|\Anomaly\Streams\Platform\Model\EloquentModel|mixed|null
     */
    public function handle(FeatureRepositoryInterface $features)
    {
        if (is_numeric($this->identifier)) {
            return $features->find($this->identifier);
        }

        if ($this->identifier instanceof FeatureInterface) {
            return $this->identifier;
        }

        if ($this->identifier instanceof FeaturePresenter) {
            return $this->identifier->getObject();
        }

        return null;
    }
}
