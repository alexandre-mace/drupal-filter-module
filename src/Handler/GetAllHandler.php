<?php

namespace Drupal\nodefilter\Handler;

use Drupal\nodefilter\Repository\NodeFilterRepository;

class GetAllHandler
{
    public function handle()
    {
        $repository = new NodeFilterRepository();

        $nodes = [];
        foreach ($repository->getAllNodes() as $node) {
            $nodeRenderable = \Drupal::entityTypeManager()
                ->getViewBuilder('node')
                ->view($node, 'teaser');
            $nodes[] = render($nodeRenderable);
        }

        return $nodes;
    }
}