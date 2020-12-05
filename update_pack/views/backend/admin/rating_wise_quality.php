<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-account-circle title_icon"></i> <?php echo get_phrase('rating_wise_quality'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="mb-3 header-title"><?php echo get_phrase('quality_list'); ?></h4>
        <div class="table-responsive-sm">
          <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
            <thead>
              <tr>
                <th>#</th>
                <th><?php echo get_phrase('rating_from'); ?></th>
                <th><?php echo get_phrase('rating_to'); ?></th>
                <th><?php echo get_phrase('quality'); ?></th>
                <th><?php echo get_phrase('option'); ?></th>
              </tr>
            </thead>
            <tbody>
                <?php
                 $counter = 0;
                 foreach ($qualities as $quality): ?>
                    <tr>
                        <td><?php echo ++$counter; ?></td>

                        <td><?php echo $quality['rating_from']; ?></td>
                        <td><?php echo $quality['rating_to']; ?></td>
                        <td><?php echo ucfirst($quality['quality']); ?></td>
                        <td style="text-align: center;">
                            <a href = "<?php echo site_url('admin/rating_wise_quality_form/edit/'.$quality['id']); ?>" class="btn btn-icon btn-outline-info btn-rounded btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase('edit'); ?>" style="margin-right:5px;">
                                 <i class="mdi mdi-wrench"></i>
                            </a>
                            <!-- <a href = "#" class="btn btn-icon btn-outline-danger btn-rounded btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase('delete'); ?>" style="margin-right:5px;" onclick="confirm_modal('<?php echo site_url('admin/rating_wise_quality/delete/'.$quality['id']); ?>');">
                                 <i class="dripicons-trash"></i>
                            </a> -->
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>
</div>
