 <header>
    <?php if ($home == "") : ?>
        <section class="banner1">
    <?php else : ?>
        <section class="main_section_agile">
    <?php endif; ?>
        <div class="agileits_w3layouts_banner_nav">
            <div class="header-bar py-sm-2">
                <div class="container py-2">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="hedder-up">
                            <h1><a class="navbar-brand logo-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url() . "assets/images/logo.png"; ?>" width="150" height="130" alt=""></a></h1>
                        </div>
                        <div class="hedder-up">
                            <h1><a class="navbar-brand" href="<?php echo base_url(); ?>">Let's Fly Viagens</a></h1>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url() . "about"; ?>" class="nav-link">Sobre Nós</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cotações</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="<?php echo base_url() . "quotes/flights"; ?>">Passagens</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo base_url() . "quotes/travelpackages"; ?>">Pacotes</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo base_url() . "quotes/hotels"; ?>">Hotéis</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo base_url() . "quotes/cruises"; ?>">Cruzeiros</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo base_url() . "quotes/travelinsurance"; ?>">Seguro Viagem</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo base_url() . "quotes/carrental"; ?>">Locação de Carros</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url() ?>contact" class="nav-link">Contato</a>
                                </li>
                            </ul>
                            <div class="w3_agile_login">
                                <div class="cd-main-header">
                                    <a class="cd-search-trigger" href="#cd-search"> <span></span></a>
                                    <!-- cd-header-buttons -->
                                </div>
                                <div id="cd-search" class="cd-search">
                                    <form action="#" method="post">
                                        <input name="Search" type="search" placeholder="Search...">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    <?php if ($home) : ?>
    <div class="w3-banner">
        <div id="typer"></div>
        <p class="mx-auto py-3 justify">Acreditamos que viagens, além de nos trazer bem-estar, podem transformar nossa visão de mundo e nos tornar culturalmente mais ricos. E é por isso Nós da Lets Fly Viagens nos dedicamos a realizar sonhos de viagens de milhares de brasileiros ao proporcionar que nossos associados viajem em suas férias todos os anos.</p>
    </div>
    <?php endif; ?>
</section>
</header>