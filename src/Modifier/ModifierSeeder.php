<?php namespace Anomaly\ProductsModule\Modifier;

use Anomaly\ProductsModule\Modifier\Contract\ModifierInterface;
use Anomaly\ProductsModule\Modifier\Contract\ModifierRepositoryInterface;
use Anomaly\Streams\Platform\Database\Seeder\Seeder;

/**
 * Class ModifierSeeder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ModifierSeeder extends Seeder
{

    /**
     * The modifier repository.
     *
     * @var ModifierRepositoryInterface
     */
    protected $modifiers;

    /**
     * Create a new ModifierSeeder instance.
     *
     * @param ModifierRepositoryInterface $modifiers
     */
    public function __construct(ModifierRepositoryInterface $modifiers)
    {
        $this->modifiers = $modifiers;
    }

    /**
     * Run the seeder.
     */
    public function run()
    {
        /* @var ModifierInterface $size */
        $size = $this->modifiers->create(
            [
                'en' => [
                    'name' => 'Size',
                ],
            ]
        );

        $size->options()->create(
            [
                'en' => [
                    'name' => 'Small',
                ],
            ]
        );

        $size->options()->create(
            [
                'en' => [
                    'name' => 'Medium',
                ],
            ]
        );

        $size->options()->create(
            [
                'en' => [
                    'name' => 'Large',
                ],
            ]
        );

        /* @var ModifierInterface $color */
        $color = $this->modifiers->create(
            [
                'en' => [
                    'name' => 'Color',
                ],
            ]
        );

        $color->options()->create(
            [
                'en' => [
                    'name' => 'Red',
                ],
            ]
        );

        $color->options()->create(
            [
                'en' => [
                    'name' => 'Blue',
                ],
            ]
        );

        $color->options()->create(
            [
                'en' => [
                    'name' => 'Green',
                ],
            ]
        );
    }
}
