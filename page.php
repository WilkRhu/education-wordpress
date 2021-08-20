<?php

get_header();
?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
<?php
     $thumb_id = get_post_thumbnail_id();
     $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
?>
    <section class="site-hero site-hero-innerpage overlay" data-stellar-background-ratio="0.5" style="background-image: url(<?php echo $thumb_url[0]; ?>);">
        <div class="container">
            <div class="row align-items-center site-hero-inner justify-content-center">
            <div class="col-md-8 text-center">

                <div class="mb-5 element-animate">
                <h1><?php the_title() ?></h1>
                </div>
            </div>
            </div>
        </div>
    </section>
    <section class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5">
            <?php the_content() ?>
        </div>
</div>
    </section>
    <?php endwhile; ?>
    <?php else: ?>
    Pagina não encontrada!
    <?php endif; ?>
<?php
get_footer();
?>
