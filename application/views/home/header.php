 <header>
     <!-- TODO:  -->
    <?php if ($home == "") : ?>
        <section class="banner1">
    <?php else : ?>
        <section class="main_section_agile">
    <?php endif; ?>
    
     
        <!-- <section class="main_section_agile"> -->
            <div class="agileits_w3layouts_banner_nav">
                <div class="header-bar py-sm-2">
                    <div class="container py-2">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <div class="hedder-up">
                                <h1><a class="navbar-brand" href="index.html">Let's Fly Viagens</a></h1>
                            </div>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                                <ul class="navbar-nav">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="about.html" class="nav-link">Nós</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="gallery.html" class="nav-link">Gallery</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cotações</a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="informacoes.html">Passagens</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="about.html">Hotéis</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="about.html">Cruzeiros</a>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a href="contact.html" class="nav-link">Contato</a>
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
                <!-- //Navigation -->
            </div>
            <!-- w3-banner -->
            <?php if ($home) : ?>
            <div class="w3-banner">
                <div id="typer"></div>
                
                    <?php echo $home . " HOME"; ?>
                    <p class="mx-auto py-3 justify">Acreditamos que viagens, além de nos trazer bem-estar, podem transformar nossa visão de mundo e nos tornar culturalmente mais ricos. E é por isso Nós da Lets Fly Viagens nos dedicamos a realizar sonhos de viagens de milhares de brasileiros ao proporcionar que nossos associados viajem em suas férias todos os anos.</p>
                </div>
            <?php endif; ?>

            <!-- //w3-banner -->
        </section>
    </header>