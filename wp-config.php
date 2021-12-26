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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'nogamenogain' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'Pa+!0Ro6pA6yUV?NwX$bGg*Cn;$?LtBcnr/zXs_~JL@?w{mTndoPhg?E[O.tVxbh' );
define( 'SECURE_AUTH_KEY',  '|S=K<HUlTp^w`_ >.HWU_0o{1>7Ey_}9jLx@T&lxGz2G6aQG#>3DcX$?^B%{O==*' );
define( 'LOGGED_IN_KEY',    'fl.ErZiKI~@rpI(rn.4fM1~JF~[g+;y9@`T;MHzKhB`$n[clQ@zt[B!L1Pu)~D9b' );
define( 'NONCE_KEY',        'tEr49H;skK8YDgee%xzr]n!yPCka@#(|+Qf8mQ.(^ej_&2IPe!t@pH?1V8> *a%]' );
define( 'AUTH_SALT',        'XVaUN& q+-]<8e/9[jUO}~@47G`zed4:%PHsCIEBi4CsN<NIW?+:O,MG.F2bq{mU' );
define( 'SECURE_AUTH_SALT', 't3YRz>5aK,+umFb;X/u;lCZ#SM>M2&,LQ7?|zV-W9C3-i,HD-0g8?HM_}[VF!rq<' );
define( 'LOGGED_IN_SALT',   ',bOEK:BL7jrL[mtxxMe5MiOH*UKPjB+?&?#yh~v@i&q5or{i|!`K_nj;^]c2HoAk' );
define( 'NONCE_SALT',       'ssHmL:l3+1D6aM5TZi21mu17Kq9$#Ikz4{ex;7O9a>i.{ xv[1oE_ts$rk|(@V< ' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
