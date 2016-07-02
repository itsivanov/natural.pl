<?php
$array_additionaly_menu = array('9', '13', '15');

// Title before menu
if($_SERVER['REQUEST_URI'] != '/') : ?>
<div class="from_menu">
    <div class="title_from_menu">

        <?php
        foreach($array_additionaly_menu as $key)
        {
            $menu_items = wp_get_nav_menu_items(get_the_title($key));
            foreach($menu_items as $items)
            {
                if(strpos($items->url, $_SERVER['REQUEST_URI'])){
                  $title =  get_the_title($key);
                  $id = $key;
                }
            }
        }

        echo ((!empty($title)) ? $title : (is_page(769) ? get_the_title(144) : get_the_title()));
        ?>

    </div>
</div>
<?php endif; ?>


<!-- < Additionaly menu -->
<div class="content_from_menu">

    <?php foreach($array_additionaly_menu as $key) :

        $display = (is_page($key)) ? 'style="display: block"' : 'style="display: none"';
        ?>

        <div <?php echo $display; ?> class="additionaly_menu additionaly_menu_<?php echo $key; ?>">
            <div class="min-icon-secondMenu"></div>
            <?php wp_nav_menu( array('menu' => get_the_title($key) )); ?>
        </div>

    <?php endforeach; ?>

</div>
<!-- > -->
