<?php if ($home == "") : ?>
    <!-- <section class="banner1"> -->
    <div id="travelInsuranceForm">
<?php else : ?>
    <div class="collapse" id="travelInsuranceForm">
<?php endif; ?>
    <div class="card-body quote-background" style="background: url(<?php echo base_url(); ?>assets/images/quote-travelpackage.jpg);">
        <div class="container py-4 mt-2">
            <h2 class="tittle text-center mb-3 title-quote">Pacote de Viagem</h2>
            <div class="contact_grid_right mt-5">
                <!-- <h6>Please fill this form to contact with us.</h6> -->
                <a class="blog-btn add-passenger" role="button" formType="tp">Adicionar Passageiro</a>
                <form class="quote-form" action="<?php echo base_url() . "quotes/travelpackagequote" ?>" method="post">
                    <div class="contact_left_grid contact-tickets">

                        <label for="tp_name_1">Nome</label>
                        <input type="text" id="tp_name_1" name="tp_name_1" placeholder="Nome" required="">

                        <label for="tp_surname_1" class="label-surname">Sobrenome</label>
                        <input type="text" id="tp_surname_1" name="tp_surname_1" placeholder="Sobrenome" required="">

                        <label for="tp_dob_1">Data de Nascimento</label>
                        <input type="text" id="tp_dob_1" name="tp_dob_1" placeholder="Data de Nascimento" class="form-control datePicker" required="">

                        <label for="tp_email">E-mail</label>
                        <input type="email" id="tp_email" name="tp_email" placeholder="Email" required="">

                        <label for="tp_phone">Telefone</label>
                        <input type="tel" id="tp_phone" name="tp_phone" placeholder="+55(XX)XXXX-XXXX" required="">

                        <label for="tp_destinationCity" id="destinationCity">Destino</label>
                        <input type="text" id="tp_destinationCity" name="tp_destinationCity" placeholder="Cidade de Destino" class="form-control" required="">

                        <label for="tp_departureDate">Partida</label>
                        <input type="text" id="tp_departureDate" name="tp_departureDate" placeholder="Data de Embarque" class="form-control datePicker" required="">

                        <label for="tp_returnDarte">Retorno</label>
                        <input type="text" id="tp_returnDarte" name="tp_returnDarte" placeholder="Data de Retorno" class="form-control datePicker">

                        <label for="tp_message">Mensagem</label>
                        <textarea id="tp_message" name="tp_message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Informações adicionais?</textarea>

                        <div class="form-check form-check-inline" style="padding-bottom: 25px;">
                        <!-- <div class="form-check" style="padding-bottom: 25px;"> -->
                            <input class="form-check-input" type="checkbox" name="tp_travelinsurance" id="travelinsurance_cb" value="travelinsurance">
                            <label class="form-check-label" for="inlineCheckbox1" style="margin:0px;">Seguro Viagem</label>
                        </div>
                        <div class="form-check form-check-inline" style="padding-bottom: 20px;">
                        <!-- <div class="form-check" style="padding-bottom: 25px;"> -->
                            <input class="form-check-input" type="checkbox" name="tp_carrental" id="carrental_cb" value="carrental">
                            <label class="form-check-label" for="inlineCheckbox2" style="margin:0px;">Locacao de Carro</label>
                        </div>
                        <div class="form-check form-check-inline" style="padding-bottom: 20px;">
                        <!-- <div class="form-check" style="padding-bottom: 25px;"> -->
                            <input class="form-check-input" type="checkbox" name="tp_transfer" id="tranfer_cb" value="tranfer">
                            <label class="form-check-label" for="inlineCheckbox3" style="margin:0px;">Transfer</label>
                        </div>
                        
                        <select style="margin-top: -10px; margin-bottom: 20px;" name="tp_know">
                            <option value="" disabled selected>Como nos conheceu?</option>
                            <option value="Google">Google</option>
                            <option value="Panrotas">Panrotas</option>
                            <option value="Revistas">Revistas</option>
                            <option value="Facebook">Facebook</option>
                            <option value="Instagram">Instagram</option>
                            <option value="Outros">Outros</option>
                        </select>
                        <input type="submit" value="Enviar">
                        <input type="reset" formType="tp" value="Limpar">
                        <div class="clearfix"> </div>
                    </div>
                </form>
                <div class="alert alert-success" role="alert" id="success-alert">
                    Mensagem enviada com sucesso
                </div>
            </div>
        </div>
    </div>
</div>