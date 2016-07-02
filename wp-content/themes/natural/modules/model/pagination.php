<?php
function pagination($pages = '', $range = 4)
{
     $showitems = ($range * 2)+1;

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }

     if(1 != $pages)
     {
		 		 echo '<div class="paginations">';
         //echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
         //if($paged > 2 && $paged > $range+1 && $showitems < $pages)

						 // < Previous page
						 if(basename($_SERVER['REQUEST_URI']) > 0)
						 {
                echo "<a class='pagination_first' href='".get_pagenum_link(1)."'>&laquo;</a>";
								echo "<a class='prev_page pag-prev-next pag-prev' href=\"".get_pagenum_link(basename($_SERVER['REQUEST_URI']) - 1)."\"> Poprzednia</a>";
						 }
						 else
						 {
                echo "<span class='pagination_first'>&laquo;</span>";
								echo "<span class='no_prev_page pag-prev-next pag-prev'> Poprzednia</span>";
						 }
						 // >



         //if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";

         // Count li pagination
          if($pages == 4)
          {
              $items = 1;
          }
          elseif($paged < 4)
          {
              $items = 1;
          }
          elseif($pages - $paged < 3){
              $items = $pages - 4;
          }
          else
          {
              $items = $paged - 2;
          }
          $last_item_pagination = 1;


         for ($i = $items; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {

                //  // Visible only 5 li pagination
                 $last_item_pagination++;
                 $hide = 'style="display: inline-block;"';
                 if($last_item_pagination >= 7)
                 {
                   $hide = 'style="display: none;"';
                 }

                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a ' . $hide . '  href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }

         //if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";
         //if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages)

					  // < Next page
						if(basename($_SERVER['REQUEST_URI']) != $pages)
						{
							 if(!empty(basename($_SERVER['REQUEST_URI'])))
							 {
								 echo "<a class='next_page pag-prev-next pag-next' href=\"".get_pagenum_link(basename($_SERVER['REQUEST_URI']) + 1)."\">Nastepna</a>";
                 echo "<a class='pagination_last' href='".get_pagenum_link($pages)."'>&raquo;</a>";
							 }
							 else
							 {
									 echo "<a class='next_page pag-prev-next pag-next' href=\"".get_pagenum_link(2)."\">Nastepna</a>";
                   echo "<a class='pagination_last' href='".get_pagenum_link($pages)."'>&raquo;</a>";
							 }
						}
						else
						{
							 echo "<span class='no_next_page pag-prev-next pag-next'>Nastepna </span>";
               echo "<span class='pagination_last'>&raquo;</span>";
						}
						// >

         echo '</div>';
     }
}
