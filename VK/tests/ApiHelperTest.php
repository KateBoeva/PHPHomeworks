<?php

/**
 * Connecting class ApiHelper for testing.
 */
include "/Users/katemrrr/PhpstormProjects/VK/helpers/ApiHelper.php";

use PHPUnit\Framework\TestCase;

/**
 * Class ApiHelperTest for testing helper's methods.
 *
 * @author Ekaterina.Boeva
 * @package tests
 */
class ApiHelperTest extends TestCase
{

    /**
     * Variable for object of ApiHelper.
     *
     * @var ApiHelper
     */
    public $helper;

    /**
     * Method for start executing tests.
     */
    public function setUp()
    {
        $this->helper = new ApiHelper();
    }

    /**
     * Method for finish executing tests.
     */
    public function tearDown()
    {
        unset($helper);
    }

    /**
     * This method for testing generateJsonFile().
     */
    public function testGenerateJsonFile() {
        $tested = json_decode(file_get_contents('/Users/katemrrr/PhpstormProjects/VK/json/profile.json'));
        $this->assertEquals($tested->response->screen_name, "kate_moore_s");
    }

    /**
     * This method for testing testJsonFile().
     */
    public function testReadJsonFile() {
        $tested = $this->helper->readJsonFile('profile.json');
        $this->assertEquals($tested->response->bdate, "23.6.1997");
    }

    /**
     * This method for testing setTimeZone().
     */
    public function testSetTimeZone() {
        $this->helper->setTimeZone();
        $date = date("d.m.Y G:i", 1514586767);
        $this->assertEquals($date, "30.12.2017 1:32");
    }
}