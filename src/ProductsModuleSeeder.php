<?php namespace Anomaly\ProductsModule;

use Anomaly\ProductsModule\Category\CategorySeeder;
use Anomaly\ProductsModule\Feature\FeatureSeeder;
use Anomaly\ProductsModule\Option\OptionSeeder;
use Anomaly\ProductsModule\Type\TypeSeeder;
use Anomaly\Streams\Platform\Database\Seeder\Seeder;

/**
 * Class ProductsModuleSeeder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ProductsModuleSeeder extends Seeder
{

    /**
     * Run the seeder.
     */
    public function run()
    {
        $this->call(TypeSeeder::class);
        $this->call(OptionSeeder::class);
        $this->call(FeatureSeeder::class);
        $this->call(CategorySeeder::class);
    }
}
