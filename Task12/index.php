<?php
/**
 * Created by PhpStorm.
 * User: katemrrr
 * Date: 12.12.17
 * Time: 10:25
 */

include "ComplexNumber.php";

$first = new ComplexNumber(2, 3);
$second = new ComplexNumber(3, -7);

$first->add($second);

echo $first;



