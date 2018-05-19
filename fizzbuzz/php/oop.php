<?php

require __DIR__.'/vendor/autoload.php';

/**
 * Say Fizz if the number is divided by 3
 */
class Fizz
{
    private const FIZZ = 'Fizz';
    private $number;

    public function __construct(int $number)
    {
        $this->number = $number;
    }

    public function __toString(): string
    {
        return 0 === $this->number%3 ? self::FIZZ : '';
    }
}

Webmozart\Assert\Assert::same((string) new Fizz(1), '');
Webmozart\Assert\Assert::same((string) new Fizz(3), 'Fizz');

/**
 * Say Buzz if the number is divided by 5
 */
class Buzz
{
    private const BUZZ = 'Buzz';
    private $number;

    public function __construct(int $number)
    {
        $this->number = $number;
    }

    public function __toString(): string
    {
        return 0 === $this->number%5 ? self::BUZZ : '';
    }
}

Webmozart\Assert\Assert::same((string) new Buzz(1), '');
Webmozart\Assert\Assert::same((string) new Buzz(5), 'Buzz');

/**
 * Say Fizz, Buzz or FizzBuzz
 */
class FizzBuzz
{
    private $start;
    private $end;

    public function __construct(int $start, int $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function __toString(): string
    {
        $fizzBuzz = array_map(function(int $number) {
            $fizzBuzz = (string) new Fizz($number).(string) new Buzz($number);
            return '' !== $fizzBuzz ? $fizzBuzz : $number;
        }, range($this->start, $this->end));

        return implode("\n", $fizzBuzz);
    }
}
$fizzBuzz = new FizzBuzz(1, 15);

Webmozart\Assert\Assert::same(
    (string) new FizzBuzz(1, 15),
    <<<RESULT
1
2
Fizz
4
Buzz
Fizz
7
8
Fizz
Buzz
11
Fizz
13
14
FizzBuzz
RESULT
);

print_r((string) new FizzBuzz(1, 100));
