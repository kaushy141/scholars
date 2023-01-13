<?php //print_r($data);
?>
<div class="card mb-4">
  <h5 class="card-header"><?= $data['image'] ? img(array("src"=>base_url().'/'.$data['image'], "class"=>"w-px-30 h-auto rounded-circle")) : ""?> Scholar Master Form</h5>
  <?php echo form_open_multipart('admin/secure/master/savescholar/' . intval($data['id']), ['class' => 'card-body']); ?>
  <div class="row g-3">    
	<div class="col-md-12">
      <label class="form-label" for="mname">Name</label>
      <input type="text" name="name" id="name" maxlength="250" class="form-control" placeholder="Full Scholarship Name" value="<?= $data['name'] ?>">
    </div>   
	
	<div class="col-md-12">
      <label class="form-label" for="details">Details</label>
      <textarea name="details" id="details" maxlength="100000" required class="form-control" placeholder="Details about scholar..." ><?= $data['details'] ?></textarea>
    </div>	
	
	<div class="col-md-4">
    <label class="form-label">Status</label>
	<div class="input-group">
	<div class="form-check form-check-inline mt-2">
		<input name="status" class="form-check-input" type="radio" value="1" id="status_1" <?= (!isset($data['status']) || $data['status'] == "1") ? "checked":"" ?>>
		<label class="form-check-label" for="status_1"> Active </label>
	  </div>
	  <div class="form-check form-check-inline mt-2">
		<input name="status" class="form-check-input" type="radio" value="0" id="status_0" <?= $data['status'] == "0" ? "checked":"" ?>>
		<label class="form-check-label" for="status_0"> Deactive </label>
	  </div>
	  </div>
	</div>
	<div class="col-md-4">
    <label class="form-label" for="image">Image</label>
    <div class="input-group">
        <span class="input-group-text"><i class="bx bx-camera"></i></span>
        <input type="file" name="image" id="image" class="form-control" placeholder="Scholar image" >
      </div>
    </div>
	
	<div class="col-sm-12">
      <label class="form-label" for="state">Required Qualification</label>
      <div class="row">
		  <div class="col-sm-12">
		  <div class="row">
			<?php
			if (!empty($qualifications))
			  foreach ($qualifications as $q) {
			?>
			  <div class="form-check form-check-inline mb-2 mt-1">
				<div class="form-check">
				  <input type="checkbox" name="qualifications[]" id="qualification-<?php echo $q['id'] ?>" class="form-check-input" value="<?php echo $q['id'] ?>" <?php echo $data['qualifications'] && in_array($q['id'], $data['qualifications']) ? "checked" : "" ?> />
				  <label class="form-check-label" for="qualification-<?php echo $q['id'] ?>"><?= img(array("src"=>base_url().'/'.$q['image'], "class"=>"w-px-20 h-auto rounded-circle"))?> <?php echo $q['name'] ?></label>
				</div>
			  </div>
			<?php
			  }
			?>
		  </div>
		  </div>
	  </div>
    </div>	
	
  </div>
  
 
  <div class="pt-4">
    <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
    <button type="reset" class="btn btn-label-secondary">Cancel</button>
  </div>
  </form>
</div>