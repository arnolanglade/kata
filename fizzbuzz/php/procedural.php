<?php

require __DIR__.'/vendor/autoload.php';

/**
 * Say Fizz if the number is divided by 3
 *
 * @param int $number
 *
 * @return string
 */
function fizz(int $number): string
{
    return 0 === $number%3 ? 'Fizz' : '';
}

Webmozart\Assert\Assert::same(fizz(1), '');
Webmozart\Assert\Assert::same(fizz(3), 'Fizz');

/**
 * Say Buzz if the number is divided by 5
 *
 * @param int $number
 *
 * @return string
 */
function buzz(int $number): string
{
    return 0 === $number%5 ? 'Buzz' : '';
}

Webmozart\Assert\Assert::same(buzz(1), '');
Webmozart\Assert\Assert::same(buzz(5), 'Buzz');

/**
 * Say Fizz, Buzz or FizzBuzz
 *
 * @param int $start
 * @param int $end
 *
 * @return string
 */
function fizzBuzz(int $start, int $end)
{
    $fizzBuzz = array_map(function(int $number) {
        $fizzBuzz = fizz($number).buzz($number);
        return '' !== $fizzBuzz ? $fizzBuzz : $number;
    }, range($start, $end));

    return implode("\n", $fizzBuzz);
}

Webmozart\Assert\Assert::same(
    fizzBuzz(1, 15),
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

print(fizzBuzz(1, 100));
