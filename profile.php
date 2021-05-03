<?php

//department.php

include('vms.php');

$visitor = new vms();

if (!$visitor->is_login()) {
    header("location:" . $visitor->base_url . "");
}

$visitor->query = "
SELECT * FROM admin_table 
WHERE admin_id = '" . $_SESSION["admin_id"] . "'
";

$result = $visitor->get_result();

include('header.php');

include('sidebar.php');
?>

<div class="container-fluid">
    <div class="col-sm-12">
        <span id="message"></span>
        <?php
        foreach ($result as $row) {
        ?>
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="<?php echo $row["admin_profile"];  ?>" class="rounded-circle" width="150">
                            <h4 class="card-title mt-10"><?php echo $row['admin_name']; ?></h4>
                            <p class="card-subtitle">Uptodate Developer</p>
                            <div class="row text-center justify-content-md-center">
                                <div class="col-4"><a href="javascript:void(0)" class="link"><i class="ik ik-user"></i>
                                        <font class="font-medium">254</font>
                                    </a></div>
                                <div class="col-4"><a href="javascript:void(0)" class="link"><i class="ik ik-image"></i>
                                        <font class="font-medium">54</font>
                                    </a></div>
                            </div>
                        </div>
                    </div>
                    <hr class="mb-0">
                    <div class="card-body">
                        <small class="text-muted d-block">Adresse mail </small>
                        <h6><?php echo $row['admin_email']; ?></h6>
                        <small class="text-muted d-block pt-10">Contact</small>
                        <h6><?php echo $row['admin_contact_no']; ?></h6>
                        <small class="text-muted d-block pt-10">Address</small>
                        <h6>71 Pilgrim Avenue Chevy Chase, MD 20815</h6>
                        <div class="map-box">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d248849.886539092!2d77.49085452149588!3d12.953959988118836!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae1670c9b44e6d%3A0xf8dfc3e8517e4fe0!2sBengaluru%2C+Karnataka!5e0!3m2!1sen!2sin!4v1542005497600"
                                width="100%" height="300" frameborder="0" style="border:0" allowfullscreen=""></iframe>
                        </div>
                        <small class="text-muted d-block pt-30">Social Profile</small>
                        <br>
                        <button class="btn btn-icon btn-facebook"><i class="fab fa-facebook-f"></i></button>
                        <button class="btn btn-icon btn-twitter"><i class="fab fa-twitter"></i></button>
                        <button class="btn btn-icon btn-instagram"><i class="fab fa-instagram"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="card">
                    <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="pills-timeline-tab" data-toggle="pill" href="#current-month"
                                role="tab" aria-controls="pills-timeline" aria-selected="false">Journale</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab"
                                aria-controls="pills-profile" aria-selected="false">Securite</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active show" id="pills-setting-tab" data-toggle="pill"
                                href="#previous-month" role="tab" aria-controls="pills-setting"
                                aria-selected="true">Paramettre</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade" id="current-month" role="tabpanel"
                            aria-labelledby="pills-timeline-tab">
                            <div class="card-body">
                                <div class="profiletimeline mt-0">
                                    <div class="sl-item">
                                        <div class="sl-left"> <img src="<?php echo $row["admin_profile"];  ?>"
                                                alt="user" class="rounded-circle" width="150"> </div>
                                        <div class="sl-right">
                                            <div><a href="javascript:void(0)"
                                                    class="link"><?php echo $row['admin_name']; ?></a> <span
                                                    class="sl-date">5 minutes ago</span>
                                                <p>assign a new task <a href="javascript:void(0)"> Design weblayout</a>
                                                </p>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-6 mb-20"><img
                                                            src="<?php echo $row["admin_profile"];  ?>"
                                                            class="img-fluid rounded"></div>
                                                    <div class="col-lg-3 col-md-6 mb-20"><img
                                                            src="<?php echo $row["admin_profile"];  ?>"
                                                            class="img-fluid rounded"></div>
                                                    <div class="col-lg-3 col-md-6 mb-20"><img
                                                            src="<?php echo $row["admin_profile"];  ?>"
                                                            class="img-fluid rounded"></div>
                                                    <div class="col-lg-3 col-md-6 mb-20"><img
                                                            src="<?php echo $row["admin_profile"];  ?>"
                                                            class="img-fluid rounded"></div>
                                                </div>
                                                <div class="like-comm">
                                                    <a href="javascript:void(0)" class="link mr-10">2 comment</a>
                                                    <a href="javascript:void(0)" class="link mr-10"><i
                                                            class="fa fa-heart text-danger"></i> 5 Love</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="sl-item">

                                        <div class="sl-right">
                                            <div>
                                                <p>assign a new task <a href="javascript:void(0)"> Design weblayout</a>
                                                </p>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-6 mb-20"><img
                                                            src="<?php echo $row["admin_profile"];  ?>"
                                                            class="img-fluid rounded"></div>
                                                    <div class="col-lg-3 col-md-6 mb-20"><img
                                                            src="<?php echo $row["admin_profile"];  ?>"
                                                            class="img-fluid rounded"></div>
                                                    <div class="col-lg-3 col-md-6 mb-20"><img
                                                            src="<?php echo $row["admin_profile"];  ?>"
                                                            class="img-fluid rounded"></div>
                                                    <div class="col-lg-3 col-md-6 mb-20"><img
                                                            src="<?php echo $row["admin_profile"];  ?>"
                                                            class="img-fluid rounded"></div>
                                                </div>
                                                <div class="like-comm">
                                                    <a href="javascript:void(0)" class="link mr-10">2 comment</a>
                                                    <a href="javascript:void(0)" class="link mr-10"><i
                                                            class="fa fa-heart text-danger"></i> 5 Love</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>





                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 col-6"> <strong>Nom complet</strong>
                                        <br>
                                        <p class="text-muted"><?php echo $row['admin_name']; ?></p>
                                    </div>
                                    <div class="col-md-3 col-6"> <strong>Telephone</strong>
                                        <br>
                                        <p class="text-muted"><?php echo $row['admin_contact_no']; ?></p>
                                    </div>
                                    <div class="col-md-3 col-6"> <strong>Adresse mail</strong>
                                        <br>
                                        <p class="text-muted"><?php echo $row['admin_email']; ?></p>
                                    </div>
                                    <div class="col-md-3 col-6"> <strong>Bureau</strong>
                                        <br>
                                        <p class="text-muted">Uptodate developer</p>
                                    </div>
                                </div>
                                <hr>
                                <h4>Modifier le mot de passe</h4>
                                <span id="message"></span>
                                <p class="mt-30">

                                <form method="post" id="user_form">
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-4 text-right">Ancien mot de passe <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <input type="password" name="current_password" id="current_password"
                                                    class="form-control" required data-parsley-minlength="6"
                                                    data-parsley-maxlength="16" data-parsley-trigger="keyup" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-4 text-right">Nouveau mot de passe <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <input type="password" name="new_password" id="new_password"
                                                    class="form-control" required data-parsley-minlength="6"
                                                    data-parsley-maxlength="16" data-parsley-trigger="keyup" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-4 text-right">Confirmer le nouveau mot de passe <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <input type="password" name="re_enter_new_password"
                                                    id="re_enter_new_password" class="form-control" required
                                                    data-parsley-equalto="#new_password" data-parsley-trigger="keyup" />
                                            </div>
                                        </div>
                                    </div>
                                    <br />
                                    <div class="form-group text-center">
                                        <input type="hidden" name="action" value="change_password" />
                                        <button type="submit" name="submit" id="submit_button"
                                            class="btn btn-success"><i class="fas fa-lock"></i> Modifier</button>
                                    </div>
                                </form>

                                </p>



                            </div>
                        </div>
                        <div class="tab-pane fade active show" id="previous-month" role="tabpanel"
                            aria-labelledby="pills-setting-tab">
                            <div class="card-body">
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="example-name">Nom complet</label>

                                        <input type="text" name="admin_name" id="admin_name" class="form-control"
                                            required data-parsley-pattern="/^[a-zA-Z\s]+$/" data-parsley-maxlength="150"
                                            data-parsley-trigger="keyup" value="<?php echo $row['admin_name']; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email">Email</label>

                                        <input type="text" name="admin_email" id="admin_email" class="form-control"
                                            required data-parsley-type="email" data-parsley-maxlength="150"
                                            data-parsley-trigger="keyup" value="<?php echo $row['admin_email']; ?>" />
                                    </div>

                                    <div class="form-group">
                                        <label for="example-phone">Contact</label>

                                        <input type="text" name="admin_contact_no" id="admin_contact_no"
                                            class="form-control" required data-parsley-type="integer"
                                            data-parsley-minlength="10" data-parsley-maxlength="12"
                                            data-parsley-trigger="keyup"
                                            value="<?php echo $row['admin_contact_no']; ?>" />
                                    </div>
                                    <div class="form-group">



                                        <input type="file" name="user_image" id="user_image" />
                                        <span id="user_uploaded_image" class="mt-2">
                                            <img src="<?php echo $row["admin_profile"];  ?>"
                                                class="img-fluid img-thumbnail" width="200" />
                                            <input type="hidden" name="hidden_user_image"
                                                value="<?php echo $row["admin_profile"]; ?>" />
                                        </span>


                                    </div>


                                    <button class="btn btn-success" type="submit">Update Profile</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        ?>

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h2>Profile</h2>
                    </div>
                    <div class="col text-right">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="col-md-3">&nbsp;</div>
                <div class="col-md-6">
                    <form method="post" id="user_form" enctype="multipart/form-data">
                        <?php
                        foreach ($result as $row) {
                        ?>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-4 text-right">User Name <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="admin_name" id="admin_name" class="form-control" required
                                        data-parsley-pattern="/^[a-zA-Z\s]+$/" data-parsley-maxlength="150"
                                        data-parsley-trigger="keyup" value="<?php echo $row['admin_name']; ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-4 text-right">User Contact No. <span
                                        class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="admin_contact_no" id="admin_contact_no"
                                        class="form-control" required data-parsley-type="integer"
                                        data-parsley-minlength="10" data-parsley-maxlength="12"
                                        data-parsley-trigger="keyup" value="<?php echo $row['admin_contact_no']; ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-4 text-right">User Email <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="admin_email" id="admin_email" class="form-control" required
                                        data-parsley-type="email" data-parsley-maxlength="150"
                                        data-parsley-trigger="keyup" value="<?php echo $row['admin_email']; ?>" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-4 text-right">User Profile</label>
                                <div class="col-md-8">
                                    <input type="file" name="user_image" id="user_image" />
                                    <span id="user_uploaded_image" class="mt-2">
                                        <img src="<?php echo $row["admin_profile"];  ?>" class="img-fluid img-thumbnail"
                                            width="200" />
                                        <input type="hidden" name="hidden_user_image"
                                            value="<?php echo $row["admin_profile"]; ?>" />
                                    </span>
                                </div>
                            </div>
                        </div>
                        <br />
                        <div class="form-group text-center">
                            <input type="hidden" name="hidden_id" value="<?php echo $row["admin_id"]; ?>" />
                            <input type="hidden" name="action" value="profile" />
                            <button type="submit" name="submit" id="submit_button" class="btn btn-success"><i
                                    class="far fa-save"></i> Save</button>
                        </div>
                        <?php
                        }
                        ?>
                    </form>
                </div>
                <div class="col-md-3">&nbsp;</div>
            </div>
        </div>
    </div>
</div>
</div>
<?php include 'foot.php'; ?>
</body>

</html>

<script>
$(document).ready(function() {

    $('#user_form').parsley();

    $('#user_form').on('submit', function() {
        event.preventDefault();
        if ($('#user_form').parsley().isValid()) {
            var extension = $('#user_image').val().split('.').pop().toLowerCase();
            if (extension != '') {
                if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                    alert("Invalid Image File");
                    $('#user_image').val('');
                    return false;
                }
            }
            $.ajax({
                url: "user_action.php",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                dataType: "JSON",
                beforeSend: function() {
                    $('#submit_button').attr('disabled', 'disabled');
                    $('#submit_button').html('wait...');
                },
                success: function(data) {
                    $('#submit_button').attr('disabled', false);
                    $('#submit_button').html('<i class="far fa-save"></i> Save');
                    if (data.error != '') {
                        $('#message').html(data.error);
                    } else {
                        $('#admin_name').val(data.admin_name);
                        $('#admin_contact_no').val(data.admin_contact_no);
                        $('#admin_email').val(data.admin_email);
                        $('#user_uploaded_image').html('<img src="' + data.admin_profile +
                            '" class="img-thumbnail img-fluid" width="200" /><input type="hidden" name="hidden_user_image" value="' +
                            data.admin_profile + '" />');
                        $('#message').html(data.error);
                        setTimeout(function() {
                            $('#message').html('');
                        }, 5000);
                    }
                }
            })
        }
    });

    $('#user_image').change(function() {
        var extension = $('#user_image').val().split('.').pop().toLowerCase();
        if (extension != '') {
            if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                alert("Invalid Image File");
                $('#user_image').val('');
                return false;
            }
        }
    });

});

$(document).ready(function() {

    $('#user_form').parsley();

    $('#user_form').on('submit', function() {
        event.preventDefault();
        if ($('#user_form').parsley().isValid()) {
            $.ajax({
                url: "user_action.php",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                dataType: "JSON",
                beforeSend: function() {
                    $('#submit_button').attr('disabled', 'disabled');
                    $('#submit_button').html('Patitienter...');
                },
                success: function(data) {
                    $('#submit_button').attr('disabled', false);
                    $('#submit_button').html('<i class="fas fa-lock"></i> Change');
                    if (data.error != '') {
                        $('#message').html(data.error);
                    } else {
                        $('#user_form')[0].reset();
                        $('#message').html(data.success);
                        setTimeout(function() {
                            $('#message').html('');
                        }, 5000);
                    }
                }
            })
        }
    });

});
</script>