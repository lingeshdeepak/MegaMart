<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'megamart' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ':4l])1=88?u&0(={Uv.XnQ2]%*CSH.8j/R^bC:LeY}5Ga5Ax/^@|.Z6t>XXd?q7[' );
define( 'SECURE_AUTH_KEY',  'I|PD;OYjMR(f6j& <w(#]>=l(zj138zZCw}[zCcwetEx[V;PWOD^O6|boCAYFl {' );
define( 'LOGGED_IN_KEY',    '/+QKzsFN!?=aHE}v?Op,8w*6S0. FWV]0AOeK*8dZyRAi,uMH$5-/8G@g*cp}*{n' );
define( 'NONCE_KEY',        'a>]f^fI=zK>U4q2#Ey|Go$?SVH=Qhg,+IL.+!6;>p:T63K^6qXyq! :{EK@9OV_R' );
define( 'AUTH_SALT',        'eW4U?x~G=hno]G|e8]9Go@W@y-2HLz#O=p>pplw*fm5w<Pu/m_^V-!&$.N}Y7#PF' );
define( 'SECURE_AUTH_SALT', '@E_OlnD,!VAVg)-gzdC&Ta8%M)rmxuWgC,CiB(t!CM+~]s>Zpr@xpQ:9R`;OcqvJ' );
define( 'LOGGED_IN_SALT',   '!&_j`Z5! 6+t6*<2byIU[oR/r6EiM0s51wEtZ;6<+:&*L@jp3xc0A[7mwY9~cW-a' );
define( 'NONCE_SALT',       '92A`=y-3)lxKCz`#-J@]s-bbd(vA[oG_;m:>9j6%?ZC*1n0 fXlAHZeZg0aHWxVM' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
