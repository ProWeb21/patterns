<?php

declare(strict_types=1);

namespace Proweb21\Types;

abstract class StringValueObject implements ValueObject
{
    protected $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    public function equals($object): bool
    {
        return ($object instanceof StringValueObject) &&
                0 === strcmp($object->getValue(), $this->value);
    }
}
