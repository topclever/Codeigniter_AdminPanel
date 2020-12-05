<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-account-circle title_icon"></i> <?php echo get_phrase('listings'); ?>
                    <a href="<?php echo site_url('admin/listing_form/add'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i><?php echo get_phrase('add_new_listing'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-widgets">
                    <a data-toggle="collapse" href="#cardCollpase1" role="button" aria-expanded="false" aria-controls="cardCollpase1"><i class="mdi mdi-minus"></i></a>
                </div>
                <h5 class="card-title mb-0"><?php echo get_phrase('filter'); ?></h5>

                <div id="cardCollpase1" class="collapse pt-3 show">
                    <div class="row justify-content-md-center">
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="status_filter"><?php echo get_phrase('status'); ?></label>
                                <select class="form-control select2" data-toggle="select2" name="status_filter" id="status_filter">
                                    <option value="<?php echo 'all'; ?>"><?php echo get_phrase('all'); ?></option>
                                    <option value="<?php echo 'pending'; ?>"><?php echo get_phrase('pending'); ?></option>
                                    <option value="<?php echo 'active'; ?>"><?php echo get_phrase('active'); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="form-group">
                                <label for="status_filter"><?php echo get_phrase('user'); ?></label>
                                <select class="form-control select2" data-toggle="select2" name="user_filter" id = 'user_filter'>
                                    <option value="all"><?php echo get_phrase('all_users'); ?></option>
                                    <?php
                                    $users = $this->user_model->get_all_users()->result_array();
                                    foreach ($users as $user): ?>
                                    <option value="<?php echo $user['id']; ?>"><?php echo $user['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <!-- <div class="col-xl-3">
                        <div class="form-group">
                            <label for="parent"><?php echo get_phrase('date_range'); ?></label>
                            <div id="reportrange" class="form-control" data-toggle="date-picker-range" data-target-display="#selectedValue"  data-cancel-class="btn-light" style="width: 100%;">
                                <i class="mdi mdi-calendar"></i>&nbsp;
                                <span id="selectedValue"><?php echo date("F d, Y" , $timestamp_start) . " - " . date("F d, Y" , $timestamp_end);?></span> <i class="mdi mdi-menu-down"></i>
                            </div>
                            <input id="date_range" type="hidden" name="date_range" value="<?php echo date("d F, Y" , $timestamp_start) . " - " . date("d F, Y" , $timestamp_end);?>">
                        </div>
                    </div> -->
                    <div class="col-xl-3">
                        <label for="parent" style="color: white;"><?php echo get_phrase('filter'); ?></label>
                        <button type="button" class="btn btn-block btn-info btn-md" name="button" onclick="filterTable()"><i class = "fa fa-search"></i> <?php echo get_phrase('filter'); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end card-->
</div><!-- end col -->
</div>

<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('listings'); ?></h4>
                <table id="listing-datatable" class="table table-striped dt-responsive nowrap" width="100%" data-page-length='25'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><?php echo get_phrase('title'); ?></th>
                            <th><?php echo get_phrase('categories'); ?></th>
                            <th><?php echo get_phrase('location'); ?></th>
                            <th><?php echo get_phrase('status'); ?></th>
                            <th><?php echo get_phrase('option'); ?></th>
                        </tr>
                    </thead>
                    <tbody id = "listing_table">
                        <?php
                        $counter = 0;
                        foreach ($listings as $listing):
                        $user_details = $this->user_model->get_all_users($listing['user_id'])->row_array();?>
                        <tr>
                            <td><?php echo ++$counter; ?></td>
                            <td>
                                <strong><a href="<?php echo site_url('admin/listing_form/edit/'.$listing['id']); ?>"><?php echo strlen($listing['name']) > 20 ? substr($listing['name'],0,20)."..." : $listing['name']; ?></a></strong><br>
                                <small>
                                    <?php
                                        echo $user_details['name'].'<br/>'.date('D, d-M-Y', $listing['date_added']);
                                    ?>
                                </small>
                            </td>
                            <td>
                                <?php
                                $categories = json_decode($listing['categories']);
                                foreach ($categories as $category):
                                    $category_details = $this->crud_model->get_categories($category)->row_array();?>
                                    <span class="badge badge-secondary"><?php echo $category_details['name']; ?></span><br>
                                <?php endforeach; ?>
                            </td>
                            <td>
                                <?php
                                $country_details = $this->crud_model->get_countries($listing['country_id'])->row_array();
                                $city_details = $this->crud_model->get_cities($listing['city_id'])->row_array();
                                echo $city_details['name'].', '.$country_details['name'];
                                ?>
                            </td>
                            <td class="">
                                <span class="mr-2">
                                <?php if ($listing['status'] == 'pending'): ?>
                                    <i class="mdi mdi-circle" style="color: #FFC107; font-size: 19px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase($listing['status']); ?>"></i>
                                <?php elseif ($listing['status'] == 'active'):?>
                                    <i class="mdi mdi-circle" style="color: #4CAF50; font-size: 19px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase($listing['status']); ?>"></i>
                                <?php endif; ?>
                                </span>

                                <span class="ml-2">
                                <?php if ($listing['is_featured'] == 1):?>
                                    <i class="mdi mdi-star-outline" style="color: #4CAF50; font-size: 19px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase('featured'); ?>"></i>
                                <?php endif; ?>
                                </span>
                            </td>


                            <td class="text-center">

                                <!-- Single button -->
                                <div class="dropright dropright">
                                    <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="<?php echo site_url('admin/listing_form/edit/'.$listing['id']); ?>"><?php echo get_phrase('edit'); ?></a></li>

                                        <?php if ($listing['status'] == 'pending'): ?>
                                            <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/listings/make_active/'.$listing['id']); ?>', 'generic_confirmation');"><?php echo get_phrase('mark_as_active'); ?></a></li>
                                        <?php else: ?>
                                            <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/listings/make_pending/'.$listing['id']); ?>', 'generic_confirmation');"><?php echo get_phrase('mark_as_pending'); ?></a></li>
                                        <?php endif; ?>

                                        <?php if ($listing['is_featured'] == 1): ?>
                                            <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/listings/make_none_featured/'.$listing['id']); ?>', 'generic_confirmation');"><?php echo get_phrase('remove_from_featured'); ?></a></li>
                                        <?php elseif($listing['is_featured'] == 0): ?>
                                            <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/listings/make_featured/'.$listing['id']); ?>', 'generic_confirmation');"><?php echo get_phrase('mark_as_featured'); ?></a></li>
                                        <?php endif; ?>

                                        <li><a class="dropdown-item" href="<?php echo get_listing_url($listing['id']); ?>" target="_blank"><?php echo get_phrase('view_in_website'); ?></a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/listings/delete/'.$listing['id']); ?>');"><?php echo get_phrase('delete'); ?></a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div> <!-- end card body-->
    </div> <!-- end card -->
</div><!-- end col-->
</div>

<script type="text/javascript">
function filterTable() {
    $('#preloader_gif').show();
    update_date_range();
    var status = $('#status_filter').val();
    var user = $('#user_filter').val();
    var date_range = $('#date_range').val();

    $.ajax({
        type : 'POST',
        url : '<?php echo site_url('admin/filter_listing_table'); ?>',
        data : {status : status, user : user, date_range : date_range},
        success : function(response){
            $('#listing_table').html(response);
            $('#preloader_gif').hide();
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
        }
    })
}

function update_date_range()
{
    var x = $("#selectedValue").html();
    $("#date_range").val(x);
}
</script>
