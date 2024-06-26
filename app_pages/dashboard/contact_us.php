
<section class="content-header">
      <h1>
        Welcome to <?=$CompanyName;?> Support
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=$URL?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
    <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Responsive Hover Table</h3>

              <div class="box-tools">
                <!-- <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div> -->
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                  Add New
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>subject</th>
                    <th>message</th>
                    <th>status</th>
                    <th>is_trash</th>

                    

              
                  </tr>
                </thead>
                <tbody id="contact_us">
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      <div class="row">
      </div>
    </section>
  



    <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
              <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
  <div class="box-body">
    <div class="form-group">
      <label for="Name">Name</label>
      <input type="text" class="form-control" id="Name" placeholder="Enter Name">
    </div>
    <div class="form-group">
      <label for="Email">Email</label>
      <input type="email" class="form-control" id="Email" placeholder="Enter Email">
    </div>
    <div class="form-group">
      <label for="Subject">Subject</label>
      <input type="text" class="form-control" id="Subject" placeholder="Enter Subject">
    </div>
    <div class="form-group">
      <label for="Message">Message</label>
      <textarea class="form-control" id="Message" rows="4" placeholder="Enter Message"></textarea>
    </div>
  </div>
  <!-- /.box-body -->
</form>
</div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
  <button type="button" class="btn btn-primary" onclick="submitContactUsData()">Save changes</button>
</div>
</div>

<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

<script>
function submitContactUsData(){
    var formData = {
        'name': $('#Name').val(),
        'email': $('#Email').val(),
        'subject': $('#Subject').val(),
        'message': $('#Message').val()
    };

    const controller = "http://127.0.0.1:7452/contact_us/add";
    $.ajax({
        type: 'POST',
        url: controller,
        data: JSON.stringify(formData),
        contentType: 'application/json',
        success: (response) => {
            if (response.res === 1) {
                alert('Contact Us entry saved successfully!');
                // Optionally, close the modal and refresh the table
                $('#modal-default').modal('hide');
                // Refresh the data in the table
                // refreshContactUsData(); // Uncomment this if you have a function to refresh the contact us data
            } else {
                alert('Failed to save Contact Us entry!');
            }
            console.log(response);
        },
        error: (xhr, status, error) => {
            console.error(`Error: ${status} - ${error}`);
            alert('Error saving Contact Us entry!');
        }
    });
}
</script>
