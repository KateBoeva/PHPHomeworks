<?php


/**
 * Class ApiHelper of needed methods, which help to show correct pages.
 *
 * @author Ekaterina.Boeva
 * @package helpers
 */
class ApiHelper
{

    /**
     * This method generate needed data from vk.com to .json.
     *
     * @param $method
     * @param $params
     * @param $file
     */
    public function generateJsonFile($method, $params, $file) {
        $url = 'https://api.vk.com/method/' . $method . '?' . http_build_query($params);
        $json = file_get_contents($url);
        file_put_contents('/Users/katemrrr/PhpstormProjects/VK/json/' . $file, $json);
    }

    /**
     * This method allow to read .json-file and to write data to array object.
     *
     * @param $fileName
     * @return object
     */
    public function readJsonFile($fileName): object {
        $file = file_get_contents('/Users/katemrrr/PhpstormProjects/VK/json/' . $fileName);
        return json_decode($file);
    }

    /**
     * This method set needed timezone for correct print of date.
     */
    public function setTimeZone() {
        date_default_timezone_set('Europe/Moscow');
    }

}