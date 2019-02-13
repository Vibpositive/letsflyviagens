<?php 
    $data = $this -> model -> get(false);
    ?>
<div class="col-lg-12">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Atualizar Campos</h4>
        </div>
        <div class="card-body">
            <div class="form-validation">
                <?php foreach ($data as $key) : ?>
                <div class="form-group row">
                    <div class="col-lg-11">
                        <input type="text" class="form-control" id="<?php echo "field_" . $key['id']; ?>" disabled name="<?php echo "field_" . $key['id']; ?>" placeholder="Texto" value="<?php echo $key['value']; ?>">
                    </div>
                    <div class="col-lg-1">
                        <a href="maintext/update/<?php echo $key['id']; ?>">
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
        <div class="card-body">
            <div class="form-validation">
                <form class="form-valide" action="maintext/create/run" method="post">
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