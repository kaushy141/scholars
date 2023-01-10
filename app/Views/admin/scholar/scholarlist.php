<!-- Bootstrap Table with Header - Light -->
  <div class="card">
	<div class="card-header">
	<h5>Scholar list</h5>
	<div class="card-actions">
	<span class="badge bg-label-primary me-1 action"><a href="<?php echo base_url("admin/secure/master/registration-scholar")?>"><i class="bx bx-plus"></i></a></span>
	</div>
	</div>
	<div class="card-body">
	<div class="table-responsive text-nowrap">
	  <table class="table">
		<thead class="table-light">
		  <tr>
			<th>Scholar</th>
			<th>Name</th>
			<th>Created</th>
			<th>Status</th>
			<th>Actions</th>
		  </tr>
		</thead>
		<tbody class="table-border-bottom-0">
		<?php
		if(!empty($scholarlist)){
			foreach($scholarlist as $scholar){
		?>
		  <tr>
			<td><i class="fab fa-angular fa-lg text-danger me-3"></i><strong><?= img(array("src"=>base_url().'/'.$scholar['scholar_image'], "class"=>"w-px-40 h-auto rounded-circle"))?></strong></td>
			<td><?php echo $scholar['fname']?> <?php echo $scholar['scholar_name']?></td>
			<td><span class=""><?php echo dateView($scholar['scholar_created_date'])?></span></td>
			<th><span class="badge bg-label-<?php echo booleanClass($scholar['scholar_status'])?> me-1"><?php echo booleanLabel($scholar['scholar_status'])?></span></th>
			<td>
			<div class="d-inline-block text-nowrap">
				<a href="<?php echo base_url("admin/secure/master/registration-scholar/{$scholar['scholar_id']}")?>" class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></a>
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