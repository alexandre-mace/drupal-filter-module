<?php

namespace Drupal\nodefilter\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\nodefilter\Handler\GetAllHandler;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class GetAllController.
 */
class GetAllController extends ControllerBase {

    protected $handler;

    public function __construct(GetAllHandler $handler)
    {
        $this->handler = $handler;
    }

    /**
     * {@inheritdoc}
     */
    public static function create(ContainerInterface $container)
    {
        return new static(
            $container->get('nodefilter.get_all_handler')
        );
    }

    /**
     * filter.
     *
     * @return array
     */
    public function getAll() {
        return [
            '#theme' => 'nodefilter',
            '#nodes' => $this->handler->handle()
        ];
    }
}
