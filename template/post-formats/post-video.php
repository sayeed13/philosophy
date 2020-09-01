<?php
$philosophy_post_video ='';
if(function_exists('the_field')){
    $philosophy_post_video = get_field('source_file');
}

?>

<article class="masonry__brick entry format-video" data-aos="fade-up">
                        
    <div class="entry__thumb video-image">
        <a href="<?php echo esc_url($philosophy_post_video); ?>?color=01aef0&title=0&byline=0&portrait=0" data-lity>
        <?php the_post_thumbnail('home-square') ?>
        </a>
    </div>

    <?php get_template_part('template/common/post') ?>

</article> <!-- end article -->