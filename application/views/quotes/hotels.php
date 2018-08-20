<?php if ($home == "") : ?>
    <!-- <section class="banner1"> -->
    <div id="hotelsForm">
<?php else : ?>
    <div class="collapse" id="hotelsForm">
<?php endif; ?>
        <div class="card-body quote-background" style="background: url(<?php echo base_url(); ?>assets/images/quote-hotel.jpg);">
            <div class="container py-4 mt-2">
                <h2 class="tittle text-center mb-3 title-quote">Hotéis</h2>
                <div class="contact_grid_right mt-5">
                    <a class="blog-btn add-passenger" role="button" formType="hf">Adicionar hóspede</a>
                    <form class="quote-form" action="<?php echo base_url() . "quotes/hotelquote" ?>" method="post">
                        <div class="contact_left_grid contact-tickets">
                        
                            <label for="hf_name_1">Nome</label>
                            <input type="text" id="hf_name_1" name="hf_name_1" placeholder="Nome" required="">

                            <label for="hf_surname_1">Sobrenome</label>
                            <input type="text" id="hf_surname_1" name="hf_surname_1" placeholder="Sobrenome" required="">

                            <label for="hf_dob_1">Data de Nascimento</label>
                            <input type="text" id="hf_dob_1" name="hf_dob_1" placeholder="Data de Nascimento" class="form-control datePicker" required="">

                            <label for="hf_email">E-mail</label>
                            <input type="email" id="hf_email" name="hf_email" placeholder="E-mail" required="">

                            <label for="hf_phone">Telefone</label>
                            <input type="tel" id="hf_phone" name="hf_phone" placeholder="+55(XX)XXXX-XXXX" required="">

                            <label for="hf_checkInDate">Data de Check-in</label>
                            <input type="text" id="hf_checkInDate" name="hf_checkInDate" placeholder="Data de Check-in" class="form-control datePicker" required="">

                            <label for="hf_checkOutDate">Data de Check-Out</label>
                            <input type="text" id="hf_checkOutDate" name="hf_checkOutDate" placeholder="Data de Check-Out" class="form-control datePicker" required="">

                            <label for="hf_destinationCity" id="destinationCity">Cidade</label>
                            <input type="text" id="hf_destinationCity" name="hf_destinationCity" placeholder="Cidade" class="form-control" required="">

                            <label for="hf_rooms">N. Quartos</label>
                            <input type="number" id="hf_rooms" name="hf_rooms" placeholder="No. Quartos" min="1" max="20" class="form-control" required="">

                            <label for="hf_message">Mensagem</label>
                            <textarea id="hf_message" name="hf_message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Informações adicionais?';}" required="">Informações adicionais?</textarea>
                            <select style="margin-top: -10px; margin-bottom: 20px;" name="hf_know">
                                <option value="" disabled selected>Como nos conheceu?</option>
                                <option value="Google">Google</option>
                                <option value="Panrotas">Panrotas</option>
                                <option value="Revistas">Revistas</option>
                                <option value="Facebook">Facebook</option>
                                <option value="Instagram">Instagram</option>
                                <option value="Outros">Outros</option>
                            </select>
                            <input type="submit" value="Enviar">
                            <input type="reset" formType="hf" value="Limpar">
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