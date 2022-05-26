@extends('layouts.admin')
@section('content')
    <link rel="stylesheet" href="https://yunusov.me/projects/direction/public/css/app.css">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <p class="h4">Добавить маршрут</p>
                    </div>
                    <div class="card-body">
<?php
require_once(__DIR__.'/city.php');
require_once(__DIR__.'/city1.php');
echo'<style>
   select {
    width: 300px; /* Ширина списка в пикселах */
   }
</style>';
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

// возвращаем список городов
if ($action == 'getCity')
{
    if (isset($city[$_GET['region']]))
    {
        echo json_encode($city[$_GET['region']]); // возвращаем данные в JSON формате;
    }
    else
    {
        echo json_encode(array('Выберите область'));
    }

    exit;
}


$action1 = isset($_REQUEST['action1']) ? $_REQUEST['action1'] : '';

// возвращаем список городов
if ($action1 == 'getCity1')
{
    if (isset($city1[$_GET['region1']]))
    {
        echo json_encode($city1[$_GET['region1']]); // возвращаем данные в JSON формате;
    }
    else
    {
        echo json_encode(array('Выберите область'));
    }

    exit;
}

?>
    <script type="text/javascript">
        // <![CDATA[
        function loadCity(select)
        {
            var citySelect = $('select[name="city"]');
            citySelect.attr('disabled', 'disabled'); // делаем список городов не активным

            // послыаем AJAX запрос, который вернёт список городов для выбранной области
            $.getJSON('add.blade.php', {action:'getCity', region:select.value}, function(cityList){

                citySelect.html(''); // очищаем список городов

                // заполняем список городов новыми пришедшими данными
                $.each(cityList, function(i){
                    citySelect.append('<option value="' + i + '">' + this + '</option>');
                });

                citySelect.removeAttr('disabled'); // делаем список городов активным

            });
        }
        // ]]>
    </script>



    <script type="text/javascript">
        // <![CDATA[
        function loadCity1(select)
        {
            var city1Select1 = $('select[name="city1"]');
            city1Select1.attr('disabled', 'disabled'); // делаем список городов не активным

            // послыаем AJAX запрос, который вернёт список городов для выбранной области
            $.getJSON('add.blade.php', {action1:'getCity1', region1:select.value}, function(city1List1){

                city1Select1.html(''); // очищаем список городов

                // заполняем список городов новыми пришедшими данными
                $.each(city1List1, function(f){
                    city1Select1.append('<option value="' + f + '">' + this + '</option>');
                });

                city1Select1.removeAttr('disabled'); // делаем список городов активным

            });
        }
        // ]]>
    </script>
</head>
<body>
<form action="" method="post">
    @csrf <!-- {{ csrf_field() }} -->
    <table>
        <tr>
            <th>Точка отправления</th>
            <th>Точка прибытия</th>
        </tr>
        <tr>
            <td>
                <select name="region" onchange="loadCity(this)">
                    <option></option>
                    <?php
                    // заполняем список областей
                    foreach ($city as $region => $cityList) {
                        echo '<option value="' . $region . '">' . $region . '</option>' . "\n";
                    }
                    ?>
                </select>
                <br><br>
                <input type="hidden" name="action" value="postResult" />
            </td>
            <td>
                <select name="region1" onchange="loadCity1(this)">
                    <option></option>
                    <?php
                    // заполняем список областей
                    foreach ($city1 as $region1 => $cityList1) {
                        echo '<option value="' . $region1 . '">' . $region1 . '</option>' . "\n";
                    }
                    ?>
                </select>
                <br><br>
                <input type="hidden" name="action1" value="postResult1" />
            </td>
        </tr>
    </table>

    <br><br>
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Добавить</button>
</form>

@endsection
