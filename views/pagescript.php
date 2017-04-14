<?php

/*
 * 
 * Global Page's Script (PHP)
 * 
 */


/* ===================
 * Import CSS/JS
  =================== */
if (isset($this->css)) {
    foreach ($this->css as $css) {
        if(preg_match("/\.{2}\//A",$css)){
            $url = URL . preg_replace("/\.{1,2}\//A","",$css);
        }else if(preg_match("/(http|ftp)[s]?\:\/\//A", $css)){
            $url = $css;            
        }else{
            $url = URL . 'views/' . $css;
        }
        echo '<link rel="stylesheet" href="' . $url . '"/>';
    }
}
if (isset($this->js)) {
    foreach ($this->js as $js) {
        if(preg_match("/\.{1,2}\//A",$js)){
            $url = URL . preg_replace("/\.{1,2}\//A","",$js);
        }else if(preg_match("/(http|ftp)[s]?\:\/\//A", $js)){
            $url = $js;            
        }else{
            $url = URL . 'views/' . $js;
        }
        echo '<script type="text/javascript" src="' . $url . '"></script>';
    }
}

/* ===================
 * Global Function
  =================== */

//enumDropdown :: Generated selectpicker from database's "enum" field's type
function enumDropdown($table_name, $column_name, $echo = false) {
    $selectDropdown = "<select name=\"$column_name\">";
    $result = mysql_query("SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS
       WHERE TABLE_NAME = '$table_name' AND COLUMN_NAME = '$column_name'")
            or die(mysql_error());

    $row = mysql_fetch_array($result);
    $enumList = explode(",", str_replace("'", "", substr($row['COLUMN_TYPE'], 5, (strlen($row['COLUMN_TYPE']) - 6))));

    foreach ($enumList as $value)
        $selectDropdown .= "<option value=\"$value\">$value</option>";

    $selectDropdown .= "</select>";

    if ($echo)
        echo $selectDropdown;

    return $selectDropdown;
}

//function showFullSQL($sql,$array){
//    foreach ($array as $key => $value) 
//    {
//        $sql = str_replace(":{$key}", "'" . $value . "'", $sql);
//    }
//    echo $sql;
//}


function accessMenu($user_rights) {
    $User = Session::get('User');
    $access = $User['system_kpip'];
    $user_rights = '[' . $user_rights . ']';

    if (stristr($access, '[admin]')) {
        return 1;
    } else if (stristr($access, '[staff]')) {
        return 1;
    } else if (stristr($access, $user_rights)) {
        return 1;
    } else {
        return 0;
    }
}

//function resizeIMG($pic_post, $pic_name) {
//    $maxScale = 150;
//    $scale = getimagesize("$pic_post/$pic_name");
//    $w = $scale[0];
//    $h = $scale[1];
//    if ($scale[0] > $maxScale || $scale[1] > $maxScale) {
//        if ($w >= $h) {
//            $width = $maxScale;
//            $height = floor(($maxScale / $w) * $h);
//        } else {
//            $width = floor(($maxScale / $h) * $w);
//            $height = $maxScale;
//        }
//        echo "<img src='$pic_post/$pic_name' width='$width' height='$height' title='' border='0'>";
//    } else {
//        echo "<img src='$pic_post/$pic_name' width='$w' height='$h' title='' border='0'>";
//    }
//    return $scale;
//}

/* ============================================================================ */
/*
 * Multidimention array TO html table
 * credit : http://www.terrawebdesign.com/multidimensional.php
 */
function showArrayTable($array, $array_name = "") {

    $arrayDepth = array_depth($array);

    echo "<table class='table table-hover table-striped table-bordered'>";
    echo ($array_name <> "" ? "<caption>{$array_name}</caption>" : "");
    echo "<thead><tr>";
//    echo "<th></th>";
    for ($i = 0; $i <= $arrayDepth; $i++) {
        echo "<th>[{$i}]</th>";
    }
    echo "</tr></thead>";
    echo "<tbody>";
    array2Table($array, 1, 0);
    echo "</tbody>";
    echo "</table>\n";
}

//check array depths --> http://stackoverflow.com/questions/262891/is-there-a-way-to-find-out-how-deep-a-php-array-is
function array_depth(array $array) {
    $max_depth = 1;

    foreach ($array as $value) {
        if (is_array($value)) {
            $depth = array_depth($value) + 1;

            if ($depth > $max_depth) {
                $max_depth = $depth;
            }
        }
    }

    return $max_depth;
}

function do_offset($level) {
    $offset = "";             // offset for subarry 
    for ($i = 1; $i < $level; $i++) {
        $offset = $offset . "<td></td>";
    }
    return $offset;
}

function array2Table($array, $level, $sub) {
    if (is_array($array) == 1) {          // check if input is an array
        foreach ($array as $key_val => $value) {
            $offset = "";
            if (is_array($value) == 1) {   // array is multidimensional
                echo "<tr>";
                $offset = do_offset($level);
                echo $offset . "<td>" . $key_val . "</td>";
                array2Table($value, $level + 1, 1);
            } else {                        // (sub)array is not multidim
                if ($sub != 1) {          // first entry for subarray
                    echo "<tr class='array-table-nosub'>";
                    $offset = do_offset($level);
                }
                $sub = 0;
                echo $offset . "<td class='array-table-main' " . $sub . " >[" . $key_val . "]</td>"
                . "<td>"
                . $value . "</td>";
                echo "</tr>\n";
            }
        } //foreach $array
    } else { // argument $array is not an array
        return;
    }
}

/* ============================================================================ */
?>