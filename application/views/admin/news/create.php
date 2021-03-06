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
            <?php echo form_open_multipart('admin/news/upload', "class='form-valide'");?>
					<div class="form-group row">
						<label class="col-lg-2 col-form-label" for="title">Titulo
						</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="title" name="title" placeholder="Titulo" value="">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-2 col-form-label" for="body">Texto
						</label>
						<div class="col-lg-10">
							<textarea class="form-control" rows="5" style="height: 15em;" id="body" name="body" placeholder="Texto"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-2 col-form-label" for="image">Imagem
						</label>
						<div class="col-lg-10">
							<!-- <input type="file" size="20" class="form-control" id="image" name="image" placeholder="Texto" value="" /> -->
							<input type="file" size="20" class="form-control" id="image" name="image" placeholder="Imagem" value="" accept=".gif,.png, .jpg"  />
						</div>
					</div>
					<button type="submit" class="btn btn-info">Enviar</button>
                </form>
         </div>
      </div>
   </div>
</div>
