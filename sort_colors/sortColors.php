<?php

/**
 * The task is to sort the colors in the order of their numbers.
 * The given String of colors and the index number in the end.
 * For example:
 * "red3 blue1 green2" and the output should be
 * "blue green red"
 */
function solution(string $s): string
{
    $arr = explode(' ', $s);
    $tmpArr = [];

    foreach($arr as $color) {
        $tmpArr[mb_substr($color, -1, 1)] = mb_substr($color, 0, strlen($color) - 1);
    }
    ksort($tmpArr);

    return implode(' ', $tmpArr);
}

$str = 'red3 blue1 green2';
print(solution($str));
