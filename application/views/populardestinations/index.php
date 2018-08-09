<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css" />
<link href="<?php echo base_url(); ?>assets/css/cards-gallery.css" rel='stylesheet' type='text/css' media="all">

   <section class="gallery-block cards-gallery">
	    <div class="container">
	        <div class="heading">
			  <h2></h2>
			  <h2 class="tittle text-center mb-3 title-quote">Destinos populares</h2>
	        </div>
	        <div class="row">
				<?php foreach ($populardestinations as $populardestinations) :?>
				<?php $body = word_limiter($populardestinations->body, 1000); ?>
					<div class="col-md-6 col-lg-4">
						<div class="card border-0 transform-on-hover .pointer" style="cursor: default;">
							<a class="lightbox" href="<?php echo base_url() . 'assets/images/popular_destinations/' . $populardestinations -> image ?>">
								<img src="<?php echo base_url() . 'assets/images/popular_destinations/' . $populardestinations -> image ?>" alt="Card Image" class="card-img-top">
							</a>
							<div class="card-body">
								<h6>
									<!-- <a href="#"> -->
										<?php echo $populardestinations -> title ?>
									<!-- </a> -->
								</h6>
								<p class="text-muted card-text">
									<?php echo $body ?>
								</p>
							</div>
						</div>
					</div>
				<?php endforeach ?>
	        </div>
	    </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script>
        baguetteBox.run('.cards-gallery', { animation: 'slideIn'});
    </script>