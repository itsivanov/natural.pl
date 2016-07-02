<?php
/*
Template Name: O firmie
*/

    get_header();

    require('modules/model/flexible_content.php');

    $name_bottom = get_post_meta(get_the_ID(), 'name_bottom', true);
    $image_bottom = get_field_object('image_bottom');
    $title_bottom_1 = get_post_meta(get_the_ID(), 'title_bottom_1', true);
    $title_bottom_2 = get_post_meta(get_the_ID(), 'title_bottom_2', true);
    $description_bottom_1 = get_post_meta(get_the_ID(), 'description_bottom_1', true);
    $description_bottom_2 = get_post_meta(get_the_ID(), 'description_bottom_2', true);

    $block_1 = $title_bottom_1 .
               $description_bottom_1;

    $block_2 = $name_bottom .
               $image_bottom .
               $description_bottom_2;


      if(!empty($title_bottom_2 . $block_1 . $block_2)) : ?>
      <div class="entry-content">

          <div class="rubric-container firmia-s1">

              <div class="entry-thumbnail vertical-image">

                   <?php if(!empty($title_bottom_2)) : ?>
                     <h2 class="rubric-title-upp">
                        <?php echo $title_bottom_2; ?>
                     </h2>
                   <?php endif; ?>


                   <?php if(!empty($block_2)) : ?>
                     <div class="inwestors-unit">

                       <?php if(!empty($image_bottom)) : ?>
                         <img src="<?php echo $image_bottom['value']['url']; ?>" alt="<?php echo $image_bottom['value']['alt']; ?>" />
                       <?php endif; ?>

                        <?php if(!empty($name_bottom . $description_bottom_2)) : ?>
                        <p class="about-inwester">

                            <?php if(!empty($name_bottom)) : ?>
                            <span>
                                <?php echo $name_bottom; ?>
                            </span>
                            <?php endif; ?>

                            <?php if(!empty($description_bottom_2)) echo $description_bottom_2; ?>
                        </p>
                        <?php endif; ?>

                    </div>
                  <?php endif; ?>

               </div>
               <?php endif; ?>

              <?php if(!empty($block_1)) : ?>
              <div class="entry-wrapper-left">

                  <?php if(!empty($title_bottom_1)) : ?>
                    <h2 class="rubric-title-upp">
                        <?php echo $title_bottom_1; ?>
                    </h2>
                  <?php endif; ?>

                  <?php if(!empty($description_bottom_1)) : ?>
                    <p>
                        <?php echo $description_bottom_1; ?>
                    </p>
                  <?php endif; ?>

              </div>

          </div>

      </div>
      <?php endif;


get_footer();
?>
