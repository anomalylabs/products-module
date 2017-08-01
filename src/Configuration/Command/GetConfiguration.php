<?php namespace Anomaly\ProductsModule\Configuration\Command;

use Anomaly\ProductsModule\Configuration\ConfigurationPresenter;
use Anomaly\ProductsModule\Configuration\Contract\ConfigurationInterface;
use Anomaly\ProductsModule\Configuration\Contract\ConfigurationRepositoryInterface;
use Anomaly\Streams\Platform\Model\EloquentModel;

/**
 * Class GetConfiguration
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class GetConfiguration
{

    /**
     * The identifier.
     *
     * @var mixed
     */
    protected $identifier;

    /**
     * Create a new GetConfiguration instance.
     *
     * @param $identifier
     */
    public function __construct($identifier = null)
    {
        $this->identifier = $identifier;
    }

    /**
     * Handle the command.
     *
     * @param  ConfigurationRepositoryInterface $configurations
     * @return ConfigurationInterface|EloquentModel|null
     */
    public function handle(ConfigurationRepositoryInterface $configurations)
    {
        if (is_numeric($this->identifier)) {
            return $configurations->find($this->identifier);
        }

        if (is_string($this->identifier)) {
            return $configurations->findBySku($this->identifier);
        }

        if ($this->identifier instanceof ConfigurationInterface) {
            return $this->identifier;
        }

        if ($this->identifier instanceof ConfigurationPresenter) {
            return $this->identifier->getObject();
        }

        return null;
    }
}
