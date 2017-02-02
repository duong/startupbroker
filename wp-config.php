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
define('DB_NAME', 'startupbroker_2');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         ',t,?cqP3L+}+XBd9dkFOy@^^x_+NL6;PoPbLZvIxY:S)LvL%i,q}!izOM+|xmLGM');
define('SECURE_AUTH_KEY',  '`8A`P,gxwzgS21Vr0 ZK|Aw6NVpvqpwNzkofyA!{$QgAB+[Rka|_/<YT^fML:!}m');
define('LOGGED_IN_KEY',    'EW^lL=rqz}[?!H J;Fe0V$|*QE`^ZF0F`ZM-SeDm8hv3D676[6)DjF floi!E{|u');
define('NONCE_KEY',        'Dc9+)DBEi-:wr6SGN%J`)||?w0.9E$y<ljLf4I2_?oAr_Qv1dH^KR[m=C;z$/I.m');
define('AUTH_SALT',        '1QS,**fm:p_P>-_[9Nfek85|f6Z-i|Cs^&9w~?E=x;I3I??<$QZ&f@b(xN!!=i?z');
define('SECURE_AUTH_SALT', '#,ZAcU;&bdBM|YK4WD?B`)C4DS6dUg#:f/g4!^m]i}AS4Es2xH?r-d:[yOAy2|Ho');
define('LOGGED_IN_SALT',   'BVH-?B/kNkH}1[n|8!M{]*f,vxW%~lhe21oM-K(cf01<8eJS#>B,Ddkm~^qz(vct');
define('NONCE_SALT',       '8nq4MrLyF6+o1 M65Z39np[Tc1NEYf$h25n^/l2~/mY1o*-JB-x9x`Gk;{--vUHe');
define('FS_METHOD', 'direct');
define('WP_HOME', 'http://startupbroker.gr');
define('WP_SITEURL', 'http://startupbroker.gr');


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
