<?php
    $data = $this -> model -> get();
?>
<div class="col-lg-12">
    <div class="card card-outline-primary">
        <?php 
            $error = $this->session->flashdata('error')['error'];
            $success = $this->session->flashdata('success');
        ?>
        <?php if ($error) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error ?>
        </div>
        <?php endif; ?>
        <?php if ($success) : ?>
        <div class="alert alert-success" style="color:#000 !important;" role="alert">
            <?php echo $success ?>
        </div>
        <?php endif; ?>
        <div class="card-header">
            <h4 class="m-b-0 text-white">Atualizar Campos</h4>
        </div>
        <div class="card-body">
            <div class="form-validation">
                <?php foreach ($data as $key) : ?>
                <hr>
                <div class="form-group row justify-content-center align-items-center">
                    <div class="col-lg-1" style="margin-bottom:20px">
                        <label class="col-lg-12 col-form-label" for="<?php echo " field_" . $key['id']; ?>">Titulo</label>
                    </div>
                    <div class="col-lg-11">
                        <input type="text" class="form-control col-lg-12" id="<?php echo " field_" . $key['id']; ?>" disabled name="<?php echo "field_" . $key['id']; ?>" placeholder="Texto" value="<?php echo $key['title']; ?>">
                    </div>
                    <div class="col-lg-1" style="margin-bottom:20px">
                        <label class="col-lg-12 col-form-label" for="<?php echo " field_" . $key['id']; ?>">Texto</label>
                    </div>
                    <div class="col-lg-11">
                        <textarea class="form-control col-lg-12" disabled rows="5" style="height: 15em;" id="comment"><?php echo $key['body']; ?></textarea>
                    </div>
                    <div class="col-lg-1" style="margin-bottom:20px">
                        <label class="col-lg-12 col-form-label" for="image">Foto</label>
                    </div>
                    <div class="col-lg-10" style="">
                        <img src="<?php echo base_url() . 'assets/images/news/' . $key['image']; ?>" name="image" class="circle-image img-fluid"
                        style="" alt="">
                    </div>
                    <div class="col-lg-12">
                        <a href="<?php echo base_url() . " admin/news/update/". $key['id']; ?>" style="display: inline-block;">
                            <button type="submit" class="btn btn-info   ">Modificar</button>
                        </a>
                        <?php echo form_open(base_url() . "admin/news/delete/" . $key['id'] . "/run", array("class" => 'form-valide', 'style' => "display: inline-block;")); ?>
                        <button type="submit" class="btn btn-danger" id="delete_button">Deletar</button>
                        </form>
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
        <div class="card-body">
            <div class="form-validation">
                <!-- <form action="news/create/run" method="post"> -->
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
