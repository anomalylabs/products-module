<?php namespace Anomaly\ProductsModule\Option;

use Anomaly\ProductsModule\Option\Contract\OptionInterface;
use Anomaly\ProductsModule\Option\Contract\OptionRepositoryInterface;
use Anomaly\Streams\Platform\Database\Seeder\Seeder;

/**
 * Class OptionSeeder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class OptionSeeder extends Seeder
{

    /**
     * The option repository.
     *
     * @var OptionRepositoryInterface
     */
    protected $options;

    /**
     * Create a new OptionSeeder instance.
     *
     * @param OptionRepositoryInterface $options
     */
    public function __construct(OptionRepositoryInterface $options)
    {
        $this->options = $options;

        parent::__construct();
    }

    /**
     * Run the seeder.
     */
    public function run()
    {
        $this->options->truncate();

        /* @var OptionInterface $size */
        $size = $this->options->create(
            [
                'en' => [
                    'name'        => 'Size',
                    'description' => 'An example size option.',
                ],
            ]
        );

        $size->values()->create(
            [
                'en' => [
                    'label' => 'Small',
                ],
            ]
        );

        $size->values()->create(
            [
                'en' => [
                    'label' => 'Medium',
                ],
            ]
        );

        $size->values()->create(
            [
                'en' => [
                    'label' => 'Large',
                ],
            ]
        );

        /* @var OptionInterface $color */
        $color = $this->options->create(
            [
                'en' => [
                    'name'        => 'Color',
                    'description' => 'An example color option.',
                ],
            ]
        );

        $color->values()->create(
            [
                'en' => [
                    'label' => 'Red',
                ],
            ]
        );

        $color->values()->create(
            [
                'en' => [
                    'label' => 'Blue',
                ],
            ]
        );

        $color->values()->create(
            [
                'en' => [
                    'label' => 'Green',
                ],
            ]
        );
    }
}
