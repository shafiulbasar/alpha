<?php

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */
// add ACF file update code 
define('ACF_EARLY_ACCESS', '5');
// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'final');

/** Database username */
define('DB_USER', 'root');

/** Database password */
define('DB_PASSWORD', '');

/** Database hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

if (!defined('WP_CLI')) {
    define('WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']);
    define('WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']);
}



/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'MfYpH51NdPPhIyF30nzAcZ2FGCPzvWnzOjfyGSAfSxMjp6vABGWPzvJ3Dsjfo8fZ');
define('SECURE_AUTH_KEY',  'vXp2iOq6PoNtbORXTAvJVutiHU6UQWqiS4ag9qmBcT3i3nf5x56H1TQA3V1yrLaY');
define('LOGGED_IN_KEY',    'VvESc4iqZilpdum4kEB0WwAgMYdcmdJrpiPDIpOqaoiw4gdwPrTP5uwTd0ltg4cL');
define('NONCE_KEY',        '2yM25ZOILDG8WXC4BBlyKYs7QcCAkwVxXxoMJKBzNzGUyAgrJAdoj3biwHblmzSR');
define('AUTH_SALT',        'S518g0yNyI1bOGXZ6k5EKliSe4KoGbueCYmPTHduzLehpJn50iRyBTpyAtItUAd0');
define('SECURE_AUTH_SALT', 'tiJS12BZLyuizE12IKfivQVDhJGZTLEwlV9cVYKR6NCfVlne3F3k531X8gOp4pm6');
define('LOGGED_IN_SALT',   'X3qrxY8yPpNC2Xmb1WMQPIMPPZgQJJNCPpi2LpHRALrubFK39uiEO7yjVM4Y04l9');
define('NONCE_SALT',       'CuLBPQQUSyDZYmlrXbL4zVpGxiK9lcEyAR1WfCNjbWxSRixhUKwzhzzLNhdMDsDr');

/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
