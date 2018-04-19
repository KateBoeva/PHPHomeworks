<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="https://pp.userapi.com/c624831/v624831411/c5af/uiaHN8hvj9k.jpg" type="image/x-icon">
    <title>Профиль</title>
    <link href="../css/header.css" rel="stylesheet" type="text/css">
    <link href="../css/profile.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php

/**
 * File for show account page.
 *
 * @author Ekaterina.Boeva
 * @package views
 */

$h = new ApiHelper();

$dataUser = $h->readJsonFile('user.json');
$dataProfile = $h->readJsonFile('profile.json');
$dataWall = $h->readJsonFile('wall.json');

$dataUser = (array)$dataUser->response[0];
$dataProfile = $dataProfile->response;
$dataWall = $dataWall->response;

$h->setTimeZone();
?>

<header>
    <div>Вконтакте</div>
    <nav class="menu_item">
        <a href="../api/feed.php">Новости</a>
    </nav>
</header>

<form class="profile_container">
    <img class="avatar" src="<?= $dataUser['photo_max_orig'] ?>">
    <div class="profile_info">
        <div class="profile_name"><?= $dataUser['first_name'] . " " . $dataUser['last_name'] ?></div>
        <div class="status"><?= $dataProfile->status ?></div>
        <table class="other_info">
            <tr>
                <td>Дата рождения:</td>
                <td><?= $dataProfile->bdate ?></td>
            </tr>
            <tr>
                <td>Страна:</td>
                <td><?= $dataProfile->country->title ?></td>
            </tr>
            <tr>
                <td>Родной город:</td>
                <td><?= $dataUser['home_town'] ?></td>
            </tr>
            <tr>
                <td>Университет:</td>
                <td><?= $dataUser['university_name'] ?></td>
            </tr>
            <tr>
                <td>Институт/Факультет:</td>
                <td><?= $dataUser['faculty_name'] ?></td>
            </tr>
        </table>
    </div>
</form>
<div class="profile_wall">
    <?php
    $posts = "";

    for ($i = 1; $i < count($dataWall); $i++) {
        $data = $dataWall[$i];

        if (isset($data->post_type)) {
            if ($data->post_type == "post") {

                $posts .= "<div class='post_container'>";
                if ($data->from_id == 292615354) {
                    $posts .= "<div><img class='icon' src='" . $dataUser['photo_50'] . "'><span class='publisher_name'>" . $dataUser['first_name'] . " " . $dataUser['last_name'] . "</span>";
                } else {
                    for ($j = 0; $j < count($datafile['profiles']); $j++) {
                        if ($data->from_id == $datafile['profiles'][$j]->uid) {
                            $posts .= "<div><img src='" . $datafile['profiles'][$j]->photo . "'><span>" . $datafile['profiles'][$j]->first_name . " " . $datafile['profiles'][$j]->last_name . "</span>";
                        }
                    }
                }

                $posts .= "<span class='date'>" . date('d.m.Y G:i', $data->date) . "</span>";

                if (isset($data->text) && $data->text != "") {
                    $posts .= "<div class='post_text'>" . $data->text . "</div>";
                }

                if (isset($data->attachments) && isset($data->attachment->photo->src_big)) {
                    for ($j = 0; $j < count($data->attachments); $j++) {
                        if ((string)$data->attachments[$j]->type == "photo") {
                            $posts .= "<span><br><img src='" . $data->attachments[$j]->photo->src_big . "'></span>";
                        }
                    }
                }

                $posts .= "</table></div>";

                if (isset($data->likes->count)) {
                    $posts .= "<tr><span class='likes_container'>♥ Мне нравится " . $data->likes->count . "</span><span class='repost_container'> ⇒ " . $data->reposts->count . "</span></tr>";
                }
                $posts .= "</div>";
            }

        }
    }
    echo $posts;
    ?>
</div>
</body>
</html>
