<?php
    $data = $this -> model -> get();
?>
<div class="col-lg-12">
    <div class="card card-outline-primary">
        <div class="card-body">
            <div class="form-validation">
                <?php foreach ($data as $key) : ?>
                <hr>
                <div class="form-group row justify-content-center align-items-center">
                    <div class="col-xl-2" style="margin-bottom:20px">
                        <label class="col-12 col-form-label" for="<?php echo " field_" . $key['id']; ?>">Titulo</label>
                    </div>
                    <div class="col-xl-10">
                        <input type="text" class="col-12 form-control" id="<?php echo " field_" . $key['id']; ?>" disabled name="<?php echo "field_" . $key['id']; ?>" placeholder="Texto" value="<?php echo $key['title']; ?>">
                    </div>
                    <div class="col-xl-2" style="margin-bottom:20px">
                        <label class="col-12 col-form-label" for="<?php echo " field_" . $key['id']; ?>">Texto</label>
                    </div>
                    <div class="col-xl-10">
                        <textarea class="col-12 form-control" disabled rows="5" style="height: 15em;" id="comment"><?php echo $key['body']; ?></textarea>
                    </div>
                    <div class="col-xl-2" style="margin-bottom:20px">
                        <label class="col-12 col-form-label" for="image">Foto</label>
                    </div>
                    <div class="col-md-10" style="padding: 10px 10px 10px 15px;">
								<img src="<?php echo base_url() . 'assets/images/news/' . $key['image']; ?>"
								width="480px"
								name="image"
								class="img-fluid"
                        style="" alt="">
                    </div>
                    <div class="col-lg-12">
                        <a href="<?php echo base_url() . "admin/news/edit/". $key['id']; ?>" style="display: inline-block;">
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
