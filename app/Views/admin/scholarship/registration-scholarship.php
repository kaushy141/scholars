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
                <option value="<?php echo $_scholar['id']; ?>"
                    <?php echo $data['scholar_id'] == $_scholar['id'] ? "selected" : "" ?>>
                    <?php echo  ucwords(strtolower($_scholar['name'])); ?></option>
                <?php
					}
				?>
            </select>
        </div>


        <div class="col-md-4">
            <label class="form-label" for="fin_year">Fin Year</label>
            <input type="text" name="fin_year" id="fin_year" maxlength="4" class="form-control" placeholder="Scholarship fin year"
                value="<?= $data['fin_year'] ? $data['fin_year'] : currentFinYear() ?>">
        </div>

    </div>
    <div class="row g-3 my-1">
        <div class="col-md-4">
            <label class="form-label" for="no_of_scholars">Total scholars</label>
            <input type="number" name="no_of_scholars" id="no_of_scholars" min="1" step="1" class="form-control"
                placeholder="Number of scholars"
                value="<?= isset($data['no_of_scholars']) ? $data['no_of_scholars'] : 1 ?>">
        </div>

        <div class="col-md-4">
            <label class="form-label" for="amount_of_scholar">Scholar per Student</label>
            <input type="number" name="amount_of_scholar" id="amount_of_scholar" min="1" step="1" class="form-control"
                placeholder="Amount of scholar"
                value="<?= isset($data['amount_of_scholar']) ? $data['amount_of_scholar'] : 1 ?>">
        </div>

        <div class="col-md-4">
            <label class="form-label" for="total_scholar_amount">Total Scholar amount</label>
            <input type="number" name="total_scholar_amount" id="total_scholar_amount" min="1" step="1"
                class="form-control" placeholder="Total scholar amount"
                value="<?= isset($data['total_scholar_amount']) ? $data['total_scholar_amount'] : 1 ?>">
        </div>


        <div class="col-md-4">
            <label class="form-label" for="cycle">Select Cycles</label>
            <select name="cycle" id="cycle" class="select2 form-select">
                <option value="">-- Select Cycles --</option>
                <?php
				if (!empty($cycles))
					foreach ($cycles as $cycle) {
				?>
                <option value="<?php echo $cycle; ?>" <?php echo $data['cycle'] == $cycle ? "selected" : "" ?>>
                    <?php echo  ucwords(strtolower($cycle)); ?></option>
                <?php
					}
				?>
            </select>
        </div>

        <div class="col-md-4">
            <label class="form-label">Status</label>
            <div class="input-group">
                <div class="form-check form-check-inline mt-2">
                    <input name="status" class="form-check-input" type="radio" value="1" id="status_1"
                        <?= (!isset($data['status']) || $data['status'] == "1") ? "checked" : "" ?>>
                    <label class="form-check-label" for="status_1"> Active </label>
                </div>
                <div class="form-check form-check-inline mt-2">
                    <input name="status" class="form-check-input" type="radio" value="0" id="status_0"
                        <?= $data['status'] == "0" ? "checked" : "" ?>>
                    <label class="form-check-label" for="status_0"> Deactive </label>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <label class="form-label" for="auto_renew">Auto Renewal</label>
            <div class="input-group">
                <div class="form-check form-switch my-2">
                    <label class="form-check-label pull-left" for="auto_renew">Automatically Renew on Every
                        Cycle</label>
                    <input class="form-check-input pull-right" name="auto_renew" value="1" type="checkbox"
                        id="auto_renew" <?= $data['auto_renew'] ? "checked" : "" ?> />
                </div>
            </div>
        </div>
    </div>
    <div class="row g-3 my-1">
        <?php if (!empty($qualifications)) { ?>
        <div class="col-sm-6">
            <label class="form-label" for="state">Required Qualification</label>
            <div class="row">
                <div class="col-sm-12">
                    <?php
						foreach ($qualifications as $q) {
						?>
                    <label
                        class="form-check-label"><?= img(array("src" => base_url() . '/' . $q['image'], "class" => "w-px-20 h-auto rounded-circle")) ?>
                        <?php echo $q['name'] ?></label> &nbsp;
                    <?php
						}
						?>
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="col-sm-12">
            <label class="form-label" for="state">Student Selection Criteria</label>
            <div class="row">
                <div class="col-sm-12">
                    <div class="input-group">
                        <div class="form-check form-check-inline mt-2">
                            <input name="criteria_type" class="form-check-input criteria_type" type="radio"
                                value="Manual" id="criteria_type_manual"
                                <?= (!isset($data['criteria_type']) || $data['criteria_type'] == "Manual") ? "checked" : "" ?>>
                            <label class="form-check-label" for="criteria_type_manual"> Manual </label>
                        </div>
                        <div class="form-check form-check-inline mt-2">
                            <input name="criteria_type" class="form-check-input criteria_type" type="radio"
                                value="Rules" id="criteria_type_rules"
                                <?= $data['criteria_type'] == "Rules" ? "checked" : "" ?>>
                            <label class="form-check-label" for="criteria_type_rules"> Rules based </label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 mt-2 block_criteria_type block_Manual" style="display:<?= (!isset($data['criteria_type']) || $data['criteria_type'] == "Manual") ? "block" : "none" ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <h5 class="card-header">Search Students</h5>
                                <div class="card-body demo-vertical-spacing demo-only-element">
                                    <div class="input-group">
                                        <input type="text" name="student_search" class="form-control"
                                            placeholder="Enter Student by Name, Email, Mobile number"
                                            aria-label="Enter Student by Name, Email, Mobile number">
                                        <button class="btn btn-outline-primary" type="button">Search</button>
                                    </div>
                                    <div class="list-group student_search_list"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-4 overflow-hidden">
                                <h5 class="card-header">Selected Students <span
                                        class="badge bg-primary selected_student_count">0</span>
                                </h5>
                                <div class="card-body demo-vertical-spacing demo-only-element">
                                    <div class="list-group student_selected_list">
                                        <p class="row_empty text-center text-muted">No student selected</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 block_criteria_type block_Rules" style="display:<?= (isset($data['criteria_type']) && $data['criteria_type'] == "Rules") ? "block" : "none" ?>">
					<div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <h5 class="card-header">Add Criteria</h5>
                                <div class="card-body demo-vertical-spacing demo-only-element">
                                    <div class="row">
									<div class="col-md-12">
									<?php 
									if($criteriaList){
										$selectedCriteria = isset($data['scholarship_criteria']) ? array_column($data['scholarship_criteria'], 'criteria_id') : [];
										$selectedCriteriaKey = isset($data['scholarship_criteria']) ? array_combine($selectedCriteria, $data['scholarship_criteria']) : [];
										print_r($selectedCriteriaKey);
										foreach($criteriaList as $_criteria){
										?>
										<div class="row mt-1">
											<div class="col-sm-1"><input class="form-check-input me-1 selected_criteria" name="criteria[<?php echo $_criteria['id']?>]" type="checkbox" value="<?php echo $_criteria['id']?>" <?php echo in_array($_criteria['id'], $selectedCriteria) ? "checked":""?> /></div>
											<div class="col-sm-11 col-md-3"><label>By <?php echo $_criteria['name']?></label></div>
											<div class="col-sm-6 col-md-4">
												<select name="criteria_operator[<?php echo $_criteria['id']?>]" id="citeria_operator_<?php echo $_criteria['id']?>" class="select2 form-select rules-based-input" <?php echo in_array($_criteria['id'], $selectedCriteria) ? "":"disabled"?> />
													<option value="">-- Select Operator --</option>
													<?php
													$opertaorArray = explode(',', $_criteria['comparator']);
													if (!empty($opertaorArray)){
														foreach ($opertaorArray as $_opertaor) {
													?>
													<option value="<?php echo $_opertaor; ?>" <?php echo isset($selectedCriteriaKey[$_criteria['id']]) &&  $selectedCriteriaKey[$_criteria['id']]['operator'] == $_opertaor ? "selected" : ""?>><?php echo  $_opertaor; ?></option>
													<?php
														}
													}
													?>
												</select>
											</div>
											<div class="col-sm-6 col-md-4">
											<?php if(in_array('IN', $opertaorArray)){?>
												<select name="criteria_value[<?php echo $_criteria['id']?>][]" multiple="multiple"  id="citeria_operator_<?php echo $_criteria['id']?>" class="select2 form-select rules-based-input" <?php echo in_array($_criteria['id'], $selectedCriteria) ? "":"disabled"?>>
													<option value="" disabled class="bg-secondary">Select <?php echo $_criteria['name']?></option>
											<?php foreach($_criteria['options'] as $_option){?>
													<option value="<?php echo $_option['value']; ?>" <?php echo isset($selectedCriteriaKey[$_criteria['id']]) && in_array($_option['value'], explode(',', $selectedCriteriaKey[$_criteria['id']]['value'])) ? "selected" : ""?>><?php echo  $_option['value']; ?></option>
												<?php }?>
												</select>
												<?php
											}else{?>
												<input type="number" name="criteria_value[<?php echo $_criteria['id']?>][]" id="citeria_value_<?php echo $_criteria['id']?>" class="form-control rules-based-input" <?php echo in_array($_criteria['id'], $selectedCriteria) ? "":"disabled"?> placeholder="Enter <?php echo $_criteria['name']?> value" value="<?php echo isset($selectedCriteriaKey[$_criteria['id']]) ? $selectedCriteriaKey[$_criteria['id']]['value'] : ""?>" />
											<?php }?>
											</div>
										</div>
									<?php }
									}?>
									</div>
									</div>
                                </div>
                            </div>
                        </div>
					</div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 mt-4">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span><i class="bx bx-wallet me-1"></i>
                        Total scholar amount </span>
                    <span class="text-dark span_total_scholar_amount"></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span><i class="bx bx-tv me-1"></i>
                        Plateform fee</span>
                    <span class="text-dark span_plateform"></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span><i class="bx bx-wallet me-1"></i>
                        Net amount to donate</span>
                    <span class="net_payment_amount text-success display-6"></span>
                </li>

            </ul>


        </div>
    </div>


    <div class="pt-4">
        <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
        <button type="reset" class="btn btn-label-secondary">Cancel</button>
    </div>
    </form>
</div>

<script>
const plateform_fee = <?php echo $plateform_fee; ?>;
const currency = '<?php echo $inr; ?> ';
$(document).ready(function() {
    $("#amount_of_scholar, #no_of_scholars").on('change', function() {
        $("#total_scholar_amount").val($("#no_of_scholars").val() * $("#amount_of_scholar").val());
        calculatePlateformFee($("#amount_of_scholar").val());
    });

    $("#total_scholar_amount, #cycle").on('change', function() {
        $("#amount_of_scholar").val(($("#total_scholar_amount").val() / $("#no_of_scholars").val())
            .toFixed(2));
        calculatePlateformFee($("#amount_of_scholar").val());
    });
    calculatePlateformFee($("#amount_of_scholar").val());

    //=========================================================================================

    $("input[type=radio][name=criteria_type]").on('change', function() {
        $(".block_criteria_type").hide();
        $(".block_" + $(this).val()).show()
    });

    $("input[name=student_search]").on('change', function() {
        if ($(this).val() != "") {
            $.ajax({
                url: '<?php echo base_url('admin/secure/user/search-student/') ?>/' + $(this)
                    .val(),
                beforeSend: function() {},
                success: function(response, status) {
                    if (status == 'success') {
                        $(".student_search_list").html("");
                        var responseObj = jQuery.parseJSON(response);
                        var selectedIds = $(
                                ".student_selected_list .row_user")
                            .map(function() {
                                return $(this).find("input:checkbox:checked").val();
                            }).get();
							if(responseObj['data']['users'].length){
								$.each(responseObj['data']['users'], function(key, item) {
									if (!selectedIds.includes(item['id'])){										
										$(".student_selected_list").find(".row_empty").remove();
										$(".student_search_list").append('<label class="list-group-item row_user" id="row_user_' +
											item['id'] + '"><input class="form-check-input me-1 listed_student" type="checkbox" value="' + item['id'] + '"> <img src="' + base_url + '/' + item[ 'image'] + '" class="w-px-20 h-auto rounded-circle" alt="' + item['fname'] + '" />' + item['fname'] + ' ' + item['mname'] + ' ' + item['lname'] + ' (' + item['email'] + ')</label>');
									}
								});
							}else{
								$(".student_search_list").html('<label class="list-group-item row_user text-muted">No Record Found</label>');
							}
                    }
                }
            })
        } else {
            $(".student_search_list").html("");
        }
    });
	
	$(".selected_criteria").on("change", function(){
		$(this).parent().parent().find(".rules-based-input").attr("disabled", !$(this).is(":checked"));
	})
});

$(document).on("change", ".student_search_list .listed_student", function() {
    $(".student_selected_list").append($(".student_search_list").find("label#row_user_" + $(this).val()));
    $("#no_of_scholars").val($(".student_selected_list .row_user").length);
    $(".selected_student_count").text($("#no_of_scholars").val());
})
$(document).on("change", ".student_selected_list .listed_student", function() {
    $(".student_selected_list").find(".row_empty").remove();
    $("#no_of_scholars").val($(".student_selected_list .row_user").length);
    $(".selected_student_count").text($("#no_of_scholars").val());
    $(".student_selected_list").find("label#row_user_" + $(this).val()).remove();
})

const calculatePlateformFee = (amount) => {
    const plateform_fee_amount = (amount * plateform_fee / 100);
    $(".span_total_scholar_amount").text(currency + parseFloat(amount).toFixed(2));
    $(".span_plateform").text(currency + parseFloat(plateform_fee_amount).toFixed(2));
    $(".net_payment_amount").text($("#cycle").val() + ' ' + currency + (parseFloat(amount) + parseFloat(
        plateform_fee_amount)).toFixed(2));
}
</script>