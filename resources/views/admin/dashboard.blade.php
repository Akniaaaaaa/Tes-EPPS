@extends('layout/admin')
@section('container')
    
<div id="chartPeserta">

</div>
@endsection

@section('grafik')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('chartPeserta', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Peserta Tes EPPS di Sahabat Psikologi'
    },
    subtitle: {
        text: ' Tahun 2021'
    },
    xAxis: {
        categories: {!!json_encode($bulan)!!},
        // categories: [
        //     'Jan',
        //     'Feb',
        //     'Mar',
        //     'Apr',
        //     'May',
        //     'Jun',
        //     'Jul',
        //     'Aug',
        //     'Sep',
        //     'Oct',
        //     'Nov',
        //     'Dec'
        // ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Peserta'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Peserta',
        data: {!!json_encode($data)!!}

    }]
});
</script>
@endsection