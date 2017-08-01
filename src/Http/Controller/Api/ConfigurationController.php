<?php namespace Anomaly\ProductsModule\Http\Controller\Api;

use Anomaly\ProductsModule\Product\Contract\ProductInterface;
use Anomaly\ProductsModule\Product\Contract\ProductRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\ResourceController;
use Anomaly\Streams\Platform\Support\Currency;

/**
 * Class ConfigurationController
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ConfigurationController extends ResourceController
{

    /**
     * Return a configuration.
     *
     * @param ProductRepositoryInterface $products
     * @param Currency                   $currency
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ProductRepositoryInterface $products, Currency $currency)
    {
        /* @var ProductInterface $product */
        $product = $products->find($this->request->get('product'));

        if (!$configuration = $product->getConfigurations()->findByOptionValues($this->request->get('option_values'))) {
            return $this->response->json(['message' => 'Configuration not found.'], 500);
        }

        $data = $configuration->toArray();

        $data['price'] = $currency->format($configuration->price());

        $data['urls']['add'] = $configuration->route('cart.add');

        return $this->response->json($data);
    }
}
