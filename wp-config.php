<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'nyraacare' );

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
define( 'AUTH_KEY',         'Cev_y878PF<F!KAnK.+oJStN1y7IlZ 3*)C}-(KSc%wVv&/iS#08TEQ8Gi78Y4JR' );
define( 'SECURE_AUTH_KEY',  'KwKp,I1e#EvB}CM4EG6kz<e}xR:MQ0eWa??I7[|g<NX_VixC1l];);m|y[^S.0Dj' );
define( 'LOGGED_IN_KEY',    '9bM_2BHjz0i(AMF&#m2.F~C)Iz(1V+71!?Kc5<!=A@k8OD]9|DXS#FZlL}. *GLj' );
define( 'NONCE_KEY',        '}XK7Y<&(jBV.sU l]4QjUI{R|6;I0]@,_T9UACllJEG2MY]zmsvyPpL?/-|O_$r{' );
define( 'AUTH_SALT',        '4a&$Xr%A)k6@,ju3McQo(P>5+g#@.PG_q{Ae_Q&|i3&oXA(2I5>u`Yz_+mYE7`6P' );
define( 'SECURE_AUTH_SALT', 'Pm6~:s9Q&.^V8)b)%9fY]WL`6xz`_}C!Wa6&TwU<1]P#S;m:#XU&sO.Ete}0oQ#+' );
define( 'LOGGED_IN_SALT',   'o6r05kq~i<T64)&6y_qX*kdvhGW)5{7@OZTYSqf!Zv$,$ih&hE?$b1C!jf+.*l`&' );
define( 'NONCE_SALT',       'xJh_bl#y?P?6tXa#KfTIFeNFf_iIYU&){)b+M+&*H&wNW$O)oVP,yDJWxTH4d`~_' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
