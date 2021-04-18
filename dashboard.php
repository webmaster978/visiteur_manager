<?php

//dashboard.php

include('vms.php');

$visitor = new vms();

if (!$visitor->is_login()) {
    header("location:" . $visitor->base_url . "");
}

include('header.php');

include('sidebar.php');

?>




<div class="col-sm-10 offset-sm-2 py-4">
    <div class="row">
        <div class="col-sm-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-header text-center">
                    <h4>Aujourd'hui</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title text-center"><?php echo $visitor->Get_total_today_visitor(); ?></h1>
                    <h4>Visiteurs</h4>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header text-center">
                    <h4>Hier</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title text-center"><?php echo $visitor->Get_total_yesterday_visitor(); ?></h1>
                    <h4>Visiteurs</h4>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header text-center">
                    <h4>7 Derniers jours</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title text-center"><?php echo $visitor->Get_last_seven_day_total_visitor(); ?></h1>
                    <h4>Visiteurs</h4>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card text-white bg-info mb-3">
                <div class="card-header text-center">
                    <h4>Total par jour</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title text-center"><?php echo $visitor->Get_total_visitor(); ?></h1>
                    <h4>Visiteurs</h4>
                </div>
            </div>
        </div>
    </div>


</div>


</div>
</div>

</body>

</html>