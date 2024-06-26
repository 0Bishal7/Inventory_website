
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
                    <th>Title</th>
                    <th>C1_Image_path</th>
                    <th>C1_Title</th>
                    <th>C1_Description</th>
                    <th>C2_Image_path</th>
                    <th>C2_Title</th>
                    <th>C2_Description</th>
                    <th>status</th>
                    <th>is_trash</th>
                  </tr>
                </thead>
                <tbody id="our_values_list">
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
      <label for="C1_Image_path">C1 Image Path</label>
      <input type="file" class="form-control" id="C1_Image_path" placeholder="Enter C1 Image Path">
    </div>
    <div class="form-group">
      <label for="C1_Title">C1 Title</label>
      <input type="text" class="form-control" id="C1_Title" placeholder="Enter C1 Title">
    </div>
    <div class="form-group">
      <label for="C1_Description">C1 Description</label>
      <textarea class="form-control" id="C1_Description" rows="4" placeholder="Enter C1 Description"></textarea>
    </div>
    <div class="form-group">
      <label for="C2_Image_path">C2 Image Path</label>
      <input type="file" class="form-control" id="C2_Image_path" placeholder="Enter C2 Image Path">
    </div>
    <div class="form-group">
      <label for="C2_Title">C2 Title</label>
      <input type="text" class="form-control" id="C2_Title" placeholder="Enter C2 Title">
    </div>
    <div class="form-group">
      <label for="C2_Description">C2 Description</label>
      <textarea class="form-control" id="C2_Description" rows="4" placeholder="Enter C2 Description"></textarea>
    </div>
  </div>
  <!-- /.box-body -->
</form>
</div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
  <button type="button" class="btn btn-primary" onclick="submitData()">Save changes</button>
</div>
</div>

            
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

        <script>
function submitData(){
    var formData = new FormData();
    formData.append('title', $('#Title').val())
    formData.append('c1_image_path', $('#C1_Image_path')[0].files[0])
    formData.append('c1_title', $('#C1_Title').val())
    formData.append('c1_description', $('#C1_Description').val())
    formData.append('c2_image_path', $('#C2_Image_path')[0].files[0])
    formData.append('c2_title', $('#C2_Title').val())
    formData.append('c2_description', $('#C2_Description').val())

    const controller = "http://127.0.0.1:7452/our_values/add";
    $.ajax({
        type: 'POST',
        url: controller,
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        success: (response) => {
            if (response.res === 1) {
                alert('Data saved successfully!');
                // Optionally, close the modal and refresh the table
                $('#modal-default').modal('hide');
                // Refresh the data in the table
                // contact_us();
            } else {
                alert('Failed to save data!');
            }
            console.log(response);
        },
        error: (xhr, status, error) => {
            console.error(`Error: ${status} - ${error}`);
            alert('Error saving data!');
        }
    });
}
</script>
