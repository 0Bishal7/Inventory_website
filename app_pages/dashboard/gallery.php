
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
                    
                    <th>folder_name</th>
                    <th>folder_root</th>
                    <th>last_update</th>
                    <th>created</th>
                   
                    <th>status</th>
                    <th>is_trash</th>

                    

              
                  </tr>
                </thead>
                <tbody id="gallery">
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
      <label for="Folder_name">Folder Name</label>
      <input type="text" class="form-control" id="Folder_name" placeholder="Enter Folder Name">
    </div>
    <div class="form-group">
      <label for="Folder_root">Folder Root</label>
      <input type="file" class="form-control" id="Folder_root" placeholder="Enter Folder Root">
    </div>
    <div class="form-group">
      <label for="Last_update">Last Update</label>
      <input type="date" class="form-control" id="Last_update" placeholder="Enter Last Update Date">
    </div>
    <div class="form-group">
      <label for="Created">Created</label>
      <input type="date" class="form-control" id="Created" placeholder="Enter Created Date">
    </div>
  </div>
  <!-- /.box-body -->
</form>
</div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
  <button type="button" class="btn btn-primary" onclick="submitGalleryData()">Save changes</button>
</div>
</div>

<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

<script>
function submitGalleryData(){
    var formData = new FormData();
    formData.append('folder_name', $('#Folder_name').val());
    formData.append('folder_root', $('#Folder_root')[0].files[0]);
    formData.append('last_update', $('#Last_update').val());
    formData.append('created', $('#Created').val());

    const controller = "http://127.0.0.1:7452/gallery/add";
    $.ajax({
        type: 'POST',
        url: controller,
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        success: (response) => {
            if (response.res === 1) {
                alert('Gallery entry saved successfully!');
                // Optionally, close the modal and refresh the table
                $('#modal-default').modal('hide');
                // Refresh the data in the table
                // refreshGalleryData(); // Uncomment this if you have a function to refresh the gallery data
            } else {
                alert('Failed to save gallery entry!');
            }
            console.log(response);
        },
        error: (xhr, status, error) => {
            console.error(`Error: ${status} - ${error}`);
            alert('Error saving gallery entry!');
        }
    });
}
</script>
