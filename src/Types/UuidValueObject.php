<?php

declare(strict_types = 1);

namespace Proweb21\Types;

use InvalidArgumentException;
use Ramsey\Uuid\Uuid as RamseyUuid;

final class UuidValueObject implements ValueObject
{
    protected $value;

    public function __construct(string $value)
    {
        $this->ensureIsValidUuid($value);

        $this->value = $value;
    }

    public static function random(): self
    {
        return new self(RamseyUuid::uuid4()->toString());
    }

    public function getValue(): string
    {
        return $this->value;
    }

    private function ensureIsValidUuid($id): void
    {
        if (!RamseyUuid::isValid($id)) {
            throw new InvalidArgumentException(sprintf('<%s> does not allow the value <%s>.', static::class, $id));
        }
    }

    public function isTheSameAs($object): bool
    {
        return ($object instanceof UuidValueObject) &&
               ($object->getValue() === $this->value);
    }
}
