<!-- Bootstrap Table with Header - Light -->
  <div class="card">
	<div class="card-header">
	<h5>Scholarship list</h5>
	<div class="card-actions">
	<span class="badge bg-label-primary me-1 action"><a href="<?php echo base_url("admin/secure/master/registration-metrics")?>"><i class="bx bx-plus"></i></a></span>
	</div>
	</div>
	<div class="card-body">
	<div class="table-responsive text-nowrap">
	  <table class="table">
		<thead class="table-light">
		  <tr>
			<th>#icon</th>
			<th>Name</th>
			<th>Amount</th>
			<th>Publish</th>
			<th>Start</th>
			<th>End</th>
			<th>Announce</th>
			<th>Renew</th>
			<th>Status</th>
			<th>Actions</th>
		  </tr>
		</thead>
		<tbody class="table-border-bottom-0">
		<?php
		if(!empty($scholarshiplist)){
			foreach($scholarshiplist as $item){
		?>
		  <tr>
			<td><i class="fab fa-angular fa-lg text-danger me-3"></i><strong><?= img(array("src"=>base_url().'/'.$item['image'], "class"=>"w-px-40 h-auto rounded-circle"))?></strong></td>
			<td><?php echo $item['name']?></td>
			<td><?php echo $item['amount']?></td>
			<td><span class=""><?php echo dbToDate($item['publish_date'])?></span></td>
			<td><span class=""><?php echo dbToDate($item['reg_start_date'])?></span></td>
			<td><span class=""><?php echo dbToDate($item['reg_end_date'])?></span></td>
			<td><span class=""><?php echo dbToDate($item['announce_date'])?></span></td>
			<td><span class="badge bg-label-<?php echo booleanClass($item['auto_renew'])?> me-1"><?php echo booleanLabel($item['auto_renew'])?></span></td>
			<td><span class="badge bg-label-<?php echo booleanClass($item['status'])?> me-1"><?php echo booleanLabel($item['status'])?></span></td>
			<td>
			<div class="d-inline-block text-nowrap">
				<a href="<?php echo base_url("admin/secure/scholarship/registration/{$item['id']}")?>" class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></a>
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