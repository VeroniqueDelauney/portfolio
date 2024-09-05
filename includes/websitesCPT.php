<?php
    $args = array(
        'post_status' => 'publish', 
        'posts_per_page' => '-1',
        'post_type' => 'website',
        'orderby' => 'rand'
    );
    $my_query = new WP_Query($args);
?>

<div class="webPreviews">
    <!-- Slides -->
    <?php
    if( $my_query->have_posts() ) : while( $my_query->have_posts() ) : $my_query->the_post();
    ?>    
    <div class="block">
        <!-- Scrollable element -->
        <div class="scroll" >
            <img src="<?php echo get_field("image")["sizes"]["large"]; ?>" alt="<?php echo get_field("nom"); ?>" title="<?php echo get_field("nom"); ?>" id="nageEquilibre" />
        </div>
        <div class="blockContent">
            <!-- Phone shape -->
            <div class="phone">
                <img src="<?php echo get_field("telephone")["sizes"]["medium"]; ?>" alt="<?php echo get_field("nom"); ?>" title="<?php echo get_field("nom"); ?>" />
            </div>
        </div>
        <!-- Number and title -->	
        <div class="bottom">
            <div class="number"><?php echo "0" . get_field("numero") . "."; ?></div>
            <div class="title"><?php echo get_field("nom"); ?></div>
            <div class="links">
                <!-- Link to website -->
                 <?php
                if(!empty(get_field("git"))) {
                ?>
                <a href="<?php echo get_field("git"); ?>" title="Voir le site web" alt="Voir le site web" target="_blank">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/icon_git.png'; ?> " alt="Github" title="Github" />
                </a>
                <?php
                }
                if(!empty(get_field("lien"))) {
                ?>
                <!-- Link to Github -->
                <a href="<?php echo get_field("lien"); ?>" title="Voir le site web" alt="Voir le site web" class="spaced" target="_blank">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/icon_web.png'; ?> " alt="Site web" title="Site web" />
                </a>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    endwhile;
    wp_reset_postdata();
    endif;
    ?>
</div>