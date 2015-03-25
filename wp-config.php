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
define('DB_NAME', 'arkitekt');

/** MySQL database username */
define('DB_USER', 'vocabmonk_dev');

/** MySQL database password */
define('DB_PASSWORD', 'Ku247v@ma');

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
define('AUTH_KEY',         't+_0fsF>|j2?mHx e;xWEj}<3Pz2M#ni4fGDKDAU65Q4}%jFbuD_Vj.3h]xe9=Ap');
define('SECURE_AUTH_KEY',  '&:-5$^Mo)<,H(zG:}[C<Wks&yLVe+cQTHef~g?(a5F=Cu:xaU+Z,YU#LB_N7/sdw');
define('LOGGED_IN_KEY',    'DmHO}<|W8+P+|Z=]]a]vbL>S~Onbh++4b{)Z8V|u3hC6$IKO97w?( rCM^a/>&;(');
define('NONCE_KEY',        'N%tr]O!q-rJTajKI-7b]P**){Trhc}AkQK5Ynf DE>w/-h,]e-S+i.T]Z*Htdl^J');
define('AUTH_SALT',        '3KKPC2P?H@1b|4/+%Y^-I|Ijye2pZGZT?*&*+A%8O|/K;j +~_0qE&`q%XOxy(W4');
define('SECURE_AUTH_SALT', 'cBJ&&@a613x7mrAY{Mgs*wm-[3}/nt2VgGry<Ah9 .^g|1wEv)CgK,m.bt?`XOuB');
define('LOGGED_IN_SALT',   'Oo3b3$=}Wl+6)i!:Ox&ZTf,3Yd#xUAB~m(~*6]OI%Z^VF*F7rxhCxGFV)P:$o>-%');
define('NONCE_SALT',       '|pE`S)-,UBM1co3I38EOJ-Z|;h,~Gr+SL~LO,I(p=|Q%(m/-UHq.YTO,|Ocd/;$E');

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
