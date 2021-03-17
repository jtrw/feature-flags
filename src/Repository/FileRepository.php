<?php

namespace Jtrw\FeatureFlags\Repository;

/**
 * Class FileRepository
 * @package Jtrw\FeatureFlags\Repository
 */
class FileRepository implements RepositoryInterface
{
    /**
     * @var array
     */
    protected array $options;
    
    /**
     * FileRepository constructor.
     * @param array $options
     */
    public function __construct(array $options)
    {
        $this->options = $options;
    } // end __construct
    
    /**
     * @param string $key
     * @param array $value
     * @return mixed|void
     */
    public function add(string $key, array $value)
    {
        // ...
    }
    
    /**
     * @param string $key
     * @return mixed|void
     */
    public function get(string $key)
    {
        // ...
    }
}