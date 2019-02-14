<?php 
    $data = $this -> model -> get_by_id($id);
?>
<div class="col-lg-12">
	<div class="card card-outline-primary">
		<div class="card-header">
			<h4 class="m-b-0 text-white">Atualizar Campos</h4>
		</div>
		<div class="card-body">
            
			<form class="form-valide" action="<?php echo $id ?>/run" method="post">
				<div class="form-validation">
					<?php foreach ($data as $key) : ?>
					<div class="form-group row">
						<div class="col-lg-10">
							<input type="text" class="form-control" id="<?php echo " field_ " . $key['id']; ?>" name="value" placeholder="Texto" value="<?php echo $key['value']; ?>">
						</div>
						<div class="col-lg-1">
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