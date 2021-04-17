<?php

include('vms.php');

$visitor = new vms();

if ($visitor->is_login()) {
	header("location:" . $visitor->base_url . "dashboard.php");
}

include('header.php');

?>

<style>
body {
    color: #000;
    overflow-x: hidden;
    height: 100%;
    background-color: #B0BEC5;
    background-repeat: no-repeat
}

.card0 {
    box-shadow: 0px 4px 8px 0px #757575;
    border-radius: 0px
}

.card2 {
    margin: 0px 40px
}

.logo {
    width: 200px;
    height: 100px;
    margin-top: 20px;
    margin-left: 35px
}

.image {
    width: 360px;
    height: 280px
}

.border-line {
    border-right: 1px solid #EEEEEE
}

.facebook {
    background-color: #3b5998;
    color: #fff;
    font-size: 18px;
    padding-top: 5px;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    cursor: pointer
}

.twitter {
    background-color: #1DA1F2;
    color: #fff;
    font-size: 18px;
    padding-top: 5px;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    cursor: pointer
}

.linkedin {
    background-color: #2867B2;
    color: #fff;
    font-size: 18px;
    padding-top: 5px;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    cursor: pointer
}

.line {
    height: 1px;
    width: 45%;
    background-color: #E0E0E0;
    margin-top: 10px
}

.or {
    width: 10%;
    font-weight: bold
}

.text-sm {
    font-size: 14px !important
}

::placeholder {
    color: #BDBDBD;
    opacity: 1;
    font-weight: 300
}

:-ms-input-placeholder {
    color: #BDBDBD;
    font-weight: 300
}

::-ms-input-placeholder {
    color: #BDBDBD;
    font-weight: 300
}

input,
textarea {
    padding: 10px 12px 10px 12px;
    border: 1px solid lightgrey;
    border-radius: 2px;
    margin-bottom: 5px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    color: #2C3E50;
    font-size: 14px;
    letter-spacing: 1px
}

input:focus,
textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #304FFE;
    outline-width: 0
}

button:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0
}

a {
    color: inherit;
    cursor: pointer
}

.btn-blue {
    background-color: #1A237E;
    width: 150px;
    color: #fff;
    border-radius: 2px
}

.btn-blue:hover {
    background-color: #000;
    cursor: pointer
}

.bg-blue {
    color: #fff;
    background-color: #1A237E
}

@media screen and (max-width: 991px) {
    .logo {
        margin-left: 0px
    }

    .image {
        width: 300px;
        height: 220px
    }

    .border-line {
        border-right: none
    }

    .card2 {
        border-top: 1px solid #EEEEEE !important;
        margin: 0px 15px
    }
}
</style>


<div class="container">
    <h3 align="center">Visitor Management System</h3>
    <br />

    <div class="row">
        <div class="col-md-3">&nbsp;</div>
        <div class="col-md-6">
            <span id="error"></span>
            <div class="card">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <form method="post" id="login_form">
                        <div class="form-group">
                            <label>Enter Email Address</label>
                            <input type="text" name="user_email" id="user_email" class="form-control" required
                                data-parsley-type="email" data-parsley-trigger="keyup" />
                        </div>
                        <div class="form-group">
                            <label>Enter password</label>
                            <input type="password" name="user_password" id="user_password" class="form-control" required
                                data-parsley-trigger="keyup" />
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" name="login" id="login_button" class="btn btn-primary" value="Login" />
                        </div>
                    </form>
                </div>
            </div>
            <br />
            <br />
        </div>
    </div>
</div>
<br />
<br />
</body>

</html>

<script>
$(document).ready(function() {

    $('#login_form').parsley();

    $('#login_form').on('submit', function(event) {
        event.preventDefault();
        if ($('#login_form').parsley().isValid()) {
            $.ajax({
                url: "login_action.php",
                method: "POST",
                data: $(this).serialize(),
                dataType: 'json',
                beforeSend: function() {
                    $('#login_button').attr('disabled', 'disabled');
                    $('#login_button').val('wait...');
                },
                success: function(data) {
                    $('#login_button').attr('disabled', false);
                    if (data.error != '') {
                        $('#error').html(data.error);
                        $('#login_button').val('Login');
                    } else {
                        window.location.href =
                            "<?php echo $visitor->base_url; ?>dashboard.php";
                    }
                }
            })
        }
    });

});
</script>