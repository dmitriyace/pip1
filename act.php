<?php
session_start();
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>

<table>
    <tr>
        <th>
            X
        </th>
        <th>
            Y
        </th>
        <th>
            R
        </th>
        <th>
            Попадание
        </th>
        <th>
            Время
        </th>
        <th>
            Время работы скрипта
        </th>
    </tr>
    <?php

    $start_time = microtime(true);
    $x = $_POST["X"];
    $y = $_POST["Y"];
    $r = $_POST["R"];
    function checkQuater($x, $y)
    {
        if ($x > 0 and $y > 0) {
            return '1';
        } elseif ($x < 0 and $y > 0) {
            return '2';
        } elseif ($x < 0 and $y < 0) {
            return '3';
        } else return '4';
    }

    function countRegion($res)
    {
        global $x, $y, $r;
        switch (intval($res)) {
            case 1:
                if ($x <= ($r / 2) and $y <= $r) {
                    return true;
                } else return false;
                break;
            case 2:
                if (($y - $x) <= $r) {
                    return true;
                } else return false;
                break;
            case 3:
                if (($x * $x + $y * $y) <= $r) {
                    return true;
                } else return false;
                break;
            case 4:
                return false;
            default:
                return false;
                break;
        }

    }
    $res = checkQuater($x, $y);
    $fits = countRegion($res);
//    if ($fits) {
//        echo "Точка входит в область";
//    } else {
//        echo "Точка не входит в область";
//    }
    $curr_time = date("G:i:s");
    $stop_time = microtime(true);
    $work_time = round($start_time - $stop_time, 4).' sec';
    $new_row = array($x, $y, $r, $fits, $curr_time, $work_time);

    if (!isset($_SESSION['rows'])){
        $_SESSION['rows'] = array();
    }

    array_push($_SESSION['rows'], $new_row);

    foreach ($_SESSION['rows'] as $row) {
        ?>
    <tr>
        <td>
        <?php echo $row[0] ?>
        </td>
        <td>
            <?php echo $row[1] ?>
        </td>
        <td>
            <?php echo $row[2] ?>
        </td>
        <td>
            <?php if($row[3]){
                echo "✓";
            } else {
                echo "\xF0\x9F\x98\x94";
            }?>

        </td>
        <td>
            <?php echo $row[4] ?>
        </td>
        <td>
            <?php echo $row[5] ?>
        </td>
    </tr>
    <?php
    }
    ?>

</table>



</body>
</html>