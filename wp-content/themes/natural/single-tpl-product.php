<?php
      $image = get_field_object('image');
      $table = get_field_object('table');
      $great_video = get_post_meta(get_the_ID(), 'great_video', true);
      $products = get_field_object('products');
      $left_block = get_post_meta(get_the_ID(), 'left_block', true);
      $title_right_block = get_post_meta(get_the_ID(), 'title_right_block', true);
      $text_before_filling = get_post_meta(get_the_ID(), 'text_before_filling', true);
      $description_right_block = get_post_meta(get_the_ID(), 'description_right_block', true);
?>

      <p class="rubric-title-upp">
          <?php echo the_title(); ?>
      </p>

      <?php if(!empty($great_video)) : ?>
      <div class="video">
          <?php echo $great_video; ?>
      </div>
      <?php endif; ?>

      <?php if(!empty($left_block)) : ?>
      <div class="single-container_block">
        <?php echo $left_block; ?>
      </div>
      <?php endif; ?>

      <div class="single-container_block">

          <?php if(!empty($title_right_block . $description_right_block)) : ?>
          <div class="single-container-text">

              <?php if(!empty($title_right_block)) : ?>
              <p><span><?php echo $title_right_block; ?></span></p>
              <?php endif; ?>

              <?php if(!empty($description_right_block)) echo $description_right_block; ?>
          </div>
          <?php endif; ?>

          <?php if(!empty($table['value'][0]['row'][0]['column_1'])) : ?>
          <table class="single-table" cellspacing="0">

              <thead>
                  <tr>
                       <td class="cell-1"><?php echo $table['value'][0]['row'][0]['column_1']; ?></td>
                       <td class="cell-2"><?php echo $table['value'][0]['row'][0]['column_2']; ?></td>
                       <td class="cell-3"><?php echo $table['value'][0]['row'][0]['column_3']; ?></td>
                  </tr>
              </thead>

              <tbody>

                <?php for($i = 1; $i < count($table['value']); $i++) : ?>

                    <?php for($n = 0; $n < count($table['value'][$i]['row']); $n++) : ?>

                        <?php
                        $last_cell = (($n == count($table['value'][$i]['row']) - 1)) ? 'class="last-cell"' : '';
                        ?>

                        <tr <?php echo $last_cell; ?>>
                             <td class="cell-1">
                                <?php echo $table['value'][$i]['row'][$n]['column_1']; ?>
                             </td>
                             <td class="cell-2">
                                <?php echo $table['value'][$i]['row'][$n]['column_2']; ?>
                             </td>
                             <td class="cell-3">
                                <?php echo $table['value'][$i]['row'][$n]['column_3']; ?>
                             </td>
                        </tr>

                    <?php endfor; ?>

                <?php endfor; ?>


              </tbody>
          </table>
          <?php endif; ?>

          <?php if(!empty($image['value']['url'])) : ?>
          <img src="<?php echo $image['value']['url']; ?>" alt="<?php echo $image['value']['alt']; ?>" />
          <?php endif; ?>

      </div>

      <?php if(!empty($text_before_filling)) : ?>
      <div class="text_before_product">
          <?php echo $text_before_filling; ?>
      </div>
      <?php endif; ?>

      <?php if(!empty($products['value'][0]['image']['url'])) : ?>
      <div class="products">

          <?php foreach($products['value'] as $items) : ?>

              <div class="products_unit">
                  <div class="img_product">
                      <img src="<?php echo $items['image']['url']; ?>">
                  </div>
                  <div class="info_product">
                      <p class="info_product--title"><?php echo $items['title']; ?></p>
                      <p class="info_product--rubric"><?php echo get_the_title(); ?></p>
                      <p class="info_product--description"><?php echo $items['description']; ?></p>
                      <p class="info_product--btn">
                          <a href="<?php echo $items['link_cart'] ?>" class="info_product--cart">Dodaj do koszyka</a>
                          <a href="<?php echo $items['link_compare'] ?>" class="info_product--compare">Porównaj</a>
                      </p>
                  </div>
              </div>

           <?php endforeach;  ?>

       </div>
       <?php endif; ?>
