<footer>
        <div class="container py-md-5">
            <div class="row footer-top-w3layouts-agile py-5">
                <div class="col-lg-3 footer-grid">
                    <div class="footer-title">
                        <h3>Sobre Nos</h3>
                    </div>
                    <div class="footer-text">
                        <p>Nós temos a missão de sermos mais que agentes, intermediários ou processadores de passagens e reservas, somos pessoas que estarão constantemente próximas de você, sempre dispostos a oferecer integral assistência e garantia para que sua viagem, evento ou qualquer outro objetivo seja um sucesso</p>
                    </div>
                </div>
                <div class="col-lg-3 footer-grid">
                    <div class="footer-title">
                        <h3>Fale conosco</h3>
                    </div>
                    <div class="footer-office-hour">
                        <ul>
                            <li class="hd">Endereço :</li>
                            <li>Rua Afonso Sardinha, 95 - Conj. 94 - Lapa - São Paulo - SP</li>
                        </ul>
                        <ul>
                            <li class="hd">Telefone:+ 55 (11) 3644-8818</li>
                            <li class="hd" style="float: left">Email:
                                <a style="float: right; margin-top: -4px" href="mailto:letsfly@letsflyviagens.com.br">&nbsp;&nbsp;letsfly@letsflyviagens.com.br</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 footer-grid">
                    <div class="footer-title">
                        <h3>Novos destinos</h3>
                    </div>
                    <div class="footer-list">
                        <?php foreach($populardestinations as $populardestinations) { ?>
                        <?php $string = word_limiter($populardestinations->body, 25); ?>
                        <div class="flickr-grid">
                            <a href="#" data-toggle="modal" data-target="#myModal">
                                <img src="./assets/images/popular_destinations/<?php echo $populardestinations->image; ?>" style="width:75px;height:60px;" class="img-fluid" alt=" ">
                            </a>
                        </div>
                        <?php } ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-lg-3 footer-grid">
                    <div class="footer-title">
                        <h3>Inscreva-se</h3>
                    </div>
                    <p>Inscreva-se para receber atualizações e ofertas especiais</p>
                    <span style="color: aliceblue; font-size: 10px">Ao informar seu email, você automaticamente concorda com nossa politica de privacidade</span>
                    <form action="#" method="post" class="newsletter">
                        <input class="email" type="email" placeholder="Email..." required="">
                        <button class="btn1">
                            <i class="far fa-envelope"></i>
                        </button>
                    </form>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </footer>
    <!---->
    <div class="copyright py-3">
        <div class="container">
            <div class="copyrighttop">
                <ul>
                    <li>
                        <h4>Nos siga em:</h4>
                    </li>
                    <li>
                        <a class="facebook" href="#">
                            <a class="Instagram" href="#">
                                <a class="Outros" href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                    </li>
                    <li>
                        <a class="facebook" href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a class="facebook" href="#">
                            <i class="fab fa-google-plus-g"></i>
                        </a>
                    </li>
                    <li>
                        <a class="facebook" href="#">
                            <i class="fab fa-pinterest-p"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="copyrightbottom">
                <p>© 2018 Let's Fly Viagens. Todos os direitos reservados | Design por
                    <a href="http://w3layouts.com/">W3layouts</a>
                </p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Peregrinate</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="agileits-w3layouts-info">
                        <img src="<?php echo base_url(); ?>assets/images/g12.jpg" class="img-responsive" alt="" />
                        <p>Duis venenatis, turpis eu bibendum porttitor, sapien quam ultricies tellus, ac rhoncus risus odio eget nunc. Pellentesque ac fermentum diam. Integer eu facilisis nunc, a iaculis felis. Pellentesque pellentesque tempor enim, in dapibus turpis porttitor quis. </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- //Modal -->
    <!--js working-->
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <!--//js working-->
    <!--js working-->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>
    <!--//js working-->
    <!-- stats -->
    <!--						<script src="<?php echo base_url(); ?>assets/js/jquery.waypoints.min.js"></script>-->
    <script src="<?php echo base_url(); ?>assets/js/jquery.countup.js"></script>
    <script>
        $('.counter-agileits-w3layouts').countUp();
    </script>
    <!-- //stats -->
    <!-- typer js-->
    <!-- For banner text -->
    <script src='<?php echo base_url(); ?>assets/js/jquery.typer.js'></script>
    <!-- //typer js-->
    <!-- //For banner text -->
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
    <!--bootstrap working-->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <!-- //bootstrap working-->
    
    <!-- JCaroussel -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.jcarousel.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jcarousel.basic.js"></script>
    <!-- //JCaroussel -->



    <script>
        var win = $(window),
            foo = $('#typer'),
            passenger_counter = 1;
        foo.typer(['Viajar é preciso', 'Preços acessíveis', 'Sempre ao seu lado', 'A melhor experiência', 'Férias de verão com a Let\'s Fly']);
        // unneeded...
        win.resize(function() {
            var fontSize = Math.max(Math.min(win.width() / (1 * 10), parseFloat(Number.POSITIVE_INFINITY)), parseFloat(Number.NEGATIVE_INFINITY));
            foo.css({
                fontSize: fontSize * .8 + 'px'
            });
        }).resize();
        $(document).ready(function() {

            $(".more-info").click(function(e) {
                $(".collapse").collapse("hide");
                $("#" + $(e.currentTarget).attr("target")).collapse("show");
            });
            
            $(".add-passenger").click(function(e) {
                passenger_counter++;

                var formType = $(this).attr('formType');
                var newPassengerHtml = `
                  <label for="` + formType + `_name_` + passenger_counter + `">Nome ` + passenger_counter + `</label>
                  <input type="text" id="` + formType + `_name_` + passenger_counter + `" name="` + formType + `_name_` + passenger_counter + `" placeholder="Nome ` + passenger_counter + `" required="">

                  <label for="` + formType + `_surname_` + passenger_counter + `">Sobrenome ` + passenger_counter + `</label>
                  <input type="text" id="` + formType + `_surname_` + passenger_counter + `" name="` + formType + `_surname_` + passenger_counter + `" placeholder="Sobrenome ` + passenger_counter + `" required="">

                  <label for="` + formType + `_dob_` + passenger_counter + `">Data de Nascimento ` + passenger_counter + `</label>
                  <input type="text" id="` + formType + `_dob_` + passenger_counter + `" placeholder="Data de Nascimento" class="form-control datePicker">
                `;
                
                // $("#" + formType + "_departureCity").before(newPassengerHtml);
                $("#destinationCity").before(newPassengerHtml);

                $("#" + $(e.currentTarget).attr("target")).collapse("show");
                $('.datePicker').datepicker({
                    format: "dd/mm/yyyy",
                    language: "pt-BR",
                    autoclose: true,
                    todayHighlight: true
                });
            });
            $('.datePicker').datepicker({
                format: "dd/mm/yyyy",
                language: "pt-BR",
                autoclose: true,
                todayHighlight: true
            });
            $("form").on("submit", function(event) {
                // event.preventDefault();
                var formOutput = $(this).serializeArray();
                console.log(formOutput);
            });
        });
    </script>
</body>

</html>