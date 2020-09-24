<!DOCTYPE html>
<html>
<head>
    <title>Laravel 7 CRUD using Datatables</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        error=false

        // function validate()
        // {
        // if(document.userForm.name.value !='' && document.userForm.email.value !='' )
        // document.userForm.btnsave.disabled=false
        // else
        // document.userForm.btnsave.disabled=true
        // }
    </script>
</head>
<body>

<div class="container">
    <h1 align="center">Laravel 7 CRUD using Datatables</h1>
    <br/>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success mb-2" id="new-user" data-toggle="modal">New User</a>
            </div>
        </div>
    </div>

    <table class="table table-bordered data-table" width="100%" cellspacing="0" cellpadding="0" data-page-length="25" data-order="[[ 0, &quot;desc&quot; ]]">
        <thead>
            <tr id="">
                <th width="5%">No</th>
                <th width="5%">Company Name</th>
                <th width="5%">Company Address</th>
                <th width="5%">Contact Person</th>
                <th width="5%">Designation</th>
                <th width="10%">MobileNo</th>
                <th width="10%">EmailAddress</th>
                <th width="5%">ITManager</th>
                <th width="10%">ContactNo</th>
                <th width="10%">EmailAddress_IT</th>
                <th width="5%">Zone</th>
                <th width="10%">Remarks</th>
                <th width="5%">Status</th>
                <th width="10%">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<!-- Add and Edit customer modal -->
<div class="modal fade" id="crud-modal" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="userCrudModal"></h4>
            </div>
            <div class="modal-body">
            <form name="userForm" action="" method="POST">
                <input type="hidden" name="user_id" id="user_id" >
                @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Company Name:</strong>
                            <input type="text" name="CompanyAddress" id="CompanyName" class="form-control" placeholder="Company Name" >
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Company Address:</strong>
                            <input type="text" name="CompanyAddress" id="CompanyAddress" class="form-control" placeholder="Company Address" >
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Contact Person:</strong>
                            <input type="text" name="ContactPerson" id="ContactPerson" class="form-control" placeholder="Contact Person" >
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Designation:</strong>
                            <input type="text" name="Designation" id="Designation" class="form-control" placeholder="Designation" >
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Mobile No:</strong>
                            <input type="text" name="MobileNo" id="MobileNo" class="form-control" placeholder="Mobile No" >
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Email Address:</strong>
                            <input type="text" name="EmailAddress" id="EmailAddress" class="form-control" placeholder="Email Address" >
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>IT Manager:</strong>
                            <input type="text" name="ITManager" id="ITManager" class="form-control" placeholder="IT Manager">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Contact No:</strong>
                            <input type="text" name="ContactNo" id="ContactNo" class="form-control" placeholder="Contact No">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Email Address IT:</strong>
                            <input type="text" name="EmailAddress_IT" id="EmailAddress_IT" class="form-control" placeholder="Email Address IT">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Zone:</strong>
                            <input type="text" name="Zone" id="Zone" class="form-control" placeholder="Zone">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Remarks:</strong>
                            <input type="text" name="Remarks" id="Remarks" class="form-control" placeholder="Remarks">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary">Save</button>
                        <!-- <a href="{{ route('clients.index') }}" class="btn btn-danger">Cancel</a> -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<!-- Show user modal -->
<div class="modal fade" id="crud-modal-show" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="userCrudModal-show"></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2"></div>
                    <div class="col-xs-10 col-sm-10 col-md-10 ">
                        <table class="table-responsive ">
                            <tr height="50px"><td><strong>Name:</strong></td><td id="sname"></td></tr>
                            <tr height="50px"><td><strong>Email:</strong></td><td id="semail"></td></tr>

                            <tr><td></td><td style="text-align: right "><a href="{{ route('clients.index') }}" class="btn btn-danger">OK</a> </td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

<script type="text/javascript">
$(document).ready(function () {
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('clients.index') }}",
        columns: [
        {data: 'Serial_No', name: 'Serial_No '},
        {data: 'CompanyName', name: 'CompanyName'},
        {data: 'CompanyAddress', name: 'CompanyAddress'},
        {data: 'ContactPerson', name: 'ContactPerson'},
        {data: 'Designation', name: 'Designation'},
        {data: 'MobileNo', name: 'MobileNo'},
        {data: 'EmailAddress', name: 'EmailAddress'},
        {data: 'ITManager', name: 'ITManager'},
        {data: 'ContactNo', name: 'ContactNo'},
        {data: 'EmailAddress_IT', name: 'EmailAddress_IT'},
        {data: 'Zone', name: 'Zone'},
        {data: 'Remarks', name: 'Remarks'},
        {data: 'Status', name: 'Status'},
        {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    /* When click New customer button */
    $('#new-user').click(function () {
        $('#btn-save').val("create-user");
        $('#user').trigger("reset");
        $('#userCrudModal').html("Add New User");
        $('#crud-modal').modal('show');
    });

    /* Edit customer */
    // $('body').on('click', '#edit-user', function () {
    //     var user_id = $(this).data('id');
    //     $.get('clients/'+user_id+'/edit', function (data) {
    //         $('#userCrudModal').html("Edit User");
    //         $('#btn-update').val("Update");
    //         $('#btn-save').prop('disabled',false);
    //         $('#crud-modal').modal('show');
    //         $('#user_id').val(data.id);
    //         $('#name').val(data.name);
    //         $('#email').val(data.email);

    // })
    // });
    /* Show customer */
    $('body').on('click', '#show-user', function () {
        var user_id = $(this).data('id');
        $.get('clients/'+user_id, function (data) {
            $('#sname').html(data.name);
            $('#semail').html(data.email);
        })
        $('#userCrudModal-show').html("User Details");
        $('#crud-modal-show').modal('show');
    });

    /* Delete customer */
    $('body').on('click', '#delete-user', function () {
        var user_id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        confirm("Are You sure want to delete !");
        $.ajax({
            type: "DELETE",
            url: "http://localhost/Database_mailer/public/clients/"+user_id,
            data: {
            "id": user_id,
            "_token": token,
            },
            success: function (data) {
            //$('#msg').html('Customer entry deleted successfully');
            //$("#customer_id_" + user_id).remove();
            table.ajax.reload();
            },
            error: function (data) {
            console.log('Error:', data);
            }
        });
    });
    $('#btn-save').on('click', function () {
        var CompanyName = $('#CompanyName').text();  
        var CompanyAddress = $('#CompanyAddress').text();  
        var ContactPerson = $('#ContactPerson').text();  
        var Designation = $('#Designation').text();  
        var MobileNo = $('#MobileNo').text();  
        var email = $('#EmailAddress').text();  
        var ITManager = $('#ITManager').text();  
        var ContactNo = $('#ContactNo').text();  
        var emailIT = $('#EmailAddress_IT').text();  
        var Zone = $('#Zone').text();  
        var Remarks = $('#Remarks').text();
        confirm("Are You sure want to Add?");
        $.ajax({
            type: "POST",
            url: "{{ route('clients.store') }}",
            data: {CompanyName:CompanyName, CompanyAddress:CompanyAddress, ContactPerson:ContactPerson, Designation:Designation, email:email, ITManager:ITManager, MobileNo:MobileNo, ContactNo:ContactNo, emailIT:emailIT, Zone:Zone, Remarks:Remarks},
            success: function (data) {
                alert(data);
            //$('#msg').html('Customer entry deleted successfully');
            //$("#customer_id_" + user_id).remove();
            table.ajax.reload();
            },
            error: function (data) {
            console.log('Error:', data);
            }
        });
    });
});

</script>
</html>