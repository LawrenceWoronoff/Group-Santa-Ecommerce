<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<?php echo $view_header;?>

<body id="body">

<?php echo $top_header;?>


<!-- Main Menu Section -->
<?php echo $top_menu;?>


<div class="page-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title text-center">
                    <h2>Create a Group</h2>
                </div>
            </div>
        </div>
        <div class="block">
            <?php echo form_open(base_url('user/group/do_create'), array('class' => 'group-form repeater'));?>
            <form class="group-form repeater">
                <div class="form-group">
                    <label for="group_leader_name">Group Leader Name</label>
                    <input type="text" class="form-control" id="group_leader_name" value="<?php echo $user_data['first_name'].' '.$user_data['last_name'];?>" readonly>
                </div>
                <div class="form-group">
                    <label for="group_leader_email">Group Leader Email</label>
                    <input type="text" class="form-control" readonly id="group_leader_email" placeholder="" value="<?php echo $user_data['email'];?>">
                </div>
                <div class="form-group">
                    <label for="group_leader_mobile">Group Leader Mobile</label>
                    <input type="text" class="form-control"  name="group_leader_mobile" value="<?php echo $user_data['mobile'];?>">
                </div>

                <div class="form-group">
                    <label for="group_name">Group Name</label>
                    <input type="text" class="form-control" required name="group_name" placeholder="">
                </div>

                <div class="form-group">
                    <label for="group_budget">Group Budget(£10~£15)</label>
                    <input type="text" class="form-control" required name="group_budget" placeholder="">
                    <span class="help-block">note the budget is not set, people can spend more than the recommended group budget and pay on their own seperate checkout</span>
                </div>

                <div class="form-group">
                    <div class="title text-center">
                        <h5>Billing Address Details</h5>
                    </div>
                </div>

                <div class="form-group">
                    <label for="user_address">Address</label>
                    <input type="text" class="form-control" required name="user_address" value="<?php echo $user_data['addr'];?>">
                </div>
                <div class="split-one-third-inputs clearfix">
                    <div class="form-group">
                        <label for="user_post_code">Zip Code</label>
                        <input type="text" class="form-control" required name="user_post_code" value="<?php echo $user_data['zip'];?>">
                    </div>
                    <div class="form-group" >
                        <label for="user_city">City</label>
                        <input type="text" class="form-control" required name="user_city" value="<?php echo $user_data['city'];?>">
                    </div>
                    <div class="form-group">
                        <label for="user_country">Country</label>
                        <input type="text" class="form-control" required name="user_country" value="<?php echo $user_data['country'];?>">
                    </div>
                </div>
                

                <div class="form-group">
                    <div class="title text-center">
                        <h5>Group Members</h5>
                    </div>
                </div>
                
                <div data-repeater-list="group-a">

                    <div data-repeater-item class="split-half-inputs clearfix">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" required name="group_user_name">
                        </div>
                        <div class="form-group" >
                            <label >Email</label>
                            <input type="text" class="form-control" required name="group_user_email">
                        </div>
                        <button data-repeater-delete type="button" class="btn btn-small btn-solid-border btn-icon" style="margin-top:8px;">Delete</button>
                    </div>
                </div>
                <div class="form-group text-center">
                    <button data-repeater-create type="button" class="btn btn-solid-border btn-round-full" style="margin-top:32px">Click Here to Add Member</button>
                </div>
                
                <div class="form-footer" style="margin-top: 64px;">
                    <button type="submit" class="btn btn-main btn-block"> Create Group </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php echo $view_footer;?>

<script>
    $(document).ready(function () {
        $('.repeater').repeater({
            initEmpty: true,
            defaultValues: {
                
            },
            show: function () {
                $(this).slideDown();
            },
            hide: function (deleteElement) {
                if(confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            },
            ready: function (setIndexes) {
                // $dragAndDrop.on('drop', setIndexes);
            },
            isFirstItemUndeletable: true
        })
    });
</script>

 </body>
 </html>

