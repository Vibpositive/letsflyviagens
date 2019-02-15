<div class="wrapper wrapper-offers" <?php if(!$data){ echo "style='display:none;'";} ?>>
   <h1 style="text-align: center; padding-top: 70px; text-shadow: 4px 4px 10px rgba(0, 0, 0, 0.5)" >Promoções</h1>
   <div class="jcarousel-wrapper">
      <div class="jcarousel">
         <ul>
				<?php foreach ($data as $key) : ?>
					<li>
						<img class="img-responsive" src="<?php echo base_url() . 'assets/images/caroussel/' . $key['image'] ;?>" alt="">
					</li>
				<?php endforeach; ?>
         </ul>
      </div>
      <p class="photo-credits">
         Photos by
         <a href="#"></a>
      </p>
      <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
      <a href="#" class="jcarousel-control-next">&rsaquo;</a>
      <p class="jcarousel-pagination">
      </p>
   </div>
</div>
