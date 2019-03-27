<?php 
	$getType = Request::get('type') ?: 'new';
	$active = $getType === $type ? 'active' : '';
 ?>

<div id="<?php echo e($type); ?>" class="tab-pane fade in <?php echo e($active); ?>">
	<div class="portlet">
	<div class="portlet-header">
		<div class="caption"><?php echo e($item->title); ?> Pricing Listing</div>
		<p class="margin-top-10px"></p>
		<div class="clearfix"></div>
		<div class="text-blue">This is where you configure the TLDs that you want to allow clients to register or transfer to you. As well as pricing, you can set which addons are offered with each TLD. If an EPP code is required for transfers, tick the EPP Code box. If DNS Management, Email Forwarding or ID Protection is available &amp; should be offered for this TLD check the boxes.</div>
		<div class="xss-margin"></div>
		<a href="#" data-target="#modal-add-new-price-<?php echo e($type); ?>" data-toggle="modal" class="btn btn-success">Add New &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
		<a href="#" data-target="#modal-import-price-list-<?php echo e($type); ?>" data-toggle="modal" class="btn btn-warning">Update All Pricing &nbsp;<i class="fa fa-refresh"></i></a>&nbsp;
		<div class="btn-group">
		<button type="button" class="btn btn-primary">Delete</button>
		<button type="button" data-toggle="dropdown" class="btn btn-red dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
		<ul role="menu" class="dropdown-menu">
			<li><a href="#" data-target="#modal-delete-selected" data-toggle="modal">Delete selected item(s)</a></li>
			<li class="divider"></li>
			<li><a href="#" data-target="#modal-delete-all-<?php echo e($type); ?>" data-toggle="modal">Delete all</a></li>
		</ul>
		</div>
		<a href="#" data-target="#modal-mark-up-<?php echo e($type); ?>" data-toggle="modal" class="btn btn-info">Mark Up &nbsp;<i class="fa fa-percent"></i></a>&nbsp;
		<?php echo $__env->make('admin.domain_pricing_list.modals.create', ['type' => $type], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->make('admin.domain_pricing_list.modals.import_price_list', ['type' => $type], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->make('admin.domain_pricing_list.modals.delete_all', ['type' => $type], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->make('admin.domain_pricing_list.modals.mark_up', ['type' => $type], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<div class="tools"> <i class="fa fa-chevron-up"></i> </div>
	</div>
	<div class="portlet-body">
		<div class="form-inline pull-left">
		<?php 
			if (!$active) {
				$items = App\Models\DomainPricingList::where('type', $type)->where('domain_pricing_id', $item->id)
					->paginate($perPage, ['*'], 'page', 1);
			} else {
				$items = App\Models\DomainPricingList::where('type', $type)->where('domain_pricing_id', $item->id)->paginate($perPage);
			}
		 ?>
		<div class="form-group">
			<select name="select" id="pages" class="form-control">
			<option value="10" <?=$items->perPage() == 10 ? 'selected' : ''?>>10</option>
			<option value="20" <?=$items->perPage() == 20 ? 'selected' : ''?>>20</option>
			<option value="30" <?=$items->perPage() == 30 ? 'selected' : ''?>>30</option>
			<option value="50" <?=$items->perPage() == 50 ? 'selected' : ''?>>50</option>
			<option value="100" <?=$items->perPage() == 100 ? 'selected' : ''?>>100</option>
			</select>

			&nbsp;
			<label class="control-label">Records per page</label>
		</div>
		</div>

		<div class="clearfix"></div>

		<div class="table-responsive mtl">
		<table class="table table-hover table-striped">
			<thead>
			<tr>
				<th></th>
				<th></th>
				<th></th>
				<th colspan="10"><div class="alicent">Per Year Pricing (RM)</div></th>
				<th></th>
				<th></th>
			</tr>
			<tr>
				<th width="1%"><input type="checkbox" data-toggler data-toggle=".toggle-list-<?php echo e($type); ?>"></th>
				<th>#</th>
				<th>TLD</th>
				<th>1 Year</th>
				<th>2 Years</th>
				<th>3 Years</th>
				<th>4 Years</th>
				<th>5 Years</th>
				<th>6 Years</th>
				<th>7 Years</th>
				<th>8 Years</th>
				<th>9 Years</th>
				<th>10 Years</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>

			<?php if(!isset($items)): ?>
			not ok
			<?php endif; ?>
			<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<?php echo $__env->make('admin.domain_pricing_list.inc.list', compact('i'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			</tbody>
			<tfoot>
			<tr>
				<td colspan="15"></td>
			</tr>
			</tfoot>
		</table>
		<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<?php echo $__env->make('admin.domain_pricing_list.modals.update', compact('i'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		<div class="tool-footer text-right">
		<p class="pull-left">Showing <?php echo e($items->firstItem()); ?> to <?php echo e($items->lastItem()); ?> of <?php echo e($items->total()); ?> entries</p>
		<?php echo e($items->appends(['type' => $type, 'per_page' => $items->perPage()])->links()); ?>

		</div>
		<div class="clearfix"></div>
		</div><!-- end table responsive -->
	</div>
	</div><!-- End portlet -->

</div><!-- end new registration pricing tab -->
