<?php

namespace Drupal\nodefilter\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\nodefilter\Handler\FilterByFieldHandler;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class FilterByFieldController.
 */
class FilterByFieldController extends ControllerBase {

    protected $handler;

    public function __construct(FilterByFieldHandler $handler)
    {
        $this->handler = $handler;
    }

    /**
     * {@inheritdoc}
     */
    public static function create(ContainerInterface $container)
    {
        return new static(
            $container->get('nodefilter.filter_by_field_handler')
        );
    }

    /**
     * filter.
     *
     * @return array
     */
    public function filter($field) {
        return [
            '#theme' => 'nodefilter',
            '#fields' => $this->handler->handle($field)
        ];
    }
}
