<?php namespace Anomaly\ProductsModule\Feature;

use Anomaly\ProductsModule\Feature\Contract\FeatureInterface;
use Anomaly\ProductsModule\Feature\Contract\FeatureRepositoryInterface;
use Anomaly\Streams\Platform\Database\Seeder\Seeder;

/**
 * Class FeatureSeeder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class FeatureSeeder extends Seeder
{

    /**
     * The feature repository.
     *
     * @var FeatureRepositoryInterface
     */
    protected $features;

    /**
     * Create a new FeatureSeeder instance.
     *
     * @param FeatureRepositoryInterface $features
     */
    public function __construct(FeatureRepositoryInterface $features)
    {
        $this->features = $features;

        parent::__construct();
    }

    /**
     * Run the seeder.
     */
    public function run()
    {
        $this->features->truncate();

        /* @var FeatureInterface $color */
        $color = $this->features->create(
            [
                'en' => [
                    'name'        => 'Material',
                    'description' => 'An example material feature.',
                ],
            ]
        );

        $color->values()->create(
            [
                'en' => [
                    'label' => 'Cotton',
                ],
            ]
        );

        $color->values()->create(
            [
                'en' => [
                    'label' => 'Cotton/Polyester',
                ],
            ]
        );

        $color->values()->create(
            [
                'en' => [
                    'label' => 'Rayon',
                ],
            ]
        );
    }
}
