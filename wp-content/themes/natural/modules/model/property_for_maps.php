<?php

    $fields = get_fields();
    $fields = $fields['google_maps'];

    $count_div_for_maps = [];
    $coordinates_and_info = '';
    for($i = 0; $i < count($fields); $i++)
    {

        if(!empty($fields[$i]['maps']['lat']) &&
           !empty($fields[$i]['maps']['lng']) &&
           !empty($fields[$i]['title']) &&
           !empty($fields[$i]['maps']['address'])
           )
        {
            $count_div_for_maps[$i] = $i;

            $coordinates_and_info .= $fields[$i]['maps']['lat'] . '|';
            $coordinates_and_info .= $fields[$i]['maps']['lng'] . '|';
            $coordinates_and_info .= $fields[$i]['maps']['address'] . '|';
            $coordinates_and_info .= $fields[$i]['title'] . '|';
            $coordinates_and_info .= $fields[$i]['link'] . '~';
        }

    }

?>
