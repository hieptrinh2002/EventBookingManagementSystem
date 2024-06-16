<div class="card">
    <div class="card-header">
        <h4 class="card-title">Revenue Chart Quarter</h4>
    </div>
    <div class="card-body">
        <div id="revenueChartQuater"></div>
        <h6 class="mb-0 ">Website Views</h6>
        <p class="text-sm ">Last Campaign Performance</p>
        <hr class="dark horizontal">
        <div class="d-flex ">
            <i class="material-icons text-sm my-auto me-1">schedule</i>
            <p class="mb-0 text-sm"> campaign sent 2 days ago </p>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Morris.Bar({
            // ID of the element in which to draw the chart.
            element: 'revenueChartQuater',
            // Chart data records -- each entry in this array corresponds to a point on the chart.
            data: {!! json_encode($revenueDataQuater) !!},
            // The name of the data record attribute that contains x-values.
            xkey: 'quarter',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['amount'],
            // Labels for the ykeys -- will be displayed when you hover over the chart.
            labels: ['Revenue'],
            barColors: ['#0b62a4'],
            resize: true
        });
    });
</script>
