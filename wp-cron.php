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
define( 'DB_NAME', 'yanush' );

/** MySQL database username */
define( 'DB_USER', 'deepak' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Admin123#' );

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
define( 'AUTH_KEY',         'QnR!18|+Bf0~)y^-tmTXhdDb6XlcR~:iK<0N}=]-5U=L]8;[GMPGynnHE}_h^C:v' );
define( 'SECURE_AUTH_KEY',  'Io(M/=u?r4w.t+,!(?Q&j<v[2hmC{V.[Mc1TFz9s5[jYe0cx?zv}Iu/yO{PAzhbg' );
define( 'LOGGED_IN_KEY',    'nqi%5tQ^Q`?yj!jxIvp_.h&[lX}zmNk5!)GP>J4}`I=8PK)7zPd.chpO_30X>B4u' );
define( 'NONCE_KEY',        '!8? jCFcB:b)Oyvu 8#O)29(?+}!>lql-AVn28lEFkK,V<Xf+3Lzb_+29Ir|rh1<' );
define( 'AUTH_SALT',        'g=zaHK40#rAI9L[f _VB7MN;H;Lpj#n9Fq-.X;bC2c5.dU3.E8^IFJ,O#69m|@0_' );
define( 'SECURE_AUTH_SALT', 'c4.tf~%;kw>v4YZrF!G1<GI2-J?1MTPQBSTy)_DsxlS@Bov(:#6oP}&rXq^i(Sp ' );
define( 'LOGGED_IN_SALT',   '>cQQ.mQCvn75>>w43j!^:A4i+>*!:GLw-X61=.[D|fhLheQ[!%FUBs>&0 W9Qofn' );
define( 'NONCE_SALT',       '~L4VrTQssQ9@ZC;t2RG;+_s2]v[gI/~b7a4t%pTK97~/JVi2tHVDoORxf?AYTB4E' );

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
