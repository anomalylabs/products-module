<?php namespace Anomaly\ProductsModule\Variant;

use Anomaly\ProductsModule\Modifier\Command\GetModifier;
use Anomaly\ProductsModule\Modifier\Contract\ModifierInterface;
use Anomaly\ProductsModule\Option\Contract\OptionInterface;
use Anomaly\ProductsModule\Option\OptionCollection;
use Anomaly\ProductsModule\Product\Contract\ProductInterface;
use Anomaly\ProductsModule\Variant\Contract\VariantInterface;
use Anomaly\Streams\Platform\Model\Products\ProductsVariantsEntryModel;

/**
 * Class VariantModel
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class VariantModel extends ProductsVariantsEntryModel implements VariantInterface
{

    /**
     * Get the related product.
     *
     * @return ProductInterface
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Get the related options.
     *
     * @return OptionCollection
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Get the a related option.
     *
     * @param $identifier
     * @return OptionInterface|null
     */
    public function getOption($identifier)
    {
        /* @var ModifierInterface $modifier */
        if (!$modifier = $this->dispatch(new GetModifier($identifier))) {
            return null;
        }

        $options = $this->getOptions();

        return $options->first(
            function (OptionInterface $option) use ($modifier) {
                return $option->getModifierId() == $modifier->getId();
            }
        );
    }
}
