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
define('DB_NAME', 'wp_bsk');

/** MySQL database username */
define('DB_USER', 'wp_bsk');

/** MySQL database password */
define('DB_PASSWORD', 'wp_bsk');


/** MySQL hostname */
define('DB_HOST', '125.212.202.180');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_HOME', 'http://localhost:8088'); // no trailing slash
define('WP_SITEURL', 'http://localhost:8088');  // no trailing slash

define('WP_BACKEND_URL','http://localhost:8084');// backend url tms (source .net)
define('WP_IS_TMS_SOURCE', false);
// define('WP_THEME', 'globalink');
define('WP_THEME', 've24g');


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '%= * F.mot86X <#n_r4ZxLm:@*{rx<yqs4z`u.1`^JQM@?#<_`9/a2Q?i#0nSi/');
define('SECURE_AUTH_KEY',  'gG[7b!z `gd3*iHhkR<I3!0+V!Z{:dmx)::YrELqH&.;f#XwY57Wv~t<N[znBWWY');
define('LOGGED_IN_KEY',    'U:lQy}Cdf6-g~>TgtwBGjRDyYR]NWHVGY=qAkz?v(k}&is%C%&px]0QZEO n$BCa');
define('NONCE_KEY',        ',z}A|,M%qRdPW{tHJ_Ws%;Chv#4@~M)0@|o,e<>v!QZ{_i[K!#GO_a$DAIITxDG,');
define('AUTH_SALT',        'CEHu4;*M1gIdb!/(&UtUTkn64zlK/2/^1><fjZ`?IGHpP4>iYPD,L(TPKQRi+<-@');
define('SECURE_AUTH_SALT', '|-/f4TmYwL,FMbb1U/t0-9a20V=^5nbSe~~wy.v,)$jww`4~&z=a~lP_j3ZncXaO');
define('LOGGED_IN_SALT',   'q&7gG4v0d^1/YpqdWNieCZAPVs4AZxr@(c3X_b,JlJF54%j=^N}Mp_PmuG?dsSn9');
define('NONCE_SALT',       'd~~lA&;B6J!% R#29%zHTB]A>%k{]z (fS)^++wEIn$wT;U%P;c}^0#$x$$5d:,c');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
