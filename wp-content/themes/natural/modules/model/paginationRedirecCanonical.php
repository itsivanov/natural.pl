<?php
add_filter('redirect_canonical','my_disable_redirect_canonical');

function my_disable_redirect_canonical( $redirect_url ) {
    if ( is_singular( 'post' ) )
    $redirect_url = false;
    return $redirect_url;
}
