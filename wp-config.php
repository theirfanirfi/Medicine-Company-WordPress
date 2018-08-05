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
define('DB_NAME', 'azadmedicine_wp582');

/** MySQL database username */
define('DB_USER', 'azadmedicine_wp582');

/** MySQL database password */
define('DB_PASSWORD', '6[!6j2Sp86');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '0vdj5ksud36c0htqaozovjizdtfekjyicvr6pmrigaern70zimcsrlyzwupkmtx9');
define('SECURE_AUTH_KEY',  'nitm0l6mcmvu1ce0rtbmuabo8ehceolrafczewao3szgswhjpbjxbrgaqgzcw0mv');
define('LOGGED_IN_KEY',    'gnpkmlyckxihyk3zrmut9z8jaygbo6awsprclranuluccq1mpcpmwdch1u5fbhhy');
define('NONCE_KEY',        'symxvtto71xidj2tdsbojz8xkxejpgltuwmupxi80ozicllvacbxh5vgp2546ijq');
define('AUTH_SALT',        'sh53qlqtlu7wmohethnar9euwjegb0nkly6b0ar0f0kbsgzi8w94ak2spsw36o4s');
define('SECURE_AUTH_SALT', 'dajvzfynsrkluumukcwms0gypnhdkz8wfeelmoaepx2depwtvmrwuh5jof4ogbxq');
define('LOGGED_IN_SALT',   'qx6pz2vffkcqzirhdlqcgghjkgegrsjekguva0hra4zaygepytotwxzduiwzqhth');
define('NONCE_SALT',       'utcllq6mv2xhel8qwdohgipdcyfjqhlgasmlrehb4v7szv08czglytw5nw7mm4on');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpca_';

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
