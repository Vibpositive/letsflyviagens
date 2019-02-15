<div class="col-lg-12">
    <div class="card card-outline-primary">
        <div class="card-body">
            <div class="form-validation">
			<?php if($this->session->flashdata('success')) : ?>
				<div class="alert alert-info" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
			<?php endif; ?>
			<?php if($this->session->flashdata('error')) : ?>
				<div class="alert alert-danger" role="alert">
					<?php echo $this->session->flashdata('error')['error']; ?>
				</div>
			<?php endif; ?>
            <?php foreach($quote as $q) : ?>
                <div class="form-group row" style="max-height: 5em;">
                    <div class="col-lg-2">
                        <label class="col-lg-12 col-form-label" for="<?php echo "field_" . $q['id']; ?>"><?php echo $q['field_name']; ?></label>
                    </div>
                    <div class="col-lg-10" style="margin-bottom:20px">
                        <input type="text" class="form-control col-lg-12" id="<?php echo "field_" . $q['id']; ?>" name="title" placeholder="Texto" disabled value="<?php echo $q['field_value']; ?>">
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
