<footer>
        <div class="container py-md-5">
            <div class="row footer-top-w3layouts-agile py-5">
                <div class="col-lg-3 footer-grid">
                    <div class="footer-title">
                        <h3>Sobre Nos</h3>
                    </div>
                    <div class="footer-text">
                        <p>Nós temos a missão de sermos mais que agentes, intermediários ou processadores de passagens e reservas, somos pessoas que estarão constantemente próximas de você, sempre dispostos a oferecer integral assistência e garantia para que sua viagem evento ou qualquer outro objetivo seja um sucesso</p>
                    </div>
                </div>
                <div class="col-lg-3 footer-grid">
                    <div class="footer-title">
                        <h3>Fale conosco</h3>
                    </div>
                    <div class="footer-office-hour">
                        <ul>
                            <li class="hd">Endereço :</li>
                            <li>Av vida nova, 28 Sala 904 - B</li>
                            <li>Centro empresarial</li>
                            <li>Taboão da Serra</li>
                        </ul>
                        <ul>
                            <li class="hd">Telefone:+ 55 (11) 4303-8984 </li>
                            <li class="hd">Plantão:+ 55 (11) 3280-3860 </li>
                            <li class="hd" style="float: left">Email:
                                <a style="float: right; margin-top: -4px" href="mailto:letsfly@letsflyviagens.com.br">&nbsp;&nbsp;letsfly@letsflyviagens.com.br</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 footer-grid">
                    <div class="footer-title">
                        <h3>Destinos populares</h3>
                    </div>
                    <div class="footer-list">
                        <?php foreach($populardestinations as $populardestinations) { ?>
                        <?php $string = word_limiter($populardestinations->body, 25); ?>
                        <div class="flickr-grid">
                            <a  href="#"
                                data-toggle="modal"
                                data-target="#myModal"
                                data-id="<?php echo base_url() . "populardestinations/" . $populardestinations->id; ?>"
                                data-title="<?php echo $populardestinations->title; ?>"
                                data-body="<?php echo $populardestinations->body; ?>"
                                data-image="<?php echo base_url(). "assets/images/popular_destinations/" . $populardestinations->image; ?>">
                                <img
                                    data-toggle="tooltip"
                                    title="<?php echo $populardestinations->title; ?>!"
                                    src="<?php echo base_url() . '/assets/images/popular_destinations/'.  $populardestinations->image; ?>"
                                    style="width:75px;height:60px;"
                                    class="img-fluid"
                                    alt=" ">
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
                    <form action="newsletter/register" method="post" class="newsletter">
                        <input class="email" type="email" name="Email" placeholder="Email..." required="">
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
                        <a class="facebook" target="_blank" href="https://www.facebook.com/letsflyviagens">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a class="facebook" target="_blank" href="https://www.instagram.com/letsflyviagens/">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a class="facebook" target="_blank" href="https://twitter.com/letsflyviagens">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <!-- <li>
                        <a class="facebook" href="#">
                            <i class="fab fa-google-plus-g"></i>
                        </a>
                    </li>
                    <li>
                        <a class="facebook" href="#">
                            <i class="fab fa-pinterest-p"></i>
                        </a>
                    </li> -->
                </ul>
            </div>
            <div class="copyrightbottom">
                <p>© 2019 Let's Fly Viagens. Todos os direitos reservados
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
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="agileits-w3layouts-info">
                        <img src="" class="img-responsive modal-main-image" alt="" />
                        <h7 class="modal-main-text"></h7>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="emailFeedbackModal" tabindex="-1" role="dialog" aria-labelledby="emailFeedbackModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="emailFeedbackModalLabel">Mensagem de email</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="modal-main-text"></h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- //Modal -->
    <!--js working-->
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>
    <!--//js working-->
    <!--js working-->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/locales/bootstrap-datepicker.pt-BR.min.js"></script>
    
    <script src=""></script>
    <!--//js working-->
    <!-- stats -->
    <!--						<script src="<?php echo base_url(); ?>assets/js/jquery.waypoints.min.js"></script>-->
    <script src="<?php echo base_url(); ?>assets/js/jquery.countup.js"></script>
    <script>
        $('.counter-agileits-w3layouts').countUp();
    </script>
	
	<?php if (base_url(uri_string()) == base_url()) : ?>
    	<script src='<?php echo base_url(); ?>assets/js/jquery.typer.js'></script>
	<?php endif;?>
	
    <!-- //For banner text -->
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
    <!--bootstrap working-->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <!-- //bootstrap working-->
    
    <!-- JCaroussel -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.jcarousel.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jcarousel.basic.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.jcarousel-autoscroll.min.js"></script>
    <!-- //JCaroussel -->
	
	<!-- TODO: implement counters only if in quotes pages -->
    <script>
        var win = $(window),
            tf_counter = 1,
            cr_counter = 1,
            cf_counter = 1,
            hf_counter = 1,
            ti_counter = 1,
            tp_counter = 1;

        var title = "undefined"
        var body = "undefined"

        <?php if(isset($type_items)) : ?>
            var foo = $('#typer');
			var type = [];
			
			<?php foreach ($type_items as $key) : ?>
				<?php 
					echo "type.push('" . addslashes ($key['value']) . "');\n";
				?>
			<?php endforeach; ?>
        	foo.typer(type);
			win.resize(function() {
				var fontSize = Math.max(Math.min(win.width() / (1 * 11), parseFloat(Number.POSITIVE_INFINITY)), parseFloat(Number.NEGATIVE_INFINITY));
				foo.css({
					fontSize: fontSize * .8 + 'px'
				});
			}).resize();
		<?php endif; ?>


        $(document).ready(function() {

            $(".more-info").click(function(e) {
                $(".collapse").collapse("hide");
                $("#" + $(e.currentTarget).attr("target")).collapse("show");
            });
            
                
            $(".add-passenger").click(function(e) {
                var formType = $(this).attr('formType');

                switch (formType) {
                    case "tf":
                        tf_counter++;
                        var currentCounter = tf_counter;
                        break;
                    case "cr":
                        cr_counter++;
                        var currentCounter = cr_counter;
                        break;
                    case "cf":
                        cf_counter++;
                        var currentCounter = cf_counter;
                        break;
                    case "hf":
                        hf_counter++;
                        var currentCounter = hf_counter;
                        break;
                    case "ti":
                        ti_counter++;
                        var currentCounter = ti_counter;
                        break;
                    case "tp":
                        tp_counter++;
                        var currentCounter = tp_counter;
                        break;
                
                    default:
                        break;
                }
                
                if(currentCounter < 20){

                    var formType = $(this).attr('formType');
                    var newPassengerHtml = `
                    <div id="` + formType + `_` + currentCounter + `_container">
                    <label for="` + formType + `_name_` + currentCounter + `">Nome ` + currentCounter + `</label>
                    <input type="text" id="` + formType + `_name_` + currentCounter + `" name="` + formType + `_name_` + currentCounter + `" placeholder="Nome ` + currentCounter + `" required="">

                    <label for="` + formType + `_surname_` + currentCounter + `">Sobrenome ` + currentCounter + `</label>
                    <input type="text" id="` + formType + `_surname_` + currentCounter + `" name="` + formType + `_surname_` + currentCounter + `" placeholder="Sobrenome ` + currentCounter + `" required="">

                    <label for="` + formType + `_dob_` + currentCounter + `">Data de Nascimento ` + currentCounter + `</label>
                    <input type="text" id="` + formType + `_dob_` + currentCounter + `" placeholder="Data de Nascimento" class="form-control datePicker">
                    </div>
                    `;
                    
                    $("#" + formType + "_destinationCity").before(newPassengerHtml);

                    $("#" + $(e.currentTarget).attr("target")).collapse("show");

                    $('.datePicker').datepicker({
                        format: 'dd/mm/yyyy',
                        language: 'pt-BR',
                        autoclose: true,
                        todayHighlight: true
                    });
                }
            });
            
            $("input[type=reset]").click(function(e) {
                var formType = $(this).attr('formType');

                switch (formType) {
                    case "tf":
                        tf_counter++;
                        var currentCounter = tf_counter;
                        break;
                    case "cr":
                        cr_counter++;
                        var currentCounter = cr_counter;
                        break;
                    case "cf":
                        cf_counter++;
                        var currentCounter = cf_counter;
                        break;
                    case "hf":
                        hf_counter++;
                        var currentCounter = hf_counter;
                        break;
                    case "ti":
                        ti_counter++;
                        var currentCounter = ti_counter;
                        break;
                    case "tp":
                        tp_counter++;
                        var currentCounter = tp_counter;
                        break;
                
                    default:
                        break;
                }
                
                if(currentCounter > 1){
                    for (let index = currentCounter; index > 1; index--) {
                        $("#"+ formType + "_" + currentCounter + "_container").remove();
                        currentCounter--;
                    }
                }
            });
            
            $('.datePicker').datepicker({
                format: 'dd/mm/yyyy',
                language: 'pt-BR',
                autoclose: true,
                todayHighlight: true
            });
            
            $('[data-toggle="tooltip"]').tooltip(); 

            $('#myModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var title = button.data('title')
                var body = button.data('body')
                var image = button.data('image')
                var moreinfo = button.data('id')
                var modal = $(this)
                modal.find('.modal-title').text(title)
                modal.find('.modal-main-text').text(body)
                modal.find('.modal-main-image').attr('src', image)
            });
            $('#closenews').click(function(){
                // TODO: get base url from codeigniter
                window.location.href = '../../';
            });


            $("form").submit(function(e) {
                
                var form = $(this);
                var url = form.attr('action');

                $.ajax({
                    type: "POST",
                    url: url,
                    data: form.serialize(), // serializes the form's elements.
                    success: function(data)
                        {
                            data = data.split('\n').join('');

                            if(data == "success"){
                                title = "Mensagem enviada com sucesso"
                                body = "Sua mensagem foi enviada, fique de olho no seu email, um agente entrará em contato!"
                                form.trigger("reset");
                            }else{
                                title = "Mensagem nao enviada"
                                body = "Por favor tente mais tarde"
                                // body = data
                            }
                            
                            $('#emailFeedbackModal').modal('show');
                            
                        }
                    });

                e.preventDefault();
                // avoid to execute the actual submit of the form.
            });

            $('#emailFeedbackModal').on('show.bs.modal', function (event) {
                var modal = $(this)
                modal.find('.modal-title').text(title)
                modal.find('.modal-main-text').text(body)
            });

            $("#success-alert").hide();

            $(".more-info").click(function (){
				var target = $(this).attr("target");
				
                var $el = $("#different_way_to"); 
                var bottom = $el.position().top + $el.outerHeight(true);

                // $('html, body').animate({
                //     scrollTop: $("#" + target).offset().top
                // }, 2000);

                $("html, body").animate({
                    // scrollTop: $(".py-4").position().top
                    // scrollTop: $(".py-4").position().top 
                    scrollTop: bottom
                }, 1000);
            });
            
        });
    </script>
    
</body>

</html>
