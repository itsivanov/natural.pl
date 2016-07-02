<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'natural');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');



/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'LPLS)~Xj,Bwe]24wPwAAX2Oje>T8RN21&zowU#Y,riG#&>)t8n(XIYg9+~#$BmKB');
define('SECURE_AUTH_KEY',  'm[Z7*_J1J$313^j$I= h$iCT^:>iKPW}*qigf7NuawN d:$_c> #-O9AXQzizC~3');
define('LOGGED_IN_KEY',    '_(P$fRR8XbL><3?X;vP)4DxgE3ax_5c<Xr?R2GEAw,)EewTWJazsV=lzsTvIq,_y');
define('NONCE_KEY',        'GYQ|VQXGh*SCX_DMX*uR-G,45S6HW=>/xg-~_toCS:n&Oxfkd/,4Gn;*ynUo<Big');
define('AUTH_SALT',        'sav-ic.q^t+M0Q`z|h/p?Gk1+g(,>f91hv:bKM L>eUqNq:C#Q:#`0mBRis-~+0.');
define('SECURE_AUTH_SALT', '8EI4_g9`ug]NJRs!7g2tF%mAT4#}<a#(N,#k<:L#<+s?T3Z#`n^8NuB%4mD>W<re');
define('LOGGED_IN_SALT',   ':W7vO*%I:03P!(oaz28)FpDeM<v#si+f,iO8qnY8w xlQl;p@=B<ZggtSD9ZsGVp');
define('NONCE_SALT',       'p0*6{L=87hG1Cq/sw<_Q-;@Qf*=k^Eooti2&Z`IaqYz^PdV>;N$He|=!`FaQN1M}');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'nat_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
