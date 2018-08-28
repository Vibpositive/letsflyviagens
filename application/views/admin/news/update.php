<?php
    $data = $this -> model -> get_by_id($id);
?>
<div class="col-lg-12">
	<div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Atualizar Campos</h4>
        </div>
		<div class="card-body">
        <?php echo form_open_multipart(base_url() . 'admin/news/update', "class='form-valide'");?>
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
                                <input type="file" size="20" class="form-control" id="image" name="image" placeholder="Texto" value="" />
                                <input type="hidden" name="callback" value="news" />
                            </div>
                            <div class="col-lg-2">
                                <button type="submit" class="btn btn-info">Atualizar</button>
                            </div>
                        </div>
                    <?php endforeach; ?>
			</div>
        </form>
        <form class="form-valide" action="../delete/<?php echo $id ?>/run" method="post">
                <div class="col-lg-12">
                        <button type="submit" class="btn btn-danger">Deletar</button>
                </div>
            </form>
		</div>
	</div>
</div>