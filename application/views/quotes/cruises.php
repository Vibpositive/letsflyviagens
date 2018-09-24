<?php if ($home == "") : ?>
    <!-- <section class="banner1"> -->
    <div id="cruiseForm">
<?php else : ?>
    <div class="collapse" id="cruiseForm">
<?php endif; ?>
        <div class="card-body quote-background" style="background: url(<?php echo base_url(); ?>assets/images/quote-cruise.jpg);">
            <div class="container py-4 mt-2">
                <h2 class="tittle text-center mb-3 title-quote">Cruzeiros</h2>
                <div class="contact_grid_right mt-5">
                
                    <?php if ($this->uri->segment(1) == "quotes") : ?>
                        <form class="quote-form" action="<?php echo $this->uri->segment(2) . "quote"; ?>" method="post">
                    <?php else : ?>
                        <form class="quote-form" action="quotes/<?php echo basename(__FILE__, '.php') . "quote"; ?>" method="post">
                    <?php endif; ?>
                        <div class="contact_left_grid contact-tickets">
                        
                            <label for="cf_name_1">Nome</label>
                            <input type="text" id="cf_name_1" name="cf_name_1" placeholder="Nome" required="">

                            <label for="cf_surname_1">Sobrenome</label>
                            <input type="text" id="cf_surname_1" name="cf_surname_1" placeholder="Sobrenome" required="">

                            <label for="cf_dob_1">Data de Nascimento</label>
                            <input type="text" id="cf_dob_1" name="cf_dob_1" placeholder="Data de Nascimento" class="form-control datePicker" required="">

                            <label for="cf_email">E-mail</label>
                            <input type="email" id="cf_email" name="cf_email" placeholder="E-mail" required="">

                            <label for="cf_phone">Telefone</label>
                            <input type="tel" id="cf_phone" name="cf_phone" placeholder="+55(XX)XXXX-XXXX" required="">
 
                            <label for="cf_destination">Destino</label>
                            <input type="text" id="cf_destination" name="cf_destination" placeholder="Destino" value="Brasil" disabled="disabled" class="form-control" required="">

                            <label for="cf_adults">No. Adultos</label>
                            <input type="number" id="cf_adults" name="cf_adults" placeholder="No. Adultos" min="1" max="20" class="form-control" required="">

                            <label for="cf_kids">No. Crianças</label>
                            <input type="number" id="cf_kids" name="cf_kids" placeholder="No. Crianças" min="0" max="20" class="form-control">

                            <label for="cf_month">Mês</label>
                            <select name="cf_month">
                                <option value="" disabled selected>Mês</option>
<!-- -                                <option value="Agosto 2018">Agosto 2018</option> -->
<!-- -                                <option value="Setembro 2018">Setembro 2018</option> -->
                                 <option value="Outubro 2018">Outubro 2018</option>
-                                <option value="Novembro 2018">Novembrok 2018</option>
+                                <option value="Novembro 2018">Novembro 2018</option>
                                 <option value="Dezembro 2018">Dezembro 2018</option>
-                                <option value="Janeiro 2018">Janeiro 2018</option>
+                                <option value="Janeiro 2019">Janeiro 2019</option>
+                                <option value="Fevereiro 2019">Fevereiro 2019</option>
+                                <option value="Março 2019">Março 2019</option>
+                                <option value="Abril 2019">Abril 2019</option>
+                                <option value="Maio 2019">Maio 2019</option>
+                                <option value="Junho 2019">Junho 2019</option>
+                                <option value="Julho 2019">Julho 2019</option>
                            </select>

                            <label for="cf_cruiseOperator">Companhia</label>
                            <select name="cf_cruiseOperator">
                                <option value="" disabled selected>Companhia</option>
                                <option value="todas">Todas</option>
                                <option value="Costa Cruzeiros">Costa Cruzeiros</option>
                                <option value="MSC Cruzeiros">MSC Cruzeiros</option>
                                <option value="Pullmantur">Pullmantur</option>
                            </select>

                            <label for="cf_departureCity">Saida</label>
                            <select name="cf_departureCity">
                                <option value="" disabled selected>Saida</option>
                                <option value="Rio de Janeiro">Rio de Janeiro</option>
                                <option value="Santos">Santos</option>
                                <option value="Recife">Recife</option>
                                <option value="Salvador">Salvador</option>
                            </select>

                            <label for="cf_message">Mensagem</label>
                            <textarea id="cf_message" name="cf_message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Informações adicionais?</textarea>
                            
                            <select style="margin-top: -10px; margin-bottom: 20px;" name="cf_know">
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