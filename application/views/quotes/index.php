<section class="wthree-row w3-about">
    <div class="container py-4 mt-2">
        <h3 class="tittle text-center mb-3">Uma forma diferente de se Viajar</h3>
        <p class="tit text-center mx-auto"></p>
        <div class="card-deck pt-4 mt-md-4">
            <div class="card">
                <img src="<?php echo base_url(); ?>assets/images/g13.jpg" class="img-fluid" alt="Card image cap">
                <div class="card-body w3ls-card">
                    <h5 class="card-title">Passagens Aéreas</h5>
                    <p class="card-text mb-3 ">Confira as ofertas de passagens e garanta sua viagem</p>
                    <a class="blog-btn more-info" data-toggle="collapse" href="#" target="ticketsForm">Saiba mais</a>
                </div>
            </div>
            <div class="card">
                <img src="<?php echo base_url(); ?>assets/images/g14.jpg" class="img-fluid" alt="Card image cap">
                <div class="card-body w3ls-card">
                    <h5 class="card-title">Hotéis</h5>
                    <p class="card-text mb-3 ">Confira as ofertas de hóteis e garanta sua viagem</p>
                    <a class="blog-btn more-info" data-toggle="collapse" href="#" target="hotelsForm">Saiba mais</a>
                </div>
            </div>
            <div class="card">
                <img src="<?php echo base_url(); ?>assets/images/g12.jpg" class="img-fluid" alt="Card image cap">
                <div class="card-body w3ls-card">
                    <h5 class="card-title">Cruzeiros</h5>
                    <p class="card-text mb-3 ">Confira as ofertas de cruzeiros e garanta sua viagem</p>
                    <!--                        <a href="#" class="blog-btn more-info" data-toggle="modal" data-target="#myModal">Saiba mais</a>-->
                    <a class="blog-btn more-info" data-toggle="collapse" href="#" target="cruiseForm">Saiba mais</a>
                </div>
            </div>
        </div>
    </div>
    <?php $this->view('quotes/flights'); ?>
    <?php $this->view('quotes/hotels'); ?>
    <?php $this->view('quotes/cruises'); ?>
</section>