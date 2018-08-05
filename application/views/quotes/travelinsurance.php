<?php if ($home == "") : ?>
    <!-- <section class="banner1"> -->
    <div id="travelInsuranceForm">
<?php else : ?>
    <div class="collapse" id="travelInsuranceForm">
<?php endif; ?>
    <div class="card-body quote-background" style="background: url(<?php echo base_url(); ?>assets/images/quote-travelinsurance.jpg);">
        <div class="container py-4 mt-2">
            <h2 class="tittle text-center mb-3 title-quote">Seguro Viagem</h2>
            <div class="contact_grid_right mt-5">
                <!-- <h6>Please fill this form to contact with us.</h6> -->
                <a class="blog-btn add-passenger" role="button" formType="tif">Adicionar segurado</a>
                <form class="quote-form" action="server/contact.php" method="post">
                    <div class="contact_left_grid contact-tickets">

                        <label for="tif_name_1">Nome</label>
                        <input type="text" id="tif_name_1" name="tif_name_1" placeholder="Nome" required="">

                        <label for="tif_surname_1" class="label-surname">Sobrenome</label>
                        <input type="text" id="tif_surname_1" name="tif_surname_1" placeholder="Sobrenome" required="">

                        <label for="tif_dob_1">Data de Nascimento</label>
                        <input type="text" id="tif_dob_1" name="tif_dob_1" placeholder="Data de Nascimento" class="form-control datePicker" required="">

                        <label for="tif_email">E-mail</label>
                        <input type="email" id="tif_email" name="tif_email" placeholder="Email" required="">

                        <label for="tif_phone">Telefone</label>
                        <input type="tel" id="tif_phone" name="tif_phone" placeholder="+55(XX)XXXX-XXXX" required="">

                        <label for="tif_destinationCity" id="destinationCity">Destino</label>
                        <input type="text" id="tif_destinationCity" name="tif_destinationCity" placeholder="Cidade de Destino" class="form-control" required="">

                        <label for="tif_departureDate">Partida</label>
                        <input type="text" id="tif_departureDate" name="tif_departureDate" placeholder="Data de Embarque" class="form-control datePicker" required="">

                        <label for="tif_returnDarte">Retorno</label>
                        <input type="text" id="tif_returnDarte" name="tif_returnDarte" placeholder="Data de Retorno" class="form-control datePicker">

                        <label for="tif_message">Mensagem</label>
                        <textarea id="tif_message" name="tif_message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Informações adicionais?</textarea>

                        <select style="margin-top: -10px; margin-bottom: 20px;" name="know">
                            <option value="" disabled selected>Como nos conheceu?</option>
                            <option value="Google">Google</option>
                            <option value="Panrotas">Panrotas</option>
                            <option value="Revistas">Revistas</option>
                            <option value="Facebook">Facebook</option>
                            <option value="Instagram">Instagram</option>
                            <option value="Outros">Outros</option>
                        </select>
                        <input type="submit" value="Enviar">
                        <input type="reset" value="Limpar">
                        <div class="clearfix"> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>