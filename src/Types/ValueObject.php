<?php namespace Proweb21\Types;

interface ValueObject
{
    /**
     * The value encapsulated by the instance
     * @return mixed
     */
    public function getValue();

    /**
     * Compares two value objects
     * @param ValueObject $object
     * @return bool
     */
    public function equals($object): bool;
}
