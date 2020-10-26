<?php namespace Proweb21\Types;

abstract class BusinessPolicy implements BusinessRule
{
    /**
     * @var BusinessRule[]
     */
    protected $rules;

    public function __construct(array $rules = null)
    {
        $this->rules = [];
        foreach ($rules as $rule) {
            $this->append($rule);
        }
    }

    abstract public function getName(): string;

    public function append($rule)
    {
        if ($this->canAppend($rule)) {
            $this->rules[]=$rule;
        }
    }

    /**
     * Reveals if the rule can be appended to the policy rules chain
     * @param $rule
     * @return mixed
     */
    protected function canAppend($rule):bool
    {
        return ($rule instanceof BusinessRule || $rule instanceof BusinessPolicy) &&
               (!array_key_exists($rule->getName(), $this->rules));
    }

    /**
     * Gets the rules chain
     * @return array
     */
    public function getRules(): array
    {
        return $this->rules;
    }

    /**
     * Applies the Policy given an object and a context
     * @param $object
     * @param null|Context $context
     *
     */
    public function apply($object, Context $context = null)
    {
        foreach ($this->getRules() as $rule) {
            $rule->apply($object, $context);
        }
    }
}
