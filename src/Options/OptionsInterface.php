<?php

namespace Jtrw\FeatureFlags\Options;

/**
 * Interface OptionsInterface
 * @package Jtrw\FeatureFlags\Options
 */
interface OptionsInterface
{
    /**
     * @return array
     */
    public function getEnvironments(): array;
    
    /**
     * @return string|null
     */
    public function getDefaultEnvironments(): ?string;
    
    /**
     * @return array
     */
    public function getFeatures(): array;
}