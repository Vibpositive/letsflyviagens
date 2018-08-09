<div class="card-body quote-background" style="background: url(http://localhost/letsfly/assets/images/news/background/bg_01.jpg);">
	<article class="container py-4 mt-2">
    <h2 class="tittle text-center mb-3 title-quote"><?php echo $article->title;?></h2>
            <div class="contact_grid_right mt-5">
                <div class="quote-form" style="min-height:600px">
                    <div class="container" style="min-height: 580px; padding: 0 !important; margin: 0 !important; position: relative;">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="polaroids">

                                    <div class="polaroid">
                                    <!-- <img src="https://images.pexels.com/photos/256738/pexels-photo-256738.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260"> -->
                                    <!-- <img src="<?php echo base_url() . "assets/images/news/" . $article->image;?>" alt="" class="img-fluid circle-image"> -->
                                        <img
                                            src="<?php echo base_url() . "assets/images/news/" . $article->image;?>"
                                            alt=""
                                            class="img-fluid"
                                            style="width: auto;  min-width: 100%; max-height: 600px;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <p><?php echo $article->body;?></p>
                            </div>
                            <div class="col-sm-12" style="position: absolute; bottom: 0; min-width: 100%; text-align: -webkit-center;">
                                <h7><?php echo $article->created_at;?></h7>
                            </div>
                        </div>
                    </div>
					
                </div>
            </div>
		
	</article>
</div>
