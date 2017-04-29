<?php namespace Anomaly\ProductsModule\Modifier\Command;

use Anomaly\ProductsModule\Modifier\Contract\ModifierInterface;
use Anomaly\ProductsModule\Modifier\Contract\ModifierRepositoryInterface;
use Anomaly\ProductsModule\Modifier\ModifierPresenter;

/**
 * Class GetModifier
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class GetModifier
{

    /**
     * The modifier identifier.
     *
     * @var mixed
     */
    protected $identifier;

    /**
     * Create a new GetModifier instance.
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
     * @param ModifierRepositoryInterface $modifiers
     * @return ModifierInterface|\Anomaly\Streams\Platform\Model\EloquentModel|mixed|null
     */
    public function handle(ModifierRepositoryInterface $modifiers)
    {
        if (is_numeric($this->identifier)) {
            return $modifiers->find($this->identifier);
        }

        if ($this->identifier instanceof ModifierInterface) {
            return $this->identifier;
        }

        if ($this->identifier instanceof ModifierPresenter) {
            return $this->identifier->getObject();
        }

        return null;
    }
}
