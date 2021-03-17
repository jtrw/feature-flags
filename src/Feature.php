<?php

namespace Jtrw\FeatureFlags;

use Jtrw\FeatureFlags\Exceptions\FeatureNotFoundException;
use Closure;
use Jtrw\FeatureFlags\Options\ArrayOptions;
use Jtrw\FeatureFlags\Options\OptionsInterface;
use Jtrw\FeatureFlags\Repository\FileRepository;

/**
 * Class Feature
 * @package Jtrw\FeatureFlags
 */
class Feature
{
    /**
     * @var OptionsInterface
     */
    protected static OptionsInterface $options;
    
    /**
     * @param OptionsInterface $options
     */
    public static function init(OptionsInterface $options)
    {
        static::$options = $options;
    } // end init
    
    /**
     * @param string $key
     * @param string|null $env
     * @return bool
     * @throws FeatureNotFoundException
     */
    public static function isEnabled(string $key, string $env = null): bool
    {
        if (!array_key_exists($key, static::$options->getFeatures())) {
            throw new FeatureNotFoundException($key);
        }
        
        return static::isTrueEnvironment($env) && static::$options[$key] === true;
    } // end isEnabled
    
    /**
     * @param string|null $env
     * @return bool
     */
    public static function isTrueEnvironment(string $env = null): bool
    {
        $envs = static::$options->getEnvironments();
        if (static::isEnvClosure($env, $envs)) {
            return $envs[$env]();
        }
        
        $defaultEnv = static::$options->getDefaultEnvironments();
        if ($defaultEnv && static::isEnvClosure($defaultEnv, $envs)) {
            return $envs[$defaultEnv]();
        }
        
        return true;
    } // end isTrueEnvironment
    
    /**
     * @param string $key
     * @param array $values
     * @return bool
     */
    protected static function isEnvClosure(string $key, array $values): bool
    {
        return array_key_exists($key, $values) && ($values[$key] instanceof Closure);
    } // end isEnvClosure
}