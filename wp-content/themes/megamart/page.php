<?php
get_header(); ?>
<article class="post page">
    <div class="container"> 
        <div class="row">
            <div class="col-md-12">
                <?php if (have_posts()) :
                    while (have_posts()) : the_post(); ?>
              
                        <h1><?php the_title(); ?></h1>
                        <div><?php the_content(); ?></div>
                <?php
                    endwhile;
                else :
                    // If no content is found
                    echo 'No content found.';
                endif;?>
            </div>
        </div>
    </div>
</article>
<?php
get_footer();
?>
