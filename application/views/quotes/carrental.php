<?php if ($home == "") : ?>
    <!-- <section class="banner1"> -->
    <div id="ticketsForm">
<?php else : ?>
    <div class="collapse" id="ticketsForm">
<?php endif; ?>
    <div class="card-body quote-background" style="background: url(<?php echo base_url(); ?>assets/images/quote_carrental.jpg);">
        <div class="container py-4 mt-2">
            <h2 class="tittle text-center mb-3 title-quote">Aluguel de Carro</h2>
            <div class="contact_grid_right mt-5">
                <form class="quote-form" action="<?php echo base_url() . "quotes/carrentalquote" ?>" method="post">
                    <div class="contact_left_grid contact-tickets">
                    <!-- TODO: implement https://tempusdominus.github.io/bootstrap-4/Usage/ -->

                        <label for="cr_name_1">Nome do Condutor</label>
                        <input type="text" id="cr_name_1" name="cr_name_1" placeholder="Nome do Condutor" required="">

                        <label for="cr_dob_1">Data de Nascimento</label>
                        <input type="text" id="cr_dob_1" name="cr_dob_1" placeholder="Data de Nascimento" class="form-control datePicker" required="">

                        <label for="cr_email">E-mail</label>
                        <input type="email" id="cr_email" name="cr_email" placeholder="Email" required="">

                        <label for="cr_phone">Telefone</label>
                        <input type="tel" id="cr_phone" name="cr_phone" placeholder="+55(XX)XXXX-XXXX" required="">

                        <label for="cr_departureCity">Cidade de Retirada</label>
                        <input type="text" id="cr_departureCity" name="cr_departureCity" placeholder="Cidade de Saida" class="form-control" required="">

                        <label for="cr_departureDate">Data de Retirada</label>
                        <input type="text" id="cr_departureDate" name="cr_departureDate" placeholder="Data de Retirada" class="form-control datePicker" required="">

                        <label for="cr_pickUp">Horário de Retirada</label>
                        <input type="text" id="cr_pickUp" name="cr_pickUp" placeholder="Data de Retirada" class="form-control" required="">

                        <label for="cr_destinationCity" id="destinationCity">Cidade de Devolução</label>
                        <input type="text" id="cr_destinationCity" name="cr_destinationCity" placeholder="Cidade de Devolução" class="form-control" required="">

                        <label for="cr_returnDarte">Data de Devolução</label>
                        <input type="text" id="cr_returnDarte" name="cr_returnDarte" placeholder="Data de Devolução" class="form-control datePicker">

                        <label for="cr_returnTime">Horário de Devolução</label>
                        <input type="text" id="cr_returnTime" name="cr_returnTime" placeholder="Horário de Devolução" class="form-control" required="">

                        <label for="cr_message">Mensagem</label>
                        <textarea id="cr_message" name="cr_message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Informações adicionais?</textarea>

                        <select style="margin-top: -10px; margin-bottom: 20px;" name="cr_know">
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