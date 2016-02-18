<?php namespace Anomaly\PostsModule\Type\Command;

use Anomaly\PostsModule\Type\Contract\TypeInterface;
use Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class GetTypeStream
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\PostsModule\Type\Command
 */
class GetTypeStream implements SelfHandling
{

    /**
     * The post type instance.
     *
     * @var TypeInterface
     */
    protected $type;

    /**
     * Create a new GetTypeStream instance.
     *
     * @param TypeInterface $type
     */
    public function __construct(TypeInterface $type)
    {
        $this->type = $type;
    }

    /**
     * Handle the command.
     *
     * @param StreamRepositoryInterface $streams
     * @return \Anomaly\Streams\Platform\Stream\Contract\StreamInterface|null
     */
    public function handle(StreamRepositoryInterface $streams)
    {
        return $streams->findBySlugAndNamespace($this->type->getSlug() . '_posts', 'posts');
    }
}
