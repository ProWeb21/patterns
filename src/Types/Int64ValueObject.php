<?php

declare(strict_types=1);

namespace Proweb21\Types;

abstract class Int64ValueObject implements ValueObject
{
    protected $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    public function equals($object): bool
    {
        return ($object instanceof Int64ValueObject) &&
               ($object->getValue() === $this->value);
    }
}
