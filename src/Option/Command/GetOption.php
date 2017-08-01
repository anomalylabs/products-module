<?php namespace Anomaly\ProductsModule\Option\Command;

use Anomaly\ProductsModule\Option\Contract\OptionInterface;
use Anomaly\ProductsModule\Option\Contract\OptionRepositoryInterface;
use Anomaly\ProductsModule\Option\OptionPresenter;

/**
 * Class GetOption
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class GetOption
{

    /**
     * The option identifier.
     *
     * @var mixed
     */
    protected $identifier;

    /**
     * Create a new GetOption instance.
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
     * @param OptionRepositoryInterface $options
     * @return OptionInterface|\Anomaly\Streams\Platform\Model\EloquentModel|mixed|null
     */
    public function handle(OptionRepositoryInterface $options)
    {
        if (is_numeric($this->identifier)) {
            return $options->find($this->identifier);
        }

        if ($this->identifier instanceof OptionInterface) {
            return $this->identifier;
        }

        if ($this->identifier instanceof OptionPresenter) {
            return $this->identifier->getObject();
        }

        return null;
    }
}
