<?php
/*
Single Post Template: [Tema Educacional]
Description:
*/
    get_header();
?>
    <!-- END header -->
    <?php if(have_posts()): while(have_posts()): the_post(); ?>
    <?php
        $thumb_id = get_post_thumbnail_id();
        $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
      
    ?>
    <section class="site-hero site-hero-innerpage overlay" data-stellar-background-ratio="0.5" 
        style="background: url('<?php echo $thumb_url[0]; ?>'); background-repeat: no-repeat; background-size: cover;" >
      <div class="container">
        <div class="row align-items-center site-hero-inner justify-content-center">
          <div class="col-md-8 text-center">
            <div class="mb-5 element-animate">
              <h1 class="mb-3"><?php the_title()?></h1>
              <p class="post-meta">
                <?php
                   $postId = get_the_id(); 
                   $data = get_postdata($postId);  
                   $datePost = new DateTime($data['Date'])
                ?>
                <?php echo $datePost->format('M')?> <?php echo $datePost->format('d') ?>, <?php echo $datePost->format('Y') ?> &bull; Postado por <?php the_author() ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->


    <section class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-8 blog-content">
            <p class="lead">
                <?php the_content( )?>
            </p>
            <div class="pt-5">
              <h3 class="mb-5"><?php comments_number($post_id); ?></h3>
              <ul class="comment-list">
                <?php 
                $comment_array = get_approved_comments($post->ID) ;
                  foreach($comment_array as $comments) {
                ?>
                <li class="comment">
                  <div class="vcard bio">
                    <img src="<?php echo get_avatar_url($comments->comment_author_email); ?>" alt="Image placeholder" />
                  </div>
                  <div class="comment-body">
                    <h3><?php echo $comments->comment_author; ?></h3>
                    <div class="meta"><?php echo $comments->comment_date; ?></div>
                    <p><?php echo $comments->comment_content; ?></p>
                  </div>
                </li>
                <?php } ?>
              </ul>
              <!-- END comment-list -->
              
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Escreva um comentário</h3>
                <?php comments_template( )?>
              </div>
            </div>

          </div>
          <div class="col-md-4 sidebar">
            <div class="sidebar-box">
              <form action="#" class="search-form">
                <div class="form-group">
                  <span class="icon fa fa-search"></span>
                  <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                </div>
              </form>
            </div>
            <div class="sidebar-box">
              <div class="categories">
                <h3>Categories</h3>
                <?php
                  $categories = get_categories();
                  $i = 0;
                  foreach($categories as $category) {
                    $i++;
                    echo "<li><a href=".get_category_link($category->term_id)."> $category->name <span>($category->category_count)</span></a></li>";
                  }
                ?>               
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php endwhile; ?>
    <?php else: ?>
        Não á Posts Cadastrados
    <?php endif; ?>

<?php
    get_footer();
