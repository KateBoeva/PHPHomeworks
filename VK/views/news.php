<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="https://pp.userapi.com/c624831/v624831411/c5af/uiaHN8hvj9k.jpg" type="image/x-icon">
    <title>Новости</title>
    <link href="../css/header.css" rel="stylesheet" type="text/css">
    <link href="../css/news.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php

/**
 * File for show news page.
 *
 * @author Ekaterina.Boeva
 * @package views
 */

$datafile = (new ApiHelper())->readJsonFile('news.json');
$datafile = ((array)$datafile->response);
(new ApiHelper())->setTimeZone();

?>
<header>
    <div>Вконтакте</div>
    <nav class="menu_item">
        <a href="../api/profile.php">Профиль</a>
    </nav>
</header>

<?php

$posts = "";

for ($i = 0; $i < 50; $i++) {
    $data = $datafile['items'][$i];

    $posts .= "<div class='news_container'>";

    $name = "";
    $icon = "";

    if ($data->source_id < 0) {
        for ($j = 0; $j < count($datafile['groups']); $j++) {
            if (isset($datafile['groups'][$j]->gid)) {
                if ($datafile['groups'][$j]->gid == -$data->source_id) {
                    $name = $datafile['groups'][$j]->name;
                    $icon = "<img class='min_icon' src='" . $datafile['groups'][$j]->photo . "'>";
                    break;
                }
            }
        }
    } else {
        for ($j = 0; $j < count($datafile['profiles']); $j++) {
            if (isset($datafile['profiles'][$j]->uid)) {
                if ($datafile['profiles'][$j]->uid == $data->source_id) {
                    $name = $datafile['profiles'][$j]->first_name . " " . $datafile['profiles'][$j]->last_name;
                    $icon = "<img class='min_icon' src='" . $datafile['profiles'][$j]->photo . "'>";
                    break;
                }
            }
        }
    }

    $posts .= $icon . "<span class='info'><span class='name_container'>" . $name . "</span><br>" . date('d.m.Y G:i', $data->date) . "</span>";
    $posts .= "<div><table><br>";

    if (isset($data->text) && $data->text != "") {
        $posts .= "<div>" . $data->text . "<br><br></div>";
    }

    if (isset($data->attachment) && isset($data->attachment->photo->src_big)) {
        $posts .= "<tr><img src='" . $data->attachment->photo->src_big . "'></tr>";
    }

    if (isset($data->attachment) && isset($data->attachment->video->first_frame_800)) {
        $posts .= "<tr><img src='" . $data->attachment->video->first_frame_800 . "'></tr>";
    }

    $posts .= "</table></div>";

    if (isset($data->likes->count)) {
        $posts .= "<tr><br><span class='likes_container'>♥ Мне нравится " . $data->likes->count . "</span><span class='repost_container'> ⇒ " . $data->reposts->count . "</span></tr>";
    }

    $posts .= "</div>";

}

echo $posts;

?>

</body>
</html>
