<?php $page='co-cloud-hosting';
$breadcrumbs=[
array('url'=>url('admin/co_cloud_hosting'),'name'=>'Co Cloud hosting'),

];
?>

@extends('layouts.admin_layout')
@section('title','Admin | CoCloud Hosting')
@section('content')
@section('page_header','Co Cloud Hosting')
<div class="page-content">
          <div class="row">
            <div class="col-lg-12">
              <h2>Co-location Hosting <i class="fa fa-angle-right"></i> Edit</h2>
              <div class="clearfix"></div>
              <div class="pull-left"> Last updated: <span class="text-blue">15 Sept, 2014 @ 12.00PM</span> </div>
              <div class="clearfix"></div>
              <p></p>
              
              <div class="portlet">
                <div class="portlet-header">
                  <div class="caption">Page Info</div>
                  <div class="clearfix"></div>
                  <span class="text-blue text-12px">You can edit the content by clicking the text section below.</span>
                  <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                </div>
                <div class="portlet-body">
                  note to programmer: pls use the ckeditor version 4.5.4 version or newer. The css style and layout should follow 100% as shown in front end. 
                    
                    <div id="co_cloud_hosting_content" contenteditable="true"> 
                        {!!$page_cms->content!!} 
                    </div>
                        
                    <div class="clearfix"></div>
                </div><!-- end portlet body -->
                <!-- save button start -->
                <div hidden="" style="margin-top: 10px" id="success_message_cms" class="messages alert alert-success alert-dismissable">
                          <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                          <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                          <p>Page content saved</p>
                        </div>
                <div class="form-actions none-bg"> <a href="javascript:void" onclick="save_content(0)" class="btn btn-red">Save &amp; Preview &nbsp;<i class="fa fa-search"></i></a>&nbsp; <a href="javascript:void" onclick="save_content(1)" class="btn btn-blue">Save &amp; Publish &nbsp;<i class="fa fa-globe"></i></a>&nbsp; <a href="#" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                <!-- save button end -->
                
              </div>
              <!-- end porlet -->
              
              <h4 class="block-heading">Co-location Hosting Plans &amp; General Features Listing</h4>
              <ul id="myTab" class="nav nav-tabs">
                <li class="active"><a href="#hosting-plans" data-toggle="tab">Co-location Hosting Plans</a></li>
                <li><a href="#general-features" data-toggle="tab">General Features</a></li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div id="hosting-plans" class="tab-pane fade in active">
          <div class="portlet">
                    <div class="portlet-header">
                      <div class="caption">Plan Features Listing</div>
                      <p style="margin-top: 32px" class="margin-top-10px"></p>
                      <a href="#" data-target="#modal-add-plan-feature" data-toggle="modal" class="btn btn-success">Add New &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
                      <div class="btn-group">
                        <button type="button" class="btn btn-primary">Delete</button>
                        <button type="button" data-toggle="dropdown" class="btn btn-red dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                        <ul role="menu" class="dropdown-menu">
                          <li><a href="javascript:void" onclick="open_modal_delete_selected()" >Delete selected item(s)</a></li>
                          <li class="divider"></li>
                          <li><a href="#" data-target="#modal-delete-all" data-toggle="modal">Delete all</a></li>
                        </ul>
                      </div>
                      <!--Modal Add New plan feature start-->
                      <div id="modal-add-plan-feature" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                        <div class="modal-dialog modal-wide-width">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                              <h4 id="modal-login-label3" class="modal-title">Add New Plan Feature</h4>
                            </div>
                            <div class="modal-body">
                              <div class="form">
                                <form id="plan_feature_frm" class="form-horizontal">
                                {!!csrf_field()!!}
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Status</label>
                                    <div class="col-md-6">
                                      <div data-on="success" data-off="primary" class="make-switch">
                                        <input name="status" type="checkbox" checked="checked"/>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Plan Feature <span class="text-red">*</span></label>
                                    <div class="col-md-6">
                                      <input name="title" type="text" class="form-control" placeholder="eg. RAM">
                                        <p class="red_error" id="title"></p>

                                    </div>
                                  </div>
                                  <div class="form-actions">
                                    <div class="col-md-offset-5 col-md-8"> <a href="javascript:void" id="save_feature_plan" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--END MODAL Add New plan feature -->
                      <!--Modal delete selected items plan feature start-->
                      <div id="modal-delete-selected-plan-feature" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                              <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the selected item(s)? </h4>
                            </div>
                            <div class="modal-body">
                              <p><strong>#1:</strong> RAM</p>
                              <div class="form-actions">
                                <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- modal delete selected items plan feature end -->
                      <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                    </div>

                    <div class="portlet-body">
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
                          <form id="delete_client">
                          {!!csrf_field()!!}
                            @if($plan_features)
                              @foreach($plan_features as $i)
                              <tr>
                              <td><input name="id[]" value="{{$i->id}}" type="checkbox"/></td>
                              <td>{{$i->id}}</td>
                              <td><span class="label label-xs label-{{$i->status?'success':'danger'}}">{{$i->status?'Active':'Inactive'}}</span></td>
                              <td>{{$i->title}}</td>
                              <td><a href="javascript:void" onclick="edit_plan_feature({{$i->id}},{{$i->status}},'{{$i->title}}')" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-plan-feature-{{$i->id}}" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                                  <!--Modal Edit plan feature start-->
                                  
                                <!--END MODAL Edit plan feature -->
                                  <!--Modal delete start-->
                                  <div id="modal-delete-plan-feature-{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                          <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this? </h4>
                                        </div>
                                        <div class="modal-body">
                                          <p><strong>#{{$i->id}}:</strong> {{$i->title}}</p>
                                          <div class="form-actions">
                                            <div class="col-md-offset-4 col-md-8"> <a href="javascript:void" onclick="delete_single({{$i->id}})" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                <!-- modal delete end -->
                              </td>
                            </tr>
                              @endforeach
                            @endif
                            </form>
                          </tbody>
                          <tfoot>
                            <tr>
                              <td colspan="5"></td>
                            </tr>
                          </tfoot>
                        </table>
                        <div class="clearfix"></div>
                        <span>Showing  {{$plan_features->firstItem()}} to {{$plan_features->lastItem()}} of {{$plan_features->total()}}</span>
                      <span class="pull-right">{{$plan_features->links()}}</span>
                      </div>
                      <!-- end table responsive -->
                    </div>
                  </div>
                  <!-- End portlet -->
                  <div class="portlet">
                    <div class="portlet-header">
                      <div class="caption">Co-location Hosting Plans Listing</div>
                      <p class="margin-top-10px"></p>
                      <a href="co-location_hosting_plan_new.html" class="btn btn-success">Add New Plan &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
                      <div class="btn-group">
                        <button type="button" class="btn btn-primary">Delete</button>
                        <button type="button" data-toggle="dropdown" class="btn btn-red dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                        <ul role="menu" class="dropdown-menu">
                          <li><a href="#" data-target="#modal-delete-selected-plan" data-toggle="modal">Delete selected item(s)</a></li>
                          <li class="divider"></li>
                          <li><a href="#" data-target="#modal-delete-all" data-toggle="modal">Delete all</a></li>
                        </ul>
                      </div>
                      
                      <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                      
                      <!--Modal delete selected items start-->
                      <div id="modal-delete-selected-plan" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                              <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the selected item(s)? </h4>
                            </div>
                            <div class="modal-body">
                              <p><strong>#1:</strong> 10U</p>
                              <div class="form-actions">
                                <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- modal delete selected items end -->
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
                      
                    </div>
                    <div class="portlet-body">
                      <div class="pull-right"> <a href="#" class="btn btn-danger">Update Display Order &nbsp;<i class="fa fa-refresh"></i></a> </div>
                      <div class="clearfix"></div>
                        <div class="table-responsive mtl">
                              <table class="table table-hover table-striped">
                                <thead>
                                  <tr>
                                    <th width="1%"><input type="checkbox"/></th>
                                    <th>#</th>
                                    <th>Status</th>
                                    <th>Service Code</th>
                                    <th>Plan Name</th>
                                    <th>Price (RM)</th>
                                    <th>Promo Behaviour</th>
                                    <th width="10%">Display Order</th>
                                    <th class="alicent">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td><input type="checkbox"/></td>
                                    <td>3</td>
                                    <td><span class="label label-xs label-success">Active</span></td>
                                    <td>CO10U-1</td>
                                    <td>10U</td>
                                    <td>750.00/mo</td>
                                    <td></td>
                                    <td><input type="text" class="form-control" value="Right"></td>
                                    <td class="alicent"><a href="co-location_hosting_plan_edit.html" data-hover="tooltip" data-placement="top" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-1" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                                       
                                        <!--Modal delete plan start-->
                                        <div id="modal-delete-1" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade alileft">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                                <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this? </h4>
                                              </div>
                                              <div class="modal-body">
                                                <p><strong>#3:</strong> 10U</p>
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
                                    <td>2</td>
                                    <td><span class="label label-xs label-success">Active</span></td>
                                    <td>CO5U-1</td>
                                    <td>5U</td>
                                    <td>650.00/mo</td>
                                    <td><span class="red"><i class="fa fa-check red"></i>&nbsp;Best Value</span></td>
                                    <td><input type="text" class="form-control" value="Middle"></td>
                                    <td class="alicent"><a href="co-location_hosting_plan_edit.html" data-hover="tooltip" data-placement="top" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-1" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td><input type="checkbox"/></td>                                 
                                    <td>1</td>
                                    <td><span class="label label-xs label-success">Active</span></td>
                                    <td>CO2U-1</td>
                                    <td>2U</td>
                                    <td>550.00/mo</td>
                                    <td></td>
                                    <td><input type="text" class="form-control" value="Left"></td>
                                    <td class="alicent"><a href="co-location_hosting_plan_edit.html" data-hover="tooltip" data-placement="top" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-1" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                                    </td>
                                  </tr>
                                </tbody>
                                <tfoot>
                                  <tr>
                                    <td colspan="9"></td>
                                  </tr>
                                </tfoot>
                              </table>
                            </div>
                            <!-- end table responsive -->
                    </div>
                    <!-- end portlet body -->
                  </div>
                  <!-- End porlet -->
                </div>
                <!-- end tab copyright text -->
                <div id="general-features" class="tab-pane fade">
                  <div class="portlet">
                    <div class="portlet-header">
                      <div class="caption">Feature Heading Edit</div>
                       
                      <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                    </div>
                    <div class="portlet-body">
                      <div class="table-responsive mtl">
                        <table class="table table-hover table-striped">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Status</th>
                              <th>Feature Heading</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td><span class="label label-xs label-success">Active</span></td>
                              <td>Co-location Server Features</td>
                              <td><a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-feature-title" data-toggle="modal" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a>
                                  <!--Modal Edit feature heading text start-->
                                  <div id="modal-edit-feature-title" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                    <div class="modal-dialog modal-wide-width">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                          <h4 id="modal-login-label3" class="modal-title">Edit Feature Heading Text</h4>
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
                                                <label class="col-md-3 control-label">Feature Heading <span class="text-red">*</span> </label>
                                                <div class="col-md-6">
                                                   <input type="text" class="form-control" value="Co-location Server Features"> 
                                                </div>
                                              </div>
                                              
                                              <div class="form-actions">
                                                <div class="col-md-offset-5 col-md-8"> <a href="#" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                                              </div>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                <!--END MODAL Edit feature heading text-->
                              </td>
                            </tr>
                          </tbody>
                          <tfoot>
                            <tr>
                              <td colspan="5"></td>
                            </tr>
                          </tfoot>
                        </table>
                        <div class="clearfix"></div>
                      </div>
                      <!-- end table responsive -->
                    </div>
                  </div>
                  <!-- End porlet -->
                  
                  <div class="portlet">
                    <div class="portlet-header">
                      <div class="caption">General Features Listing</div>
                      <p class="margin-top-10px"></p>
                      <a href="#" data-target="#modal-add-general-feature" data-toggle="modal" class="btn btn-success">Add New &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
                      <div class="btn-group">
                        <button type="button" class="btn btn-primary">Delete</button>
                        <button type="button" data-toggle="dropdown" class="btn btn-red dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                        <ul role="menu" class="dropdown-menu">
                          <li><a href="#" data-target="#modal-delete-selected-general-feature" data-toggle="modal">Delete selected item(s)</a></li>
                          <li class="divider"></li>
                          <li><a href="#" data-target="#modal-delete-all" data-toggle="modal">Delete all</a></li>
                        </ul>
                      </div>
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
                      
                      <!--Modal Add new general ffeature start-->
                      <div id="modal-add-general-feature" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                        <div class="modal-dialog modal-wide-width">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                              <h4 id="modal-login-label3" class="modal-title">Add New General Feature</h4>
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
                                    <label class="col-md-3 control-label">Feature Title <span class="text-red">*</span></label>
                                    <div class="col-md-6">
                                      <input type="text" class="form-control" placeholder="eg. Highly Custom Service">
                                    </div>
                                  </div>
                                  
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Feature Description</label>
                                    <div class="col-md-6">
                                      <textarea class="form-control"></textarea>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Insert CSS Icon or </label>
                                    <div class="col-md-6">
                                      <div class="text-blue border-bottom">Please choose <strong>ONE</strong> of the following options for "Feature Icon".</div>
                                      <div class="margin-top-5px"></div>
                                      <input type="text" class="form-control" id="inputContent" placeholder="eg. fa-rocket or icon-anchor">
                                      <div class="help-block">Please refer here for complete <a href="icons_sevices.html" target="_blank">icon options.</a></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Upload Icon Image</label>
                                    <div class="col-md-9">
                                      <div class="xs-margin"></div>
                                        <input id="exampleInputFile2" type="file"/>
                                        <span class="help-block">(Image dimension: 64 x 64 pixels, PNG only, Max. 1MB) </span>
                                    </div>
                                  </div>
                                  <div class="form-actions">
                                    <div class="col-md-offset-5 col-md-8"> <a href="#" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--END MODAL Add New general Feature-->
                      <!--Modal delete selected items start-->
                      <div id="modal-delete-selected-general-feature" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                              <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the selected item(s)? </h4>
                            </div>
                            <div class="modal-body">
                              <p><strong>#1:</strong> Highly Custom Service</p>
                              <div class="form-actions">
                                <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- modal delete selected items end -->
                      
                    </div>
                    <div class="portlet-body">
                      <div class="table-responsive mtl">
                          <table class="table table-hover table-striped">
                            <thead>
                              <tr>
                                <th width="1%"><input type="checkbox"></th>
                                <th>#</th>
                                <th>Status</th>
                                <th>Title</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><input type="checkbox"></td>
                                <td>1</td>
                                <td><span class="label label-xs label-success">Active</span></td>
                                <td>Highly Custom Service</td>
                                <td><a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-general-feature" data-toggle="modal" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-general-feature-1" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                                    <!--Modal Edit general feature start-->
                                    <div id="modal-edit-general-feature" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                      <div class="modal-dialog modal-wide-width">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                            <h4 id="modal-login-label3" class="modal-title">General Feature Edit</h4>
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
                                                    <label class="col-md-3 control-label">Feature Title <span class="text-red">*</span></label>
                                                    <div class="col-md-6">
                                                      <input type="text" class="form-control" placeholder="eg. Highly Custom Service " value="Highly Custom Service ">
                                                    </div>
                                                  </div>
                                                  
                                                  <div class="form-group">
                                                    <label class="col-md-3 control-label">Feature Description</label>
                                                    <div class="col-md-6">
                                                      <textarea class="form-control">We use lightweight Linux containers with SSD disks for unmatched resource efficiency and site speed.</textarea>
                                                    </div>
                                                  </div>
                                                  <div class="form-group">
                                                    <label class="col-md-3 control-label">Insert CSS Icon or </label>
                                                    <div class="col-md-6">
                                                        <div class="text-blue border-bottom">Please choose <strong>ONE</strong> of the following options for "Feature Icon".</div>
                                                      <div class="margin-top-5px"></div>
                                                      <input type="text" class="form-control" id="inputContent" placeholder="eg. fa-rocket or icon-anchor" value="fa-rocket">
                                                      <div class="help-block">Please refer here for complete <a href="icons_sevices.html" target="_blank">icon options.</a></div>
                                                    </div>
                                                  </div>
                                                  <div class="form-group">
                                                    <label class="col-md-3 control-label">Upload Icon Image</label>
                                                    <div class="col-md-9">
                                                        <div class="xs-margin"></div>
                                                        <img src="../images/about_us/icon_cloud_app.png" alt="Ultra-Fast Platform" class="img-responsive"><br/>
                                                        <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-icon" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                                                        <!--Modal delete icon start-->
                                                        <div id="modal-delete-icon" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                                          <div class="modal-dialog">
                                                            <div class="modal-content">
                                                              <div class="modal-header">
                                                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                                                <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this icon image? </h4>
                                                              </div>
                                                              <div class="modal-body">
                                                                <p><img src="../images/about_us/icon_cloud_app.png" alt="Ultra-Fast Platform" class="img-responsive"></p>
                                                                <div class="form-actions">
                                                                  <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                      </div>
                                                      <!-- modal delete end -->
                                                      <div class="xs-margin"></div> 
                                                            
                                                        <input id="exampleInputFile2" type="file"/>
                            
                                                        <span class="help-block">(Image dimension: 64 x 64 pixels, PNG only, Max. 1MB) </span>
                                                    </div>
                                                  </div>
                                                
                                                <div class="form-actions">
                                                  <div class="col-md-offset-5 col-md-8"> <a href="#" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                                                </div>
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                                  <!--END MODAL Edit general feature -->
                                  <!--Modal delete start-->
                                  <div id="modal-delete-general-feature-1" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                                <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this? </h4>
                                              </div>
                                              <div class="modal-body">
                                                <p><strong>#1:</strong> Highly Custom Service</p>
                                                <div class="form-actions">
                                                  <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                      </div>
                                      <!-- modal delete general feature end -->
                                </td> 
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
                    </div>
                  </div><!-- end porlet -->
                  
                  
                  <div class="portlet">
                    <div class="portlet-header">
                      <div class="caption">All Our Plans Include Listing</div>
                      <p class="margin-top-10px"></p>
                      <a href="#" data-target="#modal-add-all-plan-include" data-toggle="modal" class="btn btn-success">Add New &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
                      <div class="btn-group">
                        <button type="button" class="btn btn-primary">Delete</button>
                        <button type="button" data-toggle="dropdown" class="btn btn-red dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                        <ul role="menu" class="dropdown-menu">
                          <li><a href="#" data-target="#modal-delete-selected-general-feature" data-toggle="modal">Delete selected item(s)</a></li>
                          <li class="divider"></li>
                          <li><a href="#" data-target="#modal-delete-all" data-toggle="modal">Delete all</a></li>
                        </ul>
                      </div>
                      
                      
                      <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                      
                      <!--Modal Add new start-->
                      <div id="modal-add-all-plan-include" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                        <div class="modal-dialog modal-wide-width">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                              <h4 id="modal-login-label3" class="modal-title">All Our Plans Include Feature Add New</h4>
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
                                    <label class="col-md-3 control-label">Feature Line 1 Text <span class="text-red">*</span></label>
                                    <div class="col-md-6">
                                      <input type="text" class="form-control" placeholder="eg. Free">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Feature Line 2 Text <span class="text-red">*</span></label>
                                    <div class="col-md-6">
                                      <input type="text" class="form-control" placeholder="eg. Domain">
                                    </div>
                                  </div>
                                  
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Insert CSS Icon or </label>
                                    <div class="col-md-6">
                                      <div class="text-blue border-bottom">Please choose <strong>ONE</strong> of the following options for "Feature Icon".</div>
                                      <div class="margin-top-5px"></div>
                                      <input type="text" class="form-control" id="inputContent" placeholder="eg. fa-rocket or icon-anchor">
                                      <div class="help-block">Please refer here for complete <a href="icons_sevices.html" target="_blank">icon options.</a></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Upload Icon Image</label>
                                    <div class="col-md-9">
                                      <div class="xs-margin"></div>
                                        <input id="exampleInputFile2" type="file"/>
                                        <span class="help-block">(Image dimension: 64 x 64 pixels, PNG only, Max. 1MB) </span>
                                    </div>
                                  </div>
                                  <div class="form-actions">
                                    <div class="col-md-offset-5 col-md-8"> <a href="#" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--END MODAL Add New -->
                      <!--Modal delete selected items start-->
                      <div id="modal-delete-selected-all-plan-include" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                              <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the selected item(s)? </h4>
                            </div>
                            <div class="modal-body">
                              <p><strong>#1:</strong> Free Domain</p>
                              <div class="form-actions">
                                <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- modal delete selected items end -->
                      
                    </div>
                    <div class="portlet-body">
                      <div class="table-responsive mtl">
                          <table class="table table-hover table-striped">
                            <thead>
                              <tr>
                                <th width="1%"><input type="checkbox"></th>
                                <th>#</th>
                                <th>Status</th>
                                <th>Title</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><input type="checkbox"></td>
                                <td>1</td>
                                <td><span class="label label-xs label-success">Active</span></td>
                                <td>Free Domain</td>
                                <td><a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-all-plan-include" data-toggle="modal" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-general-feature-1" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                                    <!--Modal Edit start-->
                                    <div id="modal-edit-all-plan-include" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                      <div class="modal-dialog modal-wide-width">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                            <h4 id="modal-login-label3" class="modal-title">All Our Plans Include Feature Edit</h4>
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
                                                    <label class="col-md-3 control-label">Feature Line 1 Text <span class="text-red">*</span></label>
                                                    <div class="col-md-6">
                                                      <input type="text" class="form-control" placeholder="eg. Free" value="Free">  
                                                    </div>
                                                  </div>
                                                  <div class="form-group">
                                                    <label class="col-md-3 control-label">Feature Line 2 Text <span class="text-red">*</span></label>
                                                    <div class="col-md-6">
                                                      <input type="text" class="form-control" placeholder="eg. Domain" value="Domain">
                                                    </div>
                                                  </div>
                                                  <div class="form-group">
                                                    <label class="col-md-3 control-label">Insert CSS Icon or </label>
                                                    <div class="col-md-6">
                                                        <div class="text-blue border-bottom">Please choose <strong>ONE</strong> of the following options for "Feature Icon".</div>
                                                      <div class="margin-top-5px"></div>
                                                      <input type="text" class="form-control" id="inputContent" placeholder="eg. fa-rocket or icon-anchor" value="fa-globe">
                                                      <div class="help-block">Please refer here for complete <a href="icons_sevices.html" target="_blank">icon options.</a></div>
                                                    </div>
                                                  </div>
                                                  <div class="form-group">
                                                    <label class="col-md-3 control-label">Upload Icon Image</label>
                                                    <div class="col-md-9">
                                                        <div class="xs-margin"></div>
                                                        <img src="../images/shared_hosting/logo_email88.png" alt="Free Domain" class="img-responsive"><br/>
                                                        <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-icon-all-plan-include" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                                                        <!--Modal delete icon start-->
                                                        <div id="modal-delete-icon-all-plan-include" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                                          <div class="modal-dialog">
                                                            <div class="modal-content">
                                                              <div class="modal-header">
                                                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                                                <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this icon image? </h4>
                                                              </div>
                                                              <div class="modal-body">
                                                                <p><img src="../images/about_us/icon_cloud_app.png" alt="Ultra-Fast Platform" class="img-responsive"></p>
                                                                <div class="form-actions">
                                                                  <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                      </div>
                                                      <!-- modal delete end -->
                                                      <div class="xs-margin"></div> 
                                                            
                                                        <input id="exampleInputFile2" type="file"/>
                            
                                                        <span class="help-block">(Image dimension: 64 x 64 pixels, PNG only, Max. 1MB) </span>
                                                    </div>
                                                  </div>
                                                
                                                <div class="form-actions">
                                                  <div class="col-md-offset-5 col-md-8"> <a href="#" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                                                </div>
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                                  <!--END MODAL Edit general feature -->
                                  <!--Modal delete start-->
                                  <div id="modal-delete-general-feature-1" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                                <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this? </h4>
                                              </div>
                                              <div class="modal-body">
                                                <p><strong>#1:</strong> Highly Custom Service</p>
                                                <div class="form-actions">
                                                  <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                      </div>
                                      <!-- modal delete general feature end -->
                                </td> 
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
                    </div>
                  </div><!-- end portlet all our plans include -->
                  
                </div><!-- end tab general features -->
                
              </div>
              <!-- end tab content -->
              <div class="clearfix"></div>
            </div>
            <!-- end col-lg-12 -->
          </div>
          <!-- end row -->
        </div>
        <!-- InstanceEndEditable -->
        <!--END CONTENT-->

                  <div id="modal-delete-selected" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                          <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the ssselected <span id="count-seleted"></span> item(s)? </h4>
                        </div>
                        <div class="modal-body" id="delete-selected-body">
                        <div id="delete-selected-body-information"></div>
                          <p id="selected_zero" style="display:none" class="alert alert-danger">Please select aleast one record for delete</p>
                          <div class="form-actions" id="delete-selected-buttons">
                            <div class="col-md-offset-4 col-md-8"> <button type="button" id="delete_bulk" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- modal delete selected items end -->
@endsection
@section('custom_scripts')
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}vendors/jquery-nestable/nestable.css">
  <script src="{{url('').'/resources/assets/admin/'}}vendors/tinymce/js/tinymce/tinymce.min.js"></script>
  <script src="{{url('').'/resources/assets/admin/'}}vendors/ckeditor/ckeditor.js"></script>
  <script src="{{url('').'/resources/assets/admin/'}}vendors/ckeditor/config.js"></script>
  <script src="{{url('').'/resources/assets/admin/'}}js/ui-tabs-accordions-navs.js"></script>
  <!-- webqom frontend style css -->
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}css/style_webqom_front.css">
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}css/reset.css">
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}css/responsive-leyouts_webqom_front.css">
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}css/shortcodes.css">

<script type="text/javascript">
  $(document).on('click', '#save_feature_plan', function(event) {
    $('#plan_feature_frm').submit();
   });
  $(document).on('submit', '#plan_feature_frm', function(event) {
    event.preventDefault();
    $.ajax({
      url: base_url+'/admin/plan_features/new',
      type: 'POST',
      data: $('#plan_feature_frm').serialize(),
    })
    .done(function() {
      location.reload();
    })
    .fail(function(response) {
                validation_errors=response.responseJSON;
                 console.log(validation_errors);
                $.each(validation_errors, function(k, v) {
                    //display the key and value pair
                    //console.log(k + ' is ' + v);
                    $('#'+k).html(v)
                   
                });
    })
    .always(function() {
      console.log("complete");
    });
  });
  function edit_plan_feature(id,status,title) {
    
    if (status==1) {
      $('#edit_status').prop('checked',true);
    }else{
      $('#edit_status').prop('checked',false);
    }
    $('#edit_title').val(title);
    $('#edit_id').val(id);
    $('#modal-edit-plan-feature').modal('show');
    
  }
  $(document).on('click', '#edit_plan_feature', function(event) {
      $.ajax({
      url: base_url+'/admin/plan_features/update',
      type: 'POST',
      data: $('#plan_feature_edit_frm').serialize(),
      })
      .done(function() {
        location.reload();
      })
      .fail(function(response) {
                  validation_errors=response.responseJSON;
                   console.log(validation_errors);
                  $.each(validation_errors, function(k, v) {
                      //display the key and value pair
                      //console.log(k + ' is ' + v);
                      $('#error_edit_'+k).html(v)
                     
                  });
      })
      .always(function() {
        console.log("complete");
      });
  });
  function save_content(publish) {
    /*var left_header = CKEDITOR.instances.left_header.getData();
    var right_header = CKEDITOR.instances.right_header.getData();
    */var content = CKEDITOR.instances.co_cloud_hosting_content.getData();
   
     $.ajax({
       url: base_url+'/admin/pages/new',
       type: 'POST',
       data: {'_token':'{{csrf_token()}}',
               'name':'co cloud hosting', 
               'content':content, 
               'publish':publish, 
            },
         })
         .done(function(response) {
          if (publish==0) {
            window.open(base_url+"/co_cloud_hosting");
          }
           $('#success_message_cms').show();
           setTimeout(function() {
            $('#success_message_cms').hide();
           }, 3000);
         })
         .fail(function() {
           console.log("error");
         })
         .always(function() {
           console.log("complete");
         });
     }
     function delete_single(id) {
                      $('#delete_single_button').attr("disabled",true);
                      $.ajax({
                      url: base_url+'/admin/plan_features/delete',
                      type: 'POST',
                      
                      data: {'_token':csrf_token,'id':id}
                    })
                    .done(function() {
                        location.reload();
                    })
                    .fail(function() {
                      alert("some error");
                    })
                    .always(function() {
                      console.log("complete");
                    });
                    } 
                    function open_modal_delete_selected() {
                  $('#delete-selected-body-information').html("");
                  $("#modal-delete-selected").modal('show');
                  var selected=$('input[name="id[]"]:checked').length;
                  if (selected<1) {
                    $('#selected_zero').show()
                    $('#delete-selected-buttons').hide()
                  }else{
                    /*get seleccted users details*/
                    $.ajax({
                      url: base_url+'/admin/plan_features/get_details',
                      type: 'POST',
                      data: $("#delete_client").serialize()
                    })
                    .done(function(response) {
                      console.log(response);
                      for (var i=0; i <response.length; i++) {
                          $('#delete-selected-body-information').prepend('<p>'+
                            '<strong>#'+response[i].id+'</strong>:<span>'+response[i].title+'</p>');                      
                      }
                      })
                    .fail(function() {
                      console.log("error");
                    })
                    .always(function() {
                      $('#selected_zero').hide()
                      $('#delete-selected-buttons').show();
                      $('#count-seleted').html(selected);
                    });
                    
                    /*End*/
                    
                  }
                } 
</script>
@endsection