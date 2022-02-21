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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'tiptopsh_wordpress');

/** MySQL database username */
define('DB_USER', 'tiptopsh_magento');

/** MySQL database password */
define('DB_PASSWORD', 'd3EV5TrP55.(');

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
define('AUTH_KEY',         '1FQ-/Lj!YF,R8*ZjqS>9n{U:8eVpJM(e>y-jfbPfBUd},XeL&q<B4Fb)Bw-E>A:h');
define('SECURE_AUTH_KEY',  '8pq]uLOPNF{gPeke`4Lb|h=DAj(>W%Y5)+XN}*#:<bHM6#(SpKn{s-NawiBbd/Le');
define('LOGGED_IN_KEY',    'LR]5<yCF_y_ZSsmEK{zye*k%}q.{+NmO6ZSsUMpz@ c7<5No;QSm&D8.]*clowhD');
define('NONCE_KEY',        'x?n_h]M}k.M]$mP&Be/j85e,/_G RfXosVJL6dgiNvF-2ocx*&7)t}w*waHx])%p');
define('AUTH_SALT',        'm@~8VNpqrVmniVbno_kCt6mX=eK(jI)fd0A3Bg<3R %}S+nSi:Zl,5N ?K[g+,@-');
define('SECURE_AUTH_SALT', '=qh94%l#33_nR}?HUV&v3&h6b$ULM+ (MQpGH~o4zP-lL^T&ee?xk*W9(cJVl_>u');
define('LOGGED_IN_SALT',   'YXA#h>l|@o-to:O,,A+kq%dmG_&*5v~ITl<QM1J#`v`k@),{H^QjR!cC(_b/Ntb;');
define('NONCE_SALT',       '#fPn#qf[p83HJ2tsqfh8%*0=xmMTg_]7&oH :*#!0c=WfMXgVJ )v OE.80>~tRd');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);


//define('WP_HOME','http://buywatchesonline.com.au/blog');
//define('WP_SITEURL','http://buywatchesonline.com.au/blog');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
