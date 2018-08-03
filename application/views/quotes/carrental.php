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
                <form class="quote-form" action="server/contact.php" method="post">
                    <div class="contact_left_grid contact-tickets">
                    <!-- todo implement https://tempusdominus.github.io/bootstrap-4/Usage/ -->

                        <label for="crf_name_1">Nome</label>
                        <input type="text" id="crf_name_1" name="crf_name_1" placeholder="Nome" required="">

                        <label for="crf_surname_1" class="label-surname">Sobrenome</label>
                        <input type="text" id="crf_surname_1" name="crf_surname_1" placeholder="Sobrenome" required="">

                        <label for="crf_dob_1">Data de Nascimento</label>
                        <input type="text" id="crf_dob_1" name="crf_dob_1" placeholder="Data de Nascimento" class="form-control datePicker" required="">

                        <label for="crf_email">E-mail</label>
                        <input type="email" id="crf_email" name="crf_email" placeholder="Email" required="">

                        <label for="crf_phone">Telefone</label>
                        <input type="tel" id="crf_phone" name="crf_phone" placeholder="+55(XX)XXXX-XXXX" required="">

                        <label for="crf_departureCity">Cidade de Retirada</label>
                        <input type="text" id="crf_departureCity" name="crf_departureCity" placeholder="Cidade de Saida" class="form-control" required="">

                        <label for="crf_departureDate">Data de Retirada</label>
                        <input type="text" id="crf_departureDate" name="crf_departureDate" placeholder="Data de Retirada" class="form-control datePicker" required="">

                        <label for="crf_pickUp">Horário de Retirada</label>
                        <input type="text" id="crf_pickUp" name="crf_pickUp" placeholder="Data de Retirada" class="form-control" required="">

                        <label for="crf_destinationCity" id="destinationCity">Cidade de Devolução</label>
                        <input type="text" id="crf_destinationCity" name="crf_destinationCity" placeholder="Cidade de Devolução" class="form-control" required="">

                        <label for="crf_returnDarte">Data de Devolução</label>
                        <input type="text" id="crf_returnDarte" name="crf_returnDarte" placeholder="Data de Devolução" class="form-control datePicker">

                        <label for="crf_returnTime">Horário de Devolução</label>
                        <input type="text" id="crf_returnTime" name="crf_returnTime" placeholder="Horário de Devolução" class="form-control" required="">

                        <label for="crf_message">Mensagem</label>
                        <textarea id="crf_message" name="crf_message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Informações adicionais?</textarea>

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