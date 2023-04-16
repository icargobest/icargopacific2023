@include('partials.admin-nav')

    <div class="dashboardmain">
        
        <div class="traffic" style="border:2px solid red; margin-bottom:50px;">

            <div class="lineChart">
                <span class="title"><b>TRAFFIC</b></span>
                <span class="text">March 1</span>
                <div class="chart1">
                    <canvas id="line-chart" width="800" height="450"></canvas>
                </div>
            </div>

            <div class="notifAndChart">
                <div class="notification">
                    <div class="notif">
                        <span class="notifname"><b>Update</b></span>
                        <span class="notifnum1"><b>42</b></span>
                    </div>
                    <div class="notif">
                        <span class="notifname"><b>Message</b></span>
                        <span class="notifnum2"><b>42</b></span>
                    </div>
                    <div class="notif">
                        <span class="notifname"><b>Task</b></span>
                        <span class="notifnum3"><b>42</b></span>
                    </div>
                    <div class="notif">
                        <span class="notifname"><b>Comments</b></span>
                        <span class="notifnum4"><b>42</b></span>
                    </div>

                </div>
                <div class="dunotChart">
                    <span class="title"><b>TRAFFIC</b></span>
                    <div class="chart2">
                        <canvas id="doughnut-chart" width="600" height="500"></canvas>
                    </div>
                </div>

            </div>
            
        </div>

        <div class="member" style="border:2px solid blue">

            <div class="member1">
                <div class="up">
                    <span class ="online"><b>MEMBERS ONLINE</b></span>
                </div>
                <div class="down">
                    <span class ="icon"><i class="fas fa-user-friends"></i></span>
                    <span class ="total"><b>9,823</b></span>
                </div>
            </div>

            <div class="member2">
                <div class="up">
                    <span class ="online"><b>MEMBERS ONLINE</b></span>
                </div>
                <div class="down">
                    <span class ="icon"><i class="fas fa-user-friends"></i></span>
                    <span class ="total"><b>9,823</b></span>
                </div>
            </div>

            <div class="member3">
                <div class="up">
                    <span class ="online"><b>MEMBERS ONLINE</b></span>
                </div>
                <div class="down">
                    <span class ="icon"><i class="fas fa-user-friends"></i></span>
                    <span class ="total"><b>9,823</b></span>
                </div>
            </div>

            <div class="member4">
                <div class="up">
                    <span class ="online"><b>MEMBERS ONLINE</b></span>
                </div>
                <div class="down">
                    <span class ="icon"><i class="fas fa-user-friends"></i></span>
                    <span class ="total"><b>9,823</b></span>
                </div>
            </div>
            

        </div>
     

    </div> 


@include('partials.footer')
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="{{url('js/chart.js')}}"></script>s