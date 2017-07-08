@extends('admin.layout.master')

@section('breadcrumbs')
<ul class="page-breadcrumb">
    <li>
        <a href="#">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="{{url('')}}/admin/dashboard">Dashboard</a>
    </li>
</ul>
@endsection

@section('title')
<h1 class="page-title"> Admin Dashboard
    <small>statistics, charts, recent events and reports</small>
</h1>
@endsection

@section('content')

<!-- BEGIN DASHBOARD STATS 1-->
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
            <div class="visual">
                <i class="fa fa-comments"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="{{$contact}}">0</span>
                </div>
                <div class="desc"> Interested Leads </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 red" href="#">
            <div class="visual">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="{{$orders_products->sum('amount') - $orders_products->sum('transaction_fee')}}"></span>$ </div>
                <div class="desc"> Product Profit </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 green" href="#">
            <div class="visual">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="{{isset($orders[\Carbon\Carbon::now()->format('M y')]) ? count($orders[\Carbon\Carbon::now()->format('M y')]) : 0}}">0</span>
                </div>
                <div class="desc"> New Orders this Month </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
            <div class="visual">
                <i class="fa fa-globe"></i>
            </div>
            <div class="details">
                <div class="number"> 
                    <span data-counter="counterup" data-value="{{$members}}"></span> </div>
                <div class="desc"> New Members past month </div>
            </div>
        </a>
    </div>
</div>
<div class="clearfix"></div>
<!-- END DASHBOARD STATS 1-->

<div class="row">
    <div class="col-lg-6 col-xs-12 col-sm-12">
        <!-- BEGIN PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bar-chart font-dark hide"></i>
                    <span class="caption-subject font-dark bold uppercase">Site Views</span>
                    <span class="caption-helper">weekly stats...</span>
                </div>
                {{-- <div class="actions">
                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                        <ul class="nav nav-tabs">
                          <li class="toggle active"><a data-toggle="tab" href="#new">New</a></li>
                          <li class="toggle"><a data-toggle="tab" href="#returning">Returning</a></li>
                        </ul>
                        <label class="btn red btn-outline btn-circle btn-sm active">
                            <input type="radio" data-toggle="tab"   class="toggle" id="option1">New</label>
                        <label class="btn red btn-outline btn-circle btn-sm">
                            <input type="radio" class="toggle" id="option2">Returning</label>
                    </div>
                </div> --}}
            </div>
            
            <div class="portlet-body">
                <div id="site_statistics_loading">
                    <img src="../assets/global/img/loading.gif" alt="loading" /> </div>
                <div id="site_statistics_content" >
                    <div id="site_statistics" class="chart"> </div>
                </div>
            </div>

                
            
        </div>
        <!-- END PORTLET-->
        <!-- Products -->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-share font-red-sunglo hide"></i>
                    <span class="caption-subject font-dark bold uppercase">Product Revenue</span>
                    <span class="caption-helper">monthly stats...</span>
                </div>
            </div>
            <div class="portlet-body">
                <div id="site_activities_loading_products">
                    <img src="../assets/global/img/loading.gif" alt="loading" /> </div>
                <div id="site_activities_content_products" class="display-none">
                    <div id="site_activities_products" style="height: 228px;"> </div>
                </div>
                <div style="margin: 20px 0 10px 30px">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                            <span class="label label-sm label-success"> Product Revenue: </span>
                            <h3>${{$orders_products->sum('amount')}}</h3>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                            <span class="label label-sm label-info"> Transaction fee: </span>
                            <h3>${{$orders_products->sum('transaction_fee')}}</h3>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                            <span class="label label-sm label-warning"> Orders: </span>
                            <h3>{{count($orders_products)}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </div>

        

    
    <div class="col-lg-6 col-xs-12 col-sm-12">
        <!-- BEGIN PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-share font-red-sunglo hide"></i>
                    <span class="caption-subject font-dark bold uppercase">Revenue</span>
                    <span class="caption-helper">monthly stats...</span>
                </div>
            </div>
            <div class="portlet-body">
                <div id="site_activities_loading">
                    <img src="../assets/global/img/loading.gif" alt="loading" /> </div>
                <div id="site_activities_content" class="display-none">
                    <div id="site_activities" style="height: 228px;"> </div>
                </div>
                <div style="margin: 20px 0 10px 30px">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                            <span class="label label-sm label-success"> Total Revenue: </span>
                            <h3>${{$orders_all->sum('amount')}}</h3>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                            <span class="label label-sm label-info"> Transaction fee: </span>
                            <h3>${{$orders_products->sum('transaction_fee')}}</h3>
                        </div>
                        
                        <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                            <span class="label label-sm label-warning"> Orders: </span>
                            <h3>{{count($orders_all)}}</h3>
                        </div>

                        <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                            <span class="label label-sm label-danger"> Discount: </span>
                            <h3>{{$orders_all->where('coupon_id', '!=', '0')->sum('discount_amount')}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- subscription -->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-share font-red-sunglo hide"></i>
                    <span class="caption-subject font-dark bold uppercase">Subscription Revenue</span>
                    <span class="caption-helper">monthly stats...</span>
                </div>
            </div>
            <div class="portlet-body">
                <div id="site_activities_loading_subscription">
                    <img src="../assets/global/img/loading.gif" alt="loading" /> </div>
                <div id="site_activities_content_subscription" class="display-none">
                    <div id="site_activities_subscription" style="height: 228px;"> </div>
                </div>
                <div style="margin: 20px 0 10px 30px">
                    <div class="row">
                        
                        <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                            <span class="label label-sm label-danger"> Subscription Revenue: </span>
                            <h3>{{$orders_subscription->sum('amount')}}</h3>
                        </div>

                        <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                            
                        </div>
                        
                        <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                            <span class="label label-sm label-warning"> Orders: </span>
                            <h3>{{count($orders_subscription)}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    
    <div class="col-lg-12 col-xs-12 col-sm-12">
        <!-- BEGIN CHART PORTLET-->
        <div class="portlet light portlet-fit bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject font-dark sbold uppercase">Coupons</span>
                </div>
                
            </div>
            <div class="portlet-body laxmi-mata" style="height: 420px !important;">
                <div id="chart_2_line" class="chart"> </div>
            </div>
        </div>
        <!-- END CHART PORTLET-->
    </div>
        

    <div class="col-lg-6 col-xs-12 col-sm-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bar-chart font-green-haze"></i>
                    <span class="caption-subject bold uppercase font-green-haze"> Coupons Usage</span>
                    <span class="caption-helper">Past year</span>
                </div>
                
            </div>
            <div class="portlet-body">
                <div id="chart_5" class="chart" style="height: 400px;"> </div>
                
            </div>
        </div>
            <!-- BEGIN REGIONAL STATS PORTLET-->
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-share font-dark hide"></i>
                    <span class="caption-subject font-dark bold uppercase">Regional Stats</span>
                </div>
            </div>
            <div class="portlet-body">
                <div id="region_statistics_loading">
                    <img src="../assets/global/img/loading.gif" alt="loading" /> </div>
                <div id="region_statistics_content" class="display-none">
                    <div class="btn-toolbar margin-bottom-10">
                        <div class="btn-group btn-group-circle" data-toggle="buttons">
                            <a href="" class="btn grey-salsa btn-sm active"> Users </a>
                            <a href="" class="btn grey-salsa btn-sm"> Orders </a>
                        </div>
                        
                    </div>
                    <div id="vmap_world" class="vmaps display-none"> </div>
                    
                </div>
            </div>
        </div>
        <!-- END REGIONAL STATS PORTLET-->
    </div>
    <div class="col-lg-6 col-xs-12 col-sm-12">
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-cursor font-dark hide"></i>
                    <span class="caption-subject font-dark bold uppercase">General Stats</span>
                </div>
            </div>
            <div class="portlet-body" style="height: 408px;">
                <div class="row">
                    <div class="col-md-4">
                        <div class="easy-pie-chart">
                            <div class="number transactions" data-percent="100">
                                <span>{{$duration_per_session}}</span></div>
                            <a class="title" href="javascript:;"> Duration Per Session
                            </a>
                        </div>
                    </div>
                    <div class="margin-bottom-10 visible-sm"> </div>
                    <?php 
                        $count = 0;
                        if(count($return_visitors) == 1){
                            $count = count($return_visitors);
                            $return_visitors[1][1] = 0;
                            $return_visitors[1][0] = "";
                        }
                    ?>
                    <div class="col-md-4">
                        <div class="easy-pie-chart">
                            <div class="number visits" data-percent="
                            @if($count == 1)
                            0
                            @else
                            {{round((@$return_visitors[0][1]/(@$return_visitors[0][1] + @$return_visitors[1][1]))*100, 2)}}
                            @endif
                            ">
                                <span>
                                @if($count == 1)
                                0
                                @else
                                {{round((@$return_visitors[0][1]/(@$return_visitors[0][1] + @$return_visitors[1][1]))*100, 2)}}
                                @endif</span>% </div>
                            <a class="title" href="javascript:;"> New Visits
                            </a>
                        </div>
                    </div>

                    <div class="margin-bottom-10 visible-sm"> </div>

                    <div class="col-md-4">
                        <div class="easy-pie-chart">
                            <div class="number bounce" data-percent="
                            @if($count == 1)
                            100
                            @else
                            {{round((@$return_visitors[1][1]/(@$return_visitors[0][1] + @$return_visitors[1][1]))*100, 2)}}
                            @endif
                            ">
                                <span>
                                @if($count == 1)
                                100
                                @else
                                {{round((@$return_visitors[1][1]/(@$return_visitors[0][1] + @$return_visitors[1][1]))*100, 2)}}
                                @endif</span>% </div>
                            <a class="title" href="javascript:;"> Return Visits
                            </a>
                        </div>
                    </div>
                    
                    <div class="margin-bottom-10 visible-sm"> </div>
                    
                    <div class="col-md-4">
                        <div class="easy-pie-chart">
                            <div class="number bounce" data-percent="{{@$bounce_rate}}">
                                <span>{{@$bounce_rate}}</span>% </div>
                            <a class="title" href="javascript:;"> Bounce Rate
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption ">
                    <span class="caption-subject font-dark bold uppercase">Visitors Countries</span>
                    <span class="caption-helper">distance stats...</span>
                </div>
            </div>
            <div class="portlet-body" style="height: 510px;">
                <div id="dashboard_amchart_5" class="CSSAnimationChart"></div>
                
            </div>
        </div>
        <!-- END PORTLET-->
    </div>

</div>                     
@endsection

@section('footer_scripts')
<script src="{{url('')}}/assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>

<script src="{{url('')}}/assets/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
<script src="{{url('')}}/js/scripts/charts-amcharts.js" type="text/javascript"></script>


<script src="{{url('')}}/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/global/plugins/flot/jquery.flot.pie.min.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/global/plugins/flot/jquery.flot.stack.min.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/global/plugins/flot/jquery.flot.crosshair.min.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/global/plugins/flot/jquery.flot.axislabels.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script type="text/javascript">
    var ChartsFlotcharts = function() {

    return {
        //main function to initiate the module

        init: function() {

            App.addResizeHandler(function() {
                Charts.initPieCharts();
            });

        },

        initCharts: function() {

            if (!jQuery.plot) {
                return;
            }

            var data = [];
            var totalPoints = 250;

            // random data generator for plot charts

            function getRandomData() {
                if (data.length > 0) data = data.slice(1);
                // do a random walk
                while (data.length < totalPoints) {
                    var prev = data.length > 0 ? data[data.length - 1] : 50;
                    var y = prev + Math.random() * 10 - 5;
                    if (y < 0) y = 0;
                    if (y > 100) y = 100;
                    data.push(y);
                }
                // zip the generated y values with the x values
                var res = [];
                for (var i = 0; i < data.length; ++i) {
                    res.push([i, data[i]]);
                }

                return res;
            }


            //Interactive Chart

            function chart2() {
                if ($('#chart_2_line').size() != 1) {
                    return;
                }

                // function randValue() {
                //     return (Math.floor(Math.random() * (1 + 40 - 20))) + 20;
                // }

                <?php
                foreach ($coupons_all as $coupon) {
                ?>
                var <?php echo $coupon->coupon_name; ?> = [
                <?php
                    $c = $orders_all->where('coupon_id', $coupon->id)->groupBy(function($item){
                                return $item->created_at->format('M y');
                            });

                    foreach ($c as $key => $value) {
                ?>
                        ["<?php echo $key; ?>", <?php echo $value->count(); ?> ],
                <?php
                    }

                ?>
                ];
                <?php   
                }
                ?>

                var plot = $.plot($("#chart_2_line"), [
                <?php foreach ($coupons_all as $coup) {
                ?>
                    {
                        data: <?php echo $coup->coupon_name; ?>,
                        label: "<?php echo $coup->coupon_name; ?>",
                        lines: {
                            lineWidth: 1,
                        },
                        shadowSize: 0

                    }, 
                <?php
                }
                ?>
                ], {
                    series: {
                        lines: {
                            show: true,
                            lineWidth: 2,
                            fill: true,
                            fillColor: {
                                colors: [{
                                    opacity: 0.05
                                }, {
                                    opacity: 0.01
                                }]
                            }
                        },
                        points: {
                            show: true,
                            radius: 3,
                            lineWidth: 1
                        },
                        shadowSize: 2
                    },
                    grid: {
                        hoverable: true,
                        clickable: true,
                        tickColor: "#eee",
                        borderColor: "#eee",
                        borderWidth: 1
                    },
                    colors: ["#d12610", "#37b7f3", "#52e136", "#ede915", "#1520ed", "#f943c0", "#f4464f"],
                    xaxis: {
                            tickLength: 0,
                            tickDecimals: 0,
                            mode: "categories",
                            min: 0,
                            font: {
                                lineHeight: 14,
                                style: "normal",
                                variant: "small-caps",
                                color: "#6F7B8A"
                            }
                        },
                    yaxis: {
                        ticks: 11,
                        tickDecimals: 0,
                        tickColor: "#eee",
                    }
                });


                function showTooltip(x, y, contents) {
                    $('<div id="tooltip">' + contents + '</div>').css({
                        position: 'absolute',
                        display: 'none',
                        top: y + 5,
                        left: x + 15,
                        border: '1px solid #333',
                        padding: '4px',
                        color: '#fff',
                        'border-radius': '3px',
                        'background-color': '#333',
                        opacity: 0.80
                    }).appendTo("body").fadeIn(200);
                }

                var previousPoint = null;
                $("#chart_2_line").bind("plothover", function(event, pos, item) {
                    $("#x").text(pos.x.toFixed(2));
                    $("#y").text(pos.y.toFixed(2));

                    if (item) {
                        if (previousPoint != item.dataIndex) {
                            previousPoint = item.dataIndex;

                            $("#tooltip").remove();
                            var x = item.datapoint[0].toFixed(2),
                                y = item.datapoint[1].toFixed(2);

                            showTooltip(item.pageX, item.pageY, item.series.label + " of " + x + " = " + y);
                        }
                    } else {
                        $("#tooltip").remove();
                        previousPoint = null;
                    }
                });
            }

            //graph
            
            chart2();

        },


    };
}();

jQuery(document).ready(function() {    
    ChartsFlotcharts.init();
    ChartsFlotcharts.initCharts();
});
</script>


<script src="{{url('')}}/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>

<script src="{{url('')}}/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>

<script src="{{url('')}}/assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{url('')}}/js/scripts/dashboard.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->

<script src="{{url('')}}/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<script src="{{url('')}}/assets/pages/scripts/table-datatables-buttons.min.js" type="text/javascript"></script>

<script type="text/javascript">
    var Dashboard = function() {

    return {

        initJQVMAP: function() {
            if (!jQuery().vectorMap) {
                return;
            }

            var showMap = function(name) {
                jQuery('.vmaps').hide();
                jQuery('#vmap_' + name).show();
            }

            var setMap = function(name) {
                var map = jQuery('#vmap_' + name);
                
                if (map.size() !== 1) {
                    return;
                }

                var data = {
                    map: 'world_en',
                    backgroundColor: null,
                    borderColor: '#333333',
                    borderOpacity: 0.5,
                    borderWidth: 1,
                    color: '#c6c6c6',
                    enableZoom: true,
                    hoverColor: '#c9dfaf',
                    hoverOpacity: null,
                    values: sample_data,
                    normalizeFunction: 'linear',
                    scaleColors: ['#b6da93', '#909cae'],
                    selectedColor: '#c9dfaf',
                    selectedRegion: null,
                    showTooltip: true,
                    onLabelShow: function(event, label, code) {

                    },
                    onRegionOver: function(event, code) {
                        if (code == 'ca') {
                            event.preventDefault();
                        }
                    },
                    onRegionClick: function(element, code, region) {
                        var message = 'You clicked "' + region + '" which has the code: ' + code.toUpperCase();
                        alert(message);
                    }
                };

                data.map = name + '_en';
              
                map.width(map.parent().parent().width());
                map.show();
                map.vectorMap(data);
                map.hide();
            }

            setMap("world");
            
            showMap("world");

            jQuery('#regional_stat_world').click(function() {
                showMap("world");
            });

            $('#region_statistics_loading').hide();
            $('#region_statistics_content').show();

            App.addResizeHandler(function() {
                jQuery('.vmaps').each(function() {
                    var map = jQuery(this);
                    map.width(map.parent().width());
                });
            });
        },

        initCharts: function() {
            if (!jQuery.plot) {
                return;
            }

            function showChartTooltip(x, y, xValue, yValue) {
                $('<div id="tooltip" class="chart-tooltip">' + yValue + '<\/div>').css({
                    position: 'absolute',
                    display: 'none',
                    top: y - 40,
                    left: x - 40,
                    border: '0px solid #ccc',
                    padding: '2px 6px',
                    'background-color': '#fff'
                }).appendTo("body").fadeIn(200);
            }

            var data = [];
            var totalPoints = 250;

            // random data generator for plot charts

            function getRandomData() {
                if (data.length > 0) data = data.slice(1);
                // do a random walk
                while (data.length < totalPoints) {
                    var prev = data.length > 0 ? data[data.length - 1] : 50;
                    var y = prev + Math.random() * 10 - 5;
                    if (y < 0) y = 0;
                    if (y > 100) y = 100;
                    data.push(y);
                }
                // zip the generated y values with the x values
                var res = [];
                for (var i = 0; i < data.length; ++i) res.push([i, data[i]])
                return res;
            }

            function randValue() {
                return (Math.floor(Math.random() * (1 + 50 - 20))) + 10;
            }

            var visitors = [
                <?php 

                foreach ($visitors as $key => $value) {
                ?>
                    ['<?php echo $key ?>', '<?php echo $value; ?>'],
                <?php        
                } 

                ?>
            ];


            if ($('#site_statistics').size() != 0) {

                $('#site_statistics_loading').hide();
                $('#site_statistics_content').show();

                var plot_statistics = $.plot($("#site_statistics"), [{
                        data: visitors,
                        lines: {
                            fill: 0.6,
                            lineWidth: 0
                        },
                        color: ['#f89f9f']
                    }, {
                        data: visitors,
                        points: {
                            show: true,
                            fill: true,
                            radius: 5,
                            fillColor: "#f89f9f",
                            lineWidth: 3
                        },
                        color: '#fff',
                        shadowSize: 0
                    }],

                    {
                        xaxis: {
                            tickLength: 0,
                            tickDecimals: 0,
                            mode: "categories",
                            min: 0,
                            font: {
                                lineHeight: 14,
                                style: "normal",
                                variant: "small-caps",
                                color: "#6F7B8A"
                            }
                        },
                        yaxis: {
                            ticks: 5,
                            tickDecimals: 0,
                            tickColor: "#eee",
                            font: {
                                lineHeight: 14,
                                style: "normal",
                                variant: "small-caps",
                                color: "#6F7B8A"
                            }
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            tickColor: "#eee",
                            borderColor: "#eee",
                            borderWidth: 1
                        }
                    });

                var previousPoint = null;
                $("#site_statistics").bind("plothover", function(event, pos, item) {
                    $("#x").text(pos.x.toFixed(2));
                    $("#y").text(pos.y.toFixed(2));
                    if (item) {
                        if (previousPoint != item.dataIndex) {
                            previousPoint = item.dataIndex;

                            $("#tooltip").remove();
                            var x = item.datapoint[0].toFixed(2),
                                y = item.datapoint[1].toFixed(2);

                            showChartTooltip(item.pageX, item.pageY, item.datapoint[0], item.datapoint[1] + ' views');
                        }
                    } else {
                        $("#tooltip").remove();
                        previousPoint = null;
                    }
                });
            }


            if ($('#site_activities').size() != 0) {
                //site activities
                var previousPoint2 = null;
                $('#site_activities_loading').hide();
                $('#site_activities_content').show();

                var data1 = [
                    <?php 

                    foreach ($orders as $key => $value) {
                    ?>
                        ['<?php echo $key ?>', '<?php echo (isset($orders[$key]) ? $orders[$key]->sum('amount') : 0) ?>'],
                    <?php        
                    } 

                    ?>

                ];


                var plot_statistics = $.plot($("#site_activities"),

                    [{
                        data: data1,
                        lines: {
                            fill: 0.2,
                            lineWidth: 0,
                        },
                        color: ['#BAD9F5']
                    }, {
                        data: data1,
                        points: {
                            show: true,
                            fill: true,
                            radius: 4,
                            fillColor: "#9ACAE6",
                            lineWidth: 2
                        },
                        color: '#9ACAE6',
                        shadowSize: 1
                    }, {
                        data: data1,
                        lines: {
                            show: true,
                            fill: false,
                            lineWidth: 3
                        },
                        color: '#9ACAE6',
                        shadowSize: 0
                    }],

                    {

                        xaxis: {
                            tickLength: 0,
                            tickDecimals: 0,
                            mode: "categories",
                            min: 0,
                            font: {
                                lineHeight: 18,
                                style: "normal",
                                variant: "small-caps",
                                color: "#6F7B8A"
                            }
                        },
                        yaxis: {
                            ticks: 5,
                            tickDecimals: 0,
                            tickColor: "#eee",
                            font: {
                                lineHeight: 14,
                                style: "normal",
                                variant: "small-caps",
                                color: "#6F7B8A"
                            }
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            tickColor: "#eee",
                            borderColor: "#eee",
                            borderWidth: 1
                        }
                    });

                $("#site_activities").bind("plothover", function(event, pos, item) {
                    $("#x").text(pos.x.toFixed(2));
                    $("#y").text(pos.y.toFixed(2));
                    if (item) {
                        if (previousPoint2 != item.dataIndex) {
                            previousPoint2 = item.dataIndex;
                            $("#tooltip").remove();
                            var x = item.datapoint[0].toFixed(2),
                                y = item.datapoint[1].toFixed(2);
                            showChartTooltip(item.pageX, item.pageY, item.datapoint[0], item.datapoint[1] + '$');
                        }
                    }
                });

                $('#site_activities').bind("mouseleave", function() {
                    $("#tooltip").remove();
                });
            }

            

            if ($('#site_activities_products').size() != 0) {
                //site activities
                var previousPoint2 = null;
                $('#site_activities_loading_products').hide();
                $('#site_activities_content_products').show();

                var data1 = [
                    <?php 

                    foreach ($orders_products->groupBy(function($item){
                        return $item->created_at->format('M y');
                    }) as $key => $value) {
                    ?>
                        ['<?php echo $key ?>', '<?php echo (isset($orders[$key]) ? $orders[$key]->sum('amount') : 0) ?>'],
                    <?php        
                    } 

                    ?>

                ];


                var plot_statistics = $.plot($("#site_activities_products"),

                    [{
                        data: data1,
                        lines: {
                            fill: 0.2,
                            lineWidth: 0,
                        },
                        color: ['#BAD9F5']
                    }, {
                        data: data1,
                        points: {
                            show: true,
                            fill: true,
                            radius: 4,
                            fillColor: "#9ACAE6",
                            lineWidth: 2
                        },
                        color: '#9ACAE6',
                        shadowSize: 1
                    }, {
                        data: data1,
                        lines: {
                            show: true,
                            fill: false,
                            lineWidth: 3
                        },
                        color: '#9ACAE6',
                        shadowSize: 0
                    }],

                    {

                        xaxis: {
                            tickLength: 0,
                            tickDecimals: 0,
                            mode: "categories",
                            min: 0,
                            font: {
                                lineHeight: 18,
                                style: "normal",
                                variant: "small-caps",
                                color: "#6F7B8A"
                            }
                        },
                        yaxis: {
                            ticks: 5,
                            tickDecimals: 0,
                            tickColor: "#eee",
                            font: {
                                lineHeight: 14,
                                style: "normal",
                                variant: "small-caps",
                                color: "#6F7B8A"
                            }
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            tickColor: "#eee",
                            borderColor: "#eee",
                            borderWidth: 1
                        }
                    });

                $("#site_activities_products").bind("plothover", function(event, pos, item) {
                    $("#x").text(pos.x.toFixed(2));
                    $("#y").text(pos.y.toFixed(2));
                    if (item) {
                        if (previousPoint2 != item.dataIndex) {
                            previousPoint2 = item.dataIndex;
                            $("#tooltip").remove();
                            var x = item.datapoint[0].toFixed(2),
                                y = item.datapoint[1].toFixed(2);
                            showChartTooltip(item.pageX, item.pageY, item.datapoint[0], item.datapoint[1] + '$');
                        }
                    }
                });

                $('#site_activities_products').bind("mouseleave", function() {
                    $("#tooltip").remove();
                });
            }

            if ($('#site_activities_subscription').size() != 0) {
                //site activities
                var previousPoint2 = null;
                $('#site_activities_loading_subscription').hide();
                $('#site_activities_content_subscription').show();

                var data1 = [
                    <?php 

                    foreach ($orders_subscription->groupBy(function($item){
                        return $item->created_at->format('M y');
                    }) as $key => $value) {
                    ?>
                        ['<?php echo $key ?>', '<?php echo (isset($orders[$key]) ? $orders[$key]->sum('amount') : 0) ?>'],
                    <?php        
                    } 

                    ?>

                ];


                var plot_statistics = $.plot($("#site_activities_subscription"),

                    [{
                        data: data1,
                        lines: {
                            fill: 0.2,
                            lineWidth: 0,
                        },
                        color: ['#BAD9F5']
                    }, {
                        data: data1,
                        points: {
                            show: true,
                            fill: true,
                            radius: 4,
                            fillColor: "#9ACAE6",
                            lineWidth: 2
                        },
                        color: '#9ACAE6',
                        shadowSize: 1
                    }, {
                        data: data1,
                        lines: {
                            show: true,
                            fill: false,
                            lineWidth: 3
                        },
                        color: '#9ACAE6',
                        shadowSize: 0
                    }],

                    {

                        xaxis: {
                            tickLength: 0,
                            tickDecimals: 0,
                            mode: "categories",
                            min: 0,
                            font: {
                                lineHeight: 18,
                                style: "normal",
                                variant: "small-caps",
                                color: "#6F7B8A"
                            }
                        },
                        yaxis: {
                            ticks: 5,
                            tickDecimals: 0,
                            tickColor: "#eee",
                            font: {
                                lineHeight: 14,
                                style: "normal",
                                variant: "small-caps",
                                color: "#6F7B8A"
                            }
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            tickColor: "#eee",
                            borderColor: "#eee",
                            borderWidth: 1
                        }
                    });

                $("#site_activities_subscription").bind("plothover", function(event, pos, item) {
                    $("#x").text(pos.x.toFixed(2));
                    $("#y").text(pos.y.toFixed(2));
                    if (item) {
                        if (previousPoint2 != item.dataIndex) {
                            previousPoint2 = item.dataIndex;
                            $("#tooltip").remove();
                            var x = item.datapoint[0].toFixed(2),
                                y = item.datapoint[1].toFixed(2);
                            showChartTooltip(item.pageX, item.pageY, item.datapoint[0], item.datapoint[1] + '$');
                        }
                    }
                });

                $('#site_activities_subscription').bind("mouseleave", function() {
                    $("#tooltip").remove();
                });
            }
        },

        initEasyPieCharts: function() {
            if (!jQuery().easyPieChart) {
                return;
            }

            $('.easy-pie-chart .number.transactions').easyPieChart({
                animate: 1000,
                size: 140,
                lineWidth: 10,
                barColor: App.getBrandColor('yellow')
            });

            $('.easy-pie-chart .number.visits').easyPieChart({
                animate: 1000,
                size: 140,
                lineWidth: 10,
                barColor: App.getBrandColor('green')
            });

            $('.easy-pie-chart .number.bounce').easyPieChart({
                animate: 1000,
                size: 140,
                lineWidth: 10,
                barColor: App.getBrandColor('red')
            });

            $('.easy-pie-chart-reload').click(function() {
                $('.easy-pie-chart .number').each(function() {
                    var newValue = Math.floor(100 * Math.random());
                    $(this).data('easyPieChart').update(newValue);
                    $('span', this).text(newValue);
                });
            });
        },

        initSparklineCharts: function() {
            if (!jQuery().sparkline) {
                return;
            }
            $("#sparkline_bar").sparkline([8, 9, 10, 11, 10, 10, 12, 10, 10, 11, 9, 12, 11, 10, 9, 11, 13, 13, 12], {
                type: 'bar',
                width: '100',
                barWidth: 5,
                height: '55',
                barColor: '#f36a5b',
                negBarColor: '#e02222'
            });

            $("#sparkline_bar2").sparkline([9, 11, 12, 13, 12, 13, 10, 14, 13, 11, 11, 12, 11, 11, 10, 12, 11, 10], {
                type: 'bar',
                width: '100',
                barWidth: 5,
                height: '55',
                barColor: '#5c9bd1',
                negBarColor: '#e02222'
            });

            $("#sparkline_bar5").sparkline([8, 9, 10, 11, 10, 10, 12, 10, 10, 11, 9, 12, 11, 10, 9, 11, 13, 13, 12], {
                type: 'bar',
                width: '100',
                barWidth: 5,
                height: '55',
                barColor: '#35aa47',
                negBarColor: '#e02222'
            });

            $("#sparkline_bar6").sparkline([9, 11, 12, 13, 12, 13, 10, 14, 13, 11, 11, 12, 11, 11, 10, 12, 11, 10], {
                type: 'bar',
                width: '100',
                barWidth: 5,
                height: '55',
                barColor: '#ffb848',
                negBarColor: '#e02222'
            });

            $("#sparkline_line").sparkline([9, 10, 9, 10, 10, 11, 12, 10, 10, 11, 11, 12, 11, 10, 12, 11, 10, 12], {
                type: 'line',
                width: '100',
                height: '55',
                lineColor: '#ffb848'
            });
        },

        initMorisCharts: function() {
            if (Morris.EventEmitter && $('#sales_statistics').size() > 0) {
                // Use Morris.Area instead of Morris.Line
                dashboardMainChart = Morris.Area({
                    element: 'sales_statistics',
                    padding: 0,
                    behaveLikeLine: false,
                    gridEnabled: false,
                    gridLineColor: false,
                    axes: false,
                    fillOpacity: 1,
                    data: [{
                        period: '2011 Q1',
                        sales: 1400,
                        profit: 400
                    }, {
                        period: '2011 Q2',
                        sales: 1100,
                        profit: 600
                    }, {
                        period: '2011 Q3',
                        sales: 1600,
                        profit: 500
                    }, {
                        period: '2011 Q4',
                        sales: 1200,
                        profit: 400
                    }, {
                        period: '2012 Q1',
                        sales: 1550,
                        profit: 800
                    }],
                    lineColors: ['#399a8c', '#92e9dc'],
                    xkey: 'period',
                    ykeys: ['sales', 'profit'],
                    labels: ['Sales', 'Profit'],
                    pointSize: 0,
                    lineWidth: 0,
                    hideHover: 'auto',
                    resize: true
                });

            }
        },

        initChat: function() {
            var cont = $('#chats');
            var list = $('.chats', cont);
            var form = $('.chat-form', cont);
            var input = $('input', form);
            var btn = $('.btn', form);

            var handleClick = function(e) {
                e.preventDefault();

                var text = input.val();
                if (text.length == 0) {
                    return;
                }

                var time = new Date();
                var time_str = (time.getHours() + ':' + time.getMinutes());
                var tpl = '';
                tpl += '<li class="out">';
                tpl += '<img class="avatar" alt="" src="' + Layout.getLayoutImgPath() + 'avatar1.jpg"/>';
                tpl += '<div class="message">';
                tpl += '<span class="arrow"></span>';
                tpl += '<a href="#" class="name">Bob Nilson</a>&nbsp;';
                tpl += '<span class="datetime">at ' + time_str + '</span>';
                tpl += '<span class="body">';
                tpl += text;
                tpl += '</span>';
                tpl += '</div>';
                tpl += '</li>';

                var msg = list.append(tpl);
                input.val("");

                var getLastPostPos = function() {
                    var height = 0;
                    cont.find("li.out, li.in").each(function() {
                        height = height + $(this).outerHeight();
                    });

                    return height;
                }

                cont.find('.scroller').slimScroll({
                    scrollTo: getLastPostPos()
                });
            }

            $('body').on('click', '.message .name', function(e) {
                e.preventDefault(); // prevent click event

                var name = $(this).text(); // get clicked user's full name
                input.val('@' + name + ':'); // set it into the input field
                App.scrollTo(input); // scroll to input if needed
            });

            btn.click(handleClick);

            input.keypress(function(e) {
                if (e.which == 13) {
                    handleClick(e);
                    return false; //<---- Add this line
                }
            });
        },

        initDashboardDaterange: function() {
            if (!jQuery().daterangepicker) {
                return;
            }

            $('#dashboard-report-range').daterangepicker({
                "ranges": {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                    'Last 7 Days': [moment().subtract('days', 6), moment()],
                    'Last 30 Days': [moment().subtract('days', 29), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                },
                "locale": {
                    "format": "MM/DD/YYYY",
                    "separator": " - ",
                    "applyLabel": "Apply",
                    "cancelLabel": "Cancel",
                    "fromLabel": "From",
                    "toLabel": "To",
                    "customRangeLabel": "Custom",
                    "daysOfWeek": [
                        "Su",
                        "Mo",
                        "Tu",
                        "We",
                        "Th",
                        "Fr",
                        "Sa"
                    ],
                    "monthNames": [
                        "January",
                        "February",
                        "March",
                        "April",
                        "May",
                        "June",
                        "July",
                        "August",
                        "September",
                        "October",
                        "November",
                        "December"
                    ],
                    "firstDay": 1
                },
                //"startDate": "11/08/2015",
                //"endDate": "11/14/2015",
                opens: (App.isRTL() ? 'right' : 'left'),
            }, function(start, end, label) {
                if ($('#dashboard-report-range').attr('data-display-range') != '0') {
                    $('#dashboard-report-range span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }
            });
             if ($('#dashboard-report-range').attr('data-display-range') != '0') {
                $('#dashboard-report-range span').html(moment().subtract('days', 29).format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
            }
            $('#dashboard-report-range').show();
        },

        initAmChart1: function() {
            if (typeof(AmCharts) === 'undefined' || $('#dashboard_amchart_1').size() === 0) {
                return;
            }

            var chartData = [{
                "date": "2012-01-05",
                "distance": 480,
                "townName": "Miami",
                "townName2": "Miami",
                "townSize": 10,
                "latitude": 25.83,
                "duration": 501
            }, {
                "date": "2012-01-06",
                "distance": 386,
                "townName": "Tallahassee",
                "townSize": 7,
                "latitude": 30.46,
                "duration": 443
            }, {
                "date": "2012-01-07",
                "distance": 348,
                "townName": "New Orleans",
                "townSize": 10,
                "latitude": 29.94,
                "duration": 405
            }, {
                "date": "2012-01-08",
                "distance": 238,
                "townName": "Houston",
                "townName2": "Houston",
                "townSize": 16,
                "latitude": 29.76,
                "duration": 309
            }, {
                "date": "2012-01-09",
                "distance": 218,
                "townName": "Dalas",
                "townSize": 17,
                "latitude": 32.8,
                "duration": 287
            }, {
                "date": "2012-01-10",
                "distance": 349,
                "townName": "Oklahoma City",
                "townSize": 11,
                "latitude": 35.49,
                "duration": 485
            }, {
                "date": "2012-01-11",
                "distance": 603,
                "townName": "Kansas City",
                "townSize": 10,
                "latitude": 39.1,
                "duration": 890
            }, {
                "date": "2012-01-12",
                "distance": 534,
                "townName": "Denver",
                "townName2": "Denver",
                "townSize": 18,
                "latitude": 39.74,
                "duration": 810
            }, {
                "date": "2012-01-13",
                "townName": "Salt Lake City",
                "townSize": 12,
                "distance": 425,
                "duration": 670,
                "latitude": 40.75,
                "alpha": 0.4
            }, {
                "date": "2012-01-14",
                "latitude": 36.1,
                "duration": 470,
                "townName": "Las Vegas",
                "townName2": "Las Vegas",
                "bulletClass": "lastBullet"
            }, {
                "date": "2012-01-15"
            }];
            var chart = AmCharts.makeChart("dashboard_amchart_1", {
                type: "serial",
                fontSize: 12,
                fontFamily: "Open Sans",
                dataDateFormat: "YYYY-MM-DD",
                dataProvider: chartData,

                addClassNames: true,
                startDuration: 1,
                color: "#6c7b88",
                marginLeft: 0,

                categoryField: "date",
                categoryAxis: {
                    parseDates: true,
                    minPeriod: "DD",
                    autoGridCount: false,
                    gridCount: 50,
                    gridAlpha: 0.1,
                    gridColor: "#FFFFFF",
                    axisColor: "#555555",
                    dateFormats: [{
                        period: 'DD',
                        format: 'DD'
                    }, {
                        period: 'WW',
                        format: 'MMM DD'
                    }, {
                        period: 'MM',
                        format: 'MMM'
                    }, {
                        period: 'YYYY',
                        format: 'YYYY'
                    }]
                },

                valueAxes: [{
                    id: "a1",
                    title: "distance",
                    gridAlpha: 0,
                    axisAlpha: 0
                }, {
                    id: "a2",
                    position: "right",
                    gridAlpha: 0,
                    axisAlpha: 0,
                    labelsEnabled: false
                }, {
                    id: "a3",
                    title: "duration",
                    position: "right",
                    gridAlpha: 0,
                    axisAlpha: 0,
                    inside: true,
                    duration: "mm",
                    durationUnits: {
                        DD: "d. ",
                        hh: "h ",
                        mm: "min",
                        ss: ""
                    }
                }],
                graphs: [{
                    id: "g1",
                    valueField: "distance",
                    title: "distance",
                    type: "column",
                    fillAlphas: 0.7,
                    valueAxis: "a1",
                    balloonText: "[[value]] miles",
                    legendValueText: "[[value]] mi",
                    legendPeriodValueText: "total: [[value.sum]] mi",
                    lineColor: "#08a3cc",
                    alphaField: "alpha",
                }, {
                    id: "g2",
                    valueField: "latitude",
                    classNameField: "bulletClass",
                    title: "latitude/city",
                    type: "line",
                    valueAxis: "a2",
                    lineColor: "#786c56",
                    lineThickness: 1,
                    legendValueText: "[[description]]/[[value]]",
                    descriptionField: "townName",
                    bullet: "round",
                    bulletSizeField: "townSize",
                    bulletBorderColor: "#02617a",
                    bulletBorderAlpha: 1,
                    bulletBorderThickness: 2,
                    bulletColor: "#89c4f4",
                    labelText: "[[townName2]]",
                    labelPosition: "right",
                    balloonText: "latitude:[[value]]",
                    showBalloon: true,
                    animationPlayed: true,
                }, {
                    id: "g3",
                    title: "duration",
                    valueField: "duration",
                    type: "line",
                    valueAxis: "a3",
                    lineAlpha: 0.8,
                    lineColor: "#e26a6a",
                    balloonText: "[[value]]",
                    lineThickness: 1,
                    legendValueText: "[[value]]",
                    bullet: "square",
                    bulletBorderColor: "#e26a6a",
                    bulletBorderThickness: 1,
                    bulletBorderAlpha: 0.8,
                    dashLengthField: "dashLength",
                    animationPlayed: true
                }],

                chartCursor: {
                    zoomable: false,
                    categoryBalloonDateFormat: "DD",
                    cursorAlpha: 0,
                    categoryBalloonColor: "#e26a6a",
                    categoryBalloonAlpha: 0.8,
                    valueBalloonsEnabled: false
                },
                legend: {
                    bulletType: "round",
                    equalWidths: false,
                    valueWidth: 120,
                    useGraphSettings: true,
                    color: "#6c7b88"
                }
            });
        },

        

        initAmChart3: function() {
            if (typeof(AmCharts) === 'undefined' || $('#dashboard_amchart_3').size() === 0) {
                return;
            }

            var chart = AmCharts.makeChart("dashboard_amchart_3", {
                "type": "serial",
                "addClassNames": true,
                "theme": "light",
                "path": "../assets/global/plugins/amcharts/ammap/images/",
                "autoMargins": false,
                "marginLeft": 30,
                "marginRight": 8,
                "marginTop": 10,
                "marginBottom": 26,
                "balloon": {
                    "adjustBorderColor": false,
                    "horizontalPadding": 10,
                    "verticalPadding": 8,
                    "color": "#ffffff"
                },

                "dataProvider": [{
                    "year": 2009,
                    "income": 23.5,
                    "expenses": 21.1
                }, {
                    "year": 2010,
                    "income": 26.2,
                    "expenses": 30.5
                }, {
                    "year": 2011,
                    "income": 30.1,
                    "expenses": 34.9
                }, {
                    "year": 2012,
                    "income": 29.5,
                    "expenses": 31.1
                }, {
                    "year": 2013,
                    "income": 30.6,
                    "expenses": 28.2,
                }, {
                    "year": 2014,
                    "income": 34.1,
                    "expenses": 32.9,
                    "dashLengthColumn": 5,
                    "alpha": 0.2,
                    "additional": "(projection)"
                }],
                "valueAxes": [{
                    "axisAlpha": 0,
                    "position": "left"
                }],
                "startDuration": 1,
                "graphs": [{
                    "alphaField": "alpha",
                    "balloonText": "<span style='font-size:12px;'>[[title]] in [[category]]:<br><span style='font-size:20px;'>[[value]]</span> [[additional]]</span>",
                    "fillAlphas": 1,
                    "title": "Income",
                    "type": "column",
                    "valueField": "income",
                    "dashLengthField": "dashLengthColumn"
                }, {
                    "id": "graph2",
                    "balloonText": "<span style='font-size:12px;'>[[title]] in [[category]]:<br><span style='font-size:20px;'>[[value]]</span> [[additional]]</span>",
                    "bullet": "round",
                    "lineThickness": 3,
                    "bulletSize": 7,
                    "bulletBorderAlpha": 1,
                    "bulletColor": "#FFFFFF",
                    "useLineColorForBulletBorder": true,
                    "bulletBorderThickness": 3,
                    "fillAlphas": 0,
                    "lineAlpha": 1,
                    "title": "Expenses",
                    "valueField": "expenses"
                }],
                "categoryField": "year",
                "categoryAxis": {
                    "gridPosition": "start",
                    "axisAlpha": 0,
                    "tickLength": 0
                },
                "export": {
                    "enabled": true
                }
            });
        },

        initAmChart4: function() {
            if (typeof(AmCharts) === 'undefined' || $('#dashboard_amchart_4').size() === 0) {
                return;
            }

            var chart = AmCharts.makeChart("dashboard_amchart_4", {
                "type": "pie",
                "theme": "light",
                "dataProvider": [{
                    "visits": "<?php echo $return_visitors[0][0]; ?>",
                    "value": '<?php echo $return_visitors[0][1]; ?>'
                }, {
                    "visits": "<?php echo $return_visitors[1][0]; ?>",
                    "value": '<?php echo $return_visitors[1][1]; ?>'
                }],
                "valueField": "value",
                "titleField": "visits",
                "outlineAlpha": 0.4,
                
                "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
                
                "export": {
                    "enabled": true
                }
            });
            jQuery('.chart-input').off().on('input change', function() {
                var property = jQuery(this).data('property');
                var target = chart;
                var value = Number(this.value);
                chart.startDuration = 0;

                if (property == 'innerRadius') {
                    value += "%";
                }

                target[property] = value;
                chart.validateNow();
            });
        },

        initAmChart5: function() {
            if (typeof(AmCharts) === 'undefined' || $('#dashboard_amchart_5').size() === 0) {
                return;
            }

            var visitors = [
                <?php 

                foreach ($session_per_country as $key => $value) {
                ?>
                    {'country': '<?php $val = $value[0] != '(not set)' ? $value[0] : "others"; echo $val; ?>',
                    'visits': '<?php echo $value[1]; ?>'},
                <?php        
                } 

                ?>
            ];

            var chart = AmCharts.makeChart("dashboard_amchart_5", {
                "type": "pie",
                  "theme": "light",
                  "titles": [ {
                    "text": "Visitors countries",
                    "size": 16
                  } ],
                  "dataProvider": visitors,
                  "valueField": "visits",
                  "titleField": "country",
                  "outlineAlpha": 0.4,
                  "startEffect": "elastic",
                  "startDuration": 2,
                  "labelRadius": 15,
                  "innerRadius": "50%",
                  "depth3D": 0,
                  "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
                  "angle": 0,
                  "export": {
                    "enabled": true
                  }
            });
            jQuery('.chart-input').off().on('input change', function() {
                var property = jQuery(this).data('property');
                var target = chart;
                var value = Number(this.value);
                chart.startDuration = 0;

                if (property == 'innerRadius') {
                    value += "%";
                }

                target[property] = value;
                chart.validateNow();
            });
        },


        initWorldMapStats: function() {
            if ($('#mapplic').size() === 0) {
                return;
            }

            $('#mapplic').mapplic({
                source: '../assets/global/plugins/mapplic/world.json',
                height: 265,
                animate: false,
                sidebar: false,
                minimap: false,
                locations: true,
                deeplinking: true,
                fullscreen: false,
                hovertip: true,
                zoombuttons: false,
                clearbutton: false,
                developer: false,
                maxscale: 2,
                skin: 'mapplic-dark',
                zoom: true
            });

            $("#widget_sparkline_bar").sparkline([8, 7, 9, 8.5, 8, 8.2, 8, 8.5, 9, 8, 9], {
                type: 'bar',
                width: '100',
                barWidth: 5,
                height: '30',
                barColor: '#4db3a4',
                negBarColor: '#e02222'
            });

            $("#widget_sparkline_bar2").sparkline([8, 7, 9, 8.5, 8, 8.2, 8, 8.5, 9, 8, 9], {
                type: 'bar',
                width: '100',
                barWidth: 5,
                height: '30',
                barColor: '#f36a5a',
                negBarColor: '#e02222'
            });

            $("#widget_sparkline_bar3").sparkline([8, 7, 9, 8.5, 8, 8.2, 8, 8.5, 9, 8, 9], {
                type: 'bar',
                width: '100',
                barWidth: 5,
                height: '30',
                barColor: '#5b9bd1',
                negBarColor: '#e02222'
            });

            $("#widget_sparkline_bar4").sparkline([8, 7, 9, 8.5, 8, 8.2, 8, 8.5, 9, 8, 9], {
                type: 'bar',
                width: '100',
                barWidth: 5,
                height: '30',
                barColor: '#9a7caf',
                negBarColor: '#e02222'
            });
        },

        init: function() {

            this.initJQVMAP();
            this.initCharts();
            this.initEasyPieCharts();
            this.initSparklineCharts();
            this.initChat();
            this.initDashboardDaterange();
            this.initMorisCharts();

            this.initAmChart1();
            
            this.initAmChart3();
            this.initAmChart4();
            this.initAmChart5();

            this.initWorldMapStats();
        }
    };

}();

if (App.isAngularJsApp() === false) {
    jQuery(document).ready(function() {
        Dashboard.init(); // init metronic core componets
    });
}
</script>

<script type="text/javascript">

    $(".nav a").on("click", function(){
   $(".nav").find(".active").removeClass("active");
   $(this).parent().addClass("active");
});
</script>

<script type="text/javascript">
    var ChartsAmcharts = function() {

        var initChartSample5 = function() {
            var dataProvider = [
                <?php 

                foreach ($coupons as $key => $value) {
                ?>
                    {
                        "coupon" : "<?php echo $value->coupon_name; ?>",
                        "count"  : "<?php echo $value->orders->count(); ?>",
                        "color"  : "#0D8ECF"
                    },
                <?php        
                } 

                ?>

            ];

            console.log(dataProvider);

            var chart = AmCharts.makeChart("chart_5", {
                "theme": "light",
                "type": "serial",
                "startDuration": 2,

                "fontFamily": 'Open Sans',
                
                "color":    '#888',

                "dataProvider": dataProvider,
                "valueAxes": [{
                    "position": "left",
                    "axisAlpha": 0,
                    "gridAlpha": 0
                }],
                "graphs": [{
                    "balloonText": "[[category]]: <b>[[value]]</b>",
                    "colorField": "color",
                    "fillAlphas": 0.85,
                    "lineAlpha": 0.1,
                    "type": "column",
                    "topRadius": 1,
                    "valueField": "count"
                }],
                "depth3D": 0,
                "angle": 0,
                "chartCursor": {
                    "categoryBalloonEnabled": false,
                    "cursorAlpha": 0,
                    "zoomable": false
                },
                "categoryField": "coupon",
                "categoryAxis": {
                    "gridPosition": "start",
                    "axisAlpha": 0,
                    "gridAlpha": 0

                },
                "exportConfig": {
                    "menuTop": "20px",
                    "menuRight": "20px",
                    "menuItems": [{
                        "icon": '/lib/3/images/export.png',
                        "format": 'png'
                    }]
                }
            }, 0);

            jQuery('.chart_5_chart_input').off().on('input change', function() {
                var property = jQuery(this).data('property');
                var target = chart;
                chart.startDuration = 0;

                if (property == 'topRadius') {
                    target = chart.graphs[0];
                }

                target[property] = this.value;
                chart.validateNow();
            });

            $('#chart_5').closest('.portlet').find('.fullscreen').click(function() {
                chart.invalidateSize();
            });
        }

        return {
            //main function to initiate the module

            init: function() {

                
                initChartSample5();
                
            }

        };

    }();

    jQuery(document).ready(function() {    
       ChartsAmcharts.init(); 
    });
</script>

<script type="text/javascript">
var data_coupons = [
        <?php 

        foreach ($orders as $key => $value) {
        ?>
            ['<?php echo $key ?>', '<?php echo (isset($orders[$key]) ? $orders[$key]->sum('amount') : 0) ?>'],
        <?php        
        } 

        ?>

    ];
var chart = AmCharts.makeChart("chartdiv", {
    "type": "serial",
    "theme": "light",
    "legend": {
        "horizontalGap": 10,
        "maxColumns": 1,
        "position": "right",
        "useGraphSettings": true,
        "markerSize": 10
    },
    "dataProvider": [{
        "year": 2003,
        "europe": 2.5,
        "namerica": 2.5,
        "asia": 2.1,
        "lamerica": 0.3,
        "meast": 0.2,
        "africa": 0.1
    }, {
        "year": 2004,
        "europe": 2.6,
        "namerica": 2.7,
        "asia": 2.2,
        "lamerica": 0.3,
        "meast": 0.3,
        "africa": 0.1
    }, {
        "year": 2005,
        "europe": 2.8,
        "namerica": 2.9,
        "asia": 2.4,
        "lamerica": 0.3,
        "meast": 0.3,
        "africa": 0.1
    }],
    "valueAxes": [{
        "stackType": "regular",
        "axisAlpha": 0.5,
        "gridAlpha": 0
    }],
    "graphs": [{
        "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "Europe",
        "type": "column",
        "color": "#000000",
        "valueField": "europe"
    }, {
        "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "North America",
        "type": "column",
        "color": "#000000",
        "valueField": "namerica"
    }, {
        "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "Asia-Pacific",
        "type": "column",
        "color": "#000000",
        "valueField": "asia"
    }, {
        "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "Latin America",
        "type": "column",
        "color": "#000000",
        "valueField": "lamerica"
    }, {
        "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "Middle-East",
        "type": "column",
        "color": "#000000",
        "valueField": "meast"
    }, {
        "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "Africa",
        "type": "column",
        "color": "#000000",
        "valueField": "africa"
    }],
    "rotate": true,
    "categoryField": "year",
    "categoryAxis": {
        "gridPosition": "start",
        "axisAlpha": 0,
        "gridAlpha": 0,
        "position": "left"
    },
    "export": {
        "enabled": true
     }
});

</script>


@endsection