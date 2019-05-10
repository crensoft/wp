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

 /** Import env */
require_once(__DIR__ . '/wp-env.php');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', $_ENV['WP_DB_NAME'] );

/** MySQL database username */
define( 'DB_USER', $_ENV['WP_DB_USER'] );

/** MySQL database password */
define( 'DB_PASSWORD', $_ENV['WP_DB_PASSWORD'] );

/** MySQL hostname */
define( 'DB_HOST', $_ENV['WP_DB_HOST'] );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', $_ENV['WP_DB_CHARSET'] );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', $_ENV['WP_DB_COLLATE'] );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         $_ENV['WP_AUTH_KEY'] );
define( 'SECURE_AUTH_KEY',  $_ENV['WP_SECURE_AUTH_KEY'] );
define( 'LOGGED_IN_KEY',    $_ENV['WP_LOGGED_IN_KEY'] );
define( 'NONCE_KEY',        $_ENV['WP_NONCE_KEY'] );
define( 'AUTH_SALT',        $_ENV['WP_AUTH_SALT'] );
define( 'SECURE_AUTH_SALT', $_ENV['WP_SECURE_AUTH_SALT'] );
define( 'LOGGED_IN_SALT',   $_ENV['WP_LOGGED_IN_SALT'] );
define( 'NONCE_SALT',       $_ENV['WP_NONCE_SALT'] );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', $_ENV['WP_DEBUG'] === '1' );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Install plugins without ftp access
 * https://stackoverflow.com/questions/640409/can-i-install-update-wordpress-plugins-without-providing-ftp-access
*/
define('FS_METHOD', 'direct');

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
