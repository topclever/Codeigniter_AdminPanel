<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box ">
            <h4 class="page-title"> <i class="mdi mdi-account-circle title_icon"></i> <?php echo get_phrase('categories'); ?>
            <a href="<?php echo site_url('admin/category_form/add'); ?>" class="btn btn-icon btn-success btn-rounded alignToTitle"> <i class="mdi mdi-plus"></i><?php echo get_phrase('add_new_category'); ?></a>
            </h4>
        </div>
    </div>
</div>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box page-title-box-sm">
            <h4 class="page-title"> <i class="mdi mdi-account-circle title_icon"></i> <?php echo get_phrase('cities'); ?>
              <a href="<?php echo site_url('admin/city_form/add'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i><?php echo get_phrase('add_new_city'); ?></a>
            </h4>
        </div> <!-- end page-title-box -->
    </div> <!-- end col-->
</div>

<div class="row">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
      <h4 class="mb-3 header-title">Basic Example</h4>
        <div class="table-responsive-sm">
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
              <h4 class="mb-3 header-title">Basic Example</h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row justify-content-md-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
              <div class="col-lg-6">
                <h4 class="mb-3 header-title">Basic Example</h4>

                <form action="<?php echo site_url('admin/categories/add'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group mb-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="checkmeout0">
                            <label class="custom-control-label" for="checkmeout0">Check me out !</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
              <h4 class="mb-3 header-title">Basic Example</h4>
              <table id="basic-datatable" class="table table-striped dt-responsive table-bordered nowrap" width="100%">
                <thead>
                  <tr>
                    <th>#</th>
                    <th><?php echo get_phrase('thumbnail'); ?></th>
                    <th><?php echo get_phrase('title'); ?></th>
                    <th><?php echo get_phrase('icon'); ?></th>
                    <th><?php echo get_phrase('is_featured'); ?></th>
                    <th><?php echo get_phrase('option'); ?></th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
