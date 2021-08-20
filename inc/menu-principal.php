<nav class="navbar navbar-expand-md navbar-dark bg-light">
            <div class="container">
                <a class="navbar-brand absolute" href="index.html">Projeto Educação</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05"
                    aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    <?php
                
                      echo wp_nav_menu(
                           array(
                               'theme_location'    => 'menu-top',
                               'container_class'         => 'collapse navbar-collapse navbar-light',
                               'container_id'      => 'navbarsExample05',
                               'items_wrap'        => '<ul class="navbar-nav mx-auto">%3$s</ul>',
                               'add_li_class'         => 'nav-item',
                               'link_class'       => 'nav-link',
                               'depth'             => 1,
                               'echo'              => false
                           )
                           );
                    ?>
                </div>
            </div>
        </nav>