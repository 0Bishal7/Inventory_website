
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
                    
                    <th>title</th>
                    <th>description</th>
                    <th>file_path</th>
                    <th>last_update</th>
                    <th>created</th>
                   
                    <th>status</th>
                    <th>is_trash</th>

                    

              
                  </tr>
                </thead>
                <tbody id="notice">
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
      <label for="Title">Title</label>
      <input type="text" class="form-control" id="Title" placeholder="Enter Title">
    </div>
    <div class="form-group">
      <label for="Description">Description</label>
      <textarea class="form-control" id="Description" rows="4" placeholder="Enter Description"></textarea>
    </div>
    <div class="form-group">
      <label for="File_path">File Path</label>
      <input type="file" class="form-control" id="File_path" placeholder="Upload File">
    </div>
    <div class="form-group">
      <label for="Last_update">Last Update</label>
      <input type="datetime-local" class="form-control" id="Last_update">
    </div>
    <div class="form-group">
      <label for="Created">Created</label>
      <input type="datetime-local" class="form-control" id="Created">
    </div>
  </div>
  <!-- /.box-body -->
</form>
</div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
  <button type="button" class="btn btn-primary" onclick="submitNoticeData()">Save changes</button>
</div>
</div>

<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

<script>
function submitNoticeData(){
    var formData = new FormData();
    formData.append('title', $('#Title').val());
    formData.append('description', $('#Description').val());
    formData.append('file_path', $('#File_path')[0].files[0]);
    formData.append('last_update', $('#Last_update').val());
    formData.append('created', $('#Created').val());

    const controller = "http://127.0.0.1:7452/notice/add";
    $.ajax({
        type: 'POST',
        url: controller,
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        success: (response) => {
            if (response.res === 1) {
                alert('Notice entry saved successfully!');
                // Optionally, close the modal and refresh the notice section
                $('#modal-default').modal('hide');
                // Refresh the notice section
                // refreshNotices(); // Uncomment this if you have a function to refresh the notices
            } else {
                alert('Failed to save notice entry!');
            }
            console.log(response);
        },
        error: (xhr, status, error) => {
            console.error(`Error: ${status} - ${error}`);
            alert('Error saving notice entry!');
        }
    });
}
</script>
