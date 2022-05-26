     
<table class="table table-bordered table-striped">
    <tbody>
        <tr> 
            <th style="padding-top:5px; padding-bottom:5px;">
                Дата
            </th>
            <td style="padding-top:5px; padding-bottom:5px;">
                Пользователь
            </td>
            <td style="padding-top:5px; padding-bottom:5px;">
                Событие
            </td>
        </tr>
        @foreach($history as $item)
        	<tr>
            <td>
                {{ \Carbon\Carbon::parse($item['created_at'])->format('d/m/Y h:i')}}
            </td>
            <td>
                {{ $item['user']['surname'] }} {{ $item['user']['name'] }} {{ $item['user']['oth'] }}
            </td>
             <td>
                {{ $item['comment'] }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
          

