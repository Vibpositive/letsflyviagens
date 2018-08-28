<?php
    $data = $this -> model -> get();
?>
<div class="col-lg-12">
	<div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Atualizar Campos</h4>
        </div>
		<div class="card-body">
			<div class="form-validation">
                    <?php foreach ($data as $key) : ?>
                    <hr>
                        <div class="form-group row">
                            <div class="col-lg-8">
                                <label class="col-lg-12 col-form-label" for="<?php echo "field_" . $key['id']; ?>">Titulo</label>
                                <input  type="text" class="form-control col-lg-12" id="<?php echo "field_" . $key['id']; ?>" disabled name="<?php echo "field_" . $key['id']; ?>" placeholder="Texto" value="<?php echo $key['title']; ?>">
                                <label class="col-lg-12 col-form-label" for="<?php echo "field_" . $key['id']; ?>">Texto</label>
                                <textarea class="form-control col-lg-12" disabled rows="5" style="height: 15em;" id="comment"><?php echo $key['body']; ?></textarea>
                            </div>
                            <div class="col-lg-2">
                                <img src="<?php echo base_url() . 'assets/images/news/' . $key['image']; ?>"  height="120" class="img-responsive align-middle" style="" alt="">
                            </div>
                            <div class="col-lg-2">
                                <a href="<?php echo base_url() . "admin/news/update/". $key['id']; ?>">
                                <button type="submit" class="btn btn-info">Modificar</button>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
			</div>

		</div>
	</div>
</div>
<div class="col-lg-12">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Inserir Valor</h4>
        </div>
		<div class="card-body"><div class="form-validation">
            <!-- <form class="form-valide" action="news/create/run" method="post"> -->
            <?php echo form_open_multipart('admin/upload', "class='form-valide'");?>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label" for="title">Titulo
                            </label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="title" name="title" placeholder="Texto" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label" for="body">Texto
                            </label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="body" name="body" placeholder="Texto" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                             <label class="col-lg-2 col-form-label" for="image">Imagem
                            </label>
                            <div class="col-lg-10">
                                <!-- <input type="text" class="form-control" id="image" name="image" placeholder="Texto" value=""> -->
                                <input type="file" size="20" class="form-control" id="image" name="image" placeholder="Texto" value="" />
                                <input type="hidden" name="callback" value="news" />
                            </div>
                        </div>

                    <button type="submit" class="btn btn-info">Enviar</button>
				</form>
			</div>
        </div>
    </div>
</div>