<?php namespace Anomaly\ProductsModule\Product;

use Anomaly\ProductsModule\Product\Contract\ProductInterface;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Contracts\Auth\Guard;

/**
 * Class ProductAuthorizer
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\ProductsModule\Product
 */
class ProductAuthorizer
{

    /**
     * The auth guard.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new ProductAuthorizer instance.
     *
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Authorize the product.
     *
     * @param ProductInterface $product
     */
    public function authorize(ProductInterface $product)
    {
        /* @var UserInterface $user */
        $user = $this->auth->user();

        /*
         * If the product is not enabled and
         * we are not logged in then 404.
         */
        if (!$product->isEnabled() && !$user) {
            abort(404);
        }

        /**
         * Admins can see everything.
         */
        if ($user && $user->isAdmin()) {
            return;
        }

        return;
    }
}
