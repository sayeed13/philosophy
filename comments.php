<div class="comments-wrap">

            <div id="comments" class="row">
                <div class="col-full">

                    <h3 class="h2">
                      <?php
                        $philosophy_cmnt_number = get_comments_number();
                        if($philosophy_cmnt_number<=1){
                          echo $philosophy_cmnt_number." ".__('Comments','philosophy');
                        }else {
                          echo $philosophy_cmnt_number." ".__('Comments','philosophy');
                        }
                      ?>
                    </h3>

                    <!-- commentlist -->
                    <ol class="commentlist">
                      <?php
                        wp_list_comments();
                      ?>
                    </ol> <!-- end commentlist -->


                    <!-- respond
                    ================================================== -->
                    <div class="respond">

                        <h3 class="h2">
                        <?php echo __('Add Comment','philosophy'); ?>
                        </h3>

                        <?php comment_form(); ?>

                    </div> <!-- end respond -->

                </div> <!-- end col-full -->

            </div> <!-- end row comments -->
        </div> <!-- end comments-wrap -->