<?php $page='categories';
$breadcrumbs=[
array('url'=>false,'name'=>'Services'),
array('url'=>url('admin/categories'),'name'=>'Categories'),
array('url'=>url('admin/index-plan'),'name'=>'Index Page'),
array('url'=>'javascript:void','name'=>'Index Plan- Edit'),
];
?>

<?php $__env->startSection('title','Admin | Index Page:: Edit'); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('page_header','Services'); ?>

<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <h2>Index Plan <i class="fa fa-angle-right"></i> Edit</h2>
            <div class="clearfix"></div>
            <div hidden="" id="success_message" class="messages alert alert-success alert-dismissable">
                <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>The information has been saved/updated successfully.</p>
            </div>
            <div hidden="" id="error_message" class="messages alert alert-danger alert-dismissable">
                <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                <i class="fa fa-times-circle"></i> <strong>Error!</strong>
                <p>The information has not been saved/updated. Please correct the errors.</p>
            </div>
            <div class="pull-left"> Last updated: <span id="updated_at" class="text-blue">
                <?php echo e(date("d M,Y",strtotime($indexplan->updated_at))." @ ".date("h:i a",strtotime($indexplan->updated_at))); ?>

            </span> </div>
            <div class="clearfix"></div>
            <?php if($errors->any()): ?>
            <ul class="alert alert-danger">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </ul>
            <?php endif; ?>
            <p></p>
            <ul id="myTab" class="nav nav-tabs">
                <li class="active"><a href="#general-pricing" data-toggle="tab">General/Pricing</a></li>
                <li><a href="#plan-feature-details" data-toggle="tab">Plan Feature Details</a></li>
                <li><a href="#free-domain" data-toggle="tab">Free Domain</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">

                <div  class="tab-pane fade in active">
                    <form id="frm_genrel" class="form-horizontal" action="<?php echo e(url('/admin/index-plan/')); ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="indexplan_id" id="indexplan_id" value="<?php echo e($indexplan->id); ?>">
                        <div class="portlet">
                            <div class="portlet-header">
                                <div class="caption">General</div>
                                <div class="tools"> <i class="fa fa-chevron-up"></i> </div>

                            </div>


                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-md-12">

                                        <div id="frm_genrel" class="form-horizontal" >
                                            <div class="form-group">
                                                <?php echo e(csrf_field()); ?>

                                                <label class="col-md-3 control-label">Status <span class="text-red">*</span></label>
                                                <div class="col-md-6">
                                                  <div data-on="success" data-off="primary" class="make-switch">
                                                    <input type="checkbox" name="status"  <?php if($indexplan->status==1): ?> checked="checked" <?php endif; ?>/>
                                                </div>
                                                <p class="red_error" id="status"></p>
                                            </div>
                                        </div>
            <!--<div class="form-group">
                <label class="col-md-3 control-label">Service Code <span class="text-red">*</span></label>
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="eg. LCL-1">
                </div>
            </div>-->
            <div class="clearfix"></div>
            <div class="form-group">
                <label for="inputFirstName" class="col-md-3 control-label">Plan Name Line 1 <span class="text-red">*</span></label>
                <div class="col-md-6">
                   <input type="text" name="name_line1" value="<?php echo e($indexplan->name_line1); ?>" class="form-control" placeholder="eg. VPS">
                   <p class="red_error" id="name_line1"></p>
               </div>
           </div>
           <div class="clearfix"></div>
           <div class="form-group">
            <label for="inputFirstName" class="col-md-3 control-label">Plan Name Line 2 <span class="text-red">*</span></label>
            <div class="col-md-6">
                <input type="text" name="name_line2" value="<?php echo e($indexplan->name_line2); ?>" class="form-control" placeholder="eg. Hosting">
                <p class="red_error" id="name_line2"></p>
            </div>
        </div>
            <!--<div class="form-group">
                <label class="col-md-3 control-label">Promo Behaviour</label>

                <div class="col-md-6">
                    <div class="xss-margin"></div>
                    <div class="radio-list">
                        <label><input id="inlineCheckbox1" type="radio" value="option1" checked="checked"/>&nbsp; None</label>
                        <label><input id="inlineCheckbox1" type="radio" value="option2"/>&nbsp; Hot</label>
                        <label><input id="inlineCheckbox2" type="radio" value="option3"/>&nbsp; New</label>
                        <label><input id="inlineCheckbox3" type="radio" value="option4"/>&nbsp; Sale</label>
                        <label><input id="inlineCheckbox4" type="radio" value="option4"/>&nbsp; Best Value</label>
                        <label><input id="inlineCheckbox4" type="radio" value="option4"/>&nbsp; Others, please specify:</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>-->
            <div class="form-group">
                <label class="col-md-3 control-label">Upload Icon Image <span class="text-red">*</span></label>
                <div class="col-md-9">
                    <div class="xs-margin"></div>
                    <p id="plz_wait">Please wait!</p>
                    <img width="70px" id="img_icon_image" src="<?php echo e(url('').'/storage/index-plan/icon_images/'.$indexplan->icon_image); ?>" >
                    <input accept="image/png" id="icon_image_file" name="icon_image" type="file"/> 
                    <?php if($indexplan->icon_image!=""): ?>
                        <p><label style="cursor: pointer;" class="label label-danger"><span class="fa fa-trash-o"></span></label></p>
                    <?php endif; ?>
                    <span class="help-block">(Image dimension: 70 x 70 pixels, PNG only, Max. 1MB) </span>
                    <p class="red_error" id="icon_image"></p>
                </div>
            </div>
             <!--<div class="form-group">
                <label for="inputFirstName" class="col-md-3 control-label">Category <span class="text-red">*</span></label>
                <div class="col-md-6">
                    note to programmer: the category list is dynamic.
                    <select class="form-control">
                        <option>- Please select -</option>
                        <option>Cloud Hosting</option>
                        <option>Co-location Hosting</option>
                        <option>Dedicated Server</option>
                        <option>Domains</option>
                        <option>E-commerce</option>
                        <option>Email88</option>
                        <option>Shared Hosting</option>
                        <option selected="selected">SSL Certificates</option>
                        <option>VPS Hosting</option>
                        <option>Web88IR</option>
                        <option>Responsive Web Design</option>
                        <option>Social Media</option>
                        <option>List all categories here</option>
                      </select>
                </div>
            </div>-->
            <div class="form-group">
                <label for="inputFirstName" class="col-md-3 control-label">Display Order</label>
                <div class="col-md-6">
                    <input type="text" value="<?php echo e($indexplan->sort_order); ?>" name="sort_order" class=" numOnly form-control" placeholder="eg. 1">
                    <p class="red_error" id="sort_order"></p>
                    <div class="xss-margin"></div>
                    <div class="text-blue text-12px">The display order of the plan positioning in front end from Left to Right.</div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Enable Plan Button</label>

                <div class="col-md-6">
                    <div class="xss-margin"></div>
                    <div class="radio-list">
                        <label><input <?php if($indexplan->enable_plan_button=='None'): ?> checked="" <?php endif; ?> id="inlineCheckbox1" name="enable_plan_button"  type="radio" value="None"/>&nbsp; None</label>
                        <label><input id="inlineCheckbox1" name="enable_plan_button" type="radio" value="Get Started!" <?php if($indexplan->enable_plan_button=='Get Started!'): ?> checked="" <?php endif; ?>/>&nbsp; Get Started!</label>
                        <label><input id="inlineCheckbox1" <?php if($indexplan->enable_plan_button=='Ask for Quote'): ?> checked="" <?php endif; ?> name="enable_plan_button" type="radio" value="Ask for Quote"/>&nbsp; Ask for Quote</label>
                        <label><input <?php if($indexplan->enable_plan_button=='Order Now'): ?> checked="" <?php endif; ?> id="inlineCheckbox1" name="enable_plan_button" type="radio" value="Order Now"/>&nbsp; Order Now</label>
                        <label><input id="inlineCheckbox4" <?php if($indexplan->enable_plan_button=='other'): ?> checked="" <?php endif; ?> type="radio" name="enable_plan_button" value="other"/>&nbsp; Others, please specify:</label>
                        <input name="enable_plan_button_other" value="<?php echo e($indexplan->enable_plan_button_other); ?>" type="text" class="form-control">
                        <p class="red_error" id="enable_plan_button_other"></p>
                    </div>
                    
                </div>
            </div>
            <div class="form-group">
                <label for="inputFirstName" class="col-md-3 control-label">URL Link</label>
                <div class="col-md-6">
                    <div class="xss-margin"></div>
                    <input type="text" value="<?php echo e($indexplan->url); ?>" name="url" class="form-control" placeholder="eg. 1">
                    <p class="red_error" id="url"></p>
                    <div class="xss-margin"></div>
                    <div class="text-blue text-12px">You can specify the button link to the sub pages.</div>
                </div>

            </div> 

        </div><!-- div form end -->


    </div><!-- end col-md-12 -->

</div><!-- end row -->

<div class="clearfix"></div>
</div><!-- end portlet body -->

</div><!-- end portlet -->
<!-- end general -->

<div class="portlet">

    <div class="portlet-header">
        <div class="caption">Pricing</div>
        <div class="tools"> <i class="fa fa-chevron-up"></i> </div>

    </div>

    <div class="portlet-body">
        <div class="row">
            <div class="col-md-12">

                <div class="form-horizontal" id="frm_pricing">

                    <div class="form-group">
                        <label for="inputFirstName" class="col-md-3 control-label">Pricing Type <span class="text-red">*</span></label>
                        <div class="col-md-6">
                            <div class="xss-margin"></div>
                            <div class="radio-list">
                                <label><input name="pricing_type" <?php if($indexplan->price_type=='Free'): ?> checked="" <?php endif; ?>  id="inlineCheckbox1" type="radio" value="Free" checked="checked"/>&nbsp; Free</label>
                                <label><input name="pricing_type" <?php if($indexplan->price_type=='One Time'): ?> checked="" <?php endif; ?> id="pricing_one_time" type="radio" value="One Time"/>&nbsp; One Time</label>
                                <label><input name="pricing_type" <?php if($indexplan->price_type=='Recurring'): ?> checked="" <?php endif; ?> id="inlineCheckbox2" type="radio" value="Recurring" />&nbsp; Recurring</label>
                            </div>
                            <p class="red_error" id="pricing_type"></p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    note to programmer: if choose "free", hide both pricing tables below. If choose "one time", display "one time" pricing table and hide "recurring" pricing table. If choose "recurring" pricing table, hide the "one time" pricing table.
                    <!-- one time price start -->
                    <div hidden="" class="one_time_price">
                        <h5 class="block-heading border-bottom">One Time</h5>
                        <div class="text-blue">If you select currency to "RM", the price you have entered in below pricing table will be set to "RM".  If you select currency to "USD", the price you have entered in below pricing table will be set to "USD". Please also enter the conversion rate for USD, the system will auto-calculate the pricing to RM and display it in front end plan pricing table.</div>
                        <div class="xs-margin"></div>
                        <div class="form-group ">
                            <label for="inputFirstName" class="col-md-3 control-label">Currency</label>
                            <div class="col-md-6">
                                <div class="xss-margin"></div>
                                <div class="radio-list">
                                    <label><input id="inlineCheckbox1" <?php if($indexplan->pricing_currency=='RM'): ?> checked="" <?php endif; ?> type="radio" name="pricing_currency" value="RM" checked="checked"/>&nbsp; RM</label>
                                    <label><input id="inlineCheckbox1"  <?php if($indexplan->pricing_currency=='USD'): ?> checked="" <?php endif; ?>  type="radio" value="USD" name="pricing_currency" />&nbsp; USD, please specify the conversion rate below to RM </label>
                                    <input name="pricing_currency_other"  value="<?php echo e($indexplan->pricing_currency_other); ?>" type="text" class="form-control">
                                    <div class="xss-margin"></div>
                                    <div class="text-blue text-12px">eg. 1 USD = 3.50 RM</div>
                                    <p class="red_error" id="pricing_currency_other"></p>
                                </div>
                            </div>
                        </div>
                        
          <!-- one time price end -->

          <!-- recurring price start -->
      </div>
      <div hidden="f" class="recurring_price">
        <h5 class="block-heading border-bottom">Recurring</h5>
        <div class="text-blue">If you select currency to "RM", the price you have entered in below pricing table will be set to "RM".  If you select currency to "USD", the price you have entered in below pricing table will be set to "USD". Please also enter the conversion rate for USD, the system will auto-calculate the pricing to RM and display it in front end plan pricing table.</div>
        <div class="xs-margin"></div>
        <div class="form-group">
            <label for="inputFirstName" class="col-md-3 control-label">Currency</label>
            <div class="col-md-6">
                <div class="xss-margin"></div>
                <div class="radio-list">
                    <label><input id="inlineCheckbox1" <?php if($indexplan->recurring_currency=='RM'): ?> checked="" <?php endif; ?>   type="radio" name="recurring_currency" value="RM" checked="checked"/>&nbsp; RM</label>
                    <label><input id="inlineCheckbox1" <?php if($indexplan->recurring_currency=='USD'): ?> checked="" <?php endif; ?> type="radio" name="recurring_currency" value="USD"/>&nbsp; USD, please specify the conversion rate below to RM </label>
                    <input name="recurring_currency_other" value="<?php echo e($indexplan->recurring_currency_other); ?>" type="text" class="form-control">
                    <div class="xss-margin"></div>
                    <div class="text-blue text-12px">eg. 1 USD = 3.50 RM</div>
                    <p class="red_error" id="recurring_currency_other"></p>

                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">First Month</label>
            <div class="col-md-6">
             <input name="recurring_first_month" value="<?php echo e($indexplan->recurring_first_month); ?>" type="text" class="form-control" placeholder="0.00">
             <p class="red_error" id="recurring_first_month"></p>
         </div>
     </div>
     <div class="form-group">
        <label class="col-md-3 control-label">First Year</label>
        <div class="col-md-6">
         <input name="recurring_first_year" value="<?php echo e($indexplan->recurring_first_year); ?>" type="text" class="form-control" placeholder="0.00">
         <p class="red_error" id="recurring_first_year"></p>
     </div>
 </div>
 
<!-- recurring price end -->
</div>
<div id="pricing_table" hidden="" class="table-responsive mtl">
                                                    <table class="table table-hover table-striped">
                                                      <thead>
                                                        <tr>
                                                          <th width="15%"></th>
                                                          <th width="15%">One Time</th> 
                                                          <th width="15%">Monthly</th>
                                                          <th class="recurring_price_fields" width="15%">Annually</th>
                                                          <th class="recurring_price_fields" width="15%">Biennially</th>
                                                          <th class="recurring_price_fields" width="15%">Triennially</th>
                                                          <th></th>
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                        <tr>
                                                          <td>Setup Fee</td>
                                                          <td><input type="text" value="<?php echo e($indexplan->setup_fee_one_time); ?>" name="setup_fee_one_time" class="form-control" placeholder="0.00"></td> 
                                                          <td><input type="text" value="<?php echo e($indexplan->setup_fee_monthly); ?>" name="setup_fee_monthly" class="form-control" placeholder="0.00"></td>
                                                          <td class="recurring_price_fields"><input value="<?php echo e($indexplan->setup_fee_annually); ?>"  name="setup_fee_annually" type="text" class="form-control" placeholder="0.00"></td>
                                                          <td class="recurring_price_fields"><input value="<?php echo e($indexplan->setup_fee_biennially); ?>" name="setup_fee_biennially" type="text" class="form-control" placeholder="0.00"></td>
                                                          <td class="recurring_price_fields"><input value="<?php echo e($indexplan->setup_fee_triennially); ?>" name="setup_fee_triennially" type="text" class="form-control" placeholder="0.00"></td>
                                                          <td></td>
                                                        </tr>
                                                        <tr>
                                                          <td>Price</td>
                                                          <td><input type="text" name="price_one_time" value="<?php echo e($indexplan->price_one_time); ?>" class="form-control" placeholder="0.00"></td>
                                                          <td><input type="text"  class="form-control"  value="<?php echo e($indexplan->price_monthly); ?>" name="price_monthly" placeholder="0.00"></td>
                                                          <td class="recurring_price_fields"><input type="text"  value="<?php echo e($indexplan->price_annually); ?>" name="price_annually" class="form-control" placeholder="0.00"></td>
                                                          <td class="recurring_price_fields"><input type="text"  value="<?php echo e($indexplan->price_biennially); ?>" class="form-control" name="price_biennially" placeholder="0.00"></td>
                                                          <td class="recurring_price_fields"><input type="text"  value="<?php echo e($indexplan->price_triennially); ?>" name="price_triennially" class="form-control" placeholder="0.00"></td>
                                                          <td class="recurring_price_fields"></td>
                                                        </tr>
                                                      </tbody>
                                                      <tfoot>
                                                        <tr>
                                                          <td colspan="7"></td>
                                                        </tr>
                                                      </tfoot>
                                                    </table>
                                                    <div class="clearfix"></div>
                                                  </div>
                                                <p class="red_error" id="setup_fee_one_time"></p>
                                                <p class="red_error" id="setup_fee_monthly"></p>
                                                <p class="red_error" id="setup_fee_triennially"></p>
                                                <p class="red_error" id="setup_fee_biennially"></p>
                                                <p class="red_error" id="setup_fee_annually"></p>

                                                <p class="red_error" id="price_one_time"></p>
                                                <p class="red_error" id="price_monthly"></p>
                                                <p class="red_error" id="price_annually"></p>
                                                <p class="red_error" id="price_triennially"></p>
                                                <p class="red_error" id="price_biennially"></p>

<div class="form-actions">
  <div class="col-md-offset-5 col-md-7"> <a href="javascript:void" onclick="submit_data()" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp; <a href="<?php echo e(url('/admin/index-plan')); ?>" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
</div>  

</div>


</div><!-- end col-md-12 -->

</div><!-- end row -->

<div class="clearfix"></div>
</div><!-- end portlet body -->

</div><!-- end portlet -->
<!-- end pricing --> 
</form>  

</div><!-- end tab general/pricing -->



<div id="plan-feature-details" class="tab-pane fade">
    <div class="portlet">

        <div class="portlet-header">
            <div class="caption">Plan Feature Details</div>
            <p class="margin-top-10px"></p>
            <a href="#" data-target="#modal-add-plan-feature-detail" data-toggle="modal" class="btn btn-success">Add New &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
            <div class="btn-group">
                <button type="button" class="btn btn-primary">Delete</button>
                <button type="button" data-toggle="dropdown" class="btn btn-red dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                <ul role="menu" class="dropdown-menu">
                    <li><a href="#" data-target="#modal-delete-selected-plan-detail" data-toggle="modal">Delete selected item(s)</a></li>
                    <li class="divider"></li>
                    <li><a href="#" data-target="#modal-delete-all" data-toggle="modal">Delete all</a></li>
                </ul>
            </div>
            <!--Modal Add New plan feature detail start-->
            <div id="modal-add-plan-feature-detail" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                <div class="modal-dialog modal-wide-width">
                    <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                          <h4 id="modal-login-label3" class="modal-title">Add New Plan Feature Detail</h4>
                      </div>
                      <div class="modal-body">
                          <div class="form">
                            <form class="form-horizontal">
                              <div class="form-group">
                                <label class="col-md-3 control-label">Status</label>
                                <div class="col-md-6">
                                  <div data-on="success" data-off="primary" class="make-switch">
                                    <input type="checkbox" checked="checked"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Plan Feature <span class="text-red">*</span></label>
                            <div class="col-md-6">
                              <input type="text" class="form-control" placeholder="eg. 99.9% Service Uptime">
          <!--<select class="form-control">
                <option>-- Please select --</option>
                <option>Equipments</option>
                <option>Bandwidth</option>
                <option>IPv4</option>
                <option>Power Socket</option>
                <option>List all plan features here</option>
            </select>-->
        </div>
    </div>
      <!--<div class="form-group">
        <label class="col-md-3 control-label">Description </label>
        <div class="col-md-6">
          <div class="text-blue">Please choose <strong>ONE</strong> of the following options for the plan feature by entering "Description Text" or select "Yes/No".</div>
          <div class="margin-top-5px"></div>
          <input type="text" class="form-control" placeholder="eg. 1GB">
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label">Select Yes/No</label>
        <div class="col-md-6">
          <div class="radio-list">
            <div class="xs-margin"></div>
            <label><input id="optionsRadios1" type="radio" name="optionsRadios"/>&nbsp; Yes &nbsp; <i class="fa fa-check sitecolor"></i></label>
            <div class="clearfix"></div>
            <label><input id="optionsRadios2" type="radio" name="optionsRadios"/>&nbsp; No &nbsp; <i class="fa fa-times red"></i></label>
            note to programmer: if choose yes/no, it will show "blue check icon with round bg" or "red cross icon with round bg" in the plan pricing table.
          </div>
        </div>
    </div>-->                              

    <div class="form-actions">
        <div class="col-md-offset-5 col-md-8"> <a href="#" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
    </div>
</form>
</div>
</div>
</div>
</div>
</div>
<!--END MODAL Add New plan feature detail -->
<!--Modal delete selected items plan feature start-->
<div id="modal-delete-selected-plan-detail" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
              <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the selected item(s)? </h4>
          </div>
          <div class="modal-body">
              <p><strong>#1:</strong> 99.9% Service Uptime</p>
              <div class="form-actions">
                <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- modal delete selected items plan feature end -->
<!--Modal delete all items start-->
<div id="modal-delete-all" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
              <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete all items? </h4>
          </div>
          <div class="modal-body">
              <div class="form-actions">
                <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- modal delete all items end -->

<div class="tools"> <i class="fa fa-chevron-up"></i> </div>
</div>

<div class="portlet-body">
    <div class="row">
        <div class="col-md-12">

            <div class="table-responsive mtl">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th width="1%"><input type="checkbox"/></th>    
                            <th>#</th>
                            <th>Status</th>
                            <th>Plan Feature</th>   
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox"/></td>
                            <td>4</td>
                            <td><span class="label label-xs label-success">Active</span></td>
                            <td>99.9% Service Uptime</td>
                            <td><a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-plan-detail" data-toggle="modal" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-plan-detail" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                              <!--Modal edit plan feature detail start-->
                              <div id="modal-edit-plan-detail" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                <div class="modal-dialog modal-wide-width">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                      <h4 id="modal-login-label3" class="modal-title">Edit Plan Feature Detail</h4>
                                  </div>
                                  <div class="modal-body">
                                      <div class="form">
                                        <form class="form-horizontal">
                                          <div class="form-group">
                                            <label class="col-md-3 control-label">Status</label>
                                            <div class="col-md-6">
                                              <div data-on="success" data-off="primary" class="make-switch">
                                                <input type="checkbox" checked="checked"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Plan Feature <span class="text-red">*</span></label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder="eg. 99.9% Service Uptime" value="99.9% Service Uptime">
                                          <!--<select class="form-control">
                                                <option>-- Please select --</option>
                                                <option selected="selected">Equipments</option>
                                                <option>Bandwidth</option>
                                                <option>IPv4</option>
                                                <option>Power Socket</option>
                                                <option>List all plan features here</option>
                                            </select>
                                            note to programmer: the list of plan features is added from "cloud_hosting_edit.html" page.-->
                                        </div>
                                    </div>
                                      <!--<div class="form-group">
                                        <label class="col-md-3 control-label">Description </label>
                                        <div class="col-md-6">
                                          <div class="text-blue">Please choose <strong>ONE</strong> of the following options for the plan feature by entering "Description Text" or select "Yes/No".</div>
                                          <div class="margin-top-5px"></div>
                                          <input type="text" class="form-control" placeholder="eg. 1GB" value="Secure a Single Common Name">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-md-3 control-label">Select Yes/No</label>
                                        <div class="col-md-6">
                                          <div class="radio-list">
                                            <label><input id="optionsRadios1" type="radio" name="optionsRadios"/>&nbsp; Yes &nbsp; <i class="fa fa-check sitecolor"></i></label>
                                            <div class="clearfix"></div>
                                            <label><input id="optionsRadios2" type="radio" name="optionsRadios"/>&nbsp; No &nbsp; <i class="fa fa-times red"></i></label>
                                            note to programmer: if choose yes/no, it will show "blue check icon with round bg" or "red cross icon with round bg" in the plan pricing table.
                                          </div>
                                        </div>
                                    </div>  -->                              

                                    <div class="form-actions">
                                        <div class="col-md-offset-5 col-md-8"> <a href="#" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--END MODAL edit plan feature detail -->
            <!--Modal delete start-->
            <div id="modal-delete-plan-detail" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this? </h4>
                </div>
                <div class="modal-body">
                    <p><strong>#1:</strong> 99.9% Service Uptime</p>
                    <div class="form-actions">
                      <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- modal delete end -->
</td>
</tr>
<tr>
  <td><input type="checkbox"/></td>
  <td>3</td>
  <td><span class="label label-xs label-success">Active</span></td>
  <td>FREE Domain Registration</td>
  <td><a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-plan-detail" data-toggle="modal" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-plan-detail" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a></td>
</tr>
<tr>
  <td><input type="checkbox"/></td>
  <td>2</td>
  <td><span class="label label-xs label-success">Active</span></td>
  <td>Unlimited Web Space</td>
  <td><a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-plan-detail" data-toggle="modal" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-plan-detail" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a></td>
</tr>
<tr>
  <td><input type="checkbox"/></td>
  <td>1</td>
  <td><span class="label label-xs label-success">Active</span></td>
  <td>High Availability Firewall</td>
  <td><a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-plan-detail" data-toggle="modal" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-plan-detail" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a></td>
</tr>
</tbody>
<tfoot>
    <tr>
      <td colspan="5"></td>
  </tr>
</tfoot>
</table>
<div class="clearfix"></div>
</div><!-- end table responsive -->


</div><!-- end col-md-12 -->
</div><!-- end row -->

<div class="clearfix"></div>
</div><!-- end portlet body -->
</div>
<!-- end portlet -->                  


</div><!-- end tab plan feature details -->


<div id="free-domain" class="tab-pane fade">
    <div class="portlet">

        <div class="portlet-header">
            <div class="caption">Free Domain</div>
            <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
        </div>

        <div class="portlet-body">
            <div class="row">
                <div class="col-md-12">

                    <form class="form-horizontal">

                        <div class="form-group">
                            <label for="inputFirstName" class="col-md-3 control-label">Free Domain <span class="text-red">*</span></label>
                            <div class="col-md-8">
                                <div class="xss-margin"></div>
                                <div class="radio-list">
                                    <label><input id="inlineCheckbox1" type="radio" value="option1" checked="checked"/>&nbsp; None</label>
                                    <label><input id="inlineCheckbox2" type="radio" value="option2"/>&nbsp; Offer a free domain registration/transfer only (renew as normal)</label>
                                    <label><input id="inlineCheckbox3" type="radio" value="option3"/>&nbsp; Offer a discounted domain registration/transfer only (renew as normal), please enter the first year fee (RM) below:</label>
                                    <input type="text" class="form-control" placeholder="0.00" value="0.00">
                                    <label><input id="inlineCheckbox4" type="radio" value="option4"/>&nbsp; Offer a free domain registration/transfer and free renewal (if product is renewed)</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputFirstName" class="col-md-3 control-label">Free Domain TLD's</label>
                            <div class="col-md-5">
                                <select multiple="multiple" class="form-control" style="height: 400px;">
                                    <option>- Please select -</option>
                                    <option>.com</option>
                                    <option>.org</option>
                                    <option>.net</option>
                                    <option>.co.uk</option>
                                    <option>.me</option>
                                    <option>.info</option>
                                    <option>.ca</option>
                                    <option>.tv</option>
                                    <option>.ninja</option>
                                    <option>.limited</option>
                                    <option>.rocks</option>
                                    <option>.uk</option>
                                </select>
                                <div class="xss-margin"></div>
                                <div class="text-blue text-12px">Use Ctrl + Click to select multiple payment terms and TLD's</div>
                                note to programmer: the free domain list is dynamic, fetched from domains setup page.
                            </div>
                        </div>

                        <div class="clearfix"></div>
                        <div id="pricing_table" hidden="" class="table-responsive mtl">
                                                    <table class="table table-hover table-striped">
                                                      <thead>
                                                        <tr>
                                                          <th width="15%"></th>
                                                          <th width="15%">One Time</th> 
                                                          <th width="15%">Monthly</th>
                                                          <th class="recurring_price_fields" width="15%">Annually</th>
                                                          <th class="recurring_price_fields" width="15%">Biennially</th>
                                                          <th class="recurring_price_fields" width="15%">Triennially</th>
                                                          <th></th>
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                        <tr>
                                                          <td>Setup Fee</td>
                                                          <td><input type="text" name="setup_fee_one_time" class="form-control" placeholder="0.00"></td> 
                                                          <td><input type="text" name="setup_fee_monthly" class="form-control" placeholder="0.00"></td>
                                                          <td class="recurring_price_fields"><input  name="setup_fee_annually" type="text" class="form-control" placeholder="0.00"></td>
                                                          <td class="recurring_price_fields"><input name="setup_fee_biennially" type="text" class="form-control" placeholder="0.00"></td>
                                                          <td class="recurring_price_fields"><input name="setup_fee_triennially" type="text" class="form-control" placeholder="0.00"></td>
                                                          <td></td>
                                                        </tr>
                                                        <tr>
                                                          <td>Price</td>
                                                          <td><input type="text" name="price_one_time" class="form-control" placeholder="0.00"></td>
                                                          <td><input type="text"  class="form-control" name="price_monthly" placeholder="0.00"></td>
                                                          <td class="recurring_price_fields"><input type="text" name="price_annually" class="form-control" placeholder="0.00"></td>
                                                          <td class="recurring_price_fields"><input type="text" class="form-control" name="price_biennially" placeholder="0.00"></td>
                                                          <td class="recurring_price_fields"><input type="text" name="price_triennially" class="form-control" placeholder="0.00"></td>
                                                          <td class="recurring_price_fields"></td>
                                                        </tr>
                                                      </tbody>
                                                      <tfoot>
                                                        <tr>
                                                          <td colspan="7"></td>
                                                        </tr>
                                                      </tfoot>
                                                    </table>
                                                    <div class="clearfix"></div>
                                                  </div>
                                                <p class="red_error" id="setup_fee_one_time"></p>
                                                <p class="red_error" id="setup_fee_monthly"></p>
                                                <p class="red_error" id="setup_fee_triennially"></p>
                                                <p class="red_error" id="setup_fee_biennially"></p>
                                                <p class="red_error" id="setup_fee_annually"></p>

                                                <p class="red_error" id="price_one_time"></p>
                                                <p class="red_error" id="price_monthly"></p>
                                                <p class="red_error" id="price_annually"></p>
                                                <p class="red_error" id="price_triennially"></p>
                                                <p class="red_error" id="price_biennially"></p>
                        <div class="form-actions">
                            <div class="col-md-offset-5 col-md-7"> <a href="#" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                        </div> 

                    </form>
                </div><!-- end col-md-12 -->
            </div><!-- end row -->

            <div class="clearfix"></div>
        </div><!-- end portlet body -->
    </div><!-- end portlet -->
</div><!-- end tab free domain -->



</div>
<!-- end tab content -->
<div class="clearfix"></div>
</div>
<!-- end col-lg-12 -->
</div>
<!-- end row -->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_scripts'); ?>
<script type="text/javascript">
    function submit_data() {
        $("#frm_genrel").submit();
    }
    $("input[name='pricing_type']").change(function () {
        var selectec_price=$("input[name='pricing_type']:checked").val().toLowerCase();
        if (selectec_price=="free") {
                $("#pricing_table").hide();
                $(".one_time_price").hide();
                $(".recurring_price").hide();
            }else if(selectec_price=='one time'){
                $("#pricing_table").show();
                $(".recurring_price_fields").hide();
                $(".one_time_price").show();
                $(".recurring_price").hide();
            }else if(selectec_price=="recurring"){
                $(".recurring_price_fields").show();
                $("#pricing_table").show();
                $(".one_time_price").hide();
                $(".recurring_price").show();
            }
    });
    $(document).on('submit', '#frm_genrel', function(event) {
        $('.red_error').html("");
        $('.messages').hide();
        event.preventDefault();

        console.log($('#frm_genrel').serialize());
        $.ajax({
            url: base_url+'/admin/index-plan/<?php echo e($indexplan->id); ?>',
            type: 'PUT',
            data: $('#frm_genrel').serialize(),

        })
        .done(function(response) {

            $('#updated_at').html(response);
            $('#success_message').show();
            $('html body').animate({
              scrollTop: $(".page-content").offset().top
          }, 700);
        })
        .fail(function(response) {
            validation_errors=response.responseJSON;
            console.log(validation_errors);
            $.each(validation_errors, function(k, v) {
//display the key and value pair
//console.log(k + ' is ' + v);
$('#'+k).html(v)

});
/*$('#status').html(validation_errors.status);
$('#name_line1').html(validation_errors.name_line1);
$('#name_line2').html(validation_errors.name_line2);
$('#url').html(validation_errors.url);
$('#sort_order').html(validation_errors.sort_order);
$('#enable_plan_button_other').html(validation_errors.enable_plan_button_other);*/
$('#error_message').show();
$('html body').animate({
  scrollTop: $(".page-content").offset().top
}, 700);
})
        .always(function(response) {

        });

    });
    function pricing_section() {
        var selectec_price=$("input[name='pricing_type']:checked").val().toLowerCase();
        if (selectec_price=="free") {
                $("#pricing_table").hide();
                $(".one_time_price").hide();
                $(".recurring_price").hide();
            }else if(selectec_price=='one time'){
                $("#pricing_table").show();
                $(".recurring_price_fields").hide();
                $(".one_time_price").show();
                $(".recurring_price").hide();
            }else if(selectec_price=="recurring"){
                $(".recurring_price_fields").show();
                $("#pricing_table").show();
                $(".one_time_price").hide();
                $(".recurring_price").show();
            }
    }
    pricing_section();
    $("#icon_image_file").change(function(event) {
        $('#img_icon_image').hide();
        $('#plz_wait').show();
        var formData = new FormData();
        formData.append("image_file", $("#icon_image_file")[0].files[0]);
        formData.append("id", $("#indexplan_id").val());
        formData.append("_token", '<?php echo e(csrf_token()); ?>');
        console.log(formData);
        $.ajax({
            url: base_url+'/admin/index-plan/image_update',
            type: 'POST',
            data: formData,
            processData: false,  // tell jQuery not to process the data
            contentType: false 
        })
        .done(function(response) {

            $('#img_icon_image').attr('src',"<?php echo e(url('').'/storage/index-plan/icon_images/'); ?>"+response);
        })
        .fail(function(response) {
            $('#icon_image').html(response.responseJSON.image_file);
        })
        .always(function() {
            $('#img_icon_image').show();
            $('#plz_wait').hide();
        });
    });
    
    
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>