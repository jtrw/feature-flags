<?php

namespace Jtrw\FeatureFlags\Options;

/**
 * Class ArrayOptions
 * @package Jtrw\FeatureFlags\Options
 */
class ArrayOptions implements OptionsInterface
{
    protected array $options;
    
    /**
     * ArrayOptions constructor.
     * @param array $options
     */
    public function __construct(array $options)
    {
        $this->options = $options;
    } // end __construct
    
    /**
     * @return array
     */
    public function getEnvironments(): array
    {
        return $this->options['environments'] ?? [];
    } // end getEnvironments
    
    /**
     * @return string|null
     */
    public function getDefaultEnvironments(): ?string
    {
        return $this->options['defaultEnvironments'] ?? null;
    } // end getDefaultEnvironments
    
    /**
     * @return array
     */
    public function getFeatures(): array
    {
        return $this->options['features'] ?? [];
    } // end getFeatures
    
    
}