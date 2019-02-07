<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 31/01/19
 * Time: 10:19
 */

namespace Drupal\nodefilter\Repository;

class NodeFilterRepository
{
    public function getFilteredNids($contentType){
        return \Drupal::entityQuery('node')
            ->condition('type', $contentType)
            ->execute();
    }
    public function getFilteredNodes($contentType){
        return \Drupal::entityTypeManager()
            ->getStorage('node')
            ->loadMultiple($this->getFilteredNids($contentType));
    }
    public function getAllNids(){
        return \Drupal::entityQuery('node')
            ->execute();
    }
    public function getAllNodes(){
        return \Drupal::entityTypeManager()
            ->getStorage('node')
            ->loadMultiple($this->getAllNids());
    }
}