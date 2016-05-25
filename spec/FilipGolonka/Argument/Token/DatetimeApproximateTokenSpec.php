<?php

namespace spec\FilipGolonka\Argument\Token;

use DateTime;
use FilipGolonka\Argument\Token\DatetimeApproximateToken;
use PhpSpec\ObjectBehavior;

class DatetimeApproximateTokenSpec extends ObjectBehavior
{
    const DATETIME_FROM_PAST = '2015-01-01 12:00:00';
    const DATETIME_FROM_PAST_PLUS_SECOND = '2015-01-01 12:00:01';
    const DATETIME_FROM_PAST_MINUS_SECOND = '2015-01-01 11:59:59';

    function let()
    {
        $this->beConstructedWith(new DateTime(self::DATETIME_FROM_PAST));
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(DatetimeApproximateToken::class);
    }

    function it_is_represented_by_string()
    {
        $this->__toString()->shouldBe('≅2015-01-01T12:00:00+0100');
    }

    function it_is_not_last()
    {
        $this->shouldNotBeLast();
    }
    
    function it_scores_argument()
    {
        $value = new DateTime(self::DATETIME_FROM_PAST_MINUS_SECOND);
        $this->scoreArgument($value)->shouldBe(8);

        $value = new DateTime(self::DATETIME_FROM_PAST_PLUS_SECOND);
        $this->scoreArgument($value)->shouldBe(8);

        $value = new DateTime();
        $this->scoreArgument($value)->shouldBe(false);
    }
}
