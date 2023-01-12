<!-- Bootstrap Table with Header - Light -->
  <div class="card">
	<div class="card-header">
	<h5>Metrics list</h5>
	<div class="card-actions">
	<span class="badge bg-label-primary me-1 action"><a href="<?php echo base_url("admin/secure/master/registration-metrics")?>"><i class="bx bx-plus"></i></a></span>
	</div>
	</div>
	<div class="card-body">
	<div class="table-responsive text-nowrap">
	  <table class="table">
		<thead class="table-light">
		  <tr>
			<th>Name</th>
			<th>Created</th>
			<th>Status</th>
			<th>Actions</th>
		  </tr>
		</thead>
		<tbody class="table-border-bottom-0">
		<?php
		if(!empty($metricslist)){
			foreach($metricslist as $item){
		?>
		  <tr>
			<td><?php echo $item['name']?></td>
			<td><span class=""><?php echo dateView($item['created_date'])?></span></td>
			<th><span class="badge bg-label-<?php echo booleanClass($item['status'])?> me-1"><?php echo booleanLabel($item['status'])?></span></th>
			<td>
			<div class="d-inline-block text-nowrap">
				<a href="<?php echo base_url("admin/secure/master/registration-metrics/{$item['id']}")?>" class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></a>
			</div>
			</td>
		  </tr>
			<?php }
		}?>

		</tbody>
	  </table>
	</div>
	</div>
  </div>
  <!-- Bootstrap Table with Header - Light -->