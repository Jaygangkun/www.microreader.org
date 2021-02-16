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
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/home/dh_b7vz6u/microreader.org/wp-content/plugins/wp-super-cache/' );
define('DB_NAME', 'microreader_org');

/** MySQL database username */
define('DB_USER', 'microreaderorg1');

/** MySQL database password */
define('DB_PASSWORD', 'Grandmaster2!');

/** MySQL hostname */
define('DB_HOST', 'mysql.microreader.org');

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
define('AUTH_KEY',         '_LDVSdsKGefX"@JI:4V"ebQ)"hR!oC1UCpPY%O%YC3iW4"t*_JsfYg6Ck%52@N";');
define('SECURE_AUTH_KEY',  'o+J$wvwTdQ~HiW#B*eew"MW~dDV`(CED/^/aJ/"+Rq(K9ry4ryx2h%KnW%;KxT)h');
define('LOGGED_IN_KEY',    'HI"~T4|bRvC_rfwTT7!PXK*(h8@+Rpsbl#+I6q@;c:d%)jutG`Xygg5Qb:srgJmY');
define('NONCE_KEY',        'Z;`%PA:G#vAdSj6T6YvMw:vm0qMz|0l?Ky*LPdvo!2$gFtLcm?_oL2^DV1DIY~@f');
define('AUTH_SALT',        'jJR~OEloBDF*wn%BKZwoFy!d!c|~n(OnvnkOB%Z"U|~6z_H(5AM7#Xt4Z7O/KiNJ');
define('SECURE_AUTH_SALT', 'd3ap#0$rgD&CYxd3Bqvr_4A^jg#uPckMnsBN_Gvc59*Ucm;7eNAUwGT8$@R&Z~Xh');
define('LOGGED_IN_SALT',   '79g8)77wbybhin^8b`jmpVg;rFN(|hd70&~+^~7rWATpeoEq6%wu?MJ55+0HPYuz');
define('NONCE_SALT',       'bXFe|Q/:J"bW:Ww+0P&_2~XM!jzlHtH|jEUB`d#yHM|fSKDrM_8hcmBS5n~AbSa$');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_2qmjkh_';

/**
 * Limits total Post Revisions saved per Post/Page.
 * Change or comment this line out if you would like to increase or remove the limit.
 */
define('WP_POST_REVISIONS',  10);

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

/**
 * Removing this could cause issues with your experience in the DreamHost panel
 */

if (preg_match("/^(.*)\.dream\.website$/", $_SERVER['HTTP_HOST'])) {
        $proto = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
        define('WP_SITEURL', $proto . '://' . $_SERVER['HTTP_HOST']);
        define('WP_HOME',    $proto . '://' . $_SERVER['HTTP_HOST']);
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

