<?php
     $months = array('january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december');
     $month_wise_income = array();

    for ($i = 0; $i < 12; $i++) {
        $first_day_of_month = "1 ".ucfirst($months[$i])." ".date("Y").' 00:00:00';
        $last_day_of_month = cal_days_in_month(CAL_GREGORIAN, $i+1, date("Y"))." ".ucfirst($months[$i])." ".date("Y").' 00:00:00';
        $this->db->select_sum('amount_paid');
        $this->db->where('purchase_date >=' , strtotime($first_day_of_month));
        $this->db->where('purchase_date <=' , strtotime($last_day_of_month));
        $total_amount = $this->db->get('package_purchased_history')->row()->amount_paid;
        $total_amount > 0 ? array_push($month_wise_income, $total_amount) : array_push($month_wise_income, 0);
    }

    $number_of_active_listing = 0;
    $number_of_pending_listing = 0;
    $listings = $this->db->get('listing')->result_array();
    foreach ($listings as $key => $listing) {
        if(!has_package($listing['user_id']) > 0)
            continue;
        if ($listing['status'] == 'active') {
            $number_of_active_listing++;
        }
        if ($listing['status'] != 'active') {
            $number_of_pending_listing++;
        }
    }
?>

 <script type="text/javascript">
 ! function(o) {
     "use strict";
     var t = function() {
         this.$body = o("body"), this.charts = []
     };
     t.prototype.respChart = function(r, a, n, e) {
         Chart.defaults.global.defaultFontColor = "#8391a2", Chart.defaults.scale.gridLines.color = "#8391a2";
         var i = r.get(0).getContext("2d"),
             s = o(r).parent();
         return function() {
             var t;
             switch (r.attr("width", o(s).width()), a) {
                 case "Line":
                     t = new Chart(i, {
                         type: "line",
                         data: n,
                         options: e
                     });
                     break;
                 case "Doughnut":
                     t = new Chart(i, {
                         type: "doughnut",
                         data: n,
                         options: e
                     })
             }
             return t
         }()
     }, t.prototype.initCharts = function() {
         var t = [];
         if (0 < o("#task-area-chart").length) {
             t.push(this.respChart(o("#task-area-chart"), "Line", {
                 labels: [
                      <?php foreach ($months as $month): ?>
                    "<?php echo ucfirst($month); ?>",
                    <?php endforeach; ?>
                 ],
                 datasets: [{
                     label: "<?php echo get_phrase('this_year'); ?>",
                     backgroundColor: "rgba(114, 124, 245, 0.3)",
                     borderColor: "#727cf5",
                     data: [
                         <?php foreach ($month_wise_income as $income): ?>
                        "<?php echo $income; ?>",
                        <?php endforeach; ?>
                     ]
                 }]
             }, {
                 maintainAspectRatio: !1,
                 legend: {
                     display: !1
                 },
                 tooltips: {
                     intersect: !1
                 },
                 hover: {
                     intersect: !0
                 },
                 plugins: {
                     filler: {
                         propagate: !1
                     }
                 },
                 scales: {
                     xAxes: [{
                         reverse: !0,
                         gridLines: {
                             color: "rgba(0,0,0,0.05)"
                         }
                     }],
                     yAxes: [{
                         ticks: {
                             stepSize: 10,
                             display: !1
                         },
                         min: 10,
                         max: 100,
                         display: !0,
                         borderDash: [5, 5],
                         gridLines: {
                             color: "rgba(0,0,0,0)",
                             fontColor: "#fff"
                         }
                     }]
                 }
             }))
         }
         if (0 < o("#project-status-chart").length) {
             t.push(this.respChart(o("#project-status-chart"), "Doughnut", {
                 labels: ["<?php echo get_phrase('active_listings'); ?>", "<?php echo get_phrase('pending_listings'); ?>"],
                 datasets: [{
                     data: [<?php echo $number_of_active_listing; ?>, <?php echo $number_of_pending_listing; ?>],
                     backgroundColor: ["#0acf97", "#727cf5"],
                     borderColor: "transparent",
                     borderWidth: "2"
                 }]
             }, {
                 maintainAspectRatio: !1,
                 cutoutPercentage: 80,
                 legend: {
                     display: !1
                 }
             }))
         }
         return t
     }, t.prototype.init = function() {
         var r = this;
         Chart.defaults.global.defaultFontFamily = '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif', r.charts = this.initCharts(), o(window).on("resize", function(t) {
             o.each(r.charts, function(t, r) {
                 try {
                     r.destroy()
                 } catch (t) {}
             }), r.charts = r.initCharts()
         })
     }, o.ChartJs = new t, o.ChartJs.Constructor = t
 }(window.jQuery),
 function(t) {
     "use strict";
     window.jQuery.ChartJs.init()
 }();

 </script>