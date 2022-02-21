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
define( 'DB_NAME', 'buywatches_wp' );

/** MySQL database username */
define( 'DB_USER', 'buywatch_m2' );

/** MySQL database password */
define( 'DB_PASSWORD', 'BuyWatch@123' );

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
define( 'AUTH_KEY',         'W8u(9-N>Fw=}CWQ)>p-YW7?_u=Ob}nit/Rhnib~0a?evS`{c1D3]_%zolpNQf?f0' );
define( 'SECURE_AUTH_KEY',  'a d1dQpU,Kt@PZcZ^T_tG#j9U n>l.t6nI]xT?:>(4(RAJu .wW@tPZ/oy7{Ppc?' );
define( 'LOGGED_IN_KEY',    '=Qv~lF&W{ZPsz8+fQ swW(_1hhi9qiupa>Y/=N=RqI#C9R<&k%2)$yP5vDOV+%qm' );
define( 'NONCE_KEY',        '5)Nxe!`.Uqc^flsc+aN, B<bn[rc=nM`uuDJZDgC>F$p),G5>m`Sd1fj^StKjZY6' );
define( 'AUTH_SALT',        'on@|rZ<YFEu9w98GWL1Ou$PSzh|fmO#B6nyfO2OBpv`RSC1]zQ=@_L@1Z!&HI,Q>' );
define( 'SECURE_AUTH_SALT', 'W@!yMD1IQAj6=yw:Y1}.5n??=8?O:-US5!4G{-73W.:xSVr]O(!o>Uv+7w4I+^^s' );
define( 'LOGGED_IN_SALT',   '+[{-@Bpa`Qy`h|8DvsIz+Rq]-wzTh7LwK:eW53;$cmz3nuqhwP$+H0P<S`xn=CrQ' );
define( 'NONCE_SALT',       'g>Jt6,E&M0Kkjl>,D[$A0v[ZndS:0k?_lHFcDGQ/_1/NEh%9#cHF{wMIn#~)%j:4' );

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
