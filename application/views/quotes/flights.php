<?php if ($home == "") : ?>
    <!-- <section class="banner1"> -->
    <div id="ticketsForm">
<?php else : ?>
    <div class="collapse" id="ticketsForm">
<?php endif; ?>
    <div class="card-body quote-background" style="background: url(<?php echo base_url(); ?>assets/images/quote-tickets.jpg);">
        <div class="container py-4 mt-2">
            <h2 class="tittle text-center mb-3 title-quote">Passagens Aéreas</h2>
            <div class="contact_grid_right mt-5">
                <!-- <h6>Please fill this form to contact with us.</h6> -->
                <a class="blog-btn add-passenger" role="button" formType="tf">Adicionar passageiro</a>
                <form class="quote-form" action="<?php echo base_url() . "quotes/flightquote" ?>" method="post">
                    <div class="contact_left_grid contact-tickets">

                    

                        <label for="tf_name_1">Nome</label>
                        <input type="text" id="tf_name_1" name="tf_name_1" placeholder="Nome" required="">

                        <label for="tf_surname_1" class="label-surname">Sobrenome</label>
                        <input type="text" id="tf_surname_1" name="tf_surname_1" placeholder="Sobrenome" required="">

                        <label for="tf_dob_1">Data de Nascimento</label>
                        <input type="text" id="tf_dob_1" name="tf_dob_1" placeholder="Data de Nascimento" class="form-control datePicker" required="">

                        <label for="tf_email">E-mail</label>
                        <input type="email" id="tf_email" name="tf_email" placeholder="Email" required="">

                        <label for="tf_phone">Telefone</label>
                        <input type="tel" id="tf_phone" name="tf_phone" placeholder="+55(XX)XXXX-XXXX" required="">

                        <label for="tf_departureCity">Cidade</label>
                        <input type="text" id="tf_departureCity" name="tf_departureCity" placeholder="Cidade de Saida" class="form-control" required="">

                        <label for="tf_destinationCity" id="destinationCity">Destino</label>
                        <input type="text" id="tf_destinationCity" name="tf_destinationCity" placeholder="Cidade de Destino" class="form-control" required="">

                        <label for="tf_departureDate">Data de Embarque</label>
                        <input type="text" id="tf_departureDate" name="tf_departureDate" placeholder="Data de Embarque" class="form-control datePicker" required="">

                        <label for="tf_returnDarte">Data de Retorno</label>
                        <input type="text" id="tf_returnDarte" name="tf_returnDarte" placeholder="Data de Retorno" class="form-control datePicker">

                        <label for="tf_message">Mensagem</label>
                        <textarea id="tf_message" name="tf_message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Informações adicionais?</textarea>

                        <select style="margin-top: -10px; margin-bottom: 20px;" name="tf_know">
                            <option value="" disabled selected>Como nos conheceu?</option>
                            <option value="Google">Google</option>
                            <option value="Panrotas">Panrotas</option>
                            <option value="Revistas">Revistas</option>
                            <option value="Facebook">Facebook</option>
                            <option value="Instagram">Instagram</option>
                            <option value="Outros">Outros</option>
                        </select>
                        <input type="submit" value="Enviar">
                        <input type="reset" formType="tf" value="Limpar">
                        <div class="clearfix"> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>