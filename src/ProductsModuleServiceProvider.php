<?php namespace Anomaly\ProductsModule;

use Anomaly\OrdersModule\Order\Event\OrderWasCreated;
use Anomaly\ProductsModule\Brand\BrandModel;
use Anomaly\ProductsModule\Brand\BrandRepository;
use Anomaly\ProductsModule\Brand\Contract\BrandRepositoryInterface;
use Anomaly\ProductsModule\Category\CategoryModel;
use Anomaly\ProductsModule\Category\CategoryRepository;
use Anomaly\ProductsModule\Category\Contract\CategoryRepositoryInterface;
use Anomaly\ProductsModule\Configuration\ConfigurationModel;
use Anomaly\ProductsModule\Configuration\ConfigurationRepository;
use Anomaly\ProductsModule\Configuration\Contract\ConfigurationRepositoryInterface;
use Anomaly\ProductsModule\Feature\Contract\FeatureRepositoryInterface;
use Anomaly\ProductsModule\Feature\FeatureModel;
use Anomaly\ProductsModule\Feature\FeatureRepository;
use Anomaly\ProductsModule\FeatureValue\Contract\FeatureValueRepositoryInterface;
use Anomaly\ProductsModule\FeatureValue\FeatureValueModel;
use Anomaly\ProductsModule\FeatureValue\FeatureValueRepository;
use Anomaly\ProductsModule\Http\Controller\Admin\AssignmentsController;
use Anomaly\ProductsModule\Http\Controller\Admin\FieldsController;
use Anomaly\ProductsModule\Option\Contract\OptionRepositoryInterface;
use Anomaly\ProductsModule\Option\OptionModel;
use Anomaly\ProductsModule\Option\OptionRepository;
use Anomaly\ProductsModule\OptionValue\Contract\OptionValueRepositoryInterface;
use Anomaly\ProductsModule\OptionValue\OptionValueModel;
use Anomaly\ProductsModule\OptionValue\OptionValueRepository;
use Anomaly\ProductsModule\Product\Contract\ProductRepositoryInterface;
use Anomaly\ProductsModule\Product\Listener\DecrementInventory;
use Anomaly\ProductsModule\Product\ProductModel;
use Anomaly\ProductsModule\Product\ProductRepository;
use Anomaly\ProductsModule\Type\Contract\TypeRepositoryInterface;
use Anomaly\ProductsModule\Type\TypeModel;
use Anomaly\ProductsModule\Type\TypeRepository;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Assignment\AssignmentRouter;
use Anomaly\Streams\Platform\Field\FieldRouter;
use Anomaly\Streams\Platform\Model\Products\ProductsBrandsEntryModel;
use Anomaly\Streams\Platform\Model\Products\ProductsCategoriesEntryModel;
use Anomaly\Streams\Platform\Model\Products\ProductsConfigurationsEntryModel;
use Anomaly\Streams\Platform\Model\Products\ProductsFeaturesEntryModel;
use Anomaly\Streams\Platform\Model\Products\ProductsFeatureValuesEntryModel;
use Anomaly\Streams\Platform\Model\Products\ProductsOptionsEntryModel;
use Anomaly\Streams\Platform\Model\Products\ProductsOptionValuesEntryModel;
use Anomaly\Streams\Platform\Model\Products\ProductsProductsEntryModel;
use Anomaly\Streams\Platform\Model\Products\ProductsTypesEntryModel;

/**
 * Class ProductsModuleServiceProvider
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ProductsModuleServiceProvider extends AddonServiceProvider
{

    /**
     * The addon listeners.
     *
     * @var array
     */
    protected $listeners = [
        OrderWasCreated::class => [
            DecrementInventory::class,
        ],
    ];

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'api/products/configuration' => 'Anomaly\ProductsModule\Http\Controller\Api\ConfigurationController@show',

        'products'                   => [
            'as'   => 'anomaly.module.products::products.index',
            'uses' => 'Anomaly\ProductsModule\Http\Controller\ProductsController@index',
        ],
        'products/brands'            => [
            'as'   => 'anomaly.module.products::brands.index',
            'uses' => 'Anomaly\ProductsModule\Http\Controller\BrandsController@index',
        ],
        'products/{slug}'            => [
            'as'   => 'anomaly.module.products::products.view',
            'uses' => 'Anomaly\ProductsModule\Http\Controller\ProductsController@view',
        ],
        'products/preview/{str_id}'  => [
            'as'   => 'anomaly.module.products::products.preview',
            'uses' => 'Anomaly\ProductsModule\Http\Controller\ProductsController@preview',
        ],
        'products/categories/{path}' => [
            'as'          => 'anomaly.module.products::categories.view',
            'uses'        => 'Anomaly\ProductsModule\Http\Controller\CategoriesController@view',
            'constraints' => [
                'path' => '(.*)',
            ],
        ],
        'products/brands/{slug}'     => [
            'as'   => 'anomaly.module.products::brands.view',
            'uses' => 'Anomaly\ProductsModule\Http\Controller\BrandsController@view',
        ],
        'products/tags/{tag}'        => [
            'as'   => 'anomaly.module.products::tags.view',
            'uses' => 'Anomaly\ProductsModule\Http\Controller\TagsController@view',
        ],

        'products/cart/add/{id}' => [
            'as'   => 'anomaly.module.products::cart.add',
            'uses' => 'Anomaly\ProductsModule\Http\Controller\CartController@add',
        ],

        'admin/products'                                      => 'Anomaly\ProductsModule\Http\Controller\Admin\ProductsController@index',
        'admin/products/choose'                               => 'Anomaly\ProductsModule\Http\Controller\Admin\ProductsController@choose',
        'admin/products/create'                               => 'Anomaly\ProductsModule\Http\Controller\Admin\ProductsController@create',
        'admin/products/edit/{id}'                            => 'Anomaly\ProductsModule\Http\Controller\Admin\ProductsController@edit',
        'admin/products/view/{id}'                            => 'Anomaly\ProductsModule\Http\Controller\Admin\ProductsController@view',
        'admin/products/{product}/configurations'             => 'Anomaly\ProductsModule\Http\Controller\Admin\ConfigurationsController@index',
        'admin/products/{product}/configurations/create'      => 'Anomaly\ProductsModule\Http\Controller\Admin\ConfigurationsController@create',
        'admin/products/{product}/configurations/edit/{id}'   => 'Anomaly\ProductsModule\Http\Controller\Admin\ConfigurationsController@edit',
        'admin/products/types'                                => 'Anomaly\ProductsModule\Http\Controller\Admin\TypesController@index',
        'admin/products/types/create'                         => 'Anomaly\ProductsModule\Http\Controller\Admin\TypesController@create',
        'admin/products/types/edit/{id}'                      => 'Anomaly\ProductsModule\Http\Controller\Admin\TypesController@edit',
        'admin/products/brands'                               => 'Anomaly\ProductsModule\Http\Controller\Admin\BrandsController@index',
        'admin/products/brands/create'                        => 'Anomaly\ProductsModule\Http\Controller\Admin\BrandsController@create',
        'admin/products/brands/edit/{id}'                     => 'Anomaly\ProductsModule\Http\Controller\Admin\BrandsController@edit',
        'admin/products/brands/view/{id}'                     => 'Anomaly\ProductsModule\Http\Controller\Admin\BrandsController@view',
        'admin/products/categories'                           => 'Anomaly\ProductsModule\Http\Controller\Admin\CategoriesController@index',
        'admin/products/categories/create'                    => 'Anomaly\ProductsModule\Http\Controller\Admin\CategoriesController@create',
        'admin/products/categories/edit/{id}'                 => 'Anomaly\ProductsModule\Http\Controller\Admin\CategoriesController@edit',
        'admin/products/categories/view/{id}'                 => 'Anomaly\ProductsModule\Http\Controller\Admin\CategoriesController@view',
        'admin/products/categories/delete/{id}'               => 'Anomaly\ProductsModule\Http\Controller\Admin\CategoriesController@delete',
        'admin/products/configurations'                       => 'Anomaly\ProductsModule\Http\Controller\Admin\ConfigurationsController@index',
        'admin/products/configurations/create'                => 'Anomaly\ProductsModule\Http\Controller\Admin\ConfigurationsController@create',
        'admin/products/configurations/edit/{id}'             => 'Anomaly\ProductsModule\Http\Controller\Admin\ConfigurationsController@edit',
        'admin/products/configurations/view/{id}'             => 'Anomaly\ProductsModule\Http\Controller\Admin\ConfigurationsController@view',
        'admin/products/features'                             => 'Anomaly\ProductsModule\Http\Controller\Admin\FeaturesController@index',
        'admin/products/features/create'                      => 'Anomaly\ProductsModule\Http\Controller\Admin\FeaturesController@create',
        'admin/products/features/edit/{id}'                   => 'Anomaly\ProductsModule\Http\Controller\Admin\FeaturesController@edit',
        'admin/products/features/values/{feature?}'           => 'Anomaly\ProductsModule\Http\Controller\Admin\FeatureValuesController@index',
        'admin/products/features/values/{feature?}/create'    => 'Anomaly\ProductsModule\Http\Controller\Admin\FeatureValuesController@create',
        'admin/products/features/values/{feature?}/edit/{id}' => 'Anomaly\ProductsModule\Http\Controller\Admin\FeatureValuesController@edit',
        'admin/products/options'                              => 'Anomaly\ProductsModule\Http\Controller\Admin\OptionsController@index',
        'admin/products/options/create'                       => 'Anomaly\ProductsModule\Http\Controller\Admin\OptionsController@create',
        'admin/products/options/edit/{id}'                    => 'Anomaly\ProductsModule\Http\Controller\Admin\OptionsController@edit',
        'admin/products/options/values/{option?}'             => 'Anomaly\ProductsModule\Http\Controller\Admin\OptionValuesController@index',
        'admin/products/options/values/{option?}/create'      => 'Anomaly\ProductsModule\Http\Controller\Admin\OptionValuesController@create',
        'admin/products/options/values/{option?}/edit/{id}'   => 'Anomaly\ProductsModule\Http\Controller\Admin\OptionValuesController@edit',
    ];

    /**
     * The addon bindings.
     *
     * @var array
     */
    protected $bindings = [
        ProductsTypesEntryModel::class          => TypeModel::class,
        ProductsBrandsEntryModel::class         => BrandModel::class,
        ProductsOptionsEntryModel::class        => OptionModel::class,
        ProductsFeaturesEntryModel::class       => FeatureModel::class,
        ProductsProductsEntryModel::class       => ProductModel::class,
        ProductsCategoriesEntryModel::class     => CategoryModel::class,
        ProductsOptionValuesEntryModel::class   => OptionValueModel::class,
        ProductsFeatureValuesEntryModel::class  => FeatureValueModel::class,
        ProductsConfigurationsEntryModel::class => ConfigurationModel::class,
    ];

    /**
     * The addon singletons.
     *
     * @var array
     */
    protected $singletons = [
        TypeRepositoryInterface::class          => TypeRepository::class,
        BrandRepositoryInterface::class         => BrandRepository::class,
        OptionRepositoryInterface::class        => OptionRepository::class,
        FeatureRepositoryInterface::class       => FeatureRepository::class,
        ProductRepositoryInterface::class       => ProductRepository::class,
        CategoryRepositoryInterface::class      => CategoryRepository::class,
        OptionValueRepositoryInterface::class   => OptionValueRepository::class,
        FeatureValueRepositoryInterface::class  => FeatureValueRepository::class,
        ConfigurationRepositoryInterface::class => ConfigurationRepository::class,
    ];

    /**
     * Register the addon.
     *
     * @param FieldRouter $fields
     * @param AssignmentRouter $assignments
     */
    public function register(FieldRouter $fields, AssignmentRouter $assignments)
    {
        $fields->route($this->addon, FieldsController::class);

        $assignments->route($this->addon, AssignmentsController::class, 'admin/products/types');
        $assignments->route($this->addon, AssignmentsController::class, 'admin/products/brands');
        $assignments->route($this->addon, AssignmentsController::class, 'admin/products/categories');
    }
}
