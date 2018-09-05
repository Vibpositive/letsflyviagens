<div class="col-lg-12">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Cotacao <?php echo " - " . $quote[0]['username'] ?></h4>
        </div>
        <div class="card-body">
            <div class="form-validation">
            <?php foreach($quote as $q) : ?>
                <?php echo form_open_multipart(base_url() . 'admin/news/update/' . $q['id'] . '/run', "class='form-valide'");?>
                <hr>
                <div class="form-group row">
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <label class="col-lg-12 col-form-label" for="<?php echo "field_" . $q['id']; ?>"><?php echo $q['field_name']; ?></label>
                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12" style="margin-bottom:20px">
                        <input type="text" class="form-control col-lg-12" id="<?php echo "field_" . $q['id']; ?>" name="title" placeholder="Texto" disabled value="<?php echo $q['field_value']; ?>">
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            </form>
            <form class="form-valide" action="<?php echo base_url() . "admin/news/delete/" ?>/run" method="post">
                <div class="col-lg-12 text-center">
                    <!-- <button type="submit" class="btn btn-danger col-lg-12 col-md-12 col-xs-12 col-sm-12" id="delete_button">Deletar</button> -->
                </div>
            </form>
        </div>
    </div>
</div>
