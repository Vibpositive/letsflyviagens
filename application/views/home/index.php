<!--/banner-->
    <!-- banner -->
    <!-- header -->
    <!-- //banner -->
    <!-- about  -->
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
    <!-- //about -->
    <!-- services -->
    <div class="agileits-services py-md-5">
        <div class="container py-4 mt-2">
            <h3 class="tittle text-center mb-3 text-white">Serviços</h3>
            <p class="tit text-center mx-auto text-white">Nós oferecemos assistência completa para a sua viagem, além de trabalharmos com diversas companhias, oferecemos ofertas especiais</p>
            <div class="row agileits-services-row pt-4 mt-md-4">
                <div class="col-md-4 agileits-services-grids">
                    <div class="row ser-tp">
                        <div class="col-xs-3 wthree-ser">
                            <!--							<i class="fab fa-accessible-icon"></i>-->
                            <i class="fas fa-plane"></i>
                        </div>
                        <div class="col-xs-9 wthree-heading">
                            <h4 class="pl-3">Passagens</h4>
                        </div>
                        <p class="mt-3">Melhores preços para viagens saindo das principais localidades e de todo mundo!</p>
                    </div>
                </div>
                <div class="col-md-4 agileits-services-grids">
                    <div class="row ser-tp">
                        <div class="col-xs-3 wthree-ser">
                            <i class="fas fa-map-pin"></i>
                        </div>
                        <div class="col-xs-9 wthree-heading">
                            <h4 class="pl-3">Hotéis</h4>
                        </div>
                        <p class="mt-3">Ofertas que podem te ajudar nas buscas pelo hotel perfeito para a sua viagem</p>
                    </div>
                </div>
                <div class="col-md-4 agileits-services-grids">
                    <div class="row ser-tp">
                        <div class="col-xs-3 wthree-ser">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <div class="col-xs-9 wthree-heading">
                            <h4 class="pl-3">Pacotes</h4>
                        </div>
                        <p class="mt-3">Oferecemos preços competivivos, dando a você um ótimo custo benefício</p>
                    </div>
                </div>
            </div>
            <div class="row agileits-services-row-2">
                <div class="col-md-4 agileits-services-grids">
                    <div class="row ser-tp">
                        <div class="col-xs-3 wthree-ser">
                            <!--							<i class="fas fa-bus"></i>-->
                            <i class="fas fa-file-medical"></i>
                        </div>
                        <div class="col-xs-9 wthree-heading">
                            <h4 class="pl-3">Seguro Viagem</h4>
                        </div>
                        <p class="mt-3">Tenha uma viagem tranquila e sem preocupação</p>
                    </div>
                </div>
                <div class="col-md-4 agileits-services-grids">
                    <div class="row ser-tp">
                        <div class="col-xs-3 wthree-ser">
                            <!--							<i class="fas fa-fighter-jet"></i>-->
                            <i class="fas fa-car"></i>
                        </div>
                        <div class="col-xs-9 wthree-heading">
                            <h4 class="pl-3">Alugel de carros</h4>
                        </div>
                        <p class="mt-3">Confira as nossas ofertas e reserve o seu carro</p>
                    </div>
                </div>
                <div class="col-md-4 agileits-services-grids">
                    <div class="row ser-tp">
                        <div class="col-xs-3 wthree-ser">
                            <!--							<i class="fas fa-car"></i>-->
                            <i class="fas fa-ship"></i>
                        </div>
                        <div class="col-xs-9 wthree-heading">
                            <h4 class="pl-3">Cruzeiros</h4>
                        </div>
                        <p class="mt-3">Encontre o cruzeiro dos seus sonhos aqui.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //services -->
    <!-- features -->
    <section class="features py-md-5">
        <div class="container py-4 mt-2">
            <h3 class="tittle text-center mb-3">Clientes satisfeitos</h3>
            <p class="tit text-center mx-auto">O objetivo da Let's Fly é garantir uma viagem que deixará ótimas lembranças, abaixo você pode conferir alguns depoimentos de nossos clientes</p>

            <div class="row about-main pt-4 mt-md-4">
                <div class="col-lg-5 about-right">
                    <h4>Seja mais um cliente feliz</h4>
                    <p class="Lor my-3">Clique no botão Faça Parte e garanta a uma viagem econômica e tranquila</p>
                    <a href="#" class="blog-btn" data-toggle="modal" data-target="#myModal">Faça Parte</a>
                    <!-- stats -->
                    <div class="stats mt-3">
                        <div class="row stats_inner">
                            <div class="col-md-6 col-sm-6 col-xs-6 stat-grids mb-3">
                                <p class="counter-agileits-w3layouts">132</p>
                                <div class="stats-text-wthree">
                                    <h3>Clientes</h3>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 stat-grids mb-3">
                                <p class="counter-agileits-w3layouts">25.000</p>
                                <div class="stats-text-wthree">
                                    <h3>Viagens</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row stats_inner">
                            <div class="col-md-6 col-sm-6 col-xs-6 stat-grids">
                                <p class="counter-agileits-w3layouts">35.000</p>
                                <div class="stats-text-wthree">
                                    <h3> Diárias</h3>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 stat-grids">
                                <p style="float: left;">R$</p>
                                <p class="counter-agileits-w3layouts">95.000</p>
                                <div class="stats-text-wthree">
                                    <h3>Economizados</h3>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- //stats -->
                </div>
                <div class="col-lg-7 about-left">
                    <!-- testimonials -->
                    <div class="w3_agile-section testimonials text-center" id="testimonials">
                        <div class=" w3ls-team-info test-bg">
                            <div class="testi-left">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="row thumbnail adjust1">
                                                <div class="col-md-3 col-sm-3">
                                                    <img class="media-object img-fluid" src="./assets/images/testimonial/ts01.jpg" alt="" />
                                                </div>
                                                <div class="col-md-9 col-sm-9">
                                                    <div class="caption testi-text">
                                                        <p>
                                                            <span class="fa fa-quote-left" aria-hidden="true"></span>Vagabunda, queria tacar do malucão, usou meu nome!</p>
                                                        <h4><span></span>Brown</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row thumbnail adjust1 fone">
                                                <div class="col-md-3 col-sm-3">
                                                    <img class="media-object img-fluid" src="./assets/images/testimonial/ts02.jpg" alt="" />
                                                </div>
                                                <div class="col-md-9 col-sm-9">
                                                    <div class="caption testi-text">
                                                        <p>
                                                            <span class="fa fa-quote-left" aria-hidden="true"></span>O que me impede de sorrir, É tudo que eu já perdi, Eu fechei os olhos e pedi, Para quando abrir a dor não estar aqui, mas Sei que não é fácil assim, mas Vou aprender no fim Minhas ãos se unem para que Tirem do meu peito o que é de ruim</p>
                                                        <h4><span></span>Pablito</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="row thumbnail adjust1">
                                                <div class="col-md-3 col-sm-3">
                                                    <img class="media-object img-fluid" src="./assets/images/testimonial/ts04.jpg" alt="" />
                                                </div>
                                                <div class="col-md-9 col-sm-9">
                                                    <div class="caption testi-text">
                                                        <p>
                                                            <span class="fa fa-quote-left" aria-hidden="true"></span>Não contavam com minha astucia</p>
                                                        <h4><span></span>Chapolin</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row thumbnail adjust1 fone">
                                                <div class="col-md-3 col-sm-3">
                                                    <img class="media-object img-fluid" src="./assets/images/testimonial/ts05.jpg" alt="" />
                                                </div>
                                                <div class="col-md-9 col-sm-9">
                                                    <div class="caption testi-text">
                                                        <p>
                                                            <span class="fa fa-quote-left" aria-hidden="true"></span>O cão foi quem botou pra nois beber</p>
                                                        <h4><span></span>Jeremias</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="row thumbnail adjust1">
                                                <div class="col-md-3 col-sm-3">
                                                    <img class="media-object img-fluid" src="./assets/images/testimonial/ts03.jpg" alt="" />
                                                </div>
                                                <div class="col-md-9 col-sm-9">
                                                    <div class="caption testi-text">
                                                        <p>
                                                            <span class="fa fa-quote-left" aria-hidden="true"></span>Sou chato pra caralho</p>
                                                        <h4><span></span>Lobao</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row thumbnail adjust1 fone">
                                                <div class="col-md-3 col-sm-3">
                                                    <img class="media-object img-fluid" src="./assets/images/testimonial/ts06.jpg" alt="" />
                                                </div>
                                                <div class="col-md-9 col-sm-9">
                                                    <div class="caption testi-text">
                                                        <p>
                                                            <span class="fa fa-quote-left" aria-hidden="true"></span>Ei ei ei ei, sem voce nao viverei, todo amor que eu te dei, todo amor desse mundo</p>
                                                        <h4><span></span>Jeremias</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- //testimonials-->
                </div>
            </div>
        </div>
    </section>
    <!-- middle section -->
    <div class="middle-w3l py-md-5">
        <div class="container py-4 mt-2">
            <h2>Escolha seu Destino e deixe o resto conosco</h2>
            <p class="my-4">Para maiores informações sobre os nosso serviços, entre em contato</p>
            <a href="contact.html" class="blog-btn">Fale conosco</a>
        </div>
    </div>
    <!-- //middle section -->
    <!-- news  -->
    <section class="wthree-row w3-about py-md-5">
        <div class="container py-4 mt-2">
            <h3 class="tittle text-center mb-3">Noticías e Atualizações</h3>
            <p class="tit text-center mx-auto">Confira um pouco mais do que está acontecendo na Let's Fly</p>
            <div class="card-deck pt-4 mt-md-4">
                <div class="card">
                    <img src="./assets/images/g11.jpg" class="img-fluid" alt="Card image cap">
                    <div class="card-body w3ls-card">
                        <h4 class="card-title">Noticia 01</h4>
                        <p class="card-text mb-3 ">Texto da noticia 01</p>
                        <a href="#" data-toggle="modal" data-target="#myModal">Saiba mais</a>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Atualizado a 3 minutos</small>
                    </div>
                </div>
                <div class="card">
                    <img src="./assets/images/g10.jpg" class="img-fluid" alt="Card image cap">
                    <div class="card-body w3ls-card">
                        <h4 class="card-title">Noticia 02</h4>
                        <p class="card-text mb-3 ">Texto da noticia 02</p>
                        <a href="#" data-toggle="modal" data-target="#myModal">Saiba mais</a>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Atualizado a 3 minutos</small>
                    </div>
                </div>
                <div class="card">
                    <img src="./assets/images/g9.jpg" class="img-fluid" alt="Card image cap">
                    <div class="card-body w3ls-card">
                        <h4 class="card-title">Noticia 03</h4>
                        <p class="card-text mb-3 ">Texto da noticia 03</p>
                        <a href="#" data-toggle="modal" data-target="#myModal">Saiba mais</a>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Atualizado a 3 minutos</small>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //news -->
    <!--footer-->