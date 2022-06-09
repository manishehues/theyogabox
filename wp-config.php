<?php
define( 'WP_CACHE', false ); // Added by WP Rocket
define( 'WPCACHEHOME', '/var/www/vhosts/theyogabox.com/httpdocs/wp-content/plugins/wp-super-cache/' );
define('WP_AUTO_UPDATE_CORE', 'minor');// This setting is required to make sure that WordPress updates can be properly managed in WordPress Toolkit. Remove this line if this WordPress website is not managed by WordPress Toolkit anymore.
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
//define('DISALLOW_FILE_MODS',true);
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'theyo_10082020');
/** MySQL database username */
define('DB_USER','root');
/** MySQL database password */
define('DB_PASSWORD', '');
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
define('AUTH_KEY',         'ef/Ij6&`>*bk$fXxcMWU`6!r7E`<gfe<PsUP5WBmx?fk~iH:1_&4+)@XpjVDsuJ=');
define('SECURE_AUTH_KEY',  '=cA/i82ZAdF:m?|[&slUsBxV5eZ^VshhhH<l`10V:M.m@H7m.};kj72R^TL?mipr');
define('LOGGED_IN_KEY',    '!!p$45{(Es&^* IfQ0vnl;@Yok68){3^y. 35c@?jd GY{5_]BlOljE|*s?%:*YI');
define('NONCE_KEY',        'A%NX*p<]LP+I`I eVw=4)~#Wy.YZ#A-ZD~`/Hf<RehL`+<z0 <j|/G=yP_SmKp=4');
define('AUTH_SALT',        'CL+fK]}-t}:_Y*lQU:|6Q}gp6I`2x-O nU93i`|8sU9Ky%^lXF0Tw^8]@]UkQ2dw');
define('SECURE_AUTH_SALT', 'A2+R9|IUbG;YQc943w?D?z9_4W7&.PEeK]liNm{9bTr+D357o6liGW[/j`koC6ej');
define('LOGGED_IN_SALT',   'y^z6FLxh<L&`DuDrm1$P*P9RqkaeKQZ]d`T+lc2t>`7APLe#b<}Da6Ii|^E]+jJH');
define('NONCE_SALT',       '7Fy?ku1<V;h;08WdK<]$q2,;omg<i<J34E![:WDW{TCFd^Te{On~oRyQ`U66B:-5');
/**#@-*/
/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';
define('ALLOW_UNFILTERED_UPLOADS', false);
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
