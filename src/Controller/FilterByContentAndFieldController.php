<?php

namespace Drupal\nodefilter\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\nodefilter\Handler\FilterByContentAndFieldHandler;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class FilterByContentAndFieldController.
 */
class FilterByContentAndFieldController extends ControllerBase {

    protected $handler;

    public function __construct(FilterByContentAndFieldHandler $handler)
    {
        $this->handler = $handler;
    }

    /**
     * {@inheritdoc}
     */
    public static function create(ContainerInterface $container)
    {
        return new static(
            $container->get('nodefilter.filter_by_content_and_field_handler')
        );
    }

    /**
     * filter.
     *
     * @return array
     */
    public function filter($contentType, $field) {
        return [
            '#theme' => 'nodefilter',
            '#fields' => $this->handler->handle($contentType, $field)
        ];
    }
}
