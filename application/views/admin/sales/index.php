<?php 
    $data = $this -> model -> get(false);
?>
<div class="col-lg-12">
    <!-- <div class="card card-outline-primary">
        <div class="card-header">
            <!-- <h4 class="m-b-0 text-white">Atualizar Campos</h4> -->
        </div> -->
        <div class="card-body">
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
			
            <div class="form-validation">
                <?php foreach ($data as $key) : ?>
                <div class="form-group row">
                    <div>
                        <img src="<?php echo base_url(); ?>assets/images/sales/<?php echo $key['image']; ?>" class="" width="300" alt="">
						<div style="margin: auto;display: table; padding: 10px;">
							<a href="<?php echo base_url(); ?>admin/sales/update/<?php echo $key['id']; ?>">
								<button type="submit" class="btn btn-info">Modificar</button>
							</a>
						</div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
