<?php
define( 'WP_CACHE', true );


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
define( 'DB_NAME', 'readdopy_ecommerce_db' );

/** Database username */
define( 'DB_USER', 'readdopy_ecommerce_db' );

/** Database password */
define( 'DB_PASSWORD', '2kRG$3sXCC#S' );

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
define( 'AUTH_KEY',         '8f: 8ol{9q[OEK8kK1H~nnF<#+<2XA$eI=5DhNH)i0`2fhd24I-1<)AAV+>)>.5R' );
define( 'SECURE_AUTH_KEY',  '&4r(Yv.0okG5S|%)|mU$ab>|0Itk{HPt9Nd=~[IthEzRf6(i O|=toCv[Z3=goch' );
define( 'LOGGED_IN_KEY',    '4O;FW(s_1CF<c96`~+Y}K}VEJ`)gH(:v[I<n8`lsz>$kN+TN-Us=KC(B03O7E?BA' );
define( 'NONCE_KEY',        'i4E=Aff@,U2pT:?H;`rS$0>rNQd_b3F`b#W,JJ_V?<64lvg5]NbFPPuhw ek)%}/' );
define( 'AUTH_SALT',        '#Y-,Sg^0(l8R;(1NSf[JJk&`%%c1i=^bJ+,KLX<ozZCl&h$^fvJ<nE6e8vNO %+p' );
define( 'SECURE_AUTH_SALT', 'JugvS1P`hKZf]PgTK-fb7T9<{.2Xg*hnenVKw:1VA]S$)LlkgIN0ohu5C>X@wST2' );
define( 'LOGGED_IN_SALT',   '*t>zGMMEe)QqKctAh&5BZ$2le}+a(.o,CySwtX0>R+ZHP{]p$v~p_|Vi1P)nx$NE' );
define( 'NONCE_SALT',       'FPOaq77.>+IjK,FM)r7C)x/r{ U:,iBK5u`,<bo(7hiS/3#9[KB,OI+iU=lV*)g4' );

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
