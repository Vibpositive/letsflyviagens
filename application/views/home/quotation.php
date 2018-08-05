<section class="wthree-row w3-about py-md-5">
        <div class="container py-4 mt-2">
            <h3 class="tittle text-center mb-3">Uma forma diferente de se Viajar</h3>
            <p class="tit text-center mx-auto"></p>
            <div class="card-deck pt-4 mt-md-4">
                <div class="card">
                    <img src="./assets/images/g13.jpg" class="img-fluid" alt="Card image cap">
                    <div class="card-body w3ls-card">
                        <h5 class="card-title">Passagens Aéreas</h5>
                        <p class="card-text mb-3 ">Confira as ofertas de passagens e garanta sua viagem</p>
                        <a class="blog-btn more-info" data-toggle="collapse" href="#" target="ticketsForm">Saiba mais</a>
                    </div>
                </div>
                <div class="card">
                    <img src="./assets/images/g14.jpg" class="img-fluid" alt="Card image cap">
                    <div class="card-body w3ls-card">
                        <h5 class="card-title">Hotéis</h5>
                        <p class="card-text mb-3 ">Confira as ofertas de hóteis e garanta sua viagem</p>
                        <a class="blog-btn more-info" data-toggle="collapse" href="#" target="hotelsForm">Saiba mais</a>
                    </div>
                </div>
                <div class="card">
                    <img src="./assets/images/g12.jpg" class="img-fluid" alt="Card image cap">
                    <div class="card-body w3ls-card">
                        <h5 class="card-title">Cruzeiros</h5>
                        <p class="card-text mb-3 ">Confira as ofertas de cruzeiros e garanta sua viagem</p>
                        <!--                        <a href="#" class="blog-btn more-info" data-toggle="modal" data-target="#myModal">Saiba mais</a>-->
                        <a class="blog-btn more-info" data-toggle="collapse" href="#" target="cruiseForm">Saiba mais</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="collapse" id="ticketsForm">
            <div class="card card-body">
                <div class="container py-4 mt-2">
                    <h2 class="tittle text-center mb-3">Passagens Aéreas</h2>
                    <div class="contact_grid_right mt-5">
                        <!-- <h6>Please fill this form to contact with us.</h6> -->
                        <a class="blog-btn add-passenger" role="button" formType="tf">Adicionar passageiro</a>
                        <form action="server/contact.php" method="post">
                            <div class="contact_left_grid contact-tickets">
                                
                                <input type="text" id="tf_name_1" name="tf_name_1" placeholder="Nome" style="width: 49.9%;" required="">
                                <input type="text" id="tf_surname_1" name="tf_surname_1" placeholder="Sobrenome" style="width: 49.9%; float:right;" required="">
                                <input type="text" id="tf_dob_1" name="tf_dob_1" placeholder="Data de Nascimento" class="form-control datePicker" required="">
                                <input type="email" id="tf_email" name="tf_email" placeholder="Email" required="">
                                <input type="tel" id="tf_phone" name="tf_phone" placeholder="+55(XX)XXXX-XXXX" required="">
                                <input type="text" id="tf_departureCity" name="tf_departureCity" placeholder="Cidade de Saida" class="form-control" required="">
                                <input type="text" id="tf_destinationCity" name="tf_destinationCity" placeholder="Cidade de Destino" class="form-control" required="">
                                <input type="text" id="tf_departureDate" name="tf_departureDate" placeholder="Data de Embarque" class="form-control datePicker" required="">
                                <input type="text" id="tf_returnDarte" name="tf_returnDarte" placeholder="Data de Retorno" class="form-control datePicker">
                                <textarea id="tf_message" name="tf_message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Informações adicionais?</textarea>
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
                                <!-- <input type="reset" value="Clear"> -->
                                <div class="clearfix"> </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="collapse" id="hotelsForm">
            <div class="card card-body">
                <div class="container py-4 mt-2">
                    <h2 class="tittle text-center mb-3">Hotéis</h2>
                    <div class="contact_grid_right mt-5">
                        <!-- <h6>Please fill this form to contact with us.</h6> -->
                        <!-- <a class="blog-btn add-passenger" role="button" formType="hf">Adicionar passageiro</a> -->
                        <form action="server/contact.php" method="post">
                            <div class="contact_left_grid contact-tickets">
                                <!-- <label for="hf_name_1" style="padding-top: 20px; float: left; margin-bottom: -5px; width: 50%;">Nome</label> -->
                                <!-- <label for="hf_surname_1" style="    padding-top: 20px; float: left; width: 50%; margin-bottom: -5px;">Sobrenome</label> -->
                                <input type="text" id="hf_name_1" name="hf_name_1" placeholder="Nome" style="width: 49.9%;" required="">
                                <input type="text" id="hf_surname_1" name="hf_surname_1" placeholder="Sobrenome" style="width: 49.9%; float:right;" required="">
                                <input type="text" id="hf_dob_1" name="hf_dob_1" placeholder="Data de Nascimento" class="form-control datePicker" required="">
                                <input type="email" id="hf_email" name="hf_email" placeholder="Email" required="">
                                <input type="tel" id="hf_phone" name="hf_phone" placeholder="+55(XX)XXXX-XXXX" required="">
                                <input type="text" id="hf_checkInDate" name="hf_checkInDate" placeholder="Data de Check-in" class="form-control datePicker" required="">
                                <input type="text" id="hf_checkOutDate" name="hf_checkOutDate" placeholder="Data de Check-Out" class="form-control datePicker" required="">
                                <input type="text" id="hf_city" name="hf_city" placeholder="Cidade" class="form-control" required="">
                                <input type="number" id="hf_rooms" name="hf_rooms" placeholder="No. Quartos" min="1" max="20" class="form-control" required="">
                                <input type="number" id="hf_adults" name="hf_adults" placeholder="No. Adultos" min="1" max="20" class="form-control" required="">
                                <input type="number" id="hf_kids" name="hf_kids" placeholder="No. Crianças" min="1" max="20" class="form-control" required="">

                                <textarea id="hf_message" name="hf_message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Informações adicionais?';}" required="">Informações adicionais?</textarea>
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
                                <!-- <input type="reset" value="Clear"> -->
                                <div class="clearfix"> </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="collapse" id="cruiseForm">
            <div class="card card-body">
                <div class="container py-4 mt-2">
                    <h2 class="tittle text-center mb-3">Cruzeiros</h2>
                    <div class="contact_grid_right mt-5">
                        <!-- <h6>Please fill this form to contact with us.</h6> -->
                        <!-- <a class="blog-btn add-passenger" role="button" formType="cf">Adicionar passageiro</a> -->
                        <form action="server/contact.php" method="post">
                            <div class="contact_left_grid contact-tickets">
                                <!-- <label for="hf_name_1" style="padding-top: 20px; float: left; margin-bottom: -5px; width: 50%;">Nome</label> -->
                                <!-- <label for="hf_surname_1" style="    padding-top: 20px; float: left; width: 50%; margin-bottom: -5px;">Sobrenome</label> -->
                                <input type="text" id="cf_name_1" name="cf_name_1" placeholder="Nome" style="width: 49.9%;" required="">
                                <input type="text" id="cf_surname_1" name="cf_surname_1" placeholder="Sobrenome" style="width: 49.9%; float:right;" required="">

                                <input type="text" id="cf_dob_1" name="cf_dob_1" placeholder="Data de Nascimento" class="form-control datePicker" required="">
                                <input type="email" id="cf_email" name="cf_email" placeholder="Email" required="">
                                <input type="tel" id="cf_phone" name="cf_phone" placeholder="+55(XX)XXXX-XXXX" required="">
                                <!-- <input type="text"   id="cf_checkInDate"     name="cf_checkInDate"     placeholder="Data de Check-in" class="form-control datePicker" required=""> -->
                                <!-- <input type="text"   id="cf_checkOutDate"    name="cf_checkOutDate"    placeholder="Data de Check-Out" class="form-control datePicker" required=""> -->
                                <input type="text" id="cf_destination" name="cf_destination" placeholder="Destino" value="Brasil" disabled="disabled" class="form-control" required="">
                                <input type="number" id="cf_adults" name="cf_adults" placeholder="No. Adultos" min="1" max="20" class="form-control" required="">
                                <input type="number" id="cf_kids" name="cf_kids" placeholder="No. Crianças" min="1" max="20" class="form-control" required="">

                                <select name="cf_month">
                                    <option value="" disabled selected>Mês</option>
                                    <option value="Agosto 2018">Agosto 2018</option>
                                    <option value="Setembro 2018">Setembro 2018</option>
                                    <option value="Outubro 2018">Outubro 2018</option>
                                    <option value="Novembro 2018">Novembrok 2018</option>
                                    <option value="Dezembro 2018">Dezembro 2018</option>
                                    <option value="Janeiro 2018">Janeiro 2018</option>
                                </select>
                                <select name="cf_cruiseOperator">
                                    <option value="" disabled selected>Companhia</option>
                                    <option value="Costa Cruzeiros">Costa Cruzeiros</option>
                                    <option value="MSC Cruzeiros">MSC Cruzeiros</option>
                                    <option value="Pullmantur">Pullmantur</option>
                                </select>
                                <select name="cf_departureCity">
                                    <option value="" disabled selected>Saida</option>
                                    <option value="Rio de Janeiro">Rio de Janeiro</option>
                                    <option value="Santos">Santos</option>
                                    <option value="Recife">Recife</option>
                                    <option value="Salvador">Salvador</option>
                                </select>
                                <textarea id="cf_message" name="cf_message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Informações adicionais?</textarea>
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
                                <!-- <input type="reset" value="Clear"> -->
                                <div class="clearfix"> </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>