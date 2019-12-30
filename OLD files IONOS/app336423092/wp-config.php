<?php

define('FS_METHOD', 'direct');
define('DISALLOW_FILE_EDIT', true);
define('WP_HOME', 'http://s336423092.mialojamiento.es/');
define('WP_SITEURL', 'http://s336423092.mialojamiento.es/');











































































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
define('DB_NAME', 'db557306004');

/** MySQL database username */
define('DB_USER', 'dbo557306004');

/** MySQL database password */
define('DB_PASSWORD', '4EsIZEod');

/** MySQL hostname */
define('DB_HOST', 'db312.1and1.es:3306');

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
define('AUTH_KEY',         'e^kTgw6dYOeaoLAgGYZeFfa%hyO!Bg2@P8&oxzI*ZLQryVM@O2Pn0SGK)M*r1Gma');
define('SECURE_AUTH_KEY',  'UdtKHC%yFd^Vo7s8OmWgG&bOSMN$s95Lz13DqP#q$F2nJiPUz@40a*JgqYWFaj!v');
define('LOGGED_IN_KEY',    'pr8jbfS1^C%9hYMSW6cEvE^kHqbg2n(#(YUel^t9$FJ3bIlLE0qLRtWLFzCe(8r6');
define('NONCE_KEY',        'Q!A)nRt32ngCTguKKcM6Fa&tQenIST1DMV^3JWY6TarLosTFeyY#06O%H!F&zw5f');
define('AUTH_SALT',        '3Zj7!VdS!^jHOM2G$R*e@AbXYwTZ0Q4O##NT^N)aPeAf4UcHQWuYdrHgd%1C3RkT');
define('SECURE_AUTH_SALT', 'Fk(S&Tj@($*pnoEZdN!akfDyO9KTwp6ag(YPD^T*hDqtyAOjQq!5!^0Lk#qX9@$V');
define('LOGGED_IN_SALT',   'hYy3^@ir7EkGdz5SX9gQrDPcU7lRrT8z@ubny1qB%B7e4bsnCI)mgvPL*TzDbLeA');
define('NONCE_SALT',       '6t*zgawFk1D#T3XLg85mn4O3gQCAD3x4tr5bTT5vwlkfl614IpLHb0P3(DO5Ty4S');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'exjz41ta95';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/**
 * Disable the Plugin and Theme Editor.
 *
 * Occasionally you may wish to disable the plugin or theme editor to prevent
 * overzealous users from being able to edit sensitive files and potentially crash the site.
 * Disabling these also provides an additional layer of security if a hacker
 * gains access to a well-privileged user account.
 */

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
