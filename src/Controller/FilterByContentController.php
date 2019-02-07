<?php

namespace Drupal\nodefilter\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\nodefilter\Handler\FilterByContentHandler;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class FilterByContentController.
 */
class FilterByContentController extends ControllerBase
{
    protected $handler;

    public function __construct(FilterByContentHandler $handler)
    {
        $this->handler = $handler;
    }

    /**
     * {@inheritdoc}
     */
    public static function create(ContainerInterface $container)
    {
        return new static(
            $container->get('nodefilter.filter_by_content_handler')
        );
    }

    /**
     * filter.
     *
     * @return array
     */
    public function filter($contentType)
    {
        return [
            '#theme' => 'nodefilter',
            '#nodes' => $this->handler->handle($contentType)
        ];
    }
}