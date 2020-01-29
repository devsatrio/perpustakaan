@extends('layouts.master')

@section('content')
<!-- Page content -->
<div id="page-content">
    <!-- First Row -->
    <div class="row">
        <!-- Simple Stats Widgets -->
        <div class="col-sm-6 col-lg-4">
            <a href="javascript:void(0)" class="widget">
                <div class="widget-content widget-content-mini text-right clearfix">
                    <div class="widget-icon pull-left themed-background">
                        <i class="fa fa-book text-light-op"></i>
                    </div>
                    <h2 class="widget-heading h3">
                        <strong><span data-toggle="counter" data-to="{{$jumlah_buku}}"></span></strong>
                    </h2>
                    <span class="text-muted">Buku</span>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-4">
            <a href="javascript:void(0)" class="widget">
                <div class="widget-content widget-content-mini text-right clearfix">
                    <div class="widget-icon pull-left themed-background-success">
                        <i class="fa fa-file text-light-op"></i>
                    </div>
                    <h2 class="widget-heading h3 text-success">
                        <strong><span data-toggle="counter" data-to="{{$jumlah_ebook}}"></span></strong>
                    </h2>
                    <span class="text-muted">Ebook</span>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-4">
            <a href="javascript:void(0)" class="widget">
                <div class="widget-content widget-content-mini text-right clearfix">
                    <div class="widget-icon pull-left themed-background-warning">
                        <i class="fa fa-users text-light-op"></i>
                    </div>
                    <h2 class="widget-heading h3 text-warning">
                        <strong><span data-toggle="counter" data-to="{{$jumlah_anggota}}"></span></strong>
                    </h2>
                    <span class="text-muted">Anggota</span>
                </div>
            </a>
        </div>
        <!-- <div class="col-sm-6 col-lg-3">
                                <a href="javascript:void(0)" class="widget">
                                    <div class="widget-content widget-content-mini text-right clearfix">
                                        <div class="widget-icon pull-left themed-background-danger">
                                            <i class="gi gi-wallet text-light-op"></i>
                                        </div>
                                        <h2 class="widget-heading h3 text-danger">
                                            <strong>$ <span data-toggle="counter" data-to="5820"></span></strong>
                                        </h2>
                                        <span class="text-muted">EARNINGS</span>
                                    </div>
                                </a>
                            </div> -->
        <!-- END Simple Stats Widgets -->
    </div>
    <!-- END First Row -->

    <!-- Second Row -->
    <div class="row">
        <div class="col-sm-8 col-lg-8">
            <!-- Chart Widget -->
            <div class="widget">
                <div class="widget-content border-bottom">
                    Peminjam Minggu Ini
                </div>
                <div class="widget-content border-bottom themed-background-muted">
                    <!-- Flot Charts (initialized in js/pages/readyDashboard.js), for more examples you can check out http://www.flotcharts.org/ -->
                    <div id="chart-classic-dash" style="height: 393px;"></div>
                </div>

            </div>
            <!-- END Chart Widget -->
        </div>
        <div class="col-sm-4">
            <a href="javascript:void(0)" class="widget">
                <div class="widget-content text-center themed-background-dark text-light-op">
                    <strong>Buku Sedang Dipinjam</strong>
                </div>
                <div class="widget-content themed-background-muted text-center">
                    <i class="fa fa-book fa-3x text-dark"></i>
                    <h2 class="widget-heading text-dark">{{$jumlah_pinjam}} Buku</h2>
                </div>
            </a>
        </div>
    </div>
    <!-- END Second Row -->

</div>
<!-- END Page Content -->



@endsection
@section('js')
<script>
$(function() {
    $('[data-toggle="counter"]').each(function() {
        var $this = $(this);

        $this.countTo({
            speed: 1000,
            refreshInterval: 25,
            onComplete: function() {
                if ($this.data('after')) {
                    $this.html($this.html() + $this.data('after'));
                }
            }
        });
    });
    var chartClassicDash = $('#chart-classic-dash');

    // Data for the chart
    var dataEarnings = [
        @php
        $date = date('Y-m-d');
        $waktu = strtotime($date);
        $nomornya = 1;
        for ($i = 6; $i >= 0; $i--) {
            $minus = strtotime("-".$i.
                " days", $waktu);
            $hasil = date('Y-m-d', $minus);
            $jumlah = DB::table('pinjam')->where([
                ['tgl_pinjam', $hasil]
            ])->count();
            echo "[".$nomornya++.
            ",".$jumlah.
            "],";
        }
        @endphp
    ];

    var dataMonths = [
        @php
        $tgl = date('d-m-Y');
        $waktu = strtotime($tgl);
        $nomornya = 1;
        for ($i = 6; $i >= 0; $i--) {
            $minus = strtotime("-".$i.
                " days", $waktu);
            $hasil = date('d-m-Y', $minus);
            echo '['.$nomornya++.
            ',"'.$hasil.
            '"],';
        }

        @endphp
    ];

    // Classic Chart
    $.plot(chartClassicDash,
        [{
            label: 'Peminjaman',
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
        }], {
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
                show: false,
                tickColor: '#f5f5f5',
                ticks: 3
            },
            xaxis: {
                ticks: dataMonths,
                tickColor: '#f9f9f9'
            }
        }
    );

    // Creating and attaching a tooltip to the classic chart
    var previousPoint = null,
        ttlabel = null;
    chartClassicDash.bind('plothover', function(event, pos, item) {

        if (item) {
            if (previousPoint !== item.dataIndex) {
                previousPoint = item.dataIndex;

                $('#chart-tooltip').remove();
                var x = item.datapoint[0],
                    y = item.datapoint[1];

                if (item.seriesIndex === 0) {
                    ttlabel = '<strong>' + y + ' Peminjaman </strong>';
                } else if (item.seriesIndex === 1) {
                    ttlabel = '<strong>' + y + '</strong> sales';
                } else {
                    ttlabel = '<strong>' + y + '</strong> tickets';
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
    // ReadyDashboard.init();
});
</script>
@endsection