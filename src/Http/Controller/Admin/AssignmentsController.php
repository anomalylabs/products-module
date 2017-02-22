<?php namespace Anomaly\ProductsModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Assignment\Form\AssignmentFormBuilder;
use Anomaly\Streams\Platform\Assignment\Table\AssignmentTableBuilder;
use Anomaly\Streams\Platform\Field\Contract\FieldRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\Streams\Platform\Stream\Contract\StreamInterface;
use Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface;

/**
 * Class AssignmentsController
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class AssignmentsController extends AdminController
{

    /**
     * Return an index of existing assignments.
     *
     * @param AssignmentTableBuilder    $table
     * @param StreamRepositoryInterface $streams
     * @param                           $stream
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(AssignmentTableBuilder $table, StreamRepositoryInterface $streams, $stream)
    {
        return $table
            ->setStream($streams->find($this->route->parameter('stream')))
            ->render();
    }

    /**
     * Return the modal for choosing a field to assign.
     *
     * @param FieldRepositoryInterface  $fields
     * @param StreamRepositoryInterface $streams
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function choose(FieldRepositoryInterface $fields, StreamRepositoryInterface $streams)
    {
        $fields = $fields
            ->findAllByNamespace($this->getNamespace())
            ->notAssignedTo($streams->find($streams->find($this->route->parameter('stream'))))
            ->unlocked();

        return $this->view->make('module::admin/assignments/choose', compact('fields', 'stream'));
    }

    /**
     * Create a new assignment.
     *
     * @param AssignmentFormBuilder     $builder
     * @param StreamRepositoryInterface $streams
     * @param FieldRepositoryInterface  $fields
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(
        AssignmentFormBuilder $builder,
        StreamRepositoryInterface $streams,
        FieldRepositoryInterface $fields
    ) {
        /* @var StreamInterface $stream */
        $stream = $streams->find($streams->find($this->route->parameter('stream')));

        $builder
            ->setOption('redirect', 'admin/streams/assignments/' . $stream->getId())
            ->setField($fields->find($this->request->get('field')))
            ->setStream($stream);

        return $builder->render();
    }

    /**
     * Edit an existing assignment.
     *
     * @param AssignmentFormBuilder     $builder
     * @param StreamRepositoryInterface $streams
     * @param                           $stream
     * @param                           $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(AssignmentFormBuilder $builder, StreamRepositoryInterface $streams)
    {
        /* @var StreamInterface $stream */
        $stream = $streams->find($streams->find($this->route->parameter('stream')));

        $builder
            ->setOption('redirect', 'admin/products/fields/assignments/' . $stream->getId())
            ->setStream($stream);

        return $builder->render($this->route->parameter('id'));
    }
}
