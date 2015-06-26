<?php
/**
 * @author 		Sijad aka Mr.Wosi
 * @link		<a href='http://skinod.com'>Skinod.com</a>
 * @copyright	2015 <a href='http://skinod.com'>Skinod.com</a>
 */

/**
 * Path to your IP.Board directory with a trailing /
 */
$_SERVER['SCRIPT_FILENAME']	= __FILE__;
$path	= '';

require_once $path . 'init.php';

\IPS\Session\Front::i();

if( \IPS\Member::loggedIn()->member_id )
{
	\IPS\Member::loggedIn()->skin = (int) \IPS\Request::i()->id;
	\IPS\Member::loggedIn()->save();
}
else
{
	\IPS\Request::i()->setCookie( 'theme', (int) \IPS\Request::i()->id );
}

/* Make sure VSE cookie is killed */
if ( isset( \IPS\Request::i()->cookie['vseThemeId'] ) )
{
	\IPS\Request::i()->setCookie( 'vseThemeId', 0 );
}

\IPS\Output::i()->redirect( \IPS\Http\Url::internal( '' ) );