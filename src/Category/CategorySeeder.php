<?php namespace Anomaly\ProductsModule\Category;

use Anomaly\ProductsModule\Category\Contract\CategoryRepositoryInterface;
use Anomaly\Streams\Platform\Database\Seeder\Seeder;

/**
 * Class CategorySeeder
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\ProductsModule\Category
 */
class CategorySeeder extends Seeder
{

    /**
     * The category repository.
     *
     * @var CategoryRepositoryInterface
     */
    protected $categories;

    /**
     * Create a new ConfigurationSeeder instance.
     *
     * @param CategoryRepositoryInterface $categories
     */
    public function __construct(CategoryRepositoryInterface $categories)
    {
        $this->categories = $categories;

        parent::__construct();
    }

    /**
     * Run the seeder.
     */
    public function run()
    {
        $clothing = $this->categories
            ->truncate()
            ->create(
                [
                    'en'   => [
                        'name' => 'Clothing',
                    ],
                    'slug' => 'clothing',
                ]
            );

        $this->categories->create(
            [
                'en'     => [
                    'name' => 'Shirts',
                ],
                'slug'   => 'shirts',
                'parent' => $clothing,
            ]
        );

        $this->categories->create(
            [
                'en'     => [
                    'name' => 'Shorts',
                ],
                'slug'   => 'shorts',
                'parent' => $clothing,
            ]
        );
    }

}
