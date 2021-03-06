<?php

namespace uuf6429\Rune\Action;

/**
 * The "quick 'n dirty" action.
 * Note: this action is considerably slower than a direct implementation.
 */
class CallbackAction implements ActionInterface
{
    /**
     * @var callable
     */
    protected $callback;

    /**
     * The callback will receive the following arguments:
     * (EvaluatorInterface $eval, ContextInterface $context, RuleInterface $rule).
     *
     * @param callable $callback
     */
    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    /**
     * {@inheritdoc}
     */
    public function execute($eval, $context, $rule)
    {
        call_user_func($this->callback, $eval, $context, $rule);
    }
}
