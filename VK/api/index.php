<?php

/**
 * File for generating access token.
 *
 * @author Ekaterina.Boeva
 * @package api
 */

/**
 * Array of needed permissions.
 *
 * @var array
 */
$permissions = [
    'friends', 'photos', 'audio', 'video', 'docs', 'notes', 'pages', 'status', 'wall', 'groups'
];

/**
 * Variable for parameters, which need to generating data.
 *
 * @var array
 */
$params = array(
    'client_id' => '6312517',
    'redirect_uri' => 'http://oauth.vk.com/blank.html',
    'response_type' => 'token',
    'display' => 'page',
    'scope' => implode(',', $permissions)
);

$url_group = 'http://oauth.vk.com/authorize?' . http_build_query($params);

echo $url_group;
