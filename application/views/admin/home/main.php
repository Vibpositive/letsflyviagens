<div class="col-lg-12">
	<div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Atualizar Campos</h4>
        </div>
		<div class="card-body">
			<div class="form-validation">
               <form class="form-valide" action="crud/update" method="post">
                    <?php foreach ($section_1 as $key) : ?>
                        
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="<?php echo $key['name']; ?>"><?php echo addslashes ($key['name']); ?>
                                <!-- <span class="text-danger">*</span> -->
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="<?php echo $key['name']; ?>" name="<?php echo $key['name']; ?>" placeholder="Texto" value="<?php echo addslashes ($key['value']); ?>">
                            </div>
                            <div class="col-lg-1">
                                <div class="checkbox checkbox-success">
                                    <?php if ($key['enabled'] === "1") : ?>
                                        <input id="checkbox1" type="checkbox" name="<?php echo $key['name']; ?>_enabled" checked>
                                    <?php else: ?>
                                        <input id="checkbox1" type="checkbox" name="<?php echo $key['name']; ?>_enabled">
                                    <?php endif; ?>
                                    <label for="checkbox1" checked>Habilitado</label>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <button type="submit" class="btn btn-info">Enviar</button>
				</form>
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
               <form class="form-valide" action="crud/create" method="post">
                        
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="name">Nome
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nome do campo" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="value">Valor
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="value" name="value" placeholder="Texto" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="value">Habilitado
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="enabled" name="enabled" placeholder="Texto" value="nabled">
                            </div>
                        </div>
                    <button type="submit" class="btn btn-info">Enviar</button>
				</form>
			</div>
        </div>
    </div>
</div>