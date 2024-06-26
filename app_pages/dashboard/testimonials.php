
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
                    <th>Rating</th>
                    <th>Description</th>
                    <th>image_path</th>
                    <th>Name</th>
                    <th>job_title</th>
                    <th>status</th>
                    <th>is_trash</th>

                    

              
                  </tr>
                </thead>
                <tbody id="testimonials">
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
                        <label for="Rating">Rating</label>
                        <input type="number" class="form-control" id="Rating" placeholder="Enter Rating">
                      </div>
                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" rows="4" placeholder="Enter Description"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="image_path">Image Path</label>
                        <input type="file" class="form-control" id="image_path" placeholder="Enter Image Path">
                      </div>
                      <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" class="form-control" id="Name" placeholder="Enter Name">
                      </div>
                      <div class="form-group">
                        <label for="job_title">Job Title</label>
                        <input type="text" class="form-control" id="job_title" placeholder="Enter Job Title">
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
    formData.append('Rating', $('#Rating').val())
    formData.append('description', $('#description').val())
    formData.append('image_path', $('#image_path')[0].files[0])
    formData.append('Name', $('#Name').val())
    formData.append('job_title', $('#job_title').val())

    const controller = "http://127.0.0.1:7452/testimonials/add";
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
                $('#modal-default').modal('hide');
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
