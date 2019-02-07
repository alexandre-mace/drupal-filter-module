<?php

namespace Drupal\nodefilter\Handler;

use Drupal\nodefilter\Repository\NodeFilterRepository;

class FilterByContentAndFieldHandler
{
    public function handle($contentType, $field)
    {
        $repository = new NodeFilterRepository();

        $fields = [];
        foreach ($repository->getFilteredNodes($contentType) as $node) {
            if ($node->hasField($field)) {
                $build = \Drupal::entityTypeManager()
                    ->getViewBuilder('node')
                    ->viewField($node->get($field));
                $fields[$node->get('title')[0]->value] = render($build);
            }
        }
        return $fields;
    }
}