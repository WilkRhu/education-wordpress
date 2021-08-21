<section class="site-hero overlay" data-stellar-background-ratio="0.5" style="background: url(<?php bloginfo('template_url');?>/images/pessoas-banner.png);background-repeat: no-repeat; background-size: cover; background-color: black;">
        <div class="container">
            <div class="row align-items-center site-hero-inner justify-content-center">
                <div class="col-md-8 text-center">

                    <div class="mb-5 element-animate">
                        <h1 style="font-size: 3em;">NUPRE</h1>
                        <p class="lead">Núcleo de Práticas Restaurativas na Escola.</p>
                        <!-- <p><a href="#" class="btn btn-primary">Saiba Mais</a></p> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="school-features d-flex"
        style="background-color: #042c44;">
        <div class="inner">
            <div class="media d-block feature">
                <div class="icon"><span class="flaticon-video-call"></span></div>
                <div class="media-body">
                    <h3 class="mt-0">Treinamentos Online</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora fuga suscipit numquam esse
                        saepe quam, eveniet iure assumenda dignissimos aliquam!</p>
                </div>
            </div>

            <div class="media d-block feature">
                <div class="icon"><span class="flaticon-student"></span></div>
                <div class="media-body">
                    <h3 class="mt-0">Treinamentos Para Professores</h3>
                    <p>Delectus fuga voluptatum minus amet, mollitia distinctio assumenda voluptate quas repellat eius
                        quisquam odio. Aliquam, laudantium, optio? Error velit, alias.</p>
                </div>
            </div>

            <div class="media d-block feature">
                <div class="icon"><span class="flaticon-video-player-1"></span></div>
                <div class="media-body">
                    <h3 class="mt-0">Vídeo Aulas</h3>
                    <p>Delectus fuga voluptatum minus amet, mollitia distinctio assumenda voluptate quas repellat eius
                        quisquam odio. Aliquam, laudantium, optio? Error velit, alias.</p>
                </div>
            </div>


            <div class="media d-block feature">
                <div class="icon"><span class="flaticon-audiobook"></span></div>
                <div class="media-body">
                    <h3 class="mt-0">Audio Book</h3>
                    <p>Harum, adipisci, aspernatur. Vero repudiandae quos ab debitis, fugiat culpa obcaecati,
                        voluptatibus ad distinctio cum soluta fugit sed animi eaque?</p>
                </div>
            </div>
        </div>
    </section>

<section class="site-sectionf wow pulse" style="margin-bottom: 10px; margin-top: 20px;">
        <div class="container">
            <div class="row justify-content-center mb-5" style="margin: 0; padding:0;">
                <div class="col-md-7 text-center" id="title-modified">
                    Postagens Recentes
                </div>
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner row w-100 mx-auto">
                    <?php
                     query_posts('category_name=principal');
                        if(have_posts()) : $postCount = 0; while(have_posts()) : $postCount++; the_post();
                        
                
                    ?>
                        <div class="carousel-item col-md-4 
                        <?php
                            if($postCount == 1) {
                                echo 'active';
                            } else {
                                echo '';
                            }
                        ?>
                        ">
                            <div class="card card-custom bg-white border-white border-0">
                            <?php
                                $thumb_id = get_post_thumbnail_id();
                                $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
                                echo 
                                "
                                <div class='card-custom-img' style='background-image: url($thumb_url[0]);'>
                                </div>
                                "
                            ?>
                                <div class="card-body" style="overflow-y: auto">
                                    <h4 class="card-title"><?php the_title(); ?></h4>
                                    <p class="card-text"><?php new_length_excerpt(the_excerpt()); ?></p>
                                        <?php
                                            $postId = get_the_id(); 
                                            $data = get_postdata($postId);  
                                            $datePost = new DateTime($data['Date']);
                                            echo '<div id="meta"> Postado em: '. $datePost->format("d M Y"). '</div>';
                                        ?>
                                </div>
                                <div class="card-footer" style="background: inherit; border-color: inherit;">
                                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">Ver Mais</a>
                                </div>
                            </div>
                        </div>
                        <?php
                        endwhile;
                        else:
                            ?>
                            <p>Nenhum Post Encontrado!</p>

                        <?php
                        endif;
                        ?>
                    <?php wp_reset_query(); ?>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-12 text-center mt-4">
                                <a class="btn btn-outline-secondary mx-1 prev" href="javascript:void(0)"
                                    title="Previous">
                                    <i class="fa fa-lg fa-chevron-left"></i>
                                </a>
                                <a class="btn btn-outline-secondary mx-1 next" href="javascript:void(0)" title="Next">
                                    <i class="fa fa-lg fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


        </div>
    </section>

     <!-- END section -->
     <section class="projeto" style="background-color: #042c44; color: white">
        <div class="container  py-5">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-7 order-lg-3 order-1 mb-lg-0 mb-5 wow slideInRight">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate eius vel similique? Modi debitis nulla ullam, accusantium, maiores fuga iste architecto dolor eum suscipit fugiat beatae rem fugit dignissimos dolorum?
                        Ipsum dolores aperiam minus voluptate ducimus eveniet incidunt officiis soluta ipsa reprehenderit repellendus magni at amet praesentium unde, dignissimos cumque, suscipit autem animi, ea ullam adipisci est recusandae sequi! Distinctio.
                    </p>
                </div>
                <div class="col-lg-1 order-lg-2"></div>
                <div class="col-lg-4 order-lg-1 order-2 mb-lg-0 mb-5 wow slideInLeft">
                    <h1 class="titleProjeto" style="color: white;">O Projeto</h1>
                </div>
            </div>
            <div class="row wow slideInUp">
            <?php query_posts('category_name=Projeto&showposts=3'); ?>
            <?php if(have_posts()): while(have_posts()): the_post(); ?>
                <div class="col-md-4 col-sm-6">
                    <div class="box">
                    <?php
                        $thumb_id = get_post_thumbnail_id();
                        $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
                        echo 
                        "
                        <img src='$thumb_url[0]' alt='crianças felizes' height='100%'>
                        "
                    ?>
                        <div class="box-content">
                            <div class="inner-content">
                                <h3 class="title"><?php the_title()?></h3>
                                <span class="post"><?php the_excerpt()?></span>
                                <ul class="icon">
                                    <li><a href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                    <?php endwhile; ?>
                    <?php else: ?>
                        Não Consta posts nessa categoria
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>
            </div>
            <div class="row wow fadeInDown">
                <div class="col-md-12">
                    <div class="col-md-4 space"> </div>
                    <div class="col-md-4 space">
                        <a href="<?php $siteUrl = get_site_url(); echo $siteUrl . '/?page_id=47'?>" class="btn btn-primary">Saiba Mais</a>
                    </div>
                    <div class="col-md-4 space"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- END section -->

    <section class="row video">
        <div class="container">
            <div class="col-md-12 text-center" style="height: 80px; text-align: center;" id="title-modified">
                Nossos Vídeos
            </div>
            <div class="row">
                <div class="col-md-6 ">
                    <div class="card">
                        <div class="card-image">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/kE6MlnwML8Y"
                                    frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="card">
                        <div class="card-image">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/SC1XE85BC9o"
                                    frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row wow fadeInDown">
                <div class="col-md-12">
                    <div class="col-md-4 space"> </div>
                    <div class="col-md-4 space">
                        <a href="#" class="btn btn-primary">Mais Vídeos</a>
                    </div>
                    <div class="col-md-4 space"></div>
                </div>
            </div>
        </div>
    </section>