var ChartsAmcharts = function() {

    var initChartSample5 = function() {
        var chart = AmCharts.makeChart("chart_5", {
            "theme": "light",
            "type": "serial",
            "startDuration": 2,

            "fontFamily": 'Open Sans',
            
            "color":    '#888',

            "dataProvider": [{
                "country": "USA",
                "visits": 4025,
                "color": "#0D8ECF"
            }, {
                "country": "China",
                "visits": 1882,
                "color": "#0D8ECF"
            }, {
                "country": "Japan",
                "visits": 1809,
                "color": "#0D8ECF"
            }, {
                "country": "Germany",
                "visits": 1322,
                "color": "#0D8ECF"
            }, {
                "country": "UK",
                "visits": 1122,
                "color": "#0D8ECF"
            }, {
                "country": "France",
                "visits": 1114,
                "color": "#0D8ECF"
            }, {
                "country": "India",
                "visits": 984,
                "color": "#0D8ECF"
            }, {
                "country": "Spain",
                "visits": 711,
                "color": "#0D8ECF"
            }, {
                "country": "Netherlands",
                "visits": 665,
                "color": "#0D8ECF"
            }, {
                "country": "Russia",
                "visits": 580,
                "color": "#0D8ECF"
            }, {
                "country": "South Korea",
                "visits": 443,
                "color": "#0D8ECF"
            }, {
                "country": "Canada",
                "visits": 441,
                "color": "#0D8ECF"
            }, {
                "country": "Brazil",
                "visits": 395,
                "color": "#0D8ECF"
            }, {
                "country": "Italy",
                "visits": 386,
                "color": "#0D8ECF"
            }, {
                "country": "Australia",
                "visits": 384,
                "color": "#999999"
            }, {
                "country": "Taiwan",
                "visits": 338,
                "color": "#333333"
            }, {
                "country": "Poland",
                "visits": 328,
                "color": "#000000"
            }],
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
                "valueField": "visits"
            }],
            "depth3D": 40,
            "angle": 30,
            "chartCursor": {
                "categoryBalloonEnabled": false,
                "cursorAlpha": 0,
                "zoomable": false
            },
            "categoryField": "country",
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