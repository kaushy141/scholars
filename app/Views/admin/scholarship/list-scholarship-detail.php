<!-- Bootstrap Table with Header - Light -->
  <div class="card">
	<div class="card-header">
	<h5>Scholarship list</h5>
	</div>
	<div class="card-body">
	<?php
		if(!empty($scholarshiplist)){
			foreach($scholarshiplist as $item){
		?>
		<div class="card mb-3">
			<div class="row g-0">
			  <div class="col-md-2">
				<p class="pb-3 text-center">
				<?= img(array("src"=>base_url().'/'.$item['image'], "class"=>"card-img card-img-left w-px-100 h-auto "))?>
				</p>
				<p class="text-center pb-3 mb-0">				
				  <a href="#" class="btn btn-primary">Apply</a>
				</p>				
			  </div>
			  <div class="col-md-10">
				<div class="px-2 py-1">
				  <h5 class="card-title text-primary"><?php echo $item['name']?></h5>
				  <p class="mb-4"><td><?php echo $item['details']?></p>
				  
				  <div class="row">
					<div class="col-md-3">
						<div class="pb-1 d-flex align-items-start justify-content-between">
						<div class="flex-shrink-0">
						  <span><i class="bx bx-calendar-heart text-success"></i></span>
						  <span class="fw-semibold d-block mb-1">Published on</span>
						</div>
					  </div>
					  <h5 class="card-title mb-2"><?php echo dateView($item['publish_date'])?></h5>
					</div>
					<div class="col-md-3">
						<div class="pb-1 d-flex align-items-start justify-content-between">
						<div class="flex-shrink-0">
						  <span><i class="bx bx-calendar-event text-primary"></i></span>
						  <span class="fw-semibold d-block mb-1">Reg. Starting from</span>
						</div>
					  </div>
					  
					  <h5 class="card-title mb-2"><?php echo dateView($item['reg_start_date'])?></h5>
					</div>
					<div class="col-md-3">
						<div class="pb-1 d-flex align-items-start justify-content-between">
						<div class="flex-shrink-0">
						  <span><i class="bx bx-calendar-check text-warning"></i></span>
						  <span class="fw-semibold d-block mb-1">Reg. Ending to</span>
						</div>
					  </div>					  
					  <h5 class="card-title mb-2"><?php echo dateView($item['reg_end_date'])?></h5>
					</div>
					<div class="col-md-3">
						<div class="pb-1 d-flex align-items-start justify-content-between">
						<div class="flex-shrink-0">
						  <span><i class="bx bx-calendar-star text-info"></i></span>
						  <span class="fw-semibold d-block mb-1">Announce on</span>
						</div>
					  </div>					  
					  <h5 class="card-title mb-2"><?php echo dateView($item['announce_date'])?></h5>
					</div>
										
				  </div>

				</div>
			  </div>
			</div>
			<div class="row">
				<div class="col-md-12">
			<div class="card">
			<div class="card-body py-2">
				<div class="col-md-12">
				<ul class="list-unstyled users-list m-0 py-1 d-flex align-items-center">
				<?php 
				if($item['qualifications']){
					$qualifications = explode("^", $item['qualifications']);
					foreach($qualifications as $_q){
						$qData = explode("|", $_q);
						?>
						<li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="mx-2" title="<?=$qData[0]?>" data-bs-original-title="<?=$qData[0]?>">
						  <?= img(array("src"=>base_url().'/'.$qData[1], "class"=>"w-px-20 h-auto rounded-circle"))?> <span class="d-none d-md-inline-block"><?=$qData[0]?></span>
						</li> &nbsp; 
						<?php
					}
				}?>
				</ul>
				</div>
				</div>
				</div>
				</div>
			</div>
		  </div>
				  
		  
			<?php }
		}?>
	</div>
  </div>
  <!-- Bootstrap Table with Header - Light -->