<div class="card mb-4">
  <h5 class="card-header">Scholarship Form</h5>
  <?php echo form_open_multipart('admin/secure/scholarship/save/' . intval($data['id']), ['class' => 'card-body']); ?>
  <div class="row g-3">
  
	<div class="col-md-4">
      <label class="form-label" for="scholar_id">Select Scholar</label>
      <select name="scholar_id" id="scholar_id" class="select2 form-select">
	  <option value="0">-- Select Scholar --</option>
        <?php
        if (!empty($scholars))
          foreach ($scholars as $_scholar) {
        ?>
          <option value="<?php echo $_scholar['id']; ?>" <?php echo $data['scholar_id'] == $_scholar['id'] ? "selected" : "" ?>><?php echo  ucwords(strtolower($_scholar['name'])); ?></option>
        <?php
          }
        ?>
      </select>
    </div>
	  
	<div class="col-md-4">
      <label class="form-label" for="amount">Total Amount</label>
      <input type="number" name="amount" id="amount" min="0" step="1" class="form-control" placeholder="Scholarship amount" value="<?= $data['amount'] ?>">
    </div>

	<div class="col-md-4">
      <label class="form-label" for="year">Year</label>
      <input type="text" name="year" id="year" maxlength="4" class="form-control" placeholder="Scholarship Year" value="<?= $data['year'] ? $data['year'] : date('Y') ?>">
    </div>

	<div class="col-md-4">
      <label class="form-label" for="publish_date">Publish Date</label>
      <input type="date" name="publish_date" id="publish_date" class="form-control" placeholder="dd/mm/yyyy" value="<?= $data['publish_date'] ? date('Y-m-d', strtotime($data['publish_date'])) : date('Y-m-d') ?>" >
    </div>

	<div class="col-md-4">
      <label class="form-label" for="reg_start_date">Registration Start Date</label>
      <input type="date" name="reg_start_date" id="reg_start_date" class="form-control" placeholder="dd/mm/yyyy" value="<?= $data['reg_start_date'] ? date('Y-m-d', strtotime($data['reg_start_date'])) : date('Y-m-d') ?>">
    </div>
	
	<div class="col-md-4">
      <label class="form-label" for="reg_end_date">Registration End Date</label>
      <input type="date" name="reg_end_date" id="reg_end_date" class="form-control" placeholder="dd/mm/yyyy" value="<?= $data['reg_end_date'] ? date('Y-m-d', strtotime($data['reg_end_date']))  : date('Y-m-d')?>">
    </div>
	
	<div class="col-md-4">
      <label class="form-label" for="announce_date">Announce Date</label>
      <input type="date" name="announce_date" id="announce_date" class="form-control" placeholder="dd/mm/yyyy" value="<?= $data['announce_date'] ? date('Y-m-d', strtotime($data['announce_date'])) : date('Y-m-d') ?>">
    </div>
	
	<div class="col-md-4">
      <label class="form-label" for="cycle">Select Cycles</label>
      <select name="cycle" id="cycle" class="select2 form-select">
	  <option value="">-- Select Cycles --</option>
        <?php
        if (!empty($cycles))
          foreach ($cycles as $cycle) {
        ?>
          <option value="<?php echo $cycle; ?>" <?php echo $data['cycle'] == $cycle ? "selected" : "" ?>><?php echo  ucwords(strtolower($cycle)); ?></option>
        <?php
          }
        ?>
      </select>
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
      <label class="form-label" for="auto_renew">Auto Renewal</label>
      <div class="input-group">
        <div class="form-check form-switch my-2">
          <label class="form-check-label pull-left" for="auto_renew">Automatically Renew on Every Cycle</label>
          <input class="form-check-input pull-right" name="auto_renew" value="1" type="checkbox" id="auto_renew" <?= $data['auto_renew'] ? "checked" : "" ?> />
        </div>
      </div>
    </div>
	
	<div class="col-sm-12">
      <label class="form-label" for="state">Required Qualification</label>
      <div class="row">
		  <div class="col-sm-12">
			<?php
			if (!empty($qualifications))
			  foreach ($qualifications as $q) {
			?>
			  <label class="form-check-label"><?= img(array("src"=>base_url().'/'.$q['image'], "class"=>"w-px-20 h-auto rounded-circle"))?> <?php echo $q['name'] ?></label> &nbsp; 
			<?php
			  }
			?>
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