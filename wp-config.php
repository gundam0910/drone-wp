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
define('DB_NAME', 'drone_dev');

/** MySQL database username */
define('DB_USER', 'drone_dev');

/** MySQL database password */
define('DB_PASSWORD', 'abc123');

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
define('AUTH_KEY',         'T^6:@QnK?Bsrb>;MQ/Nc&~4ryVua|f}:rTL+4_M9TZ8IBfN}<l0;Gv_8DCHk_?_.');
define('SECURE_AUTH_KEY',  'kByCq.{-30rm_qU/U/VYoG@*$WR<HO8jl|dF0XGOb?D%5}`{FWi?}w:%,BaBw`Mh');
define('LOGGED_IN_KEY',    'M#UW?(i[3MkNs4.MdMVCQDv>(LJZTBTrtkd:+m{a+A6@Yo#@D-oz-qm=-+Gx#_.x');
define('NONCE_KEY',        '3~a%+d:!,1w}&c@]e_bc]OQgD}FN I;<./0dxNTw#IJM2Vhdo9w.r=b]d fS RZ9');
define('AUTH_SALT',        'v#q+00iks!e+M^Sp/(Ugr&i*@{6.9B:X]R@1EgL;bUtAj3k4dcs~S)TCJL7@Q>,b');
define('SECURE_AUTH_SALT', '(4;P{VNLO%!9Bhj&Am9GOZn<%~6MjtT6f3.Pn0]//cX|}!qIZRY,/MlG<qRP%-dZ');
define('LOGGED_IN_SALT',   'k1]PF9aw6eSa3U)C<mxx@uIFGgmqi#I@wh!Cav!8yR>OO2c/@]-|F#z ,zx$YT3#');
define('NONCE_SALT',       '| jG11^(O9VJ9-Wx;6o`XXh%{`YJqS?kv/9T|7~:z,nLDVZH7N[3MGm9XfW>l6Hn');

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
// define('WP_ENV', 'development');
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define('FS_METHOD','direct');