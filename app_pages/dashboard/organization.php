
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
                    <th>name</th>
                    <th>logo</th>
                    <th>contact</th>
                    <th>address</th>
                    <th>created</th>
                    <th>description</th>
                    <th>status</th>
                    <th>is_trash</th>
                    

                    <!-- <td>${val.category}</td>
                    <td>${val.title}</td>
                    <td>${val.description}</td>
                    <td>${val.external_link}</td>
                    <td>${val.image_path}</td>
                    <td>${val.status}</td>
                    <td>${val.is_trash}</td> -->
                  </tr>
                </thead>
                <tbody id="organization">
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
                <h4 class="modal-title">Who are we ?</h4>
              </div>
              <div class="modal-body">
              <div class="box box-primary">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Quick Example</h3> -->
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" enctype="multipart/form-data">
  <div class="box-body">
    <div class="form-group">
      <label for="Name">Name</label>
      <input type="text" class="form-control" id="Name" placeholder="Enter Name">
    </div>
    <div class="form-group">
      <label for="Logo">Logo</label>
      <input type="file" class="form-control" id="Logo" placeholder="Upload Logo">
    </div>
    <div class="form-group">
      <label for="Contact">Contact</label>
      <input type="text" class="form-control" id="Contact" placeholder="Enter Contact">
    </div>
    <div class="form-group">
      <label for="Address">Address</label>
      <input type="text" class="form-control" id="Address" placeholder="Enter Address">
    </div>
    <div class="form-group">
      <label for="Created">Created</label>
      <input type="date" class="form-control" id="Created" placeholder="Enter Created Date">
    </div>
    <div class="form-group">
      <label for="Description">Description</label>
      <textarea class="form-control" id="Description" rows="4" placeholder="Enter Description"></textarea>
    </div>
  </div>
  <!-- /.box-body -->
</form>
</div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
  <button type="button" class="btn btn-primary" onclick="submitOrganizationData()">Save changes</button>
</div>
</div>

<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

<script>
function submitOrganizationData(){
    var formData = new FormData();
    formData.append('name', $('#Name').val());
    formData.append('logo', $('#Logo')[0].files[0]);
    formData.append('contact', $('#Contact').val());
    formData.append('address', $('#Address').val());
    formData.append('created', $('#Created').val());
    formData.append('description', $('#Description').val());

    const controller = "http://127.0.0.1:7452/organization/add";
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
                // refreshOrganizationData(); // Uncomment this if you have a function to refresh the organization data
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