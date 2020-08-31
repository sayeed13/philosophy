<article class="masonry__brick entry format-audio" data-aos="fade-up">

    <div class="entry__thumb">
        <a href="<?php the_permalink(); ?>" class="entry__thumb-link">
        <?php the_post_thumbnail('home-square') ?>
        </a>
        <div class="audio-wrap">
            <audio id="player" src="media/AirReview-Landmarks-02-ChasingCorporate.mp3" width="100%" height="42" controls="controls"></audio>
        </div>
    </div>

    <?php get_template_part('template/common/post') ?>

</article> <!-- end article -->