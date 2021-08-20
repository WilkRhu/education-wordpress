<form action='<?php echo get_option(get_site_url()).'./wp-comments-post.php'?>' class="p-5 bg-light" method="post">
    <?php if(get_current_user_id()) { ?>
        <p>Autenticado como</p><a href="<?php echo get_option('./wp-admin/profile.php')?>"><?php echo $user_identity; ?></a> | <a href="<?php echo wp_logout_url( );?>">Sair</a>
        <?php } else { ?>
        <div class="form-group">
            <label for="name">Nome *</label>
            <input type="text" class="form-control" name="author" id="name" value="<?php echo $comment_author; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email *</label>
            <input type="email" class="form-control" name="email" id="email" value="<?php echo $comment_author_email; ?>" required>
        </div>

    <?php } ?>
    <div class="form-group">
        <label for="message">Comentário</label>
        <textarea name="comment" id="message" cols="30" rows="10" class="form-control" value="<?php echo $comment_author_comment; ?>"></textarea>
        </div>
        <div class="form-group">
        <input type="submit" value="Enviar Comentário" class="btn btn-primary">
    </div>
<?php comment_id_fields(); ?>
</form>