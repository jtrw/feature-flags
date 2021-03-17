<?php

namespace Jtrw\FeatureFlags\Repository;

/**
 * Interface RepositoryInterface
 * @package Jtrw\FeatureFlags\Repository
 */
interface RepositoryInterface
{
    /**
     * @param string $key
     * @param array $value
     * @return mixed
     */
    public function add(string $key, array $value);
    
    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key);
}