<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<?php
$x = $_POST["X"];
$y = $_POST["Y"];
$r = $_POST["R"];
?>
X: <?php echo $x; ?><br>
Y: <?php echo $y; ?><br>
R: <?php echo $r; ?>
<?php
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

?>
<?php
$res = checkQuater($x, $y);
?>
<span><br>
    <?php
    $fits = countRegion($res);
    if ($fits) {
        echo "Точка входит в область";
    } else {
        echo "Точка не входит в область";
    }
    ?>
	</span>

<span><br>
    <?php
    echo "Точка находится в $res четверти";
    ?>
	</span>


</body>
</html>