<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-account-circle title_icon"></i> <?php echo get_phrase('listings'); ?>
                    <?php if (has_package() > 0): ?> <a href="<?php echo site_url('user/listing_form/add'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i><?php echo get_phrase('add_new_listing'); ?></a> <?php endif; ?>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('listings'); ?></h4>
                <div class="table-responsive-sm">
                    <table class="table table-striped table-centered mb-0">
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
                            foreach ($listings as $listing): ?>
                            <tr>
                                <td><?php echo ++$counter; ?></td>
                                <td>
                                    <strong><a href="<?php echo site_url('user/listing_form/edit/'.$listing['id']); ?>"><?php echo strlen($listing['name']) > 20 ? substr($listing['name'],0,20)."..." : $listing['name']; ?></a></strong><br>
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
                                            <li><a class="dropdown-item" href="<?php echo site_url('user/listing_form/edit/'.$listing['id']); ?>"><?php echo get_phrase('edit'); ?></a></li>
                                            <li><a class="dropdown-item" href="<?php echo get_listing_url($listing['id']); ?>" target="_blank"><?php echo get_phrase('view_in_website'); ?></a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('user/listings/delete/'.$listing['id']); ?>');"><?php echo get_phrase('delete'); ?></a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div> <!-- end card body-->
    </div> <!-- end card -->
</div><!-- end col-->
</div>

<script type="text/javascript">
function filterTable() {
    $('#preloader_gif').show();
    update_date_range();
    var status = $('#status_filter').val();
    var agent = $('#agent_filter').val();
    var date_range = $('#date_range').val();

    $.ajax({
        type : 'POST',
        url : '<?php echo site_url('user/filter_listing_table'); ?>',
        data : {status : status, agent : agent, date_range : date_range},
        success : function(response){
            console.log(response);
            $('#listing_table').html(response);
            $('#preloader_gif').hide();
        }
    })
}

function update_date_range()
{
    var x = $("#selectedValue").html();
    $("#date_range").val(x);
}
</script>
