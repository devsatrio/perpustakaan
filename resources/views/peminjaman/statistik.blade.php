@extends('layouts.master')
@section('css')
@endsection
@section('content')
<div id="page-content">
    <div class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>Grafik Tanggal {{$tgl_satu}} Sampai {{$tgl_dua}}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="block full">
                <div class="block-title">
                    <h2>Pembaca & Peminjam</h2>
                </div>
                <div id="chart-classic" style="height: 380px;"></div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
var CompCharts = function() {
    return {
        init: function() {

            var chartClassic = $('#chart-classic');
            var chartPie = $('#chart-pie');
            var dataEarnings = [
                <?php
                $nomornya=1;
                $a = $tgl_satu;
                $b = $tgl_dua;
                
                $i = date("Ym", strtotime($a));
                while($i <= date("Ym", strtotime($b))){
                    $jumlah = 
                    DB::table('pinjam')
                    ->whereMonth('tgl_pinjam',substr($i,4))
                    ->whereYear('tgl_pinjam',substr($i,0,4))
                    ->count();
                    echo "[".$nomornya++.",".$jumlah."],";
                    if(substr($i, 4, 2) == "12")
                        $i = (date("Y", strtotime($i."01")) + 1)."01";
                    else
                        $i++;
                }?>
            ];
            var dataSales = [
                <?php
                $nomornya=1;
                $a = $tgl_satu;
                $b = $tgl_dua;
                
                $i = date("Ym", strtotime($a));
                while($i <= date("Ym", strtotime($b))){
                    $jumlah = 
                    DB::table('baca')
                    ->whereMonth('tanggal',substr($i,4))
                    ->whereYear('tanggal',substr($i,0,4))
                    ->count();
                    echo "[".$nomornya++.",".$jumlah."],";
                    if(substr($i, 4, 2) == "12")
                        $i = (date("Y", strtotime($i."01")) + 1)."01";
                    else
                        $i++;
                }?>
            ];
            var dataMonths = [
                <?php
                $nomornya=1;
                $a = $tgl_satu;
                $b = $tgl_dua;
                
                $i = date("Ym", strtotime($a));
                while($i <= date("Ym", strtotime($b))){
                    $newDate = substr($i,4)."-".substr($i,0,4);
                    echo "[".$nomornya++.",'".$newDate."'],";
                    if(substr($i, 4, 2) == "12")
                        $i = (date("Y", strtotime($i."01")) + 1)."01";
                    else
                        $i++;
                }?>
            ];
            $.plot(chartClassic,
                [{
                        label: 'Buku',
                        data: dataEarnings,
                        lines: {
                            show: true,
                            fill: true,
                            fillColor: {
                                colors: [{
                                    opacity: .6
                                }, {
                                    opacity: .6
                                }]
                            }
                        },
                        points: {
                            show: true,
                            radius: 5
                        }
                    },
                    {
                        label: 'Ebook',
                        data: dataSales,
                        lines: {
                            show: true,
                            fill: true,
                            fillColor: {
                                colors: [{
                                    opacity: .2
                                }, {
                                    opacity: .2
                                }]
                            }
                        },
                        points: {
                            show: true,
                            radius: 5
                        }
                    }
                ], {
                    colors: ['#5ccdde', '#454e59', '#ffffff'],
                    legend: {
                        show: true,
                        position: 'nw',
                        backgroundOpacity: 0
                    },
                    grid: {
                        borderWidth: 0,
                        hoverable: true,
                        clickable: true
                    },
                    yaxis: {
                        tickColor: '#f5f5f5',
                        ticks: 3
                    },
                    xaxis: {
                        ticks: dataMonths,
                        tickColor: '#f5f5f5'
                    }
                }
            );

            // Creating and attaching a tooltip to the classic chart
            var previousPoint = null,
                ttlabel = null;
            chartClassic.bind('plothover', function(event, pos, item) {

                if (item) {
                    if (previousPoint !== item.dataIndex) {
                        previousPoint = item.dataIndex;

                        $('#chart-tooltip').remove();
                        var x = item.datapoint[0],
                            y = item.datapoint[1];

                        if (item.seriesIndex === 0) {
                            ttlabel = '<strong>' + y + ' Peminjaman</strong>';
                        } else if (item.seriesIndex === 1) {
                            ttlabel = '<strong>' + y + ' Pembaca</strong>';
                        }

                        $('<div id="chart-tooltip" class="chart-tooltip">' + ttlabel + '</div>')
                            .css({
                                top: item.pageY - 45,
                                left: item.pageX + 5
                            }).appendTo("body").show();
                    }
                } else {
                    $('#chart-tooltip').remove();
                    previousPoint = null;
                }
            });
        }
    };
}();
</script>
<script>
$(function() {
    CompCharts.init();
});
</script>
@endsection