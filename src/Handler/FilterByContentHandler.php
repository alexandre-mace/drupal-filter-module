<?php

namespace Drupal\nodefilter\Handler;

use Drupal\nodefilter\Repository\NodeFilterRepository;

class FilterByContentHandler
{
    public function handle($contentType)
    {
        $repository = new NodeFilterRepository();

        $nodes = [];
        foreach ($repository->getFilteredNodes($contentType) as $node) {
            $nodeRenderable = \Drupal::entityTypeManager()
                ->getViewBuilder('node')
                ->view($node, 'teaser');
            $nodes[] = render($nodeRenderable);
        }
        return $nodes;
    }
}