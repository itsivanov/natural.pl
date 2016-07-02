    <?php
        $title = get_post_meta(get_the_ID(), 'title', true);
        $content = get_post_meta(get_the_ID(), 'content', true);
        $recipes = get_field_object('recipes');
        $skladniki = get_field_object('składniki');
        $main_image = get_field_object('main_image');
        $description = get_post_meta(get_the_ID(), 'description', true);
        $title_skladniki = get_post_meta(get_the_ID(), 'title_składniki', true);
        $characteristics = get_field_object('characteristics');


    if(!empty($title)) : ?>
        <p class="rubric-title-upp"><?php echo $title; ?></p>
    <?php endif; ?>

    <?php if(!empty($description)) : ?>
        <p class="single-post-title"><?php echo $description; ?></p>
    <?php endif; ?>

    <div class="rubric-container single-containter">

       <div class="single-container_left">

          <?php if(!empty($main_image['value']['url'])) : ?>
              <img src="<?php echo $main_image['value']['url']; ?>"
                   alt="<?php echo $main_image['value']['alt']; ?>" />
          <?php endif; ?>

          <?php if(!empty($content)) : ?>
              <p>
                  <?php echo $content; ?>
              </p>
          <?php endif; ?>

          <?php if(!empty($title_skladniki)) : ?>
              <span class="features-title">
                  <?php echo $title_skladniki; ?>
              </span>
          <?php endif; ?>

          <?php if(!empty($skladniki['value'][0]['items'])) : ?>
              <ul class="list-features">
                <?php foreach($skladniki['value'] as $items) : ?>
                    <li>— <?php echo $items['items']; ?></li>
                <?php endforeach; ?>
              </ul>
          <?php endif; ?>

       </div>

     <div class="single-container_right">

       <?php if(!empty($characteristics['value'][0]['characteristics'])) : ?>
           <div class="single-characteristics">

               <?php for($i = 0; $i < count($characteristics['value']) - 1; $i ++) : ?>
                 <div class="single-characteristics_unit">
                   <span class="post-icon<?php echo $i + 1; ?>"></span>
                   <?php echo $characteristics['value'][$i]['characteristics']; ?>
                 </div>
               <?php endfor; ?>

               <button class="single-characteristics_unit">
                  <span class="post-icon4"></span>
                  <?php echo $characteristics['value'][count($characteristics['value']) - 1]['characteristics']; ?>
               </button>

           </div>
       <?php endif; ?>

       <?php if(!empty($recipes['value'][0]['recipe'])) : ?>
       <div class="single-description">

         <?php for($n = 0; $n < count($recipes['value']); $n++) : ?>

              <div class="single-description_unit">
                 <img src="<?php echo $recipes['value'][$n]['image']['url']; ?>"
                      alt="<?php echo $recipes['value'][$n]['image']['alt']; ?>" />
                 <div class="single-description_text">
                     <p class="single-description_number"><?php echo $n + 1; ?></p>
                     <p><?php echo $recipes['value'][$n]['recipe']; ?></p>
                 </div>
              </div>

         <?php endfor; ?>

       </div>
       <?php endif; ?>

    </div>


    <!-- < Block for single category Zywnosc -->
    <?php
    require_once('modules/model/block_for_single_zywnosc.php');
    przepizy();
    powiazaneSetykyly();
    ?>
    <!-- > -->
