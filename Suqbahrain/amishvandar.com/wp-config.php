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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'suqbahra_wp447' );

/** MySQL database username */
define( 'DB_USER', 'suqbahra_wp447' );

/** MySQL database password */
define( 'DB_PASSWORD', '(UL3S3!pD4' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'tnlefxhfgerr724l2uowsvlcxyp7qrgnrburywpvsj9jfbomc2xa7dswut7o2ubx' );
define( 'SECURE_AUTH_KEY',  'kkoakz5qhzyz71uxbhhzndxaefsr241ij6t58rlzcsgbworbkbnmjyqyjvaukpbh' );
define( 'LOGGED_IN_KEY',    'bpinkrcjbaykbenp3elrxfrbizovyeqkfbgauwmyshqufvatvw103pwcdoot8rl5' );
define( 'NONCE_KEY',        'obavv8i7mbc89915st2cpnujw7tbhutdmlz2ycrzvom938i3x61aeuvwovm0izgn' );
define( 'AUTH_SALT',        'fyz8xzchaw4j1okmniiqsqgrudesbnse3mnyjofkqrnojjmqoyhse5l5vy0x6tba' );
define( 'SECURE_AUTH_SALT', 'hyvfcvxj6xmttvdgscvkcj3u0ilq7emygjkbsarm9pkaabdcc9m9ysjkdi4vzl6l' );
define( 'LOGGED_IN_SALT',   'gvxvcyktzf0g5byjcrxc6qzgfvdlmhfzjlsvhmg4tvlithvjmlostjmdfxxkinnp' );
define( 'NONCE_SALT',       'wzjo35qs5bwdqtzedlothkrxkstquqq0gzxerbwhrrroz0smp3ubxzcaod8nqld1' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpfs_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
