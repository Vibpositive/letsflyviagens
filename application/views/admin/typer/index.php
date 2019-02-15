<?php 
   $data = $this -> model -> get();
   ?>
<div class="col-lg-12">
   <div class="card card-outline-primary">
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
               <div class="col-lg-11">
                  <input type="text" class="form-control" id="<?php echo "field_" . $key['id']; ?>" disabled name="<?php echo "field_" . $key['id']; ?>" placeholder="Texto" value="<?php echo $key['value']; ?>">
               </div>
               <div class="col-lg-1">
                  <a href="typer/edit/<?php echo $key['id']; ?>">
                  <button type="submit" class="btn btn-info">Modificar</button>
                  </a>
               </div>
            </div>
            <?php endforeach; ?>
         </div>
      </div>
   </div>
</div>
