
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
                    <th>content</th>
                    <th>category</th>
                    <th>date_time</th>
                    <th>last_update</th>
                    <th>image_path</th>
                    <th>author_id</th>
                    <th>author_name</th>
                    <th>slug</th>
                   
                    <th>status</th>
                    <th>is_trash</th>

                    

              
                  </tr>
                </thead>
                <tbody id="blog">
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
      <label for="Category">Category</label>
      <input type="text" class="form-control" id="Category" placeholder="Enter Category">
    </div>
    <div class="form-group">
      <label for="DateTime">Date & Time</label>
      <input type="datetime-local" class="form-control" id="DateTime">
    </div>
    <div class="form-group">
      <label for="LastUpdate">Last Update</label>
      <input type="datetime-local" class="form-control" id="LastUpdate">
    </div>
    <div class="form-group">
      <label for="Image_path">Image Path</label>
      <input type="file" class="form-control" id="Image_path" placeholder="Upload Image">
    </div>
    <div class="form-group">
      <label for="AuthorID">Author ID</label>
      <input type="text" class="form-control" id="AuthorID" placeholder="Enter Author ID">
    </div>
    <div class="form-group">
      <label for="AuthorName">Author Name</label>
      <input type="text" class="form-control" id="AuthorName" placeholder="Enter Author Name">
    </div>
    <div class="form-group">
      <label for="Slug">Slug</label>
      <input type="text" class="form-control" id="Slug" placeholder="Enter Slug">
    </div>
  </div>
  <!-- /.box-body -->
</form>
</div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
  <button type="button" class="btn btn-primary" onclick="submitBlogData()">Save changes</button>
</div>
</div>

<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

<script>
function submitBlogData(){
    var formData = new FormData();
    formData.append('title', $('#Title').val());
    formData.append('category', $('#Category').val());
    formData.append('date_time', $('#DateTime').val());
    formData.append('last_update', $('#LastUpdate').val());
    formData.append('image_path', $('#Image_path')[0].files[0]);
    formData.append('author_id', $('#AuthorID').val());
    formData.append('author_name', $('#AuthorName').val());
    formData.append('slug', $('#Slug').val());

    const controller = "http://127.0.0.1:7452/blog/add";
    $.ajax({
        type: 'POST',
        url: controller,
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        success: (response) => {
            if (response.res === 1) {
                alert('Blog entry saved successfully!');
                // Optionally, close the modal and refresh the table
                $('#modal-default').modal('hide');
                // Refresh the data in the table
                // refreshBlogData(); // Uncomment this if you have a function to refresh the blog data
            } else {
                alert('Failed to save blog entry!');
            }
            console.log(response);
        },
        error: (xhr, status, error) => {
            console.error(`Error: ${status} - ${error}`);
            alert('Error saving blog entry!');
        }
    });
}
</script>
