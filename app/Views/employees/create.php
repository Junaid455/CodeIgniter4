<?php include(APPPATH.'/Views/layouts/header.php'); ?>

<div class="row">
    <div class="col-md-8 offset-2">
        <h1>Employee</h1>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Add New Employee
        </button>

        <!-- Add New Employee Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
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
    </div>
</div>
<?php include(APPPATH.'/Views/layouts/footer.php'); ?>
<script>
$(document).ready(function () {
    $('.ajax-save-employee').click(function (e) { 
        e.preventDefault();
        var data = {
            fname: $('#input-fname').val(),
            lname: $('#input-lname').val(),
            femail: $('#input-email').val(),
        };
        $.ajax({
            type: "post",
            url: "/ajax-employee/store",
            data: data,
            success: function (response) {
            console.log(reponse)    
            }
        });
    });
});
</script>