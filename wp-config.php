<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'golden_coast' );

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
define( 'AUTH_KEY',         'ycHz5#D+Xi_nWds!dzrfi8,zM:,qTJwETU*K8Vv%:Fi;@aYf[QZP_[3)g lwm$gn' );
define( 'SECURE_AUTH_KEY',  '2xx@h(A`=S:gexd@Czo<VuYRa*fav;ZD[^R]3E`+HPU4<165:: V]los~Uf8#>R[' );
define( 'LOGGED_IN_KEY',    'PSuKX+O$j.6-X[:N_t>[,,+8pJ2lN`-Z}Plp4/wNy%b:NXR@<(F5GzWF4xE{F;_q' );
define( 'NONCE_KEY',        ' +)izW,Q#Zz!4gaLXNy*buiJp+3{Ftf[INuU$5VyP(/QH&fp`ZINe,O2QF.QLIl$' );
define( 'AUTH_SALT',        'JU;H`2t:_xvhj<L)Jbnr+y|M7dp!iy&<$c5@5!0<%E`|7qhP%R9eCqS2ZZX~C5oL' );
define( 'SECURE_AUTH_SALT', 'Zxd2=y8ls._J8=:9gh$rTcSd*).Bd=e=&?;|X$,ybpK(]e&InnWvZr`J/-[M_&1Q' );
define( 'LOGGED_IN_SALT',   '&}=)1GD=+B]b8dk6*-1FtWAyibD+{8MFFMCb+d*P_#,>_aRaE5UOzQ$`J|LbDhSK' );
define( 'NONCE_SALT',       '-#2*FPzh?L&|p;Lcg6|7WtW)0F>wQd2QDu|#>^#BP]3SBP??jS?.YYtki{9..1tz' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'gc_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
