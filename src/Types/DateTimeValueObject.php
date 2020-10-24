<?php

declare(strict_types=1);

namespace Proweb21\Types;

use DateTimeImmutable;

abstract class DateTimeValueObject implements ValueObject
{
    protected $value;

    public function __construct(DateTimeImmutable $value)
    {
        $this->value = $value;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getValue()
    {
        return $this->value;
    }

    public function equals($object): bool
    {
        return ($object instanceof DateTimeValueObject) &&
                $object->getValue()->getTimestamp() === $this->value->getTimestamp();
    }
}
