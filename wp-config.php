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
set_time_limit(300);
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
define( 'AUTH_KEY',         '/y#ty-=I2C{:k:q!;yK %iq]B]3r|xj)^b_|Y(;s$uKckD7}eC1fv@FQIY*?mg``' );
define( 'SECURE_AUTH_KEY',  'MJN2)D@x`.rPvu];E9yt6rsza7D~Y3K7cCeqN|&2r-cM/` /*4lF2m9Fe&T*SdEA' );
define( 'LOGGED_IN_KEY',    '+e(4_:R^N^-wHJY{N@r+(HC($;*Y4;bcp^zJ^|P3o[K%JT%fMot]c+?(]WcT:?(W' );
define( 'NONCE_KEY',        '7N[h/+=*Vm`gnS@j08&$+{V)0U9i8&A=1:*LA1n4X~JfCdfDF,R7Jmr`?fh]v&h$' );
define( 'AUTH_SALT',        'Mo4@IgRJJ2-kBzft^.^dRr@MvaN+]8mm<X7f-v$B$tmc_}EHxILO+5N$HaBLjcFW' );
define( 'SECURE_AUTH_SALT', 'c[N^IyGSGA9)[Z,7~1mARy%H&*&_7#hd?E=BhEi28?IKN=W9=]yihm<=;tMN0DDI' );
define( 'LOGGED_IN_SALT',   'Hy%uim[{mO]&V9 lAp)n-gE[{?CRL`Mw@*Bxjnuq#5F|h#Il;,K6a@>2(7JcS7Ug' );
define( 'NONCE_SALT',       'U1 %7y1D>FmV <RL8_APGDM+-RM,0KOGD6W sO>RF)bd$H< xT<5v1f~:V,)p``G' );

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
