<?php namespace Anomaly\ProductsModule\Type;

use Anomaly\ProductsModule\Type\Contract\TypeInterface;
use Anomaly\ProductsModule\Type\Contract\TypeRepositoryInterface;
use Anomaly\Streams\Platform\Assignment\Contract\AssignmentRepositoryInterface;
use Anomaly\Streams\Platform\Database\Seeder\Seeder;
use Anomaly\Streams\Platform\Field\Contract\FieldRepositoryInterface;
use Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface;

/**
 * Class TypeSeeder
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class TypeSeeder extends Seeder
{

    /**
     * The type repository.
     *
     * @var TypeRepositoryInterface
     */
    protected $types;

    /**
     * The field repository.
     *
     * @var FieldRepositoryInterface
     */
    protected $fields;

    /**
     * The streams repository.
     *
     * @var StreamRepositoryInterface
     */
    protected $streams;

    /**
     * The assignment repository.
     *
     * @var AssignmentRepositoryInterface
     */
    protected $assignments;

    /**
     * Create a new TypeSeeder instance.
     *
     * @param TypeRepositoryInterface $types
     */
    public function __construct(TypeRepositoryInterface $types)
    {
        $this->types = $types;

        parent::__construct();
    }

    /**
     * Run the seeder.
     */
    public function run()
    {
        /* @var TypeInterface $type */
        $type = $this->types
            ->truncate()
            ->create(
                [
                    'en'           => [
                        'name'        => 'Default',
                        'description' => 'A simple product type.',
                    ],
                    'theme_layout' => 'theme::layouts/default.twig',
                    'layout'       => '{{ product.details.render|raw }}',
                ]
            );

        $stream = $type->getEntryStream();

        $this->assignments->create(
            [
                'translatable' => true,
                'stream'       => $stream,
                'field'        => $this->fields->findBySlugAndNamespace('details', 'products'),
            ]
        );
    }
}
