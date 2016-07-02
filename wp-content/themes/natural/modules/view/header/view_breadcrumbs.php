<?php
      $start_breadcrumbs = '<div class="kama_breadcrumbs" vocab="http://schema.org/" typeof="BreadcrumbList">' .
                                '<span property="itemListElement" typeof="ListItem">' .
                                '<span property="itemListElement" typeof="ListItem">' .
                                    '<a href="/" property="item" typeof="WebPage">' .
                                        '<span property="name">' .
                                            get_bloginfo('name') .
                                        '</span>' .
                                    '</a>&gt;' .
                                '</span>' .
                                '<span property="itemListElement" typeof="ListItem">';

      $end_breadcrumbs =        '&gt;</span>' .
                                    get_the_title() .
                            '</div>';


      if(!empty($title)) :

            $new_link = array('9' => '64', '13' => '140', '15' => '85');

            echo $start_breadcrumbs; ?>

                  <a href="<?php echo the_permalink($new_link[$id]) ?>" property="item" typeof="WebPage">
                      <span property="name"><?php echo $title; ?></span>
                  </a>

            <?php echo $end_breadcrumbs;

      else :

          $new_breadcrumbs = false;
          $re =  get_the_category( $post->ID );

          if(!empty($re)) :
          $new_link = array('7' => '11', '4' => '144', '31' => '91', '8' => '93', '32' => '146');

              foreach ($new_link as $key => $value) :

                  if($re[0]->name == get_cat_name($key)) :
                  $new_breadcrumbs = true;

                  echo $start_breadcrumbs; ?>

                        <a href="<?php echo get_the_permalink($value); ?>" property="item" typeof="WebPage">
                            <span property="name"><?php echo get_the_title($value); ?></span>
                        </a>

                  <?php echo $end_breadcrumbs;

                  endif;

               endforeach;

           endif;


           if(get_post_type() == 'productsfood' || get_post_type() == 'recipes')
           {
               echo $start_breadcrumbs; ?>

                     <a href="<?php echo get_the_permalink(144); ?>" property="item" typeof="WebPage">
                         <span property="name"><?php echo get_the_title(144); ?></span>
                     </a>

                <?php echo $end_breadcrumbs;
                $new_breadcrumbs = true;
           }


           if(!$new_breadcrumbs)
               if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(' &gt; ');


      endif;
?>
