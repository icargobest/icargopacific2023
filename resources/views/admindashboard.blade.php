@include('partials.admin-nav')

<div class="dashboardmain">
    <div class="trafficChart">

        <div class="linechart">
            traffic
            <canvas id="line-chart" width="1000" height="500"></canvas>
            
        </div>

        <div class="notifandchart">

        </div>


    </div>

    <div class="memberChart">

        <div class="member">

        </div>
        <div class="member">
            
        </div>
        <div class="member">
            
        </div>
        <div class="member">
            
        </div>

    </div>
</div> 


@include('partials.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="{{url('js/chart.js')}}"></script>