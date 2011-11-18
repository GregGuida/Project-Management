
var DASHBOARD = (function(d, $) {

  // private vars
  // where all of the charts will live
  var chart_wrapper = $('#dash-charts'),

  // each chart has a selector for the div where the chart should be generated, 
  // an init function that will regenerate the chart
  charts = [

    { 
      name : 'Pageviews over Time',
      select : $('#pageviews-chart'),
      init : function(name, render) {

        var data = window.pageviews_data,

        chart = new Highcharts.Chart({
          chart: {
            renderTo: render,
            defaultSeriesType: 'line',
            marginRight: 130,
            marginBottom: 25
          },
          title: {
            text: name,
            x: -20 //center
          },
          xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 
              'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
          },
          yAxis: {
            title: {
              text: 'Hits'
            },
            plotLines: [{
              value: 0,
              width: 1,
              color: '#808080'
            }]
          },
          tooltip: {
            formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                this.x +': '+ this.y;
            }
          },
          legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -10,
            y: 100,
            borderWidth: 0
          },
          series: data
        });
      } 
    },


    {
      name : 'Product distribution by category',
      select : $('#product-dist-chart'),
      init : function(name, render) {

        var data = window.product_dist_data,

        chart = new Highcharts.Chart({
          chart: {
            renderTo: render,
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
          },
          title: {
            text: name
          },
          tooltip: {
            formatter: function() {
              return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
            }
          },
          plotOptions: {
            pie: {
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                enabled: false
              },
              showInLegend: true
            }
          },
            series: [{
            type: 'pie',
            name: 'Product Sales by Category',
            data: data
          }]
        });
      } 
    },

    {
      name : 'Most popular products by Month',
      select : $('#popular-product-chart'),
      init : function(name, render) {

        var data = window.popular_product_data,
        categories = window.popular_product_categories,

        chart = new Highcharts.Chart({
          chart: {
            renderTo: render,
            defaultSeriesType: 'bar'
          },
          title: {
            text: name
          },
          xAxis: {
            categories: categories,
            title: {
              text: null
            }
          },
          yAxis: {
            min: 0,
            title: {
              text: 'Purchases',
              align: 'high'
            }
          },
          tooltip: {
            formatter: function() {
              return ''+
                 this.series.name +': '+ this.y;
            }
          },
          plotOptions: {
            bar: {
              dataLabels: {
                enabled: true
              }
            }
          },
          legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -100,
            y: 100,
            floating: true,
            borderWidth: 1,
            backgroundColor: '#FFFFFF',
            shadow: true
          },
          credits: {
            enabled: false
          },
          series: data
        });
      }
    }
  ],


  // public API
  my = {
    // prepares the page for battlee
    init : function() {
      create_charts();
    }
  };

  // initializes each chart from scratch
  function create_charts() {
    var i, len;
    for (i = 0, len = charts.length; i < len; i++) {
      charts[i].init(charts[i].name, charts[i].select[0].id);
    } 
  }

  // return public API
  return my;

})(document, jQuery);


$(document).ready( DASHBOARD.init );
