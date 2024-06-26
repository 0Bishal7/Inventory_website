
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
                    <th>category</th>
                    <th>title</th>
                    <th>description</th>
                    <th>external_link</th>
                    <th>image_path</th>
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
                <tbody id="who_are_we">
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
      <label for="Category">Category</label>
      <input type="text" class="form-control" id="Category" placeholder="Enter Category">
    </div>
    <div class="form-group">
      <label for="Title">Title</label>
      <input type="text" class="form-control" id="Title" placeholder="Enter Title">
    </div>
    <div class="form-group">
      <label for="Description">Description</label>
      <textarea class="form-control" id="Description" rows="4" placeholder="Enter Description"></textarea>
    </div>
    <div class="form-group">
      <label for="ExternalLink">External Link</label>
      <input type="text" class="form-control" id="ExternalLink" placeholder="Enter External Link">
    </div>
    <div class="form-group">
      <label for="Image_path">Image Path</label>
      <input type="file" class="form-control" id="Image_path" placeholder="Upload Image">
    </div>
  </div>
  <!-- /.box-body -->
</form>
</div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
  <button type="button" class="btn btn-primary" onclick="submitWhoAreWeData()">Save changes</button>
</div>
</div>

<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

<script>
function submitWhoAreWeData(){
    var formData = new FormData();
    formData.append('category', $('#Category').val());
    formData.append('title', $('#Title').val());
    formData.append('description', $('#Description').val());
    formData.append('external_link', $('#ExternalLink').val());
    formData.append('image_path', $('#Image_path')[0].files[0]);

    const controller = "http://127.0.0.1:7452/who_are_we/add";
    $.ajax({
        type: 'POST',
        url: controller,
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        success: (response) => {
            if (response.res === 1) {
                alert('Who Are We entry saved successfully!');
                
                $('#modal-default').modal('hide');
               
            } else {
                alert('Failed to save Who Are We entry!');
            }
            console.log(response);
        },
        error: (xhr, status, error) => {
            console.error(`Error: ${status} - ${error}`);
            alert('Error saving Who Are We entry!');
        }
    });
}
</script>
