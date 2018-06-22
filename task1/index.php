<?php

function mySort($a, $b)
{
    if ($a == $b) return 0;
    return $a > $b ? 1 : -1;
}

/**
 * Создает матрицу размером n * n и заполняет ее по спирали
 *
 * @param int {Number} n - размерность матрицы
 * @returns array {Number[n][n]} - n * n - матрица, заполненная по спирали
 */
function fillSpiralMatrix($n)
{
    $half = floor($n / 2);
    $count = 1;
    $result = [];

    if ($n % 2 == 1) {
        $result[$half][$half] = $n * $n;
    }

    for ($i = 1; $i <= $half; $i++) {
        $lessOneIteration = $i - 1;
        $lessIterations = $n - $i;
        $lessOne = $lessIterations - 1;
        $plusOne = $lessIterations + 1;

        for ($j = $lessOneIteration; $j < $plusOne; $j++) {
            $result[$lessOneIteration][$j] = $count++;
        }

        for ($j = $i; $j < $plusOne; $j++) {
            $result[$j][$lessIterations] = $count++;
        }

        for ($j = $lessOne; $j >= $lessOneIteration; $j--) {
            $result[$lessIterations][$j] = $count++;
        }

        for ($j = $lessOne; $j >= $i; $j--) {
            $result[$j][$lessOneIteration] = $count++;
        }
    }

    uksort($result, "mySort");

    foreach ($result as &$data) {
        uksort($data, "mySort");
    }

    unset($data);

    return $result;
}
