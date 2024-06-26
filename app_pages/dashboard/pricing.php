
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
                    
                    <th>Plan_name</th>
                    <th>Plan_price</th>
                    <th>icon</th>
                    <th>Features</th>
                   
                    <th>status</th>
                    <th>is_trash</th>

                    

              
                  </tr>
                </thead>
                <tbody id="pricing">
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
      <label for="Plan_name">Plan Name</label>
      <input type="text" class="form-control" id="Plan_name" placeholder="Enter Plan Name">
    </div>
    <div class="form-group">
      <label for="Plan_price">Plan Price</label>
      <input type="text" class="form-control" id="Plan_price" placeholder="Enter Plan Price">
    </div>
    <div class="form-group">
      <label for="Icon">Icon</label>
      <input type="file" class="form-control" id="Icon" placeholder="Upload Icon">
    </div>
    <div class="form-group">
      <label for="Features">Features</label>
      <textarea class="form-control" id="Features" rows="4" placeholder="Enter Features"></textarea>
    </div>
  </div>
  <!-- /.box-body -->
</form>
</div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
  <button type="button" class="btn btn-primary" onclick="submitPricingData()">Save changes</button>
</div>
</div>

<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

<script>
function submitPricingData(){
    var formData = new FormData();
    formData.append('plan_name', $('#Plan_name').val());
    formData.append('plan_price', $('#Plan_price').val());
    formData.append('icon', $('#Icon')[0].files[0]);
    formData.append('features', $('#Features').val());

    const controller = "http://127.0.0.1:7452/pricing/add";
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
                // refreshPricingData(); // Uncomment this if you have a function to refresh the pricing data
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
