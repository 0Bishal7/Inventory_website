
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
                  <th>Id</th>
                  <th>image path</th>
                  <th>Name</th>
                  <th>job_Title</th>
                  <th>Description</th>
                  <th>Twitter_link</th>
                  <th>Facebook_link</th>
                  <th>instagram_link</th>
                  <th>Linkdin_link</th>
                  <th>status</th>
                  <th>is_trash</th>

                    

              
                  </tr>
                </thead>
                <tbody id="team">
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
                    <label for="ImagePath">Image Path</label>
                    <input type="file" class="form-control" id="ImagePath" placeholder="Upload Image">
                  </div>
                  <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" id="Name" placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                    <label for="job_Title">Job Title</label>
                    <input type="text" class="form-control" id="job_Title" placeholder="Enter Job Title">
                  </div>
                  <div class="form-group">
                    <label for="Description">Description</label>
                    <textarea class="form-control" id="Description" rows="4" placeholder="Enter Description"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="Twitter_link">Twitter Link</label>
                    <input type="text" class="form-control" id="Twitter_link" placeholder="Enter Twitter Link">
                  </div>
                  <div class="form-group">
                    <label for="Facebook_link">Facebook Link</label>
                    <input type="text" class="form-control" id="Facebook_link" placeholder="Enter Facebook Link">
                  </div>
                  <div class="form-group">
                    <label for="instagram_link">Instagram Link</label>
                    <input type="text" class="form-control" id="instagram_link" placeholder="Enter Instagram Link">
                  </div>
                  <div class="form-group">
                    <label for="Linkdin_link">LinkedIn Link</label>
                    <input type="text" class="form-control" id="Linkdin_link" placeholder="Enter LinkedIn Link">
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
    formData.append('image_path', $('#ImagePath')[0].files[0]);

    formData.append('Name', $('#Name').val());
    formData.append('job_Title', $('#job_Title').val());
    formData.append('Description', $('#Description').val());
    formData.append('Twitter_link', $('#Twitter_link').val());
    formData.append('Facebook_link', $('#Facebook_link').val());
    formData.append('instagram_link', $('#instagram_link').val());
    formData.append('Linkdin_link', $('#Linkdin_link').val());

    const controller = "http://127.0.0.1:7452/team/add";
    // Replace with your endpoint
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
                // Optionally, refresh the table data
                // refreshTable(); // Uncomment this if you have a function to refresh the table data
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

