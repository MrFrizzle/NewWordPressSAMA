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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Oq555TSRSeXCi0CGkaCfGicLkFgzsvW5KL1js4ZtmGTjGEsU1KwPCIy1mtd9dB0ecqqkW90uCF6uXOjxw6EL7A==');
define('SECURE_AUTH_KEY',  '1KEEvU9VhTiWcEvtl/QvNUhZ+TFfEABp8gv5eRaqRpNupCd0lgWbLrizv37vR25v/cCePM9mUtbovINPRbT8YA==');
define('LOGGED_IN_KEY',    'mBi+zf8G9EbBj2loCvS0DiFlQIKy8JWI7sR5yjkcL3daBSIm0UN5Ygc+iMQw/BzUJd38l853S7pyrSKmBFgWww==');
define('NONCE_KEY',        'MOd3mWWvJnuls+eB2tYftU3K5kM/PDFDWprpE7VByvPUdzGfkQ2nBKySfG4DD9UlOMHL/cexr0TT6ac4Ug2hqA==');
define('AUTH_SALT',        'CMBHhHbsZvGbD5p+DyO5rZHCcRujoiuixDmg0eKODMb8wJ6Cb429bhW9XsGpg7pOqVzIPzK2I+cZzDMsQPCzlg==');
define('SECURE_AUTH_SALT', 'z2CWm74pIQ6o6As3+PyWuxs2JJ8YQCa5Jq+u3vWcFJlEGwDq+A2PoZsXEDt2Zj+LHaq4pIy7IXjM2HuBN/jv4w==');
define('LOGGED_IN_SALT',   'lohIYvdBlWcqFblO8395HA9kXkWbbGzkPHgOhEIUmCpnt87Hw4wfkE29IPjSkG7lT16UlMnmCYM6mwAIgkueQg==');
define('NONCE_SALT',       'UgwupC/T3zF/SG5F3aMfswQfczEswIGfsAjnYu2aKVaF1QyD1ENcoJQSESdc56G1e8kaiND4TZ9oGXCy2Gpv+Q==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
