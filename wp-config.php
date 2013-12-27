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
define('DB_NAME', 'nazz');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         's%N<Jg+b(.j#QB $N<lT~?r%FZc<!,Fr`Aw@G%3WiHfg`}l@-ku?p>)H>1;b5wh-');
define('SECURE_AUTH_KEY',  'vO*{9V5dBB1k;8>IkPr.Ki8]-[0n27^<xIp3Uv7K<1`,6OxdK+cAmP!%C~8N{/<x');
define('LOGGED_IN_KEY',    ',E-&z)6I3R4:%T]h]56=Iisnm~j0cY9Qq#*(G:H(d:vE2w-RSpN$M8lOvnfnD`{y');
define('NONCE_KEY',        '^egBD8;@SpkqoYIutKk7Xq!p.[b[R_oo=,4iL.J*edAaWp@cYaEASk?w4W,_}+VF');
define('AUTH_SALT',        'IvyCW:=D#[)PZaFP[h8}Binp+d{n6z6G1F8nEfmWGiq8zBNly-6.~nP-p6PvPRG9');
define('SECURE_AUTH_SALT', 'cULlu:>uP$([x2!$[|:37uq3?B@dwe/tlsGYPP/~N$O5}dAx,-6XFJyOG X$_[QD');
define('LOGGED_IN_SALT',   'mHZRI$]9}:jqJ=[cxgzP][P7Yi^lWB`+ACRj=x(AFfh@yM^1`L ljU~xUr7,+ID(');
define('NONCE_SALT',       '5{;_azfGRIdrkycl;h{~t,m*NdW,L?@u<EdBzP6x1sHkczh]Uacs.8Y@ bPyV~&b');

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
