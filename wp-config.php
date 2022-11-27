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

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'scholars' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         '442K`9#15M<~hj;.FSCozj[7oF{$&[K)cjfOMp4Hln1l/DV&pj9+0v>rU5=PQPjd' );
define( 'SECURE_AUTH_KEY',  'L0[$<`Uw`x>@z##>ntl7AgF%[Xc<)5_EGqOV*I^)#YFR%m229O*K+9?|)1!4ScJR' );
define( 'LOGGED_IN_KEY',    '}ca+W=LQ{g3v1k:EEyJj,yAy!K9Q2()5Y8qpO_qsWGMreW/)/(h,_0{/`OPJf7ft' );
define( 'NONCE_KEY',        '(1k_?3}swVY5Q9ar7cyto-Kxq|a/h/dh6Hc:pXQVW+=DI8M7t|E#9d~VYnwuU5MV' );
define( 'AUTH_SALT',        'l~N&cs~3!Ew2TAjH(9=;y/M]`),dqiFDGX$C>z><$T$-H/J>+0z@Bd&v1WDsjH[+' );
define( 'SECURE_AUTH_SALT', 'y|MR)#H?J5|_//G9@d ~L]r*ez:H@60$+=|6[Q2`8, }~Zm~A-qzv{9Nk><wkz.=' );
define( 'LOGGED_IN_SALT',   '8CSeEEv]xJ+bK([Pp_|-xJvL6FC(RtC8t4g{x+X9bnUt^!Co-lUYJ7,`idf6x{BZ' );
define( 'NONCE_SALT',       '`3NndUGRxd]:Z:yn]zZjAZD9yG^|_b;@#~8i-#(;w5g_udM}m*PteS|*E`D(vF9*' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'scholars_';

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
