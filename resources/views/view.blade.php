@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="https://yunusov.me/projects/direction/public/css/app.css">
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <p class="h4">Посмотреть маршрут</p>
                </div>
                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @php
$uid = Auth::user()->id;
    $role = \DB::table('role_user')
        ->where('role_user.user_id','=',$uid)
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('roles.id as roleid', 'roles.title as rtitle')
        ->first();
@endphp

                    @php
                        if($role->roleid=='3') {
                function distance($lat_1, $lon_1, $lat_2, $lon_2) {
                    $radius_earth = 6371; // Радиус Земли
                    $lat_1 = deg2rad($lat_1);
                    $lon_1 = deg2rad($lon_1);
                    $lat_2 = deg2rad($lat_2);
                    $lon_2 = deg2rad($lon_2);
                    $d = 2 * $radius_earth * asin(sqrt(sin(($lat_2 - $lat_1) / 2) ** 2 + cos($lat_1) * cos($lat_2) * sin(($lon_2 - $lon_1) / 2) ** 2));
                    return number_format($d, 2, '.', '').' км.';
                }
                $address_1 = $task->description;
                $address_2 = $task->description2;
                $ch = curl_init('https://geocode-maps.yandex.ru/1.x/?apikey=95813572-aaa8-47bb-85e0-96f669b455b6&format=json&geocode=' . urlencode($address_1));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_HEADER, false);
                $res = curl_exec($ch);
                curl_close($ch);
                $res = json_decode($res, true);
                $coordinates = $res['response']['GeoObjectCollection']['featureMember'][0]['GeoObject']['Point']['pos'];
                $coordinates = explode(' ', $coordinates);
                $shir_1 = $coordinates[1];
                $dolg_1 = $coordinates[0];

                $ch1 = curl_init('https://geocode-maps.yandex.ru/1.x/?apikey=95813572-aaa8-47bb-85e0-96f669b455b6&format=json&geocode=' . urlencode($address_2));
                curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch1, CURLOPT_HEADER, false);
                $res1 = curl_exec($ch1);
                curl_close($ch1);
                $res1 = json_decode($res1, true);
                $coordinates1 = $res1['response']['GeoObjectCollection']['featureMember'][0]['GeoObject']['Point']['pos'];
                $coordinates1 = explode(' ', $coordinates1);
                $shir_2 = $coordinates1[1];
                $dolg_2 = $coordinates1[0];

                echo 'Маршрут между '.$address_1.' и '.$address_2;
                echo '<br>Расстояние: '.distance($shir_1, $dolg_1, $shir_2, $dolg_2);
                //"среднее" для центрирования карты
                $center1 = ($shir_1 + $shir_2) / 2;
                $center2 = ($dolg_1 + $dolg_2) / 2;
                    @endphp

                <style>
                            #map{
                                height: 350px;
                                width: 100%;
                            }
                        </style>
                        <div id="map"></div>
                        <script>
                            function initMap(){
                                //Map options
                                var options = {
                                    zoom:4,
                                    center:{lat:@php echo $center1; @endphp, lng:@php echo $center2; @endphp}
                        }
                        // new map
                        var map = new google.maps.Map(document.getElementById('map'), options);
                        // customer marker
                        var iconBase = 'http://maps.google.com/mapfiles/kml/shapes/truck.png';
                        //array of Marrkeers
                        var markers = [
                        {
                        coords:{lat:@php echo $shir_1; @endphp, lng:@php echo $dolg_1; @endphp},img:iconBase,con:'<h3>@php echo $address_1; @endphp<h3>'
                                },
                                {
                                coords:{lat:@php echo $shir_2; @endphp, lng:@php echo $dolg_2; @endphp},img:iconBase,con:'<h3>@php echo $address_2; @endphp<h3>'
                                        }
                                        ];

                                        //loopthrough markers
                                        for(var i = 0; i <markers.length; i++){
                                        //add markeers
                                        addMarker(markers[i]);
                                        }

                                        //function for the plotting markers on the map
                                        function addMarker (props){
                                        var marker = new google.maps.Marker({
                                        position: props.coords,
                                        map:map,
                                        icon:props.img
                                        });
                                        var infoWindow = new google.maps.InfoWindow({
                                        content:props.con,
                                        });
                                        marker.addListener("click", () => {
                                        infoWindow.open(map, marker);
                                        });
                                        }
                                        }
                                        </script>

                                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVR9eQglFrAKCpuSWlnCV9Ao9QXEwJJCA&callback=initMap" defer></script>
                @php
                    echo'<br><br>Стартовая точка:
                    <div class="form-group">
                        '.$task->description.'';
                        if ($errors->has('description')) {
                            echo'<span class="text-danger">'.$errors->first('description').'</span>';
                        }
                        echo'<iframe width="250" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=ru&amp;geocode=&amp;q='.$task->description.'&amp;aq=0&amp;oq=199+ch&amp;ie=UTF8&amp;hq=&amp;&amp;t=m&amp;z=7&amp;output=embed"></iframe>
                    </div>
                    <br>Конечная точка:
                    <div class="form-group">
                        '.$task->description2.'';
                        if ($errors->has('description2')) {
                            echo'<span class="text-danger">'.$errors->first('description2').'</span>';
                        }
                        echo'<iframe width="250" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=ru&amp;geocode=&amp;q='.$task->description2.'&amp;aq=0&amp;oq=199+ch&amp;ie=UTF8&amp;hq=&amp;&amp;t=m&amp;z=7&amp;output=embed"></iframe>
                    </div>

                    <div class="form-group">
                        <br><a href="/admin/dashboard/" name="view" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Вернуться</a>
					</div>
                </div>
                    '.csrf_field().'
            </div>
        </div>
    </div>';
                        }
                        @endphp
                </div>
@endsection
@section('scripts')

<script>
$('#upload').on('click', function() {
    var file_data = $('#sortpicture').prop('files')[0];
    var form_data = new FormData();
    form_data.append('file', file_data);
    alert(form_data);
    $.ajax({
                url: '{{route("admin.users.uploadUsers")}}',
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
				headers: {'x-csrf-token': _token},
                type: 'post',
                success: function(php_script_response){
                    alert(php_script_response);
                }
     });
});
</script>

@parent

@endsection
