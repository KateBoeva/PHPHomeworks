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
 * Variable for keeping needed types of fields.
 *
 * @var array
 */
$fieldsUser = [
    "home_town", "photo_max_orig", "photo_50",
    "online", "education",
    "status", "personal",
];

/**
 * Variable for parameters, which need to generating profile data.
 *
 * @var array
 */
$paramsProfile = [
    'access_token' => 'b83634bd1ed1447946d12d98097e6608d17fb60a6e1194498498f2d80ede6e3d661cd1469899ab5c2fc7d'
];

/**
 * Variable for parameters, which need to generating wall data.
 *
 * @var array
 */
$paramsWall = [
    'owner_id' => 292615354,
    'access_token' => 'b83634bd1ed1447946d12d98097e6608d17fb60a6e1194498498f2d80ede6e3d661cd1469899ab5c2fc7d'
];

/**
 * Variable for parameters, which need to generating user data.
 *
 * @var array
 */
$paramsUser = array(
    "user_ids" => 292615354,
    "fields" => implode(',', $fieldsUser),
    "name_case" => "Nom",
    'access_token' => 'b83634bd1ed1447946d12d98097e6608d17fb60a6e1194498498f2d80ede6e3d661cd1469899ab5c2fc7d'
);

$h = new ApiHelper();

$h->generateJsonFile('users.get', $paramsUser, 'user.json');
$h->generateJsonFile('account.getProfileInfo', $paramsProfile, 'profile.json');
$h->generateJsonFile('wall.get', $paramsWall, 'wall.json');

/**
 * Connecting view page.
 */
include "../views/account.php";
?>
