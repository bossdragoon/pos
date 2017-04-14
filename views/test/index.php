<?php

//$match = "/(java|php) vs (book|demo)/";
//$input = "java php vs book demo";
//print preg_replace($match, "Matched $0, $1, and $2\n", $input);

function testURL($url) {

    $url = str_replace(array('http://', 'https://'), '', $url);

    $url = explode('/', rtrim((isset($url) ? $url : null), '/'));
    echo var_dump($url) . "<br /><hr>";

    if (empty($url[0])) {
        return 'controllers/index.php' . "<br /><hr>";
    }

    $furl .= 'controllers/' . $url[0] . '.php' . "<br /><hr>";

    $furl .= '$controller = new ' . $url[0] . '; ' . "<br />";
    $furl .= '$controller->loadModel(' . $url[0] . '); ' . "<br />";
    $furl .= '$controller->view->pageMenu = ' . $url[0] . '; ' . "<br /><hr>";

    if (isset($url[2])) {
        $furl .= '$controller->' . $url[1] . '(' . $url[2] . '); ' . "<br />";
    } elseif (isset($url[1])) {
        if (method_exists($controller, $url[1])) {
            $furl .= '$controller->' . $url[1] . '(); ' . "<br />";
        } else {
            return $furl;
        }
    } else {
        $furl .= '$controller->index(); ' . "<br />";
    }

    return $furl;
}
?>
<div class="container-fluid">
    <form method="get">
        <div class="form-group">
            <label></label>
            <div class="col-md-10">
                <input type="text" name="urls" value="<?= $_GET["urls"] ?>" class="form-control"/>
            </div>
        </div>
    </form>
    <div class="">
        <?php
        IF ($_REQUEST) {
            echo testURL($_GET["urls"]);
        }
        ?>   

    </div>
</div>
