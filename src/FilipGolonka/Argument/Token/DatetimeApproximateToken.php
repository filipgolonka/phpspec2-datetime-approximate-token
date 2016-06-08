<?php

namespace FilipGolonka\Argument\Token;

use DateTime;
use Prophecy\Argument\Token\TokenInterface;

class DatetimeApproximateToken implements TokenInterface
{
    private $value;

    public function __construct(DateTime $value)
    {
        $this->value = $value;
    }

    /**
     * @param DateTime|string $argument
     *
     * @return bool
     */
    public function scoreArgument($argument)
    {
        if (!$argument instanceof DateTime) {
            $argument = new DateTime($argument);
        }
        
        $actualTimestamp = $argument->getTimestamp();
        $expectedTimestamp = $this->value->getTimestamp();

        return $actualTimestamp >= $expectedTimestamp - 1 && $actualTimestamp <= $expectedTimestamp + 1 ? 8 : false;
    }

    /**
     * {@inheritdoc}
     */
    public function isLast()
    {
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return sprintf('≅%s', $this->value->format(DateTime::ISO8601));
    }
}
