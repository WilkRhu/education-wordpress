<footer class="site-footer"
style="background-color: #042c44;">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-4">
                    <h3>Sobre</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi, accusantium optio unde
                        perferendis eum illum voluptatibus dolore tempora, consequatur minus asperiores temporibus
                        reprehenderit.</p>
                </div>
                <div class="col-md-6 ml-auto">
                    <div class="row">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                        <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'menu-rodape',
                                    'items_wrap' => '<ul class="list-unstyled">%3$s</ul>',
                                    )
                            );
                        ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> Todos os direitos reservados
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>

    </footer>
    <!-- END footer -->

    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#f4b214" /></svg></div>

    <script src="<?php bloginfo('template_url');?>/js/jquery-3.2.1.min.js"></script>
    <script src="<?php bloginfo('template_url');?>/js/jquery-migrate-3.0.0.js"></script>
    <script src="<?php bloginfo('template_url');?>/js/popper.min.js"></script>
    <script src="<?php bloginfo('template_url');?>/js/bootstrap.min.js"></script>
    <script src="<?php bloginfo('template_url');?>/js/owl.carousel.min.js"></script>
    <script src="<?php bloginfo('template_url');?>/js/jquery.waypoints.min.js"></script>
    <script src="<?php bloginfo('template_url');?>/js/jquery.stellar.min.js"></script>
    <script src="<?php bloginfo('template_url');?>/js/carousel.js"></script>
    <script src="<?php bloginfo('template_url');?>/js/animate.js"></script>


    <script src="<?php bloginfo('template_url');?>/js/main.js"></script>
</body>
<?php wp_footer();?>
</html>