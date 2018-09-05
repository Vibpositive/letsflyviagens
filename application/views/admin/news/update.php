<?php
    $data = $this -> model -> get_by_id($id)[0];

?>
<div class="col-lg-12">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Atualizar Campos</h4>
        </div>
        <div class="card-body">
            <div class="form-validation">
                <?php echo form_open_multipart(base_url() . 'admin/news/update/' . $data['id'] . '/run', "class='form-valide'");?>
                <hr>
                <div class="form-group row">
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <label class="col-lg-12 col-form-label" for="<?php echo "field_" . $data['id']; ?>">Titulo</label>
                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12" style="margin-bottom:20px">
                        <input type="text" class="form-control col-lg-12" id="<?php echo "field_" . $data['id']; ?>" name="title" placeholder="Texto" value="<?php echo $data['title']; ?>">
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <label class="col-lg-12 col-form-label" for="<?php echo "field_" . $data['id']; ?>">Texto</label>
                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12" style="margin-bottom:20px">
                        <textarea class="form-control col-lg-12" rows="5" style="height: 15em;" name="body" id="comment"><?php echo $data['body']; ?></textarea>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <label class="col-lg-12 col-form-label" >Foto</label>
                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12" style="margin-bottom:20px">
                        <img src="<?php echo base_url() . 'assets/images/news/' . $data['image']; ?>" class="circle-image img-fluid">
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <label class="col-lg-12 col-form-label" for="image">Nova Foto</label>
                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12" style="margin-bottom:20px">
                        <input type="file" size="20" class="form-control" id="image" name="image" placeholder="Texto" value="" />
                        <input type="hidden" name="callback" value="news" />
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
