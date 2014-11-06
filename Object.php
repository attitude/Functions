<?php

namespace attitude\Functions;

class Object
{
    /**
     * Returns the JSON representation of an object including the private properties
     *
     * source: http://stackoverflow.com/a/20252122/3940529
     *
     * @param object $object
     *
     */
    public static function json_encode($object, $options = 0, $depth = 512)
    {
        if (!is_object($object)) {
            throw new \Exception('Parameter passed to function must be an object');
        }

        $public = [];

        $reflection = new \ReflectionClass($object);

        foreach ($reflection->getProperties() as $property) {
            $property->setAccessible(true);
            $public[$property->getName()] = $property->getValue($object);
        }

        return json_encode($public, $options, $depth);
    }
}
