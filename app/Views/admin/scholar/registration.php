<?php //print_r($data);
?>
<div class="card mb-4">
  <h5 class="card-header">Scholar Master Form</h5>
  <?php echo form_open_multipart('admin/secure/master/savescholar/' . intval($data['scholar_id']), ['class' => 'card-body']); ?>
  <div class="row g-3">    
	<div class="col-md-12">
      <label class="form-label" for="mname">Name</label>
      <input type="text" name="scholar_name" id="scholar_name" maxlength="250" class="form-control" placeholder="Full Scholarship Name" value="<?= $data['scholar_name'] ?>">
    </div>   
	
	
	<div class="col-md-4">
    <label class="form-label">Status</label>
	<div class="input-group">
	<div class="form-check form-check-inline mt-2">
		<input name="scholar_status" class="form-check-input" type="radio" value="1" id="scholar_status_1" <?= $data['scholar_status'] == "1" ? "checked":"" ?>>
		<label class="form-check-label" for="scholar_status_1"> Active </label>
	  </div>
	  <div class="form-check form-check-inline mt-2">
		<input name="scholar_status" class="form-check-input" type="radio" value="0" id="scholar_status_0" <?= $data['scholar_status'] == "0" ? "checked":"" ?>>
		<label class="form-check-label" for="scholar_status_0"> Deactive </label>
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
  </div>
  
 
  <div class="pt-4">
    <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
    <button type="reset" class="btn btn-label-secondary">Cancel</button>
  </div>
  </form>
</div>