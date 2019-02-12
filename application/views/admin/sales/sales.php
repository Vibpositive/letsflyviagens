<?php
    $data = $this -> model -> get();
?>
<div class="col-lg-12">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Inserir Valor</h4>
        </div>
        <div class="card-body">
            <div class="form-validation">
                <?php echo form_open_multipart('admin/upload/sales', "class='form-valide'");?>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label" for="image">Imagem
                    </label>
                    <div class="col-lg-10">
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
