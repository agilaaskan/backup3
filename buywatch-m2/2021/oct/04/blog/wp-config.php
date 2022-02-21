<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'tiptopsh_casioblog');

/** MySQL database username */
define('DB_USER', 'tiptopsh_casiobl');

/** MySQL database password */
define('DB_PASSWORD', 'TkK+C}xW~z?H');

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
define('AUTH_KEY',         '7?nN|S.L/Ji-7C)|=t+7%c|ZCFeJCQvNjx^0+q3RToP+;Qk<:BT]6:J1Nh6JxLAr');
define('SECURE_AUTH_KEY',  'Q|0ob^|[|%*A$l7!=JV,nl1BLF5wc2bpT}MNisd,79L7Om])CtUw_]3|qr^H#tVF');
define('LOGGED_IN_KEY',    '7YMSl5!P?tfP5K@VRm:r-=A:G*8}]Vx_k@:oxSFm `UO~8-E2}1<@j-1}Hux2hy_');
define('NONCE_KEY',        'n)+5&%11+C(bQ9x~QUh%g:Md--32O~dW>x:*@J7x3alr2)H-[C>6&ld[qF=-@sN#');
define('AUTH_SALT',        '=T7e= lv1Z )l amCyf|vXpS:ODzZ-.L[+]ChahO g@_v}PX2rv(`.;hF!FQx-f/');
define('SECURE_AUTH_SALT', '@DH+.#B:?7-+3N$CBcP[4`6v&U52nIryI+BE+EekQQn U)OAc?Yvu*|9kja(~TKB');
define('LOGGED_IN_SALT',   '^`+f/T_gSPncg@YMl;`iUakxvV<|sh^C?av@S,B@a0U-|Sy8Fo6FAV_SiP5:Y*pa');
define('NONCE_SALT',       '{Vj~yv&s(_r@Fj20zepYIOMW;?G&I1p}}p+>HV5euIppsWR2(+c@>_KBB|-X,<zx');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');