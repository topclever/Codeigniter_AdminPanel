<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-account-circle title_icon"></i> <?php echo get_phrase('general_users'); ?>
                  <a href="<?php echo site_url('admin/user_form/add'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i><?php echo get_phrase('add_new_user'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
              <h4 class="mb-3 header-title"><?php echo get_phrase('general_user_list'); ?></h4>
              <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
                <thead>
                  <tr>
                    <th>#</th>
                    <th><?php echo get_phrase('photo'); ?></th>
                    <th><?php echo get_phrase('name'); ?></th>
                    <th><?php echo get_phrase('email'); ?></th>
                    <th><?php echo get_phrase('phone'); ?></th>
                    <!-- <th><?php echo get_phrase('website'); ?></th> -->
                    <th><?php echo get_phrase('solcial_links'); ?></th>
                    <th><?php echo get_phrase('website'); ?></th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                     $counter = 0;
                     foreach ($users->result_array() as $user): ?>
                        <tr>
                            <td><?php echo ++$counter; ?></td>

                            <td class="text-center"><img class="rounded-circle img-thumbnail" src="<?php echo base_url('uploads/user_image/'.$user['id'].'.jpg'); ?>" alt="" style="height: 50px; width: 50px;"></td>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['phone']; ?></td>
                            <!-- <td><?php echo $user['website']; ?></td> -->
                            <td class="text-center">
                                <?php
                                  $social_links = json_decode($user['social'], true);
                                 ?>
                                 <a href="<?php echo $social_links['facebook']; ?>" style="padding: 5px;" target="_blank"><i class = 'mdi mdi-facebook'></i></a>
                                 <a href="<?php echo $social_links['twitter']; ?>" style="padding: 5px;" target="_blank"><i class = 'mdi mdi-twitter'></i></a>
                                 <a href="<?php echo $social_links['linkedin']; ?>" style="padding: 5px;" target="_blank"><i class = 'mdi mdi-linkedin'></i></a>
                            </td>
                            <td style="text-align: center;">
                                <a href = "<?php echo site_url('admin/user_form/edit/'.$user['id']); ?>" class="btn btn-icon btn-outline-info btn-rounded btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase('edit'); ?>" style="margin-right:5px;">
                                    <i class="mdi mdi-wrench"></i>
                                </a>
                                <a href = "#" class="btn btn-icon btn-outline-danger btn-rounded btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase('delete'); ?>" onclick="confirm_modal('<?php echo site_url('admin/users/delete/'.$user['id']); ?>');">
                                    <i class="dripicons-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
              </table>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
