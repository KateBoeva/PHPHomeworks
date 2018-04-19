<?php

/**
 * Generating data.
 *
 * This file take data from vk.com for generating to .json-file
 *
 * @author Ekaterina.Boeva
 * @package api
 */

/**
 * Connecting need methods from ApiHelper.php
 */
include "../helpers/ApiHelper.php";

/**
 * Variable for keeping needed types of posts.
 *
 * @var array
 */
$filters = ["post", "photo"];

/**
 * Variable for parameters, which need to generating data.
 *
 * @var array
 */
$params = array(
    "friends" => "",
    "return_banned" => 0,
    "filters" => implode(",", $filters),
    'access_token' => 'b83634bd1ed1447946d12d98097e6608d17fb60a6e1194498498f2d80ede6e3d661cd1469899ab5c2fc7d'
);

(new ApiHelper())->generateJsonFile('newsfeed.get', $params, 'news.json');

/**
 * Connecting view page.
 */
include "../views/news.php";
