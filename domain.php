<?php
/*
	MRWhois Lite v. 2.3 - a Whois lookup script written in PHP.
	Copyright (C) 2001-2009 Marek Rozanski
	http://www.mrscripts.co.uk

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

	// change it here - if you changed the file name from mrwhois.php to something else

	define('FILE_NAME',					'domain.php');

	// Language settings

	define('PAGE_TITLE_META', 			'Student Domain name registration');			// Title to be used in META tag within HEADER
	define('POWERED_BY',				'Powered by Namesfx');			// Text to display in a footer, please do not change if you don't have to

	define('MAIN_COMMAND', 				'Please enter a suggested domain name');	// Command in a main window
	define('CHECK_BUTTON', 				'Check');									// Check button text
	define('META_CHARSET',				'iso-8859-1');								// Charset to be used in META tags
	define('META_LANGUAGE',				'en');										// Language to be used in META tags

	define('FOOTER_TEXT', 				'Please wait for the answer - 
										 due to whois servers overload it may take a while to lookup all names.
										 Sometimes you may need to reload the page and repeat lookup.');				// text in footer
	define('FOOTER_RELOAD_TEXT',		'Reload');					// text of the link to reload the page

	// This is an extra layer displayed during domain search. It is helpfull when someone is
	// searching for all domains at once.
	// If you are not confident with layers at all
	// just disable it - set the first value below to false.

	define('WAIT_LAYER_ENABLED',		true);
	define('WAIT_TITLE',				'Please wait...');
	define('WAIT_MESSAGE',				'If the lookup takes too long (more than a minute), click here to reload the page and try again.');

	define('LINK_REGISTER_TEXT',		'Register');						// Register link text
	define('STATUS_BAR_REGISTER_TEXT',	'Register');						// Status bar register message - when hovered over the "Register" link
	define('STATUS_BAR_DETAILS',		'Details of');						// Status bar "Details of" - when hovered over "Details" link
	define('LINK_TAKEN_DETAILS',		'Details');							// "Details" text
	define('LINK_TAKEN_GOTO',			'Goto');						// "Goto" text

	define('ALL_TEXT',					'all');						// Text to display for all domains checking
	define('CLOSE_BUTTON_TEXT',			'Close window');					// "Close" button text in a details window
	define('AVAILABLE_TEXT',			'Available');						// Text displayed if the domain is available
	define('NOT_AVAILABLE_TEXT',		'Taken');						// Text displayed if the domain is not available

	define('ERROR_TOO_SHORT',			'The domain name you typed is too short - it must contain minimum 3 characters'); 			// Error message if the domain name is too short
	define('ERROR_TOO_LONG',			'The domain name you typed is too long - it may contain maximum 63 characters');		// Error message if the domain name is too long
	define('ERROR_HYPHEN',				'Domain names cannot begin or end with a hyphen or contain double hyphens');			// Error message if the domain starts with hyphen or contains double hyphen
	define('ERROR_CHARACTERS',			'Domain names can only contain alphanumerical characters and hyphens');								// Error message if the domain contains other characters than letters, digits or hyphens

	// DESIGN PARAMETERS
	
	define('MAIN_STYLE','
			BODY {
				background-color: 	#ffffff;
				color: 				#000000;
				
				font-size: 			12px;
			}
			TD {
				color: 				#000000;
				font-family: 		"Verdana, Arial, Helvetica";
				font-size: 			12px;
			}
			
			.available {
				color: 				#006600;
				font-family: 		"Verdana, Arial, Helvetica";
				font-size: 			12px;
			}
			
			.notavailable {
				color: 				#FF0000;
				font-family: 		"Verdana, Arial, Helvetica";
				font-size: 			12px;
			}
			.separator {
				background-color:	#dddddd;
			}
			.footer {
				color: 				#000080;
				font-family: 		"Verdana, Arial, Helvetica";
				font-size: 			10px;
			}
			.windowborder {
				background-color:	#cccccc;
			}
			.windowinside {
				background-color:	#ffffff;
			}
			.errors {
				color: 				#FF0000;
				font-family: 		"Verdana, Arial, Helvetica";
				font-size: 			12px;
			}
			A {
				font-family: 		"Verdana, Arial, Helvetica";
				font-size: 			12px;
				color:				#000000;
				text-decoration:	none;
			}
			A:hover {
				font-family: 		"Verdana, Arial, Helvetica";
				font-size: 			12px;
				color:				#FF0000;
				text-decoration:	underline;
			}
			A.footer {
				font-family: 		"Verdana, Arial, Helvetica";
				color: 				#FF0000;
				text-decoration: 	none;
				font-size:			10px;
			}
			A.footer:hover {
				font-family: 		"Verdana, Arial, Helvetica";
				color:				#FF0000;
				text-decoration: 	underline;
				font-size:			10px;
			}
			A.footerreload {
				font-family: 		"Verdana, Arial, Helvetica";
				color: 				#FF0000;
				text-decoration: 	none;
				font-size:			12px;
			}
			A.footerreload:hover {
				font-family: 		"Verdana, Arial, Helvetica";
				color:				#FF0000;
				text-decoration: 	underline;
				font-size:			12px;
			}
			A.footerpowered {
				font-family: 		"Verdana, Arial, Helvetica";
				color: 				#000000;
				text-decoration: 	none;
				font-size:			10px;
			}
			A.footerpowered:hover {
				font-family: 		"Verdana, Arial, Helvetica";
				color:				#FF0000;
				text-decoration: 	underline;
				font-size:			10px;
			}
			



		  ');		// change it to whatever you like

	// Define lookup variables

	// .com domains
	define('COM_SERVER', 	"whois.verisign-grs.com");			// server to lookup for domain name
	define('COM_NOMATCH',	"No match");							// string returned by server if the domain is not found
	define('COM_INCLUDE',	true);									// include this domain in lookup

	// .net domains
	define('NET_SERVER', 	"whois.verisign-grs.com");			// server to lookup for domain name
	define('NET_NOMATCH',	"No match");							// string returned by server if the domain is not found
	define('NET_INCLUDE',	true);									// include this domain in lookup

	// .org domains
	define('ORG_SERVER',	'whois.publicinterestregistry.net');	// server to lookup for domain name
	define('ORG_NOMATCH',	'NOT FOUND');								// string returned by server if the domain is not found
	define('ORG_INCLUDE',	true);									// include this domain in lookup

	// .info domains
	define('INFO_SERVER',	'whois.afilias.net');					// server to lookup for domain name
	define('INFO_NOMATCH',	'Not found');							// string returned by server if the domain is not found
	define('INFO_INCLUDE',	true);									// include this domain in lookup

	// .biz domains
	define('BIZ_SERVER',	'whois.nic.biz');						// server to lookup for domain name
	define('BIZ_NOMATCH',	'Not found');							// string returned by server if the domain is not found
	define('BIZ_INCLUDE',	true);									// include this domain in lookup

	// Shall we use register link? (true/false)
	define('REG_LINK',	true);
	// If yes, give the url, it can be your affiliate link
	define('REG_URL',	'http://www.namesfx.co.uk/n_w_namesfx/free_domain_form/html-contact-form.php');

	// Do you want a log file? (true/false)
	define('WANTLOG',	true);
	// If yes, give the log file name here
	// remember to chmod the file to 777 (change permition to writable for everyone)
	define('LOGFILE',	'domain.log');


/* 
	#################################################################################################################
	End of variables, you do not need to change anythin below this line.
	#################################################################################################################
*/ 
echo '<br>';

	if ($_POST['type']!="") define('TYPE', $_POST['type']); else define('TYPE', '');
	if ($_POST['ddomain']!="") define('DDOMAIN', $_POST['ddomain']); else define('DDOMAIN', '');

	// This function displays an available domain
	function dispav($what)
	{
		echo '<tr><td nowrap align="center">';
		if (REG_LINK)
		{
			
			echo '<form action="http://www.namesfx.co.uk/n_w_namesfx/free_domain_form/html-contact-form.php" method="post">
			
 <input type="hidden" name="fname" value="'.$what.'">

<input type="submit" value="Register">
</form>';
		}
		else
			echo '&nbsp;';
		echo '</td>
		<td nowrap align="center" class="available"><b>'.$what.'</b></td><td colspan=3>&nbsp;</td></tr>';
   }

   // Function to display an unavailable domain with additional links
   function dispun($what,$where)
   {
      echo '<tr>
	  			<td colspan="2">&nbsp;</td>
	            <td align="center" nowrap class="notavailable"><b>'.$what.'</b></td>
            <td nowrap align="center">
			<a href="'.FILE_NAME.'?action=details&ddomain='.$what.'&server='.$where.'" onMouseOver="window.status=\''.STATUS_BAR_DETAILS.' '.$what.'\';return true" onMouseOut="window.status=\'\';return true" onClick="NewWindow(this.href,\'details\',\'620\',\'400\',\'yes\');return false;">
			'.LINK_TAKEN_DETAILS.'</a></td>
            <td nowrap align="center"><a href="http://www.'.$what.'" target="_blank">'.LINK_TAKEN_GOTO.'</a></td>
            </tr>';
   }

   function startborder()
   {
      echo '<table align="center" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr><td width="100%" class="windowborder" valign="top">

            <table width="100%" border="0" cellspacing="1" cellpadding="2">
            <tr><td class="windowinside" valign="top">';
   }


   function endborder()
   {
      echo '</td></tr></table></td></tr></table>';
   }

   function disperror($text)
   {
      startborder();
      echo '<center><b class="errors">'.$text.'</b></center>';
      endborder();
   }

   function main()
   {
      echo '';
      startborder();
      echo '
      <table border="0" width="100%">
<tbody>
<tr>
<td background="http://www.namesfx.co.uk/n_w_namesfx/images/server_small1.png" valign="top">
<p><img src="http://www.namesfx.co.uk/n_w_namesfx/images/namesfx_title_nfx.png" border="0"></p><br><br>
<table border="0" cellspacing="4" cellpadding="4" width="100%">
<tbody>
<tr>
<td width="550" valign="top"><span style="font-family: Tahoma; color: #000000; font-size: large;"><strong>Bring your <span style="color: #006699;"> Domain to life </span></strong></span>
<p class="text">
Register your interest to start your domain through Namesfx.co.uk and we will help you<br /> bring your domain to life with a low cost domain name registration and hosting,<br /> personalized e-mail address, website and Cloud Drive. We register the domain in your name.
</p>
</td>
</tr>
</tbody>
</table>
<br><br>

</td>
</tr>
</tbody>
</table><table width="100%" align="center" cellspacing="4" cellpadding="4" border="0" >
      <tr>
      <td colspan="2" align="left" width="100%"><p></p><b>'.MAIN_COMMAND.'</b></td>
      </tr>
      <tr>
      <td align="left">
<table width="300" align="left" cellspacing="0" cellpadding="1" border="0" >
      <tr><td width="40%" align="left"></td><td>
         <form method="POST" action="'.FILE_NAME.'">
         <input type="hidden" name="action" value="checkdom">
         <input type="hidden" name="type" value="'.TYPE.'">
         <b>www.</b><input type="text" name="ddomain" size="30" maxlength="63" value="'.DDOMAIN.'">&nbsp;
		 <input type="submit" name="button" value="'.CHECK_BUTTON.'">
      </td></tr></table></td>
      <td align="left">';

	if (COM_INCLUDE) { echo '<INPUT TYPE="radio" '; if(TYPE=='com' or TYPE == '') { echo 'CHECKED '; } echo ' NAME="type" VALUE="com"> com<br>'; }
	if (NET_INCLUDE) { echo '<INPUT TYPE="radio" '; if(TYPE=='net')  { echo 'CHECKED '; } echo ' NAME="type" VALUE="net"> net<br>';	}
	if (ORG_INCLUDE) { echo '<INPUT TYPE="radio" '; if(TYPE=='org')  { echo 'CHECKED '; } echo ' NAME="type" VALUE="org"> org<br>';	}
	if (INFO_INCLUDE){ echo '<INPUT TYPE="radio" '; if(TYPE=='info') { echo 'CHECKED '; } echo ' NAME="type" VALUE="info"> info<br>'; }
	if (BIZ_INCLUDE) { echo '<INPUT TYPE="radio" '; if(TYPE=='biz')  { echo 'CHECKED '; } echo ' NAME="type" VALUE="biz"> biz<br>'; }
	echo '<INPUT TYPE="radio" '; if(TYPE=='all')  { echo 'CHECKED '; } echo ' NAME="type" VALUE="all"> '.ALL_TEXT.'';
	echo '</form>
      </td>
      </tr>
  
      </table>
	  <table border="0" cellspacing="4" cellpadding="4" width="100%">
<tbody>
<tr>
<td width="550" valign="top"><span style="font-family: Tahoma; color: #000000; font-size: large;"><strong>Award-winning <span style="color: #006699;"> free start-up </span></strong></span>
<p class="text">
Award-winning business start up for both individuals and business users. Whether it’s your first website or you are an advanced user, a low cost start-up web hosting package gives you everything you need
</p>
</td>
</tr>
</tbody>
</table>
	  ';
      endborder();
   }

	function pageheader()
	{
		echo '
		<html>
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset='.META_CHARSET.'">
			<meta http-equiv="Content-Language" content="'.META_LANGUAGE.'">
			<title>'.PAGE_TITLE_META.'</title>
			<style>'.MAIN_STYLE.'</style>
			<script type=text/javascript>
			var win= null;
			function NewWindow(mypage,myname,w,h,scroll)
			{
				var winl = (screen.width-w)/2;
			  	var wint = (screen.height-h)/2;
				var settings  ="height="+h+",";
				settings +="width="+w+",";
				settings +="top="+wint+",";
				settings +="left="+winl+",";
				settings +="scrollbars="+scroll+",";
				settings +="resizable=yes";
				win=window.open(mypage,myname,settings);
				if(parseInt(navigator.appVersion) >= 4){win.window.focus();}
			}
			</script>
			<link rel="stylesheet" href="http://www.namesfx.co.uk/n_w_namesfx/templates/newnfx/css/template.css" type="text/css" />
		</head>
		<BODY>';
	}
	function pagefooter()
	{
		echo '</BODY></HTML>';
	}


if ($_GET['action'] == "details")
{
	$server = $_GET['server'];
	$ddomain = $_GET['ddomain'];
	pageheader();
	echo '<pre>';
	$fp = fsockopen($server,43);
	fputs($fp, "$ddomain\r\n");
	while(!feof($fp))
	{
		echo fgets($fp,128);
	}
	fclose($fp);
	echo '</pre>';
	echo '<p align="center"><form><input type="button" value="'.CLOSE_BUTTON_TEXT.'" onclick="window.close()"></form>';
	pagefooter();
	exit;
}

elseif ($_POST['action']=='checkdom')
{
	if (WAIT_LAYER_ENABLED)
	{
		echo '
		<script language=javascript>
		var ie4 = (document.all) ? true : false;
		var ns4 = (document.layers) ? true : false;
		var ns6 = (document.getElementById && !document.all) ? true : false;
		
		function hidelayer(lay) {
			if (ie4) {document.all[lay].style.visibility = "hidden";}
			if (ns4) {document.layers[lay].visibility = "hide";}
			if (ns6) {document.getElementById([lay]).style.display = "none";}
		}

		function showlayer(lay) {
			if (ie4) {document.all[lay].style.visibility = "visible";}
			if (ns4) {document.layers[lay].visibility = "show";}
			if (ns6) {document.getElementById([lay]).style.display = "block";}
		}
		</script>';

		echo '
		<script language="javascript">
		var laywidth  = screen.width/2;
		var layheight = screen.height/2;
		var layl   = (screen.width-laywidth)/2;
	  	var layt   = (screen.height-layheight)/2;
		document.write("<div id=\'waitlayer\' align=\'center\' style=\'position:absolute; width:"+laywidth+"px; height:"+layheight+"px; z-index:-1; left:"+layl+"px; top:"+layt+"px; visibility: visible;\'>");
		</script>';

  		echo '<center><b>'.WAIT_TITLE.'</b><br><br>
		<a href="'.FILE_NAME.'" target="_self">'.WAIT_MESSAGE.'</a>
		</div>';
	}

	// Check the name for bad characters
	if(strlen(DDOMAIN) < 3)
	{
		pageheader();
		disperror(ERROR_TOO_SHORT);
		main();
		pagefooter();
		exit;
	}
	if(strlen(DDOMAIN) > 63)
	{
		pageheader();
		disperror(ERROR_TOO_LONG);
		main();
		pagefooter();
		exit;
	}
	if(ereg("^-|-$",DDOMAIN))
	{
		pageheader();
		disperror(ERROR_HYPHEN);
		main();
		pagefooter();
		exit;
	}
	if(!ereg("([a-z]|[A-Z]|[0-9]|-){".strlen(DDOMAIN)."}",DDOMAIN))
	{
		pageheader();
		disperror(ERROR_CHARACTERS);
		main();
		pagefooter();
		exit;
	}
	pageheader();
	startborder();


   echo '
      <p><img src="http://www.namesfx.co.uk/n_w_namesfx/images/search_results.png" border="0"></p>
	  <table width="100%" align="center" cellspacing="0" cellpadding="1">
         <tr>
            <td nowrap align="center" class="separator"><b>&nbsp;</b></td>
            <td nowrap align="center" class="separator"><b>'.AVAILABLE_TEXT.'</b></td>
            <td nowrap align="center" class="separator"><b>'.NOT_AVAILABLE_TEXT.'</b></td>
            <td nowrap align="center" class="separator"><b>&nbsp;</b></td>
            <td nowrap align="center" class="separator"><b>&nbsp;</b></td>
         </tr>';

	if ( (TYPE == "all" or TYPE == "com") and COM_INCLUDE )
	{
		$domname = DDOMAIN.".com";
		$ns = fsockopen(COM_SERVER,43); fputs($ns,"$domname\r\n");
		$result = '';
		while(!feof($ns)) $result .= fgets($ns,128); fclose($ns);
		if (eregi(COM_NOMATCH,$result)) { dispav($domname); } else { dispun($domname,COM_SERVER); }
		echo '<tr><td colspan="5" class="separator">&nbsp;</td></tr>';
	}
	if ( (TYPE == "all" or TYPE == "net") and NET_INCLUDE )
	{
		$domname = DDOMAIN.".net";
		$ns = fsockopen(NET_SERVER,43); fputs($ns,"$domname\r\n");
		$result = '';
		while(!feof($ns)) $result .= fgets($ns,128); fclose($ns);
		if (eregi(NET_NOMATCH,$result)) { dispav($domname); } else { dispun($domname,NET_SERVER); }
		echo '<tr><td colspan="5" class="separator">&nbsp;</td></tr>';
	}

	if ( (TYPE == "all" or TYPE == "org") and ORG_INCLUDE )
	{
		$domname = DDOMAIN.".org";
		$ns = fsockopen(ORG_SERVER,43); fputs($ns,"$domname\r\n");
		$result = '';
		while(!feof($ns)) $result .= fgets($ns,128); fclose($ns);
		if (eregi(ORG_NOMATCH,$result)) { dispav($domname); } else { dispun($domname,ORG_SERVER); }
		echo '<tr><td colspan="5" class="separator">&nbsp;</td></tr>';
	}

	if ( (TYPE == "all" or TYPE == "info") and INFO_INCLUDE )
	{
		$domname = DDOMAIN.".info";
		$ns = fsockopen(INFO_SERVER,43); fputs($ns,"$domname\r\n");
		$result = '';
		while(!feof($ns)) $result .= fgets($ns,128); fclose($ns);
		if (eregi(INFO_NOMATCH,$result)) { dispav($domname); } else { dispun($domname,INFO_SERVER); }
		echo '<tr><td colspan="5" class="separator">&nbsp;</td></tr>';
	}

	if ( (TYPE == "all" or TYPE == "biz") and BIZ_INCLUDE )
	{
		$domname = DDOMAIN.".biz";
		$ns = fsockopen(BIZ_SERVER,43); fputs($ns,"$domname\r\n");
		$result = '';
		while(!feof($ns)) $result .= fgets($ns,128); fclose($ns);
		if (eregi(BIZ_NOMATCH,$result)) { dispav($domname); } else { dispun($domname,BIZ_SERVER); }
		echo '<tr><td colspan="5" class="separator">&nbsp;</td></tr>';
	}

	echo '</table>';
	endborder();
	if (WAIT_LAYER_ENABLED)
	{
		echo '<script language="javascript">
		hidelayer("waitlayer");
		</script>';
	}

	// if logging enabled write info to the file
	if(WANTLOG)
	{
		$remote_addr = $REMOTE_ADDR;
		$today = date("d-m-y H:i", time());
		if (file_exists(LOGFILE) and is_writeable(LOGFILE))
		{
			$fp = fopen(LOGFILE,"a+");
			$infolog = "Date: $today | IP: $remote_addr | ".DDOMAIN."\n";
			fputs($fp, $infolog);
			fclose($fp);
		}
	}
	main();
	pagefooter();
}

else

{
	pageheader();
	main();
	pagefooter();
}
?> 