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

if ( file_exists(dirname(__FILE__).'/wp-config-production.php') ) {
	require_once(dirname(__FILE__).'/wp-config-production.php');

} else if ( file_exists(dirname(__FILE__).'/wp-config-development.php') ) {
	require_once(dirname(__FILE__).'/wp-config-development.php');

	// Force debug mode unless already defined in config file
	if ( !defined('WP_DEBUG') ) define( 'WP_DEBUG', true );
}

// Default logfile for development
if ( !defined('WP_DEBUG_LOG') ) define( 'WP_DEBUG_LOG', 'debug.log' );

// ** MySQL settings ** //
if ( !defined('DB_NAME') )     define('DB_NAME',     'wordpress');
if ( !defined('DB_USER') )     define('DB_USER',     'wordpress');
if ( !defined('DB_PASSWORD') ) define('DB_PASSWORD', 'wordpress');
if ( !defined('DB_HOST') )     define('DB_HOST',     'localhost');
if ( !defined('DB_CHARSET') )  define('DB_CHARSET',  'utf8');
if ( !defined('DB_COLLATE') )  define('DB_COLLATE',  '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'y/wzq?^Sf&du|lu}5tJ/)qX8FxRlvl5;-Aub+0:qQO=jLY-aR8vK.EC`LJsyksNd');
define('SECURE_AUTH_KEY',  'T7u#IC)yRuOkDY`u<KRj84$K0Ka%fE$+!}QdJ}U+ -&<+G?+Og2`?;S@<7-2C6u]');
define('LOGGED_IN_KEY',    'U[&WsS~j_I^vRG#{-ROs|S+m[hP}ov3YHwjyyx%/vN>b7^=0:tL</01v|&RAgKm[');
define('NONCE_KEY',        'T4<Wo/?U|1iE`%O:Jz=puy-5rmf*D<>u!)H+gx~+.NB+N#!k-}>q<-^A8pE2)LC-');
define('AUTH_SALT',        ')OD2~EX23>^cUY~8#w7+B`|+]A3sB[%>bTGp,`n62$8ts3OOMbXN[$$^.<=,sSik');
define('SECURE_AUTH_SALT', 'KlYO-8HqVn?&U+}HYii+%s!rgvT)tUX9_|<h ^$=4}nA#4T`vFB~ivc~s2gjMUfU');
define('LOGGED_IN_SALT',   'iSe|%xZkBnLcMJ3g2K)iV2R[j|o9IL<:D:gXVRznxK1e!Q@P#N-&]:Mf8`UhqTNP');
define('NONCE_SALT',       'qD(Em`zay2YU)#Y[}<?F.#DLf<MFC%2RvfLE8xBg@16+MTLVzGj>&TbI*dVRX Z#');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
if ( !isset($table_prefix) ) $table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
if ( !defined('WPLANG') ) define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
if ( !defined('WP_DEBUG') ) define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
