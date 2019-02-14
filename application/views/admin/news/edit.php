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
				<?php echo form_open_multipart(base_url() . 'admin/news/update/', "class='form-valide'");?>
				<hr>
				<div class="form-group row">
					<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
						<label class="col-lg-12 col-form-label" for="<?php echo "field_" . $id; ?>">Titulo</label>
					</div>
					<div class="col-lg-10 col-md-9 col-sm-8 col-xs-12" style="margin-bottom:20px">
						<input type="text" class="form-control col-lg-12" id="<?php echo "field_" . $id; ?>" name="title" placeholder="Texto" value="<?php echo $title; ?>">
					</div>
					<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
						<label class="col-lg-12 col-form-label" for="<?php echo "field_" . $id; ?>">Texto</label>
					</div>
					<div class="col-lg-10 col-md-9 col-sm-8 col-xs-12" style="margin-bottom:20px">
						<textarea class="form-control col-lg-12" rows="5" style="height: 15em;" name="body" id="comment"><?php echo $body; ?></textarea>
					</div>
					<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
						<label class="col-lg-12 col-form-label" >Foto</label>
					</div>
					<div class="col-lg-10 col-md-9 col-sm-8 col-xs-12" style="margin-bottom:20px">
						<img src="<?php echo base_url() . 'assets/images/news/' . $image; ?>" class="circle-image img-fluid">
					</div>
					<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
						<label class="col-lg-12 col-form-label" for="image">Nova Foto</label>
					</div>
					<div class="col-lg-10 col-md-9 col-sm-8 col-xs-12" style="margin-bottom:20px">
						<!-- <input type="file" size="20" class="form-control" id="image" name="image" placeholder="Texto" value="" /> -->
						<input type="file" size="20" class="form-control" id="image" name="image" placeholder="Imagem" value="" accept=".gif,.png, .jpg"  />
						<input type="hidden" name="id" value="<?php echo $id; ?>" />
						<!-- <input type="hidden" name="id" value="$id" /> -->
					</div>
					<div class="col-lg-12 text-center">
						<button type="submit" class="btn btn-info col-lg-12 col-md-12 col-xs-12 col-sm-12">Atualizar</button>
					</div>
				</div>
			</div>
			</form>
			<form class="form-valide" action="<?php echo base_url() . "admin/news/delete/" . $id ?>/run" method="post">
				<div class="col-lg-12 text-center">
					<button type="submit" class="btn btn-danger col-lg-12 col-md-12 col-xs-12 col-sm-12" id="delete_button">Deletar</button>
				</div>
			</form>
		</div>
	</div>
</div>
