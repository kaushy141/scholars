<!-- Bootstrap Table with Header - Light -->
  <div class="card">
	<div class="card-header">
	<h5><?=$listName?> list</h5>
	<div class="card-actions">
	<span class="badge bg-label-primary me-1 action"><a href="<?php echo base_url("admin/secure/user/registration")?>"><i class="bx bx-plus"></i></a></span>
	</div>
	</div>
	<div class="card-body">
	<div class="table-responsive text-nowrap">
	  <table class="table">
		<thead class="table-light">
		  <tr>
			<th>User</th>
			<th>Name</th>
			<th>Email</th>
			<th>Type</th>
			<th>Created</th>
			<th>Status</th>
			<th>Actions</th>
		  </tr>
		</thead>
		<tbody class="table-border-bottom-0">
		<?php
		if(!empty($userlist)){
			foreach($userlist as $user){
		?>
		  <tr>
			<td><i class="fab fa-angular fa-lg text-danger me-3"></i><strong><?= img(array("src"=>base_url().'/'.$user['image'], "class"=>"w-px-40 h-auto rounded-circle"))?></strong></td>
			<td><?php echo $user['fname']?> <?php echo $user['lname']?></td>
			<td><span class="badge bg-label-<?php echo $user['email_verified']? "success":"warning"?> me-1"><?php echo $user['email']?></span></td>
			<td><span class=""><?php echo $user['type_name']?></span></td>
			<td><span class=""><?php echo dateView($user['created_date'])?></span></td>
			<th><span class="badge bg-label-<?php echo statusClass($user['status'])?> me-1"><?php echo $user['status']?></span></th>
			<td>
			<div class="d-inline-block text-nowrap">
				<a href="<?php echo base_url("admin/secure/user/registration/{$user['id']}")?>" class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></a>
				<a href="<?php echo base_url("admin/secure/user/delete/{$user['id']}")?>" class="delete-record btn btn-sm btn-icon delete-record"><i class="bx bx-trash"></i></a>
				<button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
				<div class="dropdown-menu dropdown-menu-end m-0">
					<a href="<?php echo base_url("admin/secure/user/profile/{$user['id']}")?>" class="dropdown-item"><i class="bx bx-user"></i> View Profile</a>
					<a href="<?php echo base_url("admin/secure/user/registration/{$user['id']}")?>" class="dropdown-item"><i class="bx bx-edit"></i> Update</a>
					<a href="<?php echo base_url("admin/secure/user/send-email-conf-link/{$user['id']}")?>" class="dropdown-item"><i class="bx bx-mail-send"></i> Send Conf. Link</a>
					<a href="<?php echo base_url("admin/secure/user/change-password/{$user['id']}")?>" class="dropdown-item"><i class="bx bx-shield-quarter"></i> Change Password</a>
					<?php foreach($status as $_status){
						if($user['status'] != $_status['value']){
						?>
						<a href="<?php echo base_url("admin/secure/user/".strtolower($_status['key'])."/{$user['id']}")?>" class="dropdown-item text-<?php echo $_status['class'];?>"><i class="bx bx-<?php echo $_status['icon'];?>"></i> <?php echo $_status['label'];?></a>
						<?php
						}
					}?>
				</div>
			</div>
			</td>
		  </tr>
			<?php }
		}?>

		</tbody>
	  </table>
	</div>
  </div>
  <!-- Bootstrap Table with Header - Light -->