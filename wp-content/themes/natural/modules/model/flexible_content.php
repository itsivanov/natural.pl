<?php
$fields = get_fields();
$fields = $fields['content'];
?>

<div class="entry-content">
<?php for ($i = 0; $i < count($fields); $i++) : ?>


      <!-- Field - title_content_image -->
      <?php if($fields[$i]['acf_fc_layout'] == 'title_content_image') : ?>

            <?php $addClass = (!empty($fields[$i]['content'])) ? 'container-wrapp' : ''; ?>

            <div class="rubric-container <?php echo $addClass; ?>">

                <?php if(!empty($fields[$i]['image'])) :

                  $class_image = ($fields[$i]['image']['width'] >
                                        $fields[$i]['image']['height'] ?
                                        'horizontal' : 'vertical'); ?>

                  <div class="entry-thumbnail <?php echo $class_image; ?>-image">
                      <img src="<?php echo $fields[$i]['image']['url']; ?>" alt="<?php echo $fields[$i]['image']['alt']; ?>" />

                      <?php if(!empty($fields[$i]['image_description'])) : ?>
                      <p class="omega-post-title">
                          <?php echo $fields[$i]['image_description']; ?>
                      </p>
                      <?php endif; ?>

                  </div>
                <?php endif; ?>

                <?php //if(!empty($fields[$i]['title'] . $fields[$i]['content'])) : ?>
                <div class="entry-wrapper-left">

                    <?php if(!empty($fields[$i]['title'])) : ?>
                      <h2 class="rubric-title-upp">
                        <?php echo $fields[$i]['title']; ?>
                      </h2>
                    <?php endif; ?>

                    <?php if(!empty($fields[$i]['content'])) echo $fields[$i]['content']; ?>

                </div>
                <?php // endif; ?>

            </div>


        <!-- Field - title_content_quote -->
        <?php elseif($fields[$i]['acf_fc_layout'] == 'title_content_quote') : ?>

                  <div class="rubric-container container-wrapp">

                      <?php if(!empty($fields[$i]['quote'])) : ?>
                      <div class="entry-thumbnail vertical-image">
                          <div class="quote-container">
                              <div class="quote-container-line"></div>
                              <p class="quote-text">
                                  <?php echo $fields[$i]['quote']; ?>
                              </p>
                              <div class="quote-container-line"></div>
                          </div>
                      </div>
                      <?php endif; ?>

                      <?php if(!empty($fields[$i]['title'])) : ?>
                      <div class="entry-wrapper-left">

                          <?php if(!empty($fields[$i]['title'])) : ?>
                            <h2 class="rubric-title-upp">
                              <?php echo $fields[$i]['title']; ?>
                            </h2>
                          <?php endif; ?>

                          <?php if(!empty($fields[$i]['content'])) echo $fields[$i]['content']; ?>

                      </div>
                      <?php endif; ?>

                  </div>


      <!-- Field - gellery_documentation -->
      <?php elseif($fields[$i]['acf_fc_layout'] == 'gellery_documentation') : ?>

            <?php if(!empty($fields[$i]['gallery'][0]['url'])) : ?>

              <?php for ($n = 0; $n < count($fields[$i]['gallery']) ; $n++) : ?>
              <div class="rubric-container">
                    <img class="nagrody-picture" src="<?php echo $fields[$i]['gallery'][$n]['url']; ?>"
                    alt="<?php echo $fields[$i]['gallery'][$n]['alt']; ?>" />
              </div>
              <?php endfor; ?>

            <?php endif; ?>


      <!-- Field - title_and_video -->
      <?php elseif($fields[$i]['acf_fc_layout'] == 'title_and_video') : ?>

            <?php if(!empty($fields[$i]['title'])) : ?>
            <div class="video-content">

                <?php if(!empty($fields[$i]['title'])) : ?>
                  <h3 class="rubric-title"><?php echo $fields[$i]['title']; ?></h3>
                <?php endif; ?>

                <?php if(!empty($fields[$i]['video'])) echo $fields[$i]['video']; ?>
            </div>
            <?php endif; ?>


      <!-- Field - title_content_block -->
      <?php elseif($fields[$i]['acf_fc_layout'] == 'title_content_block') : ?>

          <?php if(!empty($fields[$i]['title'])) : ?>
          <div class="rubric-container unit-text--wrap">

              <?php if(!empty($fields[$i]['title'])) : ?>
              <h2 class="rubric-title-upp">
                  <?php echo $fields[$i]['title']; ?>
              </h2>
              <?php endif; ?>

              <?php if(!empty($fields[$i]['content']))
              {
                  echo $fields[$i]['content'];
              }
              ?>

          </div>
          <?php endif; ?>


      <!-- Field - gellery_with_preview -->
      <?php elseif($fields[$i]['acf_fc_layout'] == 'gellery_with_preview') : ?>

            <?php if(!empty($fields[$i]['galerry'][0]['url'])) : ?>
            <div class="certyfikat-gallery">

                 <?php for($m = 0; $m < count($fields[$i]['galerry']); $m++) : ?>

                     <a rel="example_group" href="<?php echo $fields[$i]['galerry'][$m]['url']; ?>">
                         <img src="<?php echo $fields[$i]['galerry'][$m]['url']; ?>" alt="" />
                     </a>

                 <?php endfor; ?>

            </div>
            <?php endif; ?>


      <!-- Field - title_content_table -->
      <?php elseif($fields[$i]['acf_fc_layout'] == 'title_content_table') : ?>

            <?php if(!empty($fields[$i]['title_content_table'][0]['content'])) : ?>
            <div class="rubric-container table-unit--wrap">

                <?php for($k = 0; $k < count($fields[$i]['title_content_table']); $k++) : ?>

                  <div class="rubric-container_block">
                         <h3 class="rubric-title">
                             <?php echo $fields[$i]['title_content_table'][$k]['title']; ?>
                         </h3>
                         <?php echo $fields[$i]['title_content_table'][$k]['content']; ?>
                   </div>

                <?php endfor; ?>

            </div>
            <?php endif; ?>


      <!-- Field - gallery -->
      <?php elseif($fields[$i]['acf_fc_layout'] == 'gallery') : ?>

            <?php if(!empty($fields[$i]['gallery'][0]['url'])) : ?>
                <div class="rubric-container opinie-s2">
                    <?php for($v = 0; $v < count($fields[$i]['gallery']); $v++) : ?>
                        <img src="<?php echo $fields[$i]['gallery'][$v]['url']; ?>" alt="" />
                    <?php endfor; ?>
                </div>
            <?php endif; ?>


      <!-- Field - accordion -->
      <?php elseif($fields[$i]['acf_fc_layout'] == 'accordion') : ?>

            <div class="accordion_content_wrap faq-wrap">

              <?php if(!empty($fields[$i]['title'])) : ?>
                 <h2 class="accordion_content-title">
                    <?php echo $fields[$i]['title']; ?>

                    <?php if(!empty($fields[$i]['description'])) : ?>
                        <span><?php echo $fields[$i]['description']; ?></span>
                    <?php endif; ?>

                 </h2>
              <?php endif; ?>

               <?php if(!empty($fields[$i]['accordion'][0]['title'])) : ?>
               <div class="accordion_content">

                  <?php
                  $num = 1;
                  foreach($fields[$i]['accordion'] as $item) : ?>
                  <div class="accordion_set">
                      <span class="">

                          <?php if($fields[$i]['icon'] == 'icon') : ?>
                              <span class="accordion_set-number" style="height: 75px; line-height: 39.8px;">
                                  <img src="/wp-content/themes/natural/images/plu.png" class="img-bar">
                              </span>
                          <?php else : ?>
                              <span class="accordion_set-number num-num"><?php echo $num; ?>.</span>
                          <?php endif; ?>

                          <span class="accord-title"><?php echo $item['title']; ?></span>
                      </span>
                      <div class="content" style="overflow: hidden; display: none;">
                        <p><?php echo $item['description']; ?></p>
                      </div>
                  </div>
                  <?php $num++; endforeach; ?>

               </div>
               <?php endif; ?>

              </div>


      <!-- Field - dokumenty_witd_download -->
      <?php elseif($fields[$i]['acf_fc_layout'] == 'dokumenty_witd_download') : ?>

              <?php if(!empty($fields[$i]['dokumenty_witd_download'][0]['name_link'])) : ?>
              <div class="regulamin_links regulam">

                    <?php foreach($fields[$i]['dokumenty_witd_download'] as $items) : ?>

                      <?php if(!empty($items['title'])) : ?>
                          <h3 class="rubric-subtitle">
                              <?php echo $items['title']; ?>

                              <?php if(!empty($items['title'])) : ?>
                              <span>
                                    <?php echo $items['description']; ?>
                              </span>
                              <?php endif; ?>

                          </h3>
                      <?php endif; ?>

                      <?php if(!empty($items['name_link'])) : ?>
                      <a class="download" href="<?php echo $items['url']; ?>" target="_blank">
                        <span class="link-icon"></span>
                        <span><?php echo $items['name_link']; ?></span>
                      </a>
                      <?php endif; ?>

                    <?php endforeach; ?>

              </div>
            <?php endif; ?>


      <!-- Field - images_of_the_entire_width -->
      <?php elseif($fields[$i]['acf_fc_layout'] == 'images_of_the_entire_width') : ?>

            <?php if(!empty($fields)) : ?>
              <div class="rubric-container main-banner">
                  <img src="<?php echo $fields[$i]['image']['url']; ?>"
                  alt="<?php echo $fields[$i]['image']['alt']; ?>" />
              </div>
            <?php endif; ?>


      <!-- Field - nasza_misja -->
      <?php elseif($fields[$i]['acf_fc_layout'] == 'nasza_misja') : ?>

            <div class="rubric-container main_quote-container">

                  <?php if(!empty($fields[$i]['title'])) : ?>
                    <h3 class="section_block--title">
                        <?php echo $fields[$i]['title']; ?>
                    </h3>
                  <?php endif; ?>

              </div>


        <!-- Field - ceo -->
        <?php elseif($fields[$i]['acf_fc_layout'] == 'ceo') : ?>

              <?php if(!empty($fields[$i]['name'])) : ?>
              <div class="quote-said-content">
                  <?php if(!empty($fields[$i]['photo']['url'])) : ?>
                    <div class="quote-said-image">
                        <img src="<?php echo $fields[$i]['photo']['url']; ?>"
                        alt="<?php echo $fields[$i]['photo']['alt']; ?>" />
                    </div>
                  <?php endif; ?>

                  <?php if(!empty($fields[$i]['name'])) : ?>
                    <p class="name"><?php echo $fields[$i]['name']; ?></p>
                  <?php endif; ?>

                  <?php if(!empty($fields[$i]['position'])) : ?>
                    <p class="post"><?php echo $fields[$i]['position']; ?></p>
                  <?php endif; ?>
              </div>
              <?php endif; ?>


        <!-- Field - quote -->
      <?php elseif($fields[$i]['acf_fc_layout'] == 'quote') : ?>

              <div class="rubric-container zaufali-s2">
                 <div class="quote-container quote-cont">
                    <div class="quote-container-line quote-line-open"></div>
                        <p class="quote-text">
                          <?php echo $fields[$i]['quote']; ?>
                        </p>
                    <div class="quote-container-line quote-line-close"></div>
                 </div>
              </div>


        <!-- Field - nasi_klienci_o_nas -->
        <?php elseif($fields[$i]['acf_fc_layout'] == 'nasi_klienci_o_nas') : ?>

                <div class="rubric-container">

                    <?php if(!empty($fields[$i]['title'])) : ?>
                      <h3 class="section_block--title">
                          <a href="/opinie-klientow">
                              <?php echo $fields[$i]['title']; ?>
                          </a>
                      </h3>
                    <?php endif; ?>

                    <?php if(!empty($fields[$i]['comments'][0]['name'])) : ?>
                    <div class="main-reviews-wrap">
                        <div class="reviews--unit">

                            <img class="reviews-photo" src="<?php echo $fields[$i]['comments'][0]['photo']['url']; ?>" alt="" />
                            <div class="reviews-content">
                                <p class="reviews-name"><?php echo $fields[$i]['comments'][0]['name']; ?></p>
                                <?php echo $fields[$i]['comments'][0]['comment']; ?>
                            </div>
                        </div>
                        <div class="reviews--unit-bg">

                            <img class="reviews-photo" src="<?php echo $fields[$i]['comments'][1]['photo']['url']; ?>" alt="" />
                            <div class="reviews-content">
                                <p class="reviews-name"><?php echo $fields[$i]['comments'][1]['name']; ?></p>
                                <?php echo $fields[$i]['comments'][1]['comment']; ?>
                            </div>

                            <?php if(!empty($fields[$i]['honors'][0]['url'])) : ?>
                            <div class="honor-content">

                                <?php for($p = 0; $p < count($fields[$i]['honors']); $p++) : ?>
                                  <img src="<?php echo $fields[$i]['honors'][$p]['url']; ?>" alt="" />
                                <?php endfor; ?>

                                <?php if(!empty($fields[$i]['link'])) : ?>
                                  <a class="read-more" href="<?php echo $fields[$i]['url']; ?>">
                                      <?php echo $fields[$i]['link']; ?>
                                  </a>
                                <?php endif; ?>

                            </div>
                            <?php endif; ?>

                        </div>
                    </div>
                    <?php endif; ?>

                </div>


        <!-- Field - carusel -->
        <?php elseif($fields[$i]['acf_fc_layout'] == 'carusel') : ?>

                <div class="rubric-container home-s4">

                    <?php if(!empty($fields[$i]['title'])) : ?>
                      <h3 class="section_block--title">
                          <?php echo $fields[$i]['title']; ?>
                      </h3>
                    <?php endif; ?>

                    <?php if(!empty($fields[$i]['sliders'][0]['image']['url'])) : ?>

                        <div class="carousell-wrapper">
                            <div class="owl-carousel">

                                <?php foreach ($fields[$i]['sliders'] as $items) : ?>

                                    <div class="certificates-unit">

                                        <?php $addClass = (empty($items['title'])) ? 'certificates-not_title' : ''; ?>
                                        <p class="certificates-title <?php echo $addClass; ?>">
                                           <?php echo $items['title']; ?>
                                        </p>

                                        <div class="certificates-image">
                                          <img src="<?php echo $items['image']['url']; ?>" alt="" />
                                        </div>

                                    </div>
                                <?php endforeach; ?>

                            </div>
                        </div>

                    <?php endif; ?>

                </div>


        <!-- Field - title_content_image_image_description_the_picture_before_the_text -->
        <?php elseif($fields[$i]['acf_fc_layout'] ==
        'title_content_image_image_description_the_picture_before_the_text') : ?>

                <div class="rubric-container zaufali-s1">

                    <?php if(!empty($fields[$i]['image']['url'])) : ?>
                      <div class="entry-thumbnail horizontal-image horizontal-img-bg">
                          <img src="<?php echo $fields[$i]['image']['url']; ?>"
                          alt="<?php echo $fields[$i]['image']['alt']; ?>" />
                      </div>
                    <?php endif; ?>

                    <?php if(!empty($fields[$i]['title'])) : ?>
                    <div class="entry-wrap-left entry-wrapper-left">

                        <?php if(!empty($fields[$i]['title'])) : ?>
                          <h2 class="rubric-title-upp">
                              <?php echo $fields[$i]['title']; ?>
                          </h2>
                        <?php endif; ?>

                        <?php if(!empty($fields[$i]['content'])) echo $fields[$i]['content']; ?>

                    </div>
                    <?php endif; ?>

                </div>


          <!-- Field - ambasadorzy -->
          <?php elseif($fields[$i]['acf_fc_layout'] == 'ambasadorzy') : ?>


                <?php if(!empty($fields[$i]['ambasadorzy'][0]['quote'])) : ?>

                  <?php for($d = 0; $d < count($fields[$i]['ambasadorzy']); $d++) : ?>

                      <?php
                      $position_photo = strtolower($fields[$i]['ambasadorzy'][$d]['position_photo']);
                      $position_class = ($position_photo == 'right') ? 'cont-position' : 'cont-posit-right';
                      $PP = ($position_photo == 'right') ? '' : 'zaufali-s3';
                      ?>

                      <div class="rubric-container zaufali-s2 <?php echo $PP; ?>">
                         <div class="quote-container quote-cont">
                            <div class="quote-container-line quote-line-open"></div>

                                <?php echo $fields[$i]['ambasadorzy'][$d]['quote']; ?>

                            <div class="quote-container-line quote-line-close"></div>
                         </div>
                      </div>

                      <div class="rubric-container <?php echo $position_class; ?>">
                          <div class="entry-thumbnail horizontal-image">
                              <img src="<?php echo $fields[$i]['ambasadorzy'][$d]['photo']['url']; ?>" alt="" />
                          </div>
                          <div class="entry-wrap-left entry-wrapper-left">
                              <h3 class="rubric-title">
                                  <?php echo $fields[$i]['ambasadorzy'][$d]['title']; ?>
                              </h3>

                                  <?php echo $fields[$i]['ambasadorzy'][$d]['description']; ?>

                          </div>
                      </div>

                      <div class="rubric-container zaufali-s4">
                          <?php echo $fields[$i]['ambasadorzy'][$d]['video']; ?>
                      </div>

                  <?php endfor; ?>

                <?php endif; ?>


          <!-- Field - inwestorzy -->
          <?php elseif($fields[$i]['acf_fc_layout'] == 'inwestorzy') : ?>

                <?php if(!empty($fields[$i]['inwestorzy'][0]['name'])) : ?>
                <div class="inwestors-content">

                  <?php for($x = 0; $x < count($fields[$i]['inwestorzy']); $x++) : ?>
                      <div class="inwestors-unit">
                          <img src="<?php echo $fields[$i]['inwestorzy'][$x]['image']['url']; ?>" alt="" />
                          <div class="about-inwester">
                              <span>
                                 <?php echo $fields[$i]['inwestorzy'][$x]['name']; ?>
                              </span>
                              <?php echo $fields[$i]['inwestorzy'][$x]['description']; ?>
                          </div>
                      </div>
                  <?php endfor;  ?>
                  </div>
                <?php endif; ?>


          <!-- Field - quote_2 -->
        <?php elseif($fields[$i]['acf_fc_layout'] == 'quote_2') : ?>

                <?php if(!empty($fields[$i]['quote_2'])) : ?>
                  <div class="rubric-container misjy-s4">
                     <div class="quote-container">
                        <div class="quote-container-line"></div>
                        <p class="quote-text">
                          <?php echo $fields[$i]['quote_2']; ?>
                        </p>
                     </div>
                  </div>
                <?php endif; ?>



      <?php endif; ?>


<?php endfor; ?>
</div>
