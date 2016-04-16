<?php
function edin_post_noLinkThumbnail() {
    if ( post_password_required() || is_attachment() || ! has_post_thumbnail() || has_post_format() ) {
        return;
    }
?>

    <div class="post-thumbnail">
        <?php
            if ( is_page_template( 'page-templates/front-page.php' ) || is_page_template( 'page-templates/grid-page.php' ) ) {
                $ratio = get_theme_mod( 'edin_thumbnail_style' );
                switch ( $ratio ) {
                    case 'square':
                        the_post_thumbnail( 'edin-thumbnail-square' );
                        break;
                    default :
                        the_post_thumbnail( 'edin-thumbnail-landscape' );
                }
            } else {
                the_post_thumbnail( 'edin-featured-image' );
            }
        ?>
    </div>

<?php
}
?>
