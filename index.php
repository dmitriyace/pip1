<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        body {
            font-family: Arial;
            color: white;
            background-color: darkblue;
        }

        .header {
            font-family: monospace;
            border: 2px dashed PaleVioletRed;
            color: PaleVioletRed;
            font-size: 1.5em;
        }

        .fio {
            font-size: 1.8em;
            text-align: center;
        }

        .group {
            margin-left: 5%;
        }

        .var {
            float: right;
            margin-right: 5%;
        }

        #options > select {
            outline: none;
        }

        table > tr {
            width: 100%;
            text-align: left;
        }

        td {
            margin-right: 2%;
            font-size: 9px;
            width: 11%;

        }

        form {
            margin-top: 1%;
            margin-left: 1%;
        }

        form > div {
            margin-bottom: 3%;

        }

        img {
            width: 25%;
            margin-right: 10%;
            float: right;
            border: 2px solid pink;

        }

        form {
            float: left;
            width: 40%;

        }

        .page-content {
            margin-top: 1%;
        }

        input[type='text'] {
            border-radius: 5px;
            outline: none;
        }

        input[type='text']:focus, input[type='text']:hover {
            background-color: bisque;
        }

    </style>
    <meta charset="utf-8">
</head>
<body>
<div class="header">
    <div class="fio">Чистоходов Дмитрий Андреевич</div>
    <div class="nums"><span class="group">группа P3201</span><span class="var">вариант 18119</span></div>
</div>
<div class="page-content">
    <img src="area.png" alt="Не подгрузилась">
    <form action='act.php' method="post">

        <div>
            <label>Значение Х:</label><br>
            <table>
                <tr>
                    <td>
                        <input type="radio" name="X" value="-2" required checked>-2
                    </td>
                    <td>
                        <input type="radio" name="X" value="-1.5">-1.5
                    </td>
                    <td>
                        <input type="radio" name="X" value="-1">-1
                    </td>
                    <td>
                        <input type="radio" name="X" value="-0.5">-0.5
                    </td>
                    <td>
                        <input type="radio" name="X" value="0">0
                    </td>
                    <td>
                        <input type="radio" name="X" value="0.5">0.5
                    </td>
                    <td>
                        <input type="radio" name="X" value="1">1
                    </td>
                    <td>
                        <input type="radio" name="X" value="1.5">1.5
                    </td>
                    <td>
                        <input type="radio" name="X" value="2">2
                    </td>
                </tr>
            </table>

        </div>
        <div>
            <label id="labelY">Значение Y от -5 до 5:</label><br>
            <input type="text" id="textY" name="Y" placeholder="введите Y" required>

        </div>
        <div id="options">
            <label>Значение R:</label><br>
            <select name="R">
                <option value="1">1</option>
                <option value="1.5">1.5</option>
                <option value="2">2</option>
                <option value="2.5">2.5</option>
                <option value="3">3</option>

            </select>
        </div>
        <button onclick="return checkField()">Проверить точку</button>
    </form>

</div>
<div>

</div>
<script type="text/javascript">
    function checkField() {
        let input = document.getElementById("textY");
        let textLabel = document.getElementById("labelY");
        let inputValue = input.value;
        inputValue = inputValue.replace(/,/g, '.');
        let val = parseFloat(inputValue);
        if (!(val >= -5 && val <= 5)) {
            textLabel.innerText = "Введите значение переменной Y числом от -5 до 5!";
            return false;
        } else {
            textLabel.setText("Значение Y:");
            return true;
        }

    }
</script>
</body>
</html>