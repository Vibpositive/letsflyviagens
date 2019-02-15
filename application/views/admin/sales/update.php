<div class="col-lg-12">
   <div class="card card-outline-primary">
      <div class="card-body">
         <div class="form-validation">
            <div class="row">
               <div style="margin: auto;">
                  <img src="<?php echo base_url(); ?>assets/images/caroussel/<?php echo $image; ?>" class="" width="580" alt="">
               </div>
			</div>
			
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


            <?php echo form_open_multipart('admin/sales/upload/', "class='form-valide row'");?>
				<div class="col-lg-12" style="padding:0px; padding-top: 10px;">
				<input type="file" size="20" class="form-control" id="image" name="image" placeholder="Imagem" value="" accept=".gif,.png, .jpg"  />
				<!-- TODO: add id to session instead of form -->
				<input type="hidden" name="id" value="<?php echo $id; ?>" />
			</div>
			<div style="padding-top: 10px; margin: auto;">
					<button type="submit" class="btn btn-info">Atualizar</button>
				</div>
			</form>
			<?php echo form_open('admin/sales/delete', "class='form-valide row'");?>
				<input type="hidden" name="id" value="<?php echo $id; ?>" />
				<!-- TODO: add id to session instead of form -->
				<button type="submit" class="btn btn-danger" id="delete_button">Deletar</button>
			</form>
         </div>
      </div>
   </div>
</div>
