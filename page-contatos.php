<?php
/**
 * Pagina de contatos
 */

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
    <!-- END section -->


    <section class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <?php the_content()?>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

     <section class="overflow">
      <div class="container">
        <div class="row justify-content-center align-items-center">
          
          
          <div class="col-lg-7 order-lg-3 order-1 mb-lg-0 mb-5">
            <img src="<?php bloginfo('template_url')?>/images/person_testimonial_1.jpg" alt="Image placeholder" class="img-md-fluid">
          </div>
          <div class="col-lg-1 order-lg-2"></div>
          <div class="col-lg-4 order-lg-1 order-2 mb-lg-0 mb-5">
            <blockquote class="testimonial">
              &ldquo; Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt incidunt nihil ab cumque molestiae commodi. &rdquo;
            </blockquote>
            <p>&mdash; John Doe, Certified ReactJS Student</p>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->
</section>
    <?php endwhile; ?>
    <?php else: ?>
        Não á Posts Cadastrados
    <?php endif; ?>

<?php
    get_footer();
