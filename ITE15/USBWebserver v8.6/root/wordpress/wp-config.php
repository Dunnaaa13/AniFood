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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'usbw');

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
define('AUTH_KEY',         '#fo{Q?q_#Dpm|u!mn+HJ5yQS34Q`3Ow:sMibc vH~Bc}_mNASGB;{| Vc;K)3+~3');
define('SECURE_AUTH_KEY',  'R20OYK!Mh>;Kd_xDanrMA_-[UJIr.1CS]XJdBDyo$%;ZBv}SF$0#=cbD[7,u6<f^');
define('LOGGED_IN_KEY',    'iR k3& 52(q*U0`YVWu;,Ko^K!?~dfkZ3UK<TJMebr3zXVkURxZ`lDUn`t5t=J0U');
define('NONCE_KEY',        'w>C!I,e}VNH6JKG~7OfnL1!kgp8gH_=&PNj&O/NpWs[:.649RSz|qk7Q8*QZt~8_');
define('AUTH_SALT',        'C*qo(cI@-<{$dX>9fdJB[cFZ/cGBx+2B$LP`7?8`P2ev*RchR*k<5z4*|A=20.X{');
define('SECURE_AUTH_SALT', '!qkX*_hCe.{ymR].$>I;IKPxjBS{.g/2m!}s3%[eO]]i?z*+0`u8/U@aa{$!i0WP');
define('LOGGED_IN_SALT',   'M31<h3vBXZ*>l|5){TRk<di[xZI?m?l dEfCr|OJEQx;5V3l|d[08 fl`PVz@2C0');
define('NONCE_SALT',       'wY}@Opt-1^jbY9F?<kj*]>5zWdwkCtzNx(Q3G-^R%%mgmC&@S8Ugvgvm2p(oFx=#');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
