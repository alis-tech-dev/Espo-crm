<?php

namespace Espo\Modules\Autocrm\Classes\Utils;

use ReflectionException;
use ReflectionMethod;
use ReflectionProperty;

class ReflectionUtil
{

    /**
     * @param class-string $className
     *
     * @throws ReflectionException
     */
    public static function callClassMethod(string $className, object $obj, string $methodName, ...$args): mixed
    {
        return (new ReflectionMethod($className, $methodName))->invoke($obj, ...$args);
    }

    /**
     * @throws ReflectionException
     */
    public static function callMethod(object $obj, string $methodName, ...$args): mixed
    {
        return (new ReflectionMethod($obj, $methodName))->invoke($obj, ...$args);
    }

    /**
     * @throws ReflectionException
     */
    public static function getProperty(object $obj, string $propertyName): mixed
    {
        return (new ReflectionProperty($obj, $propertyName))->getValue($obj);
    }

    /**
     * @throws ReflectionException
     */
    public static function setProperty(object $obj, string $propertyName, mixed $value): void
    {
        (new ReflectionProperty($obj, $propertyName))->setValue($obj, $value);
    }
}
