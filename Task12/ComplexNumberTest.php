<?php
/**
 * Created by PhpStorm.
 * User: katemrrr
 * Date: 12.12.17
 * Time: 11:16
 */

include "ComplexNumber.php";

use PHPUnit\Framework\TestCase;

class ComplexNumberTest extends TestCase
{
    private $firstNum = null;
    private $secondNum = null;

    public function setUp()
    {
        $this->firstNum = new ComplexNumber(3, 4);
        $this->secondNum = new ComplexNumber(6, 8);
    }

    public function tearDown()
    {
        $this->firstNum = null;
        $this->secondNum = null;
    }

    function testCreateComplexNumbers()
    {
        $this->assertEquals($this->firstNum->real, 3);
        $this->assertEquals($this->firstNum->imagine, 4);
        $this->assertEquals($this->secondNum->real, 6);
        $this->assertEquals($this->secondNum->imagine, 8);
    }

    function testAdd()
    {
        $firstTested = new ComplexNumber(9, 12);
        $secondTested = new ComplexNumber(18, 24);

        $this->firstNum->add($this->secondNum);
        $n = clone $this->firstNum;
        $this->firstNum->add($this->firstNum);
        $m = clone $this->firstNum;

        $this->assertEquals($firstTested, $n);
        $this->assertEquals($secondTested, $this->firstNum);
    }

    function testSub()
    {
        $firstTested = new ComplexNumber(-3, -4);
        $secondTested = new ComplexNumber(0, 0);

        $this->firstNum->sub($this->secondNum);
        $n = clone $this->firstNum;
        $this->firstNum->sub($this->firstNum);

        $this->assertEquals($firstTested, $n);
        $this->assertEquals($secondTested, $this->firstNum);
    }

    function testMult()
    {
        $firstTested = new ComplexNumber(18, 32);
        $secondTested = new ComplexNumber(324, 1024);

        $this->firstNum->mult($this->secondNum);
        $n = clone $this->firstNum;
        $this->firstNum->mult($this->firstNum);

        $this->assertEquals($firstTested, $n);
        $this->assertEquals($secondTested, $this->firstNum);
    }

    function testDiv()
    {
        $firstTested = new ComplexNumber(0.5, 0.5);
        $secondTested = new ComplexNumber(1, 1);

        $this->firstNum->div($this->secondNum);
        $n = clone $this->firstNum;
        $this->firstNum->div($this->firstNum);

        $this->assertEquals($firstTested, $n);
        $this->assertEquals($secondTested, $this->firstNum);
    }

    function testToString()
    {
        $this->assertEquals($this->firstNum . "", "number=3+4i\n");
        $this->assertEquals((new ComplexNumber(3, -4)) . "", "number=3-4i\n");
    }

}
