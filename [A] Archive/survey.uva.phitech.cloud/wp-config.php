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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'lrj_thesis' );

/** Database username */
define( 'DB_USER', 'lrj_thesis' );

/** Database password */
define( 'DB_PASSWORD', 'iRQLtkNns2Gk2VYX4N8k' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',         'p*Dv(_L)k2an]blhOlN/dPF=3j~j/qX7Rx1f);L}Z^<Ff_/Soz$D3mch:) =abBj' );
define( 'SECURE_AUTH_KEY',  'P)L8XSh,%;zF0<//ufYvpH%ew>88{Oe9Gu:0dnr?cM|lZFsK $%E24HZO$@b.T@)' );
define( 'LOGGED_IN_KEY',    ']/S#DBnMYYYJWra8#sz}H!]Kx]5aA)2;a8.+y3WY9[`BAn9rVQmbX;yl6aW+BYN>' );
define( 'NONCE_KEY',        'k<^S =kiI!EXuQx{{ Bu!Ed>q_ #K{|U!uK28NP^h|3VYO^4BZp$QZKzZ_(|m+j&' );
define( 'AUTH_SALT',        '(OcFq+|eaGT k*ammc?_5leS*IVg[$f81xf?ZH:&.6Od/.*1pDFK@@#0D9(xTbh^' );
define( 'SECURE_AUTH_SALT', ')j -f7yXi+,Fa~:f#g!CE{K6RVImH42@yMB5g40eL0Rb_0w9OLa:a&/l?D$P^<,p' );
define( 'LOGGED_IN_SALT',   'JU1nf37E}AKETx08@|x.4M1aL|)i^]nz)q<`OMhS`fdIk&YjfM%wUIp[C[LA.u?P' );
define( 'NONCE_SALT',       ':~X~k0B~V%Rb:PYe-G;J7%o0!@!OQ2YX+ 29UoT7H!sOzV}H`! DPz$Y.~Toq~@l' );

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
define( 'WP_DEBUG_DISPLAY', false );
ini_set( 'display_errors', 0 );
ini_set( 'log_errors', false );
ini_set( 'error_reporting', E_ALL );
ini_set( 'error_log', dirname( __FILE__ ) . '/wp-content/logs/error_log.txt' );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
