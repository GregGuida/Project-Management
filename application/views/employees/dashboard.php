<div class="page-header">
  <h2>Dashboard</h2>
</div>

<div id="dash-charts">
  <div class="chart-wrapper">
    <script>
      window.pageviews_data = [{
             name: 'Hits',
             data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
           }]
    </script>
    <div id="pageviews-chart">
    </div>
  </div>
  
  <div class="chart-wrapper">
    <script>
      window.product_dist_data = [
               ['Grey Kitties',   45.0],
               ['Fluffy Kittens',       26.8],
               { 
                 name: 'Magic Kitties',
                 y: 12.8,
                 sliced: true,
                 selected: true
               },
               ['Cats',    8.5],
               ['Monsters',     6.2],
               ['Dogs',   0.7]
             ]
    </script>
    <div id="product-dist-chart">
    </div>
  </div>

  <div class="chart-wrapper">
    <script>
      window.popular_product_categories = ['Fuzzy Cats', 'Striped Kitties', 'Magic Kittens', 'Fish', 'Dogs'];
      window.popular_product_data =  [{
            name: 'August',
            data: [107, 31, 635, 203, 2]
          }, {
            name: 'September',
            data: [133, 156, 947, 408, 6]
          }, {
            name: 'October',
            data: [973, 914, 4054, 732, 34]
          }];
    </script>
    <div id="popular-product-chart"></div>
  </div>
</div>
