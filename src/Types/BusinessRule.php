<?php namespace Proweb21\Types;

interface BusinessRule
{
    /**
     * The value encapsulated by the instance
     * @return mixed
     */
    public function getName():string;

    /**
     * @param mixed $object
     * @param null|Context $context
     * @return void
     * @throws \DomainException
     */
    public function apply($object, Context $context = null);
}
