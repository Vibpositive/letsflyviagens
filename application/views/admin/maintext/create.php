<div class="col-lg-12">
   <div class="card card-outline-primary">
      <!-- <div class="card-header">
         <h4 class="m-b-0 text-white">Inserir Valor</h4>
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
            <form class="form-valide" action="<?php echo base_url() . "admin/maintext/create_maintext" ?>" method="post">
               <div class="form-group row">
                  <label class="col-lg-2 col-form-label" for="value">Valor
                  <span class="text-danger">*</span>
                  </label>
                  <div class="col-lg-10">
                     <input type="text" class="form-control" id="value" name="value" placeholder="Texto" value="">
                  </div>
               </div>
               <button type="submit" class="btn btn-info">Enviar</button>
            </form>
         </div>
      </div>
   </div>
</div>
