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
define('DB_NAME', 'gwplabs_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define( 'FS_CHMOD_DIR', 0755 );
define( 'FS_CHMOD_FILE', 0644 );


define('FS_METHOD','direct');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'a%pX#Z#N4hD}=+bsw-<!<<l>$9kA<%V[thCE7d*KNB,;7)Rhoi^6BNU|}{x!G)mR');
define('SECURE_AUTH_KEY',  '+.J`9T|Qwi4xQFAdoY-:/z]N$i/f+c?<s3jk]b&k]cVb;w8k=s+I3uWF$[q<}`h~');
define('LOGGED_IN_KEY',    'NcfeWE4DQ#Pa|9w0/E2>cR&Z]Z(F+{81z08h@n(1gEv<HD>!N{3#cssNE-D]X9l)');
define('NONCE_KEY',        ':g^l5~rgI+nr0xvsG3=}ktPxaEVJ$W0;5{N0x)E-.i-T5=AMux*ZB3O73)|p4)&(');
define('AUTH_SALT',        'v6+#J|SD67[<}Wjp_`a<EF(%!f<ai}.Ww2qSuZ$PEC!0BJ)xps5(^[k?9$Csm/(B');
define('SECURE_AUTH_SALT', '1oE<I!+u* y? -R?Bo:^STJ:iklJ)ZS|7%s5[hkvX!#WK(=%|>>u*S|B(;Q=|-;>');
define('LOGGED_IN_SALT',   'R)kgH12u+UTqKBGT0[LL#(Ikwq0)i+?gy9ZphP,q3.wt_-8_;3 Or@(QHcrL(W,K');
define('NONCE_SALT',       'T.>^CDoMr=iVHGRFH2ZJp1>]i<,6)w>=T7>{$2mCp2Lz+b++:bBgA+1dE]9-dxlf');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wcv2_';

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
define('WP_DEBUG', true);
define('WP_ALLOW_REPAIR', true);
#define('FORCE_SSL_ADMIN', true);
/**
 * User Defined
 */
define('WP_MEMORY_LIMIT', '256M');


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');


error_reporting(E_ALL & ~E_NOTICE);