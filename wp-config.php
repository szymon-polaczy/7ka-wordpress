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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'siodemkapl' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '@bCGOD_3IByb*puZ*9A$pU-<iV*jvhrK>qL344ndKaQ5#.KR<ZAmW5|z?R]5RqBJ' );
define( 'SECURE_AUTH_KEY',  '_3]TNy+FH|iXyg*E?~mxjGSJd%q.3nZal|U)16uxeeW3R;c7M19M|h}X9>/EVesm' );
define( 'LOGGED_IN_KEY',    'P2-.XMm<v)jv?vZR{&t|?-9Ury*w}?|B-;S!S)T~c3POmLQm#s{s];fjc%X_pi#B' );
define( 'NONCE_KEY',        'EL-]%>|#!hi>>QBOE(GdYMG>!MZcHdv$#pf7+ze6`Kk&u$8YOJ&?vL~u-FDl+_aq' );
define( 'AUTH_SALT',        'Coj@1h>x/^.e~oq gVB}&?9/``+`Bub?Tj<}<(F]#DjNN!,I?.rf:=/>[W(Be4v|' );
define( 'SECURE_AUTH_SALT', 'U/Ipq3!*H9:@{gj6f%za#yEa]4ELH;nKDT^<%/N,8b W,ge!g>d95;W:Hr[gw*;{' );
define( 'LOGGED_IN_SALT',   'EneQvQ]!x{gW5^H0KLiRFjRi|UrPciqP=*Y[tj/v#iLH<x W1[Bef-a6p-,eQC#d' );
define( 'NONCE_SALT',       ']Ids]SJD/Pj3 _EoA$^-;DRn|Bz]/^;g,k2>8e!8kC:Cl0:Y2`HeX.OV~^L.(V]h' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
