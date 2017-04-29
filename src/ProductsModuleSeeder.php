<?php namespace Anomaly\ProductsModule;

use Anomaly\ProductsModule\Modifier\ModifierSeeder;
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
        $this->call(ModifierSeeder::class);
    }
}
