
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
                    <th>icon</th>
                    <th>Details</th>
                    <th>info_1</th>
                    <th>info_2</th>
                    <th>status</th>
                    <th>is_trash</th>

                    

              
                  </tr>
                </thead>
                <tbody id="contact_us_details">
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
            <form role="form" enctype="multipart/form-data">
  <div class="box-body">
    <div class="form-group">
      <label for="Icon">Icon</label>
      <input type="file" class="form-control" id="Icon" placeholder="Upload Icon">
    </div>
    <div class="form-group">
      <label for="Details">Details</label>
      <textarea class="form-control" id="Details" rows="4" placeholder="Enter Details"></textarea>
    </div>
    <div class="form-group">
      <label for="Info_1">Info 1</label>
      <input type="text" class="form-control" id="Info_1" placeholder="Enter Info 1">
    </div>
    <div class="form-group">
      <label for="Info_2">Info 2</label>
      <input type="text" class="form-control" id="Info_2" placeholder="Enter Info 2">
    </div>
  </div>
  <!-- /.box-body -->
</form>
</div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
  <button type="button" class="btn btn-primary" onclick="submitContactUsDetailsData()">Save changes</button>
</div>
</div>

<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

<script>
function submitContactUsDetailsData(){
    var formData = new FormData();
    formData.append('icon', $('#Icon')[0].files[0]);
    formData.append('details', $('#Details').val());
    formData.append('info_1', $('#Info_1').val());
    formData.append('info_2', $('#Info_2').val());

    const controller = "http://127.0.0.1:7452/contact_us_details/add";
    $.ajax({
        type: 'POST',
        url: controller,
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        success: (response) => {
            if (response.res === 1) {
                alert('Contact Us Details entry saved successfully!');
                // Optionally, close the modal and refresh the table
                $('#modal-default').modal('hide');
                // Refresh the data in the table
                // refreshContactUsDetailsData(); // Uncomment this if you have a function to refresh the contact us details data
            } else {
                alert('Failed to save Contact Us Details entry!');
            }
            console.log(response);
        },
        error: (xhr, status, error) => {
            console.error(`Error: ${status} - ${error}`);
            alert('Error saving Contact Us Details entry!');
        }
    });
}
</script>

