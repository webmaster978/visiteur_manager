<?php

//visitor.php

include('vms.php');

$visitor = new vms();

if (!$visitor->is_login()) {
    header("location:" . $visitor->base_url . "");
}

include('header.php');

include('sidebar.php');



?>




<div class="col-sm-12">
    <span id="message"></span>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-4">
                    <h2>Nos visiteurs</h2>
                </div>
                <div class="col-sm-4">
                    <div class="row input-daterange">
                        <div class="col-md-6">
                            <input type="text" name="from_date" id="from_date" class="form-control form-control-sm"
                                placeholder="Date de..." readonly />
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="to_date" id="to_date" class="form-control form-control-sm"
                                placeholder="Jusqu'a" readonly />
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="button" name="filter" id="filter" class="btn btn-info btn-sm"><i
                            class="fas fa-filter"></i></button>
                    &nbsp;
                    <button type="button" name="refresh" id="refresh" class="btn btn-secondary btn-sm"><i
                            class="fas fa-sync-alt"></i></button>
                </div>
                <div class="col-md-2" align="right">
                    <a href="#" name="export" id="export" class="text-success"><i class="fas fa-file-csv fa-2x"></i></a>
                    &nbsp;
                    <button type="button" name="add_visitor" id="add_visitor" class="btn btn-success btn-sm"
                        style="margin-top: -15px;"><i class="fas fa-user-plus"></i></button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="visitor_table">
                    <thead>
                        <tr>
                            <th>Nom du visteur</th>
                            <th>Personne a visite</th>
                            <th>Departement</th>
                            <th>Heure d'arrivé</th>
                            <th>Sortie</th>
                            <th>Status</th>
                            <?php
                            if ($visitor->is_master_user()) {
                                echo '<th>Ajouter par</th>';
                            }
                            ?>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>



<?php include 'foot.php'; ?>
</body>

</html>

<div id="visitorModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="visitor_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal_title">Nouveau visiteur</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4 text-right">Nom du visiteur</label>
                            <div class="col-md-8">

                                <input type="text" name="visitor_name" id="visitor_name" class="form-control" required
                                    data-parsley-pattern="/^[a-zA-Z\s]+$/" data-parsley-maxlength="150"
                                    data-parsley-trigger="keyup" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4 text-right">Contact</label>

                            <div class="col-md-8">
                                <input type="text" name="visitor_mobile_no" id="visitor_mobile_no" class="form-control"
                                    required data-parsley-type="integer" data-parsley-minlength="10"
                                    data-parsley-maxlength="12" data-parsley-trigger="keyup" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4 text-right">Heure d'arrivé</label>
                            <div class="col-md-8">
                                <input id="timepicker" name="timepicker" width="276" />
                                <!-- <input type="text" name="timepicker" id="timepicker" class="form-control" required
                                    data-parsley-type="email" data-parsley-maxlength="150"
                                    data-parsley-trigger="keyup" /> -->
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4 text-right">Adresse du visiteur</label>
                            <div class="col-md-8">
                                <textarea name="visitor_address" id="visitor_address" class="form-control" required
                                    data-parsley-maxlength="400" data-parsley-trigger="keyup"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4 text-right">Departement</label>
                            <div class="col-md-8">
                                <select name="visitor_department" id="visitor_department" class="form-control" required
                                    data-parsley-trigger="keyup">
                                    <option value="">Selectionner un departement</option>
                                    <?php echo $visitor->load_department(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4 text-right">Personne a visité</label>
                            <div class="col-md-8">
                                <select name="visitor_meet_person_name" id="visitor_meet_person_name"
                                    class="form-control" required data-parsley-trigger="keyup">
                                    <option value="">Selectionner une personne</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4 text-right">Raison de la visite</label>
                            <div class="col-md-8">
                                <textarea name="visitor_reason_to_meet" id="visitor_reason_to_meet" class="form-control"
                                    required data-parsley-maxlength="400" data-parsley-trigger="keyup"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="hidden_id" id="hidden_id" />
                    <input type="hidden" name="action" id="action" value="Enregistrer" />
                    <input type="submit" name="submit" id="submit_button" class="btn btn-success" value="Ajouter" />
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="visitordetailModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <form method="post" id="visitor_details_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal_title">Details du visiteur</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4 text-right"><b>Nom du visiteur</b></label>
                            <div class="col-md-8">
                                <span id="visitor_name_detail"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4 text-right"><b>Heure d'arrivé'</b></label>
                            <div class="col-md-8">
                                <span id="timepicker_detail"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4 text-right"><b>Numero piece d'identité</b></label>
                            <div class="col-md-8">
                                <span id="visitor_mobile_no_detail"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4 text-right"><b>Address du visiteur</b></label>
                            <div class="col-md-8">
                                <span id="visitor_address_detail"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4 text-right"><b>Departement</b></label>
                            <div class="col-md-8">
                                <span id="visitor_department_detail"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4 text-right"><b>Personne a visite</b></label>
                            <div class="col-md-8">
                                <span id="visitor_meet_person_name_detail"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4 text-right"><b>Raison de visite</b></label>
                            <div class="col-md-8">
                                <span id="visitor_reason_to_meet_detail"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4 text-right"><b>Observation du visiteur</b></label>
                            <div class="col-md-8">
                                <textarea name="visitor_outing_remark" id="visitor_outing_remark" class="form-control"
                                    required data-parsley-maxlength="400" data-parsley-trigger="keyup"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="hidden_visitor_id" id="hidden_visitor_id" />
                    <input type="hidden" name="action" value="update_outing_detail" />
                    <input type="submit" name="submit" id="detail_submit_button" class="btn btn-success"
                        value="Enregistrer" />
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </form>
    </div>
</div>


<script>
$('#timepicker').timepicker({
    uiLibrary: 'bootstrap4'
});
</script>

<script>
$(document).ready(function() {

    load_data();

    function load_data(from_date = '', to_date = '') {
        var dataTable = $('#visitor_table').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "visitor_action.php",
                type: "POST",
                data: {
                    action: 'fetch',
                    from_date: from_date,
                    to_date: to_date
                }
            },
            "columnDefs": [{
                <?php
                    if ($visitor->is_master_user()) {
                    ?> "targets": [7],
                <?php
                    } else {
                    ?> "targets": [6],
                <?php
                    }
                    ?> "orderable": false,
            }, ],
        });
    }

    $('#add_visitor').click(function() {
        $('#visitor_form')[0].reset();
        $('#visitor_form').parsley().reset();
        $('#modal_title').text('Nouveau visiteur');
        $('#action').val('Add');
        $('#submit_button').val('Enregistrer');
        $('#visitorModal').modal('show');
    });

    $(document).on('change', '#visitor_department', function() {
        var person = $('#visitor_department').find(':selected').data('person');
        var person_array = person.split(", ");
        var html = '<option value="">Selectionner une personne</option>';
        for (var count = 0; count < person_array.length; count++) {
            html += '<option value="' + person_array[count] + '">' + person_array[count] + '</option>';
        }
        $('#visitor_meet_person_name').html(html);
    });

    $('#visitor_form').parsley();

    $('#visitor_form').on('submit', function(event) {
        event.preventDefault();
        if ($('#visitor_form').parsley().isValid()) {
            $.ajax({
                url: "visitor_action.php",
                method: "POST",
                data: $(this).serialize(),
                beforeSend: function() {
                    $('#submit_button').attr('disabled', 'disabled');
                    $('#submit_button').val('patienter ...');
                },
                success: function(data) {
                    $('#submit_button').attr('disabled', false);
                    $('#visitorModal').modal('hide');
                    $('#message').html(data);
                    $('#visitor_table').DataTable().destroy();
                    load_data();
                    setTimeout(function() {
                        $('#message').html('');
                    }, 5000);
                }
            })
        }
    });

    $(document).on('click', '.edit_button', function() {
        var visitor_id = $(this).data('id');
        $('#visitor_form').parsley().reset();
        $.ajax({
            url: "visitor_action.php",
            method: "POST",
            data: {
                visitor_id: visitor_id,
                action: 'fetch_single'
            },
            dataType: 'JSON',
            success: function(data) {
                $('#visitor_name').val(data.visitor_name);
                $('#timepicker').val(data.timepicker);
                $('#visitor_mobile_no').val(data.visitor_mobile_no);
                $('#visitor_address').val(data.visitor_address);
                $('#visitor_department').val(data.visitor_department);

                var person = $('#visitor_department').find(':selected').data('person');
                var person_array = person.split(", ");
                var html = '<option value="">Selectionner une personne</option>';
                for (var count = 0; count < person_array.length; count++) {
                    html += '<option value="' + person_array[count] + '">' + person_array[
                        count] + '</option>';
                }
                $('#visitor_meet_person_name').html(html);
                $('#visitor_meet_person_name').val(data.visitor_meet_person_name);
                $('#visitor_reason_to_meet').val(data.visitor_reason_to_meet);

                $('#modal_title').text('modofier les donnees');
                $('#action').val('Edit');
                $('#submit_button').val('Edit');
                $('#visitorModal').modal('show');
                $('#hidden_id').val(visitor_id);

            }
        })
    });

    $(document).on('click', '.delete_button', function() {
        var id = $(this).data('id');
        if (confirm("Etes vous sur de vouloir supprimer?")) {
            $.ajax({
                url: "visitor_action.php",
                method: "POST",
                data: {
                    id: id,
                    action: 'delete'
                },
                success: function(data) {
                    $('#message').html(data);
                    $('#visitor_table').DataTable().destroy();
                    load_data();
                    setTimeout(function() {
                        $('#message').html('');
                    }, 5000);
                }
            });
        }
    });

    $(document).on('click', '.view_button', function() {
        var visitor_id = $(this).data('id');
        $.ajax({
            url: "visitor_action.php",
            method: "POST",
            data: {
                visitor_id: visitor_id,
                action: 'fetch_single'
            },
            dataType: 'JSON',
            success: function(data) {
                $('#visitor_name_detail').text(data.visitor_name);
                $('#timepicker_detail').text(data.timepicker);
                $('#visitor_mobile_no_detail').text(data.visitor_mobile_no);
                $('#visitor_address_detail').text(data.visitor_address);
                $('#visitor_department_detail').text(data.visitor_department);
                $('#visitor_meet_person_name_detail').text(data.visitor_meet_person_name);
                $('#visitor_reason_to_meet_detail').text(data.visitor_reason_to_meet);
                $('#visitor_outing_remark').val(data.visitor_outing_remark);
                $('#visitordetailModal').modal('show');
                $('#hidden_visitor_id').val(visitor_id);
            }
        })
    });

    $('#visitor_details_form').parsley();

    $('#visitor_details_form').on('submit', function(event) {
        event.preventDefault();
        if ($('#visitor_details_form').parsley().isValid()) {
            $.ajax({
                url: "visitor_action.php",
                method: "POST",
                data: $(this).serialize(),
                beforeSend: function() {
                    $('#detail_submit_button').attr('disabled', 'disabled');
                    $('#detail_submit_button').val('wait...');
                },
                success: function(data) {
                    $('#detail_submit_button').attr('disabled', false);
                    $('#detail_submit_button').val('Save');
                    $('#visitordetailModal').modal('hide');
                    $('#message').html(data);
                    $('#visitor_table').DataTable().destroy();
                    load_data();
                    setTimeout(function() {
                        $('#message').html('');
                    }, 5000);
                }
            });
        }
    });

    $('#filter').click(function() {
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        $('#visitor_table').DataTable().destroy();
        load_data(from_date, to_date);
    });

    $('#refresh').click(function() {
        $('#from_date').val('');
        $('#to_date').val('');
        $('#visitor_table').DataTable().destroy();
        load_data();
    });

    $('#export').click(function() {
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();

        if (from_date != '' && to_date != '') {
            window.location.href = "<?php echo $visitor->base_url; ?>export.php?from_date=" +
                from_date + "&to_date=" + to_date + "";
        } else {
            window.location.href = "<?php echo $visitor->base_url; ?>export.php";
        }
    });

});
</script>