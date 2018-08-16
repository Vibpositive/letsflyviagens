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
                <a class="blog-btn add-passenger" role="button" formType="ti">Adicionar segurado</a>
                <form class="quote-form" action="<?php echo base_url() . "quotes/travelinsurancequote" ?>" method="post"
                    <div class="contact_left_grid contact-tickets">

                        <label for="ti_name_1">Nome</label>
                        <input type="text" id="ti_name_1" name="ti_name_1" placeholder="Nome" required="">

                        <label for="ti_surname_1" class="label-surname">Sobrenome</label>
                        <input type="text" id="ti_surname_1" name="ti_surname_1" placeholder="Sobrenome" required="">

                        <label for="ti_dob_1">Data de Nascimento</label>
                        <input type="text" id="ti_dob_1" name="ti_dob_1" placeholder="Data de Nascimento" class="form-control datePicker" required="">

                        <label for="ti_email">E-mail</label>
                        <input type="email" id="ti_email" name="ti_email" placeholder="Email" required="">

                        <label for="ti_phone">Telefone</label>
                        <input type="tel" id="ti_phone" name="ti_phone" placeholder="+55(XX)XXXX-XXXX" required="">

                        <label for="ti_destinationCity" id="destinationCity">Destino</label>
                        <input type="text" id="ti_destinationCity" name="ti_destinationCity" placeholder="Cidade de Destino" class="form-control" required="">

                        <label for="ti_departureDate">Partida</label>
                        <input type="text" id="ti_departureDate" name="ti_departureDate" placeholder="Data de Embarque" class="form-control datePicker" required="">

                        <label for="ti_returnDarte">Retorno</label>
                        <input type="text" id="ti_returnDarte" name="ti_returnDarte" placeholder="Data de Retorno" class="form-control datePicker">

                        <label for="ti_message">Mensagem</label>
                        <textarea id="ti_message" name="ti_message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Informações adicionais?</textarea>

                        <select style="margin-top: -10px; margin-bottom: 20px;" name="ti_know">
                            <option value="" disabled selected>Como nos conheceu?</option>
                            <option value="Google">Google</option>
                            <option value="Panrotas">Panrotas</option>
                            <option value="Revistas">Revistas</option>
                            <option value="Facebook">Facebook</option>
                            <option value="Instagram">Instagram</option>
                            <option value="Outros">Outros</option>
                        </select>
                        <input type="submit" value="Enviar">
                        <input type="reset" formType="ti" value="Limpar">
                        <div class="clearfix"> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>