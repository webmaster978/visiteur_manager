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


    <section class="statistic">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="statistic__item">
                            <h2 class="number"><?php echo $visitor->Get_total_today_visitor(); ?></h2>
                            <span class="desc">Visiteurs</span>
                            <h4>Aujourd'hui</h4>
                            <div class="icon">
                                <i class="zmdi zmdi-account-o"></i>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="statistic__item">
                            <h2 class="number"><?php echo $visitor->Get_total_yesterday_visitor(); ?></h2>
                            <span class="desc">Visiteurs</span>
                            <h4>Hier</h4>
                            <div class="icon">
                                <i class="zmdi zmdi-shopping-cart"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="statistic__item">
                            <h2 class="number"><?php echo $visitor->Get_last_seven_day_total_visitor(); ?></h2>
                            <span class="desc">Visiteurs</span>
                            <h4>7 Dernier jours</h4>
                            <div class="icon">
                                <i class="zmdi zmdi-calendar-note"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">

                        <div class="statistic__item">

                            <h2 class="number"><?php echo $visitor->Get_total_visitor(); ?></h2>
                            <h4>Visiteurs</h4>
                            <span class="desc">Visiteurs Limites</span>
                            <div class="icon">
                                <i class="zmdi zmdi-money"></i>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




</div>




</div>
</div>




</body>

</html>