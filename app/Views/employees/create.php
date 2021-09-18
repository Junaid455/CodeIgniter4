<?php include(APPPATH.'/Views/layouts/header.php'); ?>

<div class="row">
    <div class="col-md-8 offset-2">
        <span class="alert alert-success" style='display : none'></span>
        <h1>Employee</h1>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#saveEmployee">
        Add New Employee
        </button>

        <!-- Add New Employee Modal -->
        <div class="modal fade" id="saveEmployee" tabindex="-1" role="dialog" aria-labelledby="saveEmployee" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="saveEmployee">Add New Employee</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="input-fname">First Name</label>
                            <input type="text" class="form-control" name="input-fname" id="input-fname" placeholder="Post Name">
                        </div>
                        <div class="form-group">
                            <label for="input-lname">Last Name</label>
                            <input type="text" class="form-control" name="input-lname" id="input-lname" placeholder="Post Name">
                        </div>
                        <div class="form-group">
                            <label for="input-email">Email</label>
                            <input type="email" class="form-control" name="input-email" id="input-email" placeholder="Post Name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary ajax-save-employee">Save Employee</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- View Employee Modal -->
        <div class="modal fade" id="viewEmployee" tabindex="-1" role="dialog" aria-labelledby="viewEmployee" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewEmployee">View Employee</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3 class="text-center">Employee Info</h3>
                        <p class="pl-3 vid"></p>
                        <p class="pl-3 vfname"></p>
                        <p class="pl-3 vlname"></p>
                        <p class="pl-3 vemail"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8 offset-2 mt-5">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody class="emptable">
            </tbody>
        </table>
    </div>
</div>
<?php include(APPPATH.'/Views/layouts/footer.php'); ?>
<script>

// Add Employee
$(document).ready(function () {
    $('.ajax-save-employee').click(function (e) { 
        e.preventDefault();
        var data = {
            'fname': $('#input-fname').val(),
            'lname': $('#input-lname').val(),
            'femail': $('#input-email').val(),
        };
        $.ajax({
            type: "post",
            url: "ajax-employee/store",
            data: data,
            success: function (response) {
            $('#saveEmployee').modal('hide');
            $('.alert-success').text(response.status);
            $('.alert-success').css('display', 'block');
            $('.alert-success').fadeOut(6000);
            $('#saveEmployee').find('Input').val('');
            $('.emptable').html('');
            GetData();
            }
        });
    });
});

// Get All Employee
function GetData() { 
    $.ajax({
        type: "GET",
        url: "ajax-employee/getEmployee",
        success: function (response) {
            $.each(response.employees, function (key, value) { 
                $('.emptable').append('<tr><td class="stdid">'+value['id']+'</td><td>'+value['first_name']+'</td><td>'+value['last_name']+'</td><td>'+value['email']+'</td><td><button class="badge p-2 m-2 btn-info viewBtn">View</button><button class="badge p-2 m-2 btn-warning">Edit</button><button class="badge p-2 m-2 btn-danger deleteBtn">Delete</button></td>\</tr>');
            });
        }
    });
}

// View Employee
$(document).ready(function () {
    $(document).on('click','.viewBtn', function () { 
        var empID = $(this).closest('tr').find('.stdid').text();
        $.ajax({
            type: "post",
            url: "ajax-employee/viewEmployee",
            data: { 'empID' : empID},
            success: function (response) {
                console.log(response.employee);
                $('#viewEmployee').modal('show');
                $('.vid').text(response.employee.id)
                $('.vfname').text(response.employee.first_name)
                $('.vlname').text(response.employee.last_name)
                $('.vemail').text(response.employee.email)
            }
        });
    });
});

// Delete Employee
$(document).ready(function () {
    $(document).on('click','.deleteBtn', function () { 
        var empID = $(this).closest('tr').find('.stdid').text();
        $.ajax({
            type: "post",
            url: "ajax-employee/deleteEmployee",
            data: { 'empID' : empID},
            success: function (response) {
                $('.alert-success').text(response.status);
                $('.alert-success').css('display', 'block');
                $('.alert-success').fadeOut(6000);
                $('.emptable').html('');
                GetData();
            }
        });
    });
});



$(document).ready(function () {    
GetData();
});
</script>