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

<style>
.main-body {
    padding: 15px;
}

.card {
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0, 0, 0, .125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col,
.gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}

.mb-3,
.my-3 {
    margin-bottom: 1rem !important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}

.h-100 {
    height: 100% !important;
}

.shadow-none {
    box-shadow: none !important;
}
</style>




<div class="col-sm-10 offset-sm-2 py-4">
    <span id="message"></span>
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
                                <input type="text" name="admin_contact_no" id="admin_contact_no" class="form-control"
                                    required data-parsley-type="integer" data-parsley-minlength="10"
                                    data-parsley-maxlength="12" data-parsley-trigger="keyup"
                                    value="<?php echo $row['admin_contact_no']; ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4 text-right">User Email <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" name="admin_email" id="admin_email" class="form-control" required
                                    data-parsley-type="email" data-parsley-maxlength="150" data-parsley-trigger="keyup"
                                    value="<?php echo $row['admin_email']; ?>" />
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
<div class="container">
    <div class="main-body">



        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="<?php echo $row["admin_profile"];  ?>" alt="Admin" class="rounded-circle"
                                width="150">
                            <div class="mt-3">
                                <h4 id="admin_name"></h4>
                                <p class="text-secondary mb-1"><?php echo $row["admin_email"];  ?></p>
                                <p class="text-muted font-size-sm"><?php echo $row["admin_contact_no"];  ?></p>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <form method="post" id="user_form" enctype="multipart/form-data" autocomplete="off">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-sm-3">
                                    <h6 class="mb-0">Nom complet</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="admin_name" id="admin_name" class="form-control" required
                                        data-parsley-pattern="/^[a-zA-Z\s]+$/" data-parsley-maxlength="150"
                                        data-parsley-trigger="keyup" value="<?php echo $row['admin_name']; ?>" />
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="admin_email" id="admin_email" class="form-control" required
                                        data-parsley-type="email" data-parsley-maxlength="150"
                                        data-parsley-trigger="keyup" value="<?php echo $row['admin_email']; ?>" />
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Contact</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="admin_contact_no" id="admin_contact_no"
                                        class="form-control" required data-parsley-type="integer"
                                        data-parsley-minlength="10" data-parsley-maxlength="12"
                                        data-parsley-trigger="keyup" value="<?php echo $row['admin_contact_no']; ?>" />
                                </div>
                                <div class="form-group text-center">
                                    <input type="hidden" name="hidden_id" value="<?php echo $row["admin_id"]; ?>" />
                                    <input type="hidden" name="action" value="profile" />
                                    <button type="submit" name="submit" id="submit_button" class="btn btn-success"><i
                                            class="far fa-save"></i> Save</button>
                                </div>
                            </div>

                            <hr>
                        </div>
                    </form>
                </div>
                <div class="row gutters-sm">


                </div>
            </div>
        </div>
    </div>
</div>

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
                    $('#submit_button').html('Patientez...');
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
</script>