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

define( 'DB_NAME', 'bitnami_wordpress' );


/** Database username */

define( 'DB_USER', 'bn_wordpress' );


/** Database password */

define( 'DB_PASSWORD', 'd3e06a0f76878ee1106fe0f34bcffda69523058789c5bfae34d18958208cb091' );


/** Database hostname */

define( 'DB_HOST', 'localhost:3306' );


/** Database charset to use in creating database tables. */

define( 'DB_CHARSET', 'utf8' );


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

define( 'AUTH_KEY',         'UJsmiWc#jp d|hb+Jq!#xC3y2NP@|P4kD<N%Vl%>m9Z?JZMUyM&UqyAZc0E:&sRG' );

define( 'SECURE_AUTH_KEY',  'IS*O%_{UTrA}A-nM=8/*kc_;,%dX<9{X^ICLW?V3),&Q))qmOx:wVrbH6Ogzt3>m' );

define( 'LOGGED_IN_KEY',    'i?_(a,t5I253f,I:&NIo+{D@mBK?ciVS/#AJn/)EdSpL#wqvZK>}pjX`M/ShL|j#' );

define( 'NONCE_KEY',        'lFeDC4Z{d/`%;R|zw.R[pYhh4QK4h1<FPUfXemXWsvoPDo^=!|O &$4fUc8CpKJE' );

define( 'AUTH_SALT',        'V4@1wT<rfA3$lV`RV@g.u%hQ{;4%C%5;M*1aZb?&q[Eg%`[IuWO)0<@4mkdNWmu0' );

define( 'SECURE_AUTH_SALT', 'wH-OOJE$)mN7&s4L3UGOiZS:6PP=bD=?79!:,Om|#sZwj)`ZZcUEew!K[ZZZhUt?' );

define( 'LOGGED_IN_SALT',   'SvgxcOZRc(SHZQF0hD*5pr kb3g5J?In[8 f~s_KGd4O?m.&r)l,EIe4F123FLq0' );

define( 'NONCE_SALT',       'H;OyjW,<=>G/Z@z&=J@-FY!9)+J_J>@?ah/&{FvR9h`Z?fxmHD#`&ci]9c<=00R#' );


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

define( 'WP_DEBUG', false );


/* Add any custom values between this line and the "stop editing" line. */




define( 'FS_METHOD', 'direct' );
/**
 * The WP_SITEURL and WP_HOME options are configured to access from any hostname or IP address.
 * If you want to access only from an specific domain, you can modify them. For example:
 *  define('WP_HOME','http://example.com');
 *  define('WP_SITEURL','http://example.com');
 *
 */
if ( defined( 'WP_CLI' ) ) {
	$_SERVER['HTTP_HOST'] = '127.0.0.1';
}

define( 'WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] . '/' );
define( 'WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */


/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

	define( 'ABSPATH', __DIR__ . '/' );

}


/** Sets up WordPress vars and included files. */

require_once ABSPATH . 'wp-settings.php';

/**
 * Disable pingback.ping xmlrpc method to prevent WordPress from participating in DDoS attacks
 * More info at: https://docs.bitnami.com/general/apps/wordpress/troubleshooting/xmlrpc-and-pingback/
 */
if ( !defined( 'WP_CLI' ) ) {
	// remove x-pingback HTTP header
	add_filter("wp_headers", function($headers) {
		unset($headers["X-Pingback"]);
		return $headers;
	});
	// disable pingbacks
	add_filter( "xmlrpc_methods", function( $methods ) {
		unset( $methods["pingback.ping"] );
		return $methods;
	});
}
