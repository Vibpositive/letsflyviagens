<section class="wthree-row w3-about py-md-5">
    <div class="container py-4 mt-2">
        <h3 class="tittle text-center mb-3">Noticías e Atualizações</h3>
        <p class="tit text-center mx-auto">Confira um pouco mais do que está acontecendo na Let's Fly</p>
        <div class="card-deck pt-4 mt-md-4">

        <?php
            $counter = 1;
        ?>
        
        <?php foreach($news as $news) : ?>
        
            <?php $string = word_limiter($news->body, 25); ?>
            
            <div class="card">
                <img src="./assets/images/news/<?php echo $news->image; ?>" class="circle-image img-fluid" alt="Card image cap">
                <div class="card-body w3ls-card">
                    <h4 class="card-title"><?php echo $news->title; ?></h4>
                    <p class="card-text mb-3 "><?php echo $string; ?></p>
                    <!-- <a href="#" data-toggle="modal" data-target="#myModal">Saiba mais</a> -->
                    <a href="<?php echo base_url() . 'news/article/' . $news->id; ?>" >Saiba mais</a>
                </div>
                <div class="card-footer">
                    <?php
                        // $datestring = 'Year: %Y Month: %m Day: %d - %h:%i %a';
                        $datestring = '%d-%m-%Y | %h:%i %a';
                        $time = time();
                        $date = mdate($datestring, $time);
                        ?>
                        <!-- <small class="text-muted"><?php echo $news->created_at; ?></small> -->
                        <small class="text-muted"><?php echo $date; ?></small>
                   </div>
            </div>
            <?php if ($counter % 3 === 0 && $counter !== 0) : ?>
                </div>
            <?php endif; ?>

            <?php if ($counter % 3 === 0) : ?>
                <div class="card-deck pt-4 mt-md-4">
            <?php endif; ?>

            <?php $counter++; ?>
            <?php endforeach; ?>
            </div>
        
        
        </div>
    </div>
</section>