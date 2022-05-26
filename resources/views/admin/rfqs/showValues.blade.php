<div style="margin-bottom:20px;">
<div style="display:flex; align-items: center; justify-content: flex-start; width:100%; border-bottom:solid 1px #dddddd; background-color:#ffffff; padding-left:20px; padding:10px;">
    <div style="width:50px;">
    </div>
    <div style=" width:33%; font-size:13px; font-style:italic; font-weight:bold;">
        <div style="cursor:pointer;" onclick="show_route_values({{ $rfq_route_id }}, 2);">
        Название компании
        </div>
    </div>
   
    <div style="font-size:13px; width:23%; font-style:italic; font-weight:bold;">
        <div style="cursor:pointer;"  onclick="show_route_values({{ $rfq_route_id }}, 0);">
             @if($rfq_sort_type != 0)
             <i class="right fa fa-fw fa-angle-left nav-icon" style="transform: rotate(180deg);  background-color:#cccccc; border-radius:5px; margin-right:10px;"></i>
            @else
            <i class="right fa fa-fw fa-angle-left nav-icon" style="transform: rotate(270deg);  padding-top:1px;  text-align:center; border-radius:5px; color:#ffffff; background-color:#ff5050; margin-right:10px;"></i> 
             @endif 
        Квота
    </div>
    </div>
    <div style="font-size:13px; width:23%; font-style:italic; font-weight:bold;">
        <div style="cursor:pointer;" onclick="show_route_values({{ $rfq_route_id }}, 1);">
            @if($rfq_sort_type != 1)
            <i class="right fa fa-fw fa-angle-left nav-icon" style="transform: rotate(180deg);  text-align:center; border-radius:5px; background-color:#cccccc; margin-right:10px;"></i>
             @else
            <i class="right fa fa-fw fa-angle-left nav-icon" style="transform: rotate(270deg);  padding-top:1px;  text-align:center; border-radius:5px; color:#ffffff; background-color:#ff5050; margin-right:10px;"></i> 
             @endif 
        Тариф
    </div>
    </div>
</div>
@foreach($rfq_route_values as $item)
<div style="display:flex; align-items: center; justify-content: flex-start; width:100%; border-bottom:solid 1px #dddddd; background-color:#eeeeee; padding-left:20px; padding:10px;">
    <div style="width:50px;">
    </div>
    <div style=" width:33%; padding-left:0px;">
        <b>{{ $item['company']['hortname'] }}</b>
    </div>
   
    <div style="font-size:14px; width:23%;">
        <div style="font-weight:bold; padding-left:30px;">{{ $item['quota'] }}</div>
    </div>
    <div style="font-size:14px; width:23%;">
        <div style="font-weight:bold; padding-left:30px;">{{ $item['tarif'] }}</div>
    </div>
</div>
@endforeach
</div>