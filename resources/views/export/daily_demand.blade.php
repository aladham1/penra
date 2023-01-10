<html lang="en">
<head>

    <title></title>
</head>

<body>
<table>
    <tbody>
    <tr class="text-center" style="background-color: #bab4f6">
        <th colspan="2" rowspan="2" style="vertical-align: inherit;">Time</th>
        @for($i=1;$i<=10;$i++)
            <th colspan="2">J{{$i}}
                @if($i==5 || $i==9)
                    (Mid-area)
                @elseif($i==8)
                    (Khan Y.)
                @else
                (Gaza-area)
                @endif
            </th>
        @endfor
        @for($j=1;$j<=4;$j++)
            <th colspan="2">T{{$j}}</th>
        @endfor
        <th>Created at</th>
        <th>Action</th>
    </tr>
    <tr class="text-center" style="background-color: #fffcc2">
        @for($i=1;$i<=14;$i++)
            <td>MW</td>
            <td>PF</td>
        @endfor
    </tr>
    @foreach($reports as $report)
        <tr class="text-center">
            <td colspan="2" class="font-weight-bold">{{\Carbon\Carbon::parse($report->date)->format('H:i')}}</td>
            <td style="color: {{$report->j_1['mw'] == 0 ? 'red':''}}; background-color:  {{$report->j_1['mw'] < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_1['mw'], 2) }}</td>
            <td style="color: {{$report->j_1['pw'] == 0 ? 'red':''}}; background-color:  {{$report->j_1['pw'] < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_1['pw'],2) }}</td>
            <td style="color: {{$report->j_2['mw'] == 0 ? 'red':''}}; background-color:  {{$report->j_2['mw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_2['mw'] ,2) }}</td>
            <td style="color: {{$report->j_2['pw'] == 0 ? 'red':''}}; background-color:  {{$report->j_2['pw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_2['pw'] ,2) }}</td>
            <td style="color: {{$report->j_3['mw'] == 0 ? 'red':''}}; background-color:  {{$report->j_3['mw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_3['mw'] ,2) }}</td>
            <td style="color: {{$report->j_3['pw'] == 0 ? 'red':''}}; background-color:  {{$report->j_3['pw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_3['pw'] ,2) }}</td>
            <td style="color: {{$report->j_4['mw'] == 0 ? 'red':''}}; background-color:  {{$report->j_4['mw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_4['mw'] ,2) }}</td>
            <td style="color: {{$report->j_4['pw'] == 0 ? 'red':''}}; background-color:  {{$report->j_4['pw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_4['pw'] ,2) }}</td>
            <td style="color: {{$report->j_5['mw'] == 0 ? 'red':''}}; background-color:  {{$report->j_5['mw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_5['mw'] ,2) }}</td>
            <td style="color: {{$report->j_5['pw'] == 0 ? 'red':''}}; background-color:  {{$report->j_5['pw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_5['pw'] ,2) }}</td>
            <td style="color: {{$report->j_6['mw'] == 0 ? 'red':''}}; background-color:  {{$report->j_6['mw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_6['mw'] ,2) }}</td>
            <td style="color: {{$report->j_6['pw'] == 0 ? 'red':''}}; background-color:  {{$report->j_6['pw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_6['pw'] ,2) }}</td>
            <td style="color: {{$report->j_7['mw'] == 0 ? 'red':''}}; background-color:  {{$report->j_7['mw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_7['mw'] ,2) }}</td>
            <td style="color: {{$report->j_7['pw'] == 0 ? 'red':''}}; background-color:  {{$report->j_7['pw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_7['pw'] ,2) }}</td>
            <td style="color: {{$report->j_8['mw'] == 0 ? 'red':''}}; background-color:  {{$report->j_8['mw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_8['mw'] ,2) }}</td>
            <td style="color: {{$report->j_8['pw'] == 0 ? 'red':''}}; background-color:  {{$report->j_8['pw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_8['pw'] ,2) }}</td>
            <td style="color: {{$report->j_9['mw'] == 0 ? 'red':''}}; background-color:  {{$report->j_9['mw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_9['mw'] ,2) }}</td>
            <td style="color: {{$report->j_9['pw'] == 0 ? 'red':''}}; background-color:  {{$report->j_9['pw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_9['pw'] ,2) }}</td>
            <td style="color: {{$report->j_10['mw'] == 0 ? 'red':''}}; background-color:  {{$report->j_10['mw'] < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_10['mw'],2)  }}</td>
            <td style="color: {{$report->j_10['pw'] == 0 ? 'red':''}}; background-color:  {{$report->j_10['pw'] < 0 ? '#e7abab' : ''}}">{{ number_format($report->j_10['pw'],2)  }}</td>
            <td style="color: {{$report->t_1['mw'] == 0 ? 'red':''}}; background-color:  {{$report->t_1['mw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->t_1['mw'] ,2) }}</td>
            <td style="color: {{$report->t_1['pw'] == 0 ? 'red':''}}; background-color:  {{$report->t_1['pw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->t_1['pw'] ,2) }}</td>
            <td style="color: {{$report->t_2['mw'] == 0 ? 'red':''}}; background-color:  {{$report->t_2['mw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->t_2['mw'] ,2) }}</td>
            <td style="color: {{$report->t_2['pw'] == 0 ? 'red':''}}; background-color:  {{$report->t_2['pw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->t_2['pw'] ,2) }}</td>
            <td style="color: {{$report->t_3['mw'] == 0 ? 'red':''}}; background-color:  {{$report->t_3['mw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->t_3['mw'] ,2) }}</td>
            <td style="color: {{$report->t_3['pw'] == 0 ? 'red':''}}; background-color:  {{$report->t_3['pw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->t_3['pw'] ,2) }}</td>
            <td style="color: {{$report->t_4['mw'] == 0 ? 'red':''}}; background-color:  {{$report->t_4['mw'] < 0 ? '#e7abab' : ''}}">{{number_format( $report->t_4['mw'],2)  }}</td>
            <td style="color: {{$report->t_4['pw'] == 0 ? 'red':''}}; background-color:  {{$report->t_4['pw']  < 0 ? '#e7abab' : ''}}">{{ number_format($report->t_4['pw'] ,2) }}</td>
            <td>{{$report->created_at->format('Y-m-d H:i:s')}}</td>
            <td class="action-ic">
                {{--                                <a title="Edit" href="{{route('reports.edit',$report->id)}}"--}}
                {{--                                   class="btn btn-sm btn-clean btn-icon btn-icon-md">--}}
                {{--                                    <i class="la la-edit"></i>--}}
                {{--                                </a>--}}
                <a title="Delete" href="javascript:;"
                   class="btn btn-sm btn-clean btn-icon btn-icon-md delete">
                    <i class="la la-remove red"></i>
                    <input type="hidden" value="{{$report->id}}" class="id">
                </a>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>
</body>

</html>
