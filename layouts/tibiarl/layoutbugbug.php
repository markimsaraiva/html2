<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<html>
<script LANGUAGE="JavaScript">
function abrir(URL) 
{
window.open(URL, "", "top=40, left=40, width=250, height=100,scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no" );
}

</SCRIPT>
<?php
if(!defined('INITIALIZED'))
	exit;
?>
<html>
<head>
<style type="text/css">@charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide{display:none !important;}ng\:form{display:block;}.ng-animate-block-transitions{transition:0s all!important;-webkit-transition:0s all!important;}.ng-hide-add-active,.ng-hide-remove{display:block!important;}</style>
<script type="text/javascript">
  if(top.location != window.location) {
    top.location = self.location;
  }
</script>
<meta charset="utf-8">
<title><?PHP echo $title ?></title>
<meta name="description" content="Tibia is a free massively multiplayer online role-playing game (MMORPG)">
<meta name="author" content="Felipe">
<meta http-equiv="content-language" content="en">
<meta name="keywords" content="free online rpg, free mmorpg, mmorpg, mmog, online role playing game, online multiplayer game, internet game, online rpg, rpg">
<!--ICON-->
<link rel="shortcut icon" href="<?PHP echo $layout_name; ?>/images/general/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?PHP echo $layout_name; ?>/images/general/favicon.ico" type="image/x-icon">
<!--CSS'S-->
<link href="<?PHP echo $layout_name; ?>/css/basic_d.css" rel="stylesheet" type="text/css">
<link href="<?PHP echo $layout_name; ?>/css/news.css" rel="stylesheet" type="text/css">
<!--JS--> 
<script id="twitter-wjs" src="<?PHP echo $layout_name; ?>/js/widgets.js"></script>
<script id="facebook-jssdk" async src="<?PHP echo $layout_name; ?>/js/all.js"></script>
<script type="text/javascript" src="<?PHP echo $layout_name; ?>/js/jquery.js"></script>
<script type="text/javascript" src="<?PHP echo $layout_name; ?>/js/ajaxcip.js"></script>
<script type="text/javascript" src="<?PHP echo $layout_name; ?>/js/generic.js"></script>
<script type="text/javascript" src="<?PHP echo $layout_name; ?>/js/create_character.js"></script>
<script type="text/javascript">  
var loginStatus=0; 
loginStatus='<?PHP if($logged){ ?>true<?PHP }else{ ?>false<?PHP } ?>';  
var activeSubmenuItem='<?PHP echo $subtopic; ?>';  
var JS_DIR_IMAGES=0; 
JS_DIR_IMAGES='<?PHP echo $layout_name; ?>/images/';  
var JS_DIR_ACCOUNT=0; 
JS_DIR_ACCOUNT='';  
var g_FormName='';  
var g_FormField='';  
var g_Deactivated=false;
var FB_TryLogin = 0;
var FB_ForceReload = 0;
</script>
<script type="text/javascript">
  if(top.location != window.location) {
    top.location = self.location;
  }
</script>


<script type="text/javascript" src="<?PHP echo $layout_name; ?>/initialize.js"></script>

<link href="<?PHP echo $layout_name; ?>/css/facebook.css" rel="stylesheet" type="text/css">  
</head>

<body onbeforeunload="SaveMenu();" onunload="SaveMenu();" class="fadeIn" data-twttr-rendered="true" style="background-image:url(./layouts/tibiarl/images/header/background-artwork.jpg); background-repeat: no-repeat; background-position: 50% 0%;">
<script type="text/javascript">
  window.fbAsyncInit = function() {
    FB.init({
      appId      : 497232093667125, // App ID
      status     : true,              // check login status
      cookie     : true,              // enable cookies to allow the server to access the session
      xfbml      : true               // parse XFBML
    });
    FB.Event.subscribe('auth.login', function() {
      var URLHelper = "?";
      if (window.location.search.replace("?", "").length > 0) {
        URLHelper = "&";
      }
      if (FB_TryLogin == 1) {
        window.location = window.location + URLHelper + "step=facebooktrylogin&wasreloaded=1";
      } else if (FB_TryLogin == 2) {
        window.location = window.location + URLHelper + "page=facebooktrylogin&wasreloaded=1";
      } else {
        window.location = window.location + URLHelper + "wasreloaded=1";
      }
    });
    FB.Event.subscribe('auth.logout', function(a_Response) {
      if (a_Response.status !== 'connected') {
        window.location.href=window.location.href;
      } else {
        /* nothing to do here*/
      }
    });
    FB.Event.subscribe('auth.statusChange', function(response) {
      if (FB_ForceReload == 1 && response.status == "connected") {
        var URLHelper = "?";
        if (window.location.search.replace("?", "").length > 0) {
          URLHelper = "&";
        }
        window.location = window.location + URLHelper + "step=facebooktrylogin&wasreloaded=1";
      }
    });
  };
  (function(d){
    var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement('script'); js.id = id; js.async = true;
    js.src = "//connect.facebook.net/en_US/all.js";
    ref.parentNode.insertBefore(js, ref);
  }(document));
</script>
  <a name="top"></a>
  <div id="MainHelper1">
  	<div id="MainHelper2">
    	<div id="ArtworkHelper1">
        	<div id="ArtworkHelper2">
          		<div id="HeaderArtworkDiv" style="background-image:url();"></div>
        	</div>
      	</div>
		
      	<div id="DeactivationContainer" onclick="DisableDeactivationContainer();"></div>

      	<div id="Bodycontainer">
      	<div id="ContentRow">
          	<div id="MenuColumn">
            	<div id="LeftArtwork">
              		<a href="/?subtopic=latestnews">
						<img id="TibiaLogoArtworkTop" src="<?PHP echo $layout_name; ?>/images/header/tibia-logo-artwork-top.gif" alt="logoartwork">
					</a>
            	</div>
				
  				<?PHP include "loginbox.php"; ?>
				<div id="Menu">
					<div id="MenuTop" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/box-top.gif);"></div>
						<div id="news" class="menuitem">
							<span onclick="MenuItemAction('news')">
  								<div class="MenuButton" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/button-background.gif);">
    								<div onmouseover="MouseOverMenuItem(this);" onmouseout="MouseOutMenuItem(this);"><div class="Button" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/button-background-over.gif);"></div>
      								<span id="news_Lights" class="Lights">
        								<div class="light_lu" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);"></div>
										<div class="light_ld" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);"></div>
										<div class="light_ru" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);"></div>
      								</span>
									<div id="news_Icon" class="Icon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-news.gif);"></div>
									<div id="news_Label" class="Label" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/label-news.gif);"></div>
									<div id="news_Extend" class="Extend" style="background-image: url(<?PHP echo $layout_name; ?>/images/general/minus.gif);"></div>
    							</div>
  							</div>
						</span>
						<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
						
						<div id="news_Submenu" class="Submenu">
							<a href="?subtopic=latestnews">
  								<div id="submenu_latestnews" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
    								<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
    								<div id="ActiveSubmenuItemIcon_latestnews" class="ActiveSubmenuItemIcon" style="background-image: url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
    								<div id="ActiveSubmenuItemLabel_latestnews" class="SubmenuitemLabel"><span style="color:white;text-shadow: #9400D3 1px 1px 10px;"><img src="" alt=""><span style="background: transparent url(/layouts/tibiarl/images/menu/bg_menu.gif)">Latest News</span></span></div>
    								<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
  								</div>
							</a>
							<a href="?subtopic=archive">
  								<div id="submenu_archive" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
    								<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
									<div id="ActiveSubmenuItemIcon_archive" class="ActiveSubmenuItemIcon" style="background-image: url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
									<div id="ActiveSubmenuItemLabel_archive" class="SubmenuitemLabel"><span style="color:white;text-shadow: #9400D3 1px 1px 10px;"><img src="" alt=""><span style="background: transparent url(/layouts/tibiarl/images/menu/bg_menu.gif)">Noticias</span></span></div>
									<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
  								</div>
								
								<a href="?subtopic=cast">
  								<div id="submenu_cast" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
    								<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
									<div id="ActiveSubmenuItemIcon_cast" class="ActiveSubmenuItemIcon" style="background-image: url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
									<div id="ActiveSubmenuItemLabel_cast" class="SubmenuitemLabel"><span style="color:white;text-shadow: #9400D3 1px 1px 10px;"><img src="" alt=""><span style="background: transparent url(/layouts/tibiarl/images/menu/bg_menu.gif)">Cast System</span></span></div>
									<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
  								</div>
								
						</div>
					</div>
				<div id="wars" class="menuitem">
					<span onclick="MenuItemAction('library')">
						<div class="MenuButton" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/button-background2.gif);">
							<div onmouseover="MouseOverMenuItem(this);" onmouseout="MouseOutMenuItem(this);"><div class="Button" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/button-background-over2.gif);"></div>
							<span id="library_Lights" class="Lights">
								<div class="light_lu" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);"></div>
								<div class="light_ld" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);"></div>
								<div class="light_ru" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);"></div>
							</span>
							<div id="library_Icon" class="Icon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-wars.gif);"></div>
							<div id="library_Label" class="Label" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/label-wars.gif);"></div>
							<div id="library_Extend" class="Extend" style="background-image: url(<?PHP echo $layout_name; ?>/images/general/plus.gif);"></div>
						</div>
					</div>
				</span>
				
				<div id="library_Submenu" class="Submenu">
					<a href="?subtopic=wars">
						<div id="submenu_wars" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
							<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
							<div id="ActiveSubmenuItemIcon_wars" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
							<div id="ActiveSubmenuItemLabel_wars" class="SubmenuitemLabel"><span style="color:white;text-shadow: #FF0404 1px 1px 10px;"><img src="" alt=""><span style="background: transparent url(/layouts/tibiarl/images/menu/bg_menu.gif)">War System</span></span></div>
							<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						</div>
					</a>
					<a href="?subtopic=fraggers">
						<div id="submenu_fraggers" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
							<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
							<div id="ActiveSubmenuItemIcon_fraggers" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
							<div id="ActiveSubmenuItemLabel_fraggers" class="SubmenuitemLabel"><span style="color:white;text-shadow: #FF0404 1px 1px 10px;"><img src="" alt=""><span style="background: transparent url(/layouts/tibiarl/images/menu/bg_menu.gif)">Top Frags</span></span></div>
							<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						</div>
					</a>
					<a href="?subtopic=topguilds">
						<div id="submenu_topguilds" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
							<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
							<div id="ActiveSubmenuItemIcon_topguilds" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
							<div id="ActiveSubmenuItemLabel_topguilds" class="SubmenuitemLabel"><span style="color:white;text-shadow: #FF0404 1px 1px 10px;"><img src="" alt=""><span style="background: transparent url(/layouts/tibiarl/images/menu/bg_menu.gif)">Top Guilds</span></span></div>
							<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						</div>
					</a>
					<a href="?subtopic=experiencetable">
						
					
					
					</a>
				</div>
			</div>
			
			
			
			<div id="community" class="menuitem">
				<span onclick="MenuItemAction('community')">
					<div class="MenuButton" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/button-background3.gif);">
						<div onmouseover="MouseOverMenuItem(this);" onmouseout="MouseOutMenuItem(this);"><div class="Button" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/button-background-over3.gif);"></div>
						<span id="community_Lights" class="Lights">
							<div class="light_lu" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);"></div>
							<div class="light_ld" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);"></div>
							<div class="light_ru" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);"></div>
						</span>
						<div id="community_Icon" class="Icon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-community.gif);"></div>
						<div id="community_Label" class="Label" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/label-community.gif);"></div>
						<div id="community_Extend" class="Extend" style="background-image: url(<?PHP echo $layout_name; ?>/images/general/plus.gif);"></div>
					</div>
				</div>
			</span>
			
			<div id="community_Submenu" class="Submenu">
				<a href="?subtopic=characters">
					<div id="submenu_characters" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						<div id="ActiveSubmenuItemIcon_characters" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						<div id="ActiveSubmenuItemLabel_characters" class="SubmenuitemLabel"><span style="color:white;text-shadow: #FF0404 1px 1px 10px;"><img src="" alt=""><span style="background: transparent url(/layouts/tibiarl/images/menu/bg_menu.gif)">Characters</span></span></div>
						<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
					</div>
				</a>
				<a href="?subtopic=whoisonline">
					<div id="submenu_whoisonline" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						<div id="ActiveSubmenuItemIcon_whoisonline" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						<div id="ActiveSubmenuItemLabel_whoisonline" class="SubmenuitemLabel"><span style="color:white;text-shadow: #FF0404 1px 1px 10px;"><img src="" alt=""><span style="background: transparent url(/layouts/tibiarl/images/menu/bg_menu.gif)">Who is Online</span></span></div>
						<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
					</div>
				</a>
				<a href="?subtopic=highscores">
					<div id="submenu_highscores" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						<div id="ActiveSubmenuItemIcon_highscores" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						<div id="ActiveSubmenuItemLabel_highscores" class="SubmenuitemLabel"><span style="color:white;text-shadow: #FF0404 1px 1px 10px;"><img src="" alt=""><span style="background: transparent url(/layouts/tibiarl/images/menu/bg_menu.gif)">Highscores</span></span></div>
						<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
					</div>
				</a>
				<a href="?subtopic=killstatistics">
					<div id="submenu_killstatistics" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						<div id="ActiveSubmenuItemIcon_killstatistics" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						<div id="ActiveSubmenuItemLabel_killstatistics" class="SubmenuitemLabel"><span style="color:white;text-shadow: #FF0404 1px 1px 10px;"><img src="" alt=""><span style="background: transparent url(/layouts/tibiarl/images/menu/bg_menu.gif)">Kill Statics</span></span></div>
						<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
					</div>
				</a>
				
				<a href="?subtopic=guilds">
					<div id="submenu_guilds" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						<div id="ActiveSubmenuItemIcon_guilds" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						<div id="ActiveSubmenuItemLabel_guilds" class="SubmenuitemLabel"><span style="color:white;text-shadow: #FF0404 1px 1px 10px;"><img src="" alt=""><span style="background: transparent url(/layouts/tibiarl/images/menu/bg_menu.gif)">Guilds</span></span></div>
						<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
					</div>
				</a>
				
				
			</div>
		</div>
		
		
			<div id="forum" class="menuitem">
				<span onclick="MenuItemAction('forum')">
					<div class="MenuButton" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/button-background4.gif);">
						<div onmouseover="MouseOverMenuItem(this);" onmouseout="MouseOutMenuItem(this);"><div class="Button" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/button-background-over4.gif);"></div>
						<span id="forum_Lights" class="Lights">
							<div class="light_lu" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);"></div>
							<div class="light_ld" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);"></div>
							<div class="light_ru" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);"></div>
						</span>
						<div id="forum_Icon" class="Icon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-events.gif);"></div>
						<div id="forum_Label" class="Label" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/label-events.gif);"></div>
						<div id="forum_Extend" class="Extend" style="background-image: url(<?PHP echo $layout_name; ?>/images/general/plus.gif);"></div>
					</div>
				</div>
				
			</span>
			<div id="forum_Submenu" class="Submenu">
				<a href="?subtopic=warentrosa">
					<div id="submenu_warentrosa" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						<div id="ActiveSubmenuItemIcon_warentrosa" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						<div id="ActiveSubmenuItemLabel_warentrosa" class="SubmenuitemLabel"><span style="color:white;text-shadow: #3ea7fa 1px 1px 10px;"><img src="" alt=""><span style="background: transparent url(/layouts/tibiarl/images/menu/bg_menu.gif)">War Anti Entrosa <small><font color="#3ea7fa">[NEW]</font></small></span></span></div>
						<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
					</div>
				</a>
			<a href="?subtopic=warofemperium">
					<div id="submenu_warofemperium" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						<div id="ActiveSubmenuItemIcon_warofemperium" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						<div id="ActiveSubmenuItemLabel_warofemperium" class="SubmenuitemLabel"><span style="color:white;text-shadow: #3ea7fa 1px 1px 10px;"><img src="" alt=""><span style="background: transparent url(/layouts/tibiarl/images/menu/bg_menu.gif)">WOE <small><font color="#3ea7fa">[NEW]</font></small></span></span></div>
						<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
					</div>
				</a>

			<a href="?subtopic=castle24hr">
					<div id="submenu_castle24hr" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						<div id="ActiveSubmenuItemIcon_castle24hr" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						<div id="ActiveSubmenuItemLabel_castle24hr" class="SubmenuitemLabel"><span style="color:white;text-shadow: #3ea7fa 1px 1px 10px;"><img src="" alt=""><span style="background: transparent url(/layouts/tibiarl/images/menu/bg_menu.gif)">Castle 24H <small><font color="#3ea7fa">[NEW]</font></small></span></span></div>
						<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
					</div>
				</a>

			<a href="?subtopic=sellpoints">
					<div id="submenu_sellpoints" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						<div id="ActiveSubmenuItemIcon_sellpoints" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						<div id="ActiveSubmenuItemLabel_sellpoints" class="SubmenuitemLabel"><span style="color:white;text-shadow: #3ea7fa 1px 1px 10px;"><img src="" alt=""><span style="background: transparent url(/layouts/tibiarl/images/menu/bg_menu.gif)">Sell Points <small><font color="#3ea7fa">[NEW]</font></small></span></span></div>
						<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
					</div>
				</a>

          		<a href="?subtopic=battlefield">
					<div id="submenu_battlefield" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						<div id="ActiveSubmenuItemIcon_battlefield" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						<div id="ActiveSubmenuItemLabel_battlefield" class="SubmenuitemLabel"><span style="color:white;text-shadow: #3ea7fa 1px 1px 10px;"><img src="" alt=""><span style="background: transparent url(/layouts/tibiarl/images/menu/bg_menu.gif)">BattleField <small><font color="#3ea7fa">[NEW]</font></small></span></span></div>
						<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
					</div>
				</a>
			<a href="?subtopic=bandeira">
					<div id="submenu_bandeira" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						<div id="ActiveSubmenuItemIcon_bandeira" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						<div id="ActiveSubmenuItemLabel_bandeira" class="SubmenuitemLabel"><span style="color:white;text-shadow: #3ea7fa 1px 1px 10px;"><img src="" alt=""><span style="background: transparent url(/layouts/tibiarl/images/menu/bg_menu.gif)">Capture The Flag <small><font color="#3ea7fa">[NEW]</font></small></span></span></div>
						<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
					</div>
				</a>

                        <a href="?subtopic=addonbonus">
					<div id="submenu_addonbonus" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						<div id="ActiveSubmenuItemIcon_addonbonus" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						<div id="ActiveSubmenuItemLabel_addonbonus" class="SubmenuitemLabel"><span style="color:white;text-shadow: #3ea7fa 1px 1px 10px;"><img src="" alt=""><span style="background: transparent url(/layouts/tibiarl/images/menu/bg_menu.gif)">Addon Bonus <small><font color="#3ea7fa">[NEW]</font></small></span></span></div>
						<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
					</div>
				</a>
                        <a href="?subtopic=promotion">
					<div id="submenu_promotion" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						<div id="ActiveSubmenuItemIcon_promotion" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						<div id="ActiveSubmenuItemLabel_promotion" class="SubmenuitemLabel"><span style="color:white;text-shadow: #3ea7fa 1px 1px 10px;"><img src="" alt=""><span style="background: transparent url(/layouts/tibiarl/images/menu/bg_menu.gif)">New Promotion <small><font color="#3ea7fa">[NEW]</font></small></span></span></div>
						<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
					</div>
				</a>
			<a href="?subtopic=loteria">
					<div id="submenu_promotion" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						<div id="ActiveSubmenuItemIcon_loteria" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						<div id="ActiveSubmenuItemLabel_loteria" class="SubmenuitemLabel"><span style="color:white;text-shadow: #3ea7fa 1px 1px 10px;"><img src="" alt=""><span style="background: transparent url(/layouts/tibiarl/images/menu/bg_menu.gif)">Loteria VIP <small><font color="#3ea7fa">[NEW]</font></small></span></span></div>
						<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
					</div>
				</a>

			</div>
		</div>
			
			<div id="account" class="menuitem">
				<span onclick="MenuItemAction('account')">
  					<div class="MenuButton" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/button-background5.gif);">
    					<div onmouseover="MouseOverMenuItem(this);" onmouseout="MouseOutMenuItem(this);"><div class="Button" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/button-background-over5.gif);"></div>
      					<span id="account_Lights" class="Lights">
        					<div class="light_lu" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);"></div>
							<div class="light_ld" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);"></div>
							<div class="light_ru" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);"></div>
      					</span>
					  	<div id="account_Icon" class="Icon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-account.gif);"></div>
					  	<div id="account_Label" class="Label" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/label-account.gif);"></div>
					  	<div id="account_Extend" class="Extend" style="background-image: url(<?PHP echo $layout_name; ?>/images/general/plus.gif);"></div>
    				</div>
  				</div>
			</span>
			<div id="account_Submenu" class="Submenu">
			<?PHP
			if($group_id_of_acc_logged >= $config['site']['access_admin_panel']){
			?>
				<a href="?subtopic=cpanel">
  					<div id="submenu_cpanel" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						<div id="ActiveSubmenuItemIcon_cpanel" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						<div id="ActiveSubmenuItemLabel_cpanel" class="SubmenuitemLabel"><font color=red><span style="color:white;text-shadow: #FF0404 1px 1px 10px;"><img src="" alt=""><span style="background: transparent url(/layouts/tibiarl/images/menu/bg_menu.gif)">Admin Painel</span></span></font></div>
						<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
  					</div>
				</a>
			<?PHP } ?>
				<a href="?subtopic=accountmanagement">
  					<div id="submenu_accountmanagement" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						<div id="ActiveSubmenuItemIcon_accountmanagement" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						<div id="ActiveSubmenuItemLabel_accountmanagement" class="SubmenuitemLabel"><span style="color:white;text-shadow: #FF0404 1px 1px 10px;"><img src="" alt=""><span style="background: transparent url(/layouts/tibiarl/images/menu/bg_menu.gif)">Account Management</span></span></div>
						<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
  					</div>
				</a>
				<a href="?subtopic=createaccount">
  					<div id="submenu_createaccount" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
    					<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						<div id="ActiveSubmenuItemIcon_createaccount" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						<div id="ActiveSubmenuItemLabel_createaccount" class="SubmenuitemLabel"><span style="color:white;text-shadow: #FF0404 1px 1px 10px;"><img src="" alt=""><span style="background: transparent url(/layouts/tibiarl/images/menu/bg_menu.gif)">Create Account</span></span></div>
						<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
  					</div>
				</a>
				<?PHP
				if($config['site']['download_page']){
				?>
				<a href="?subtopic=download&action=downloadagreement">
  					<div id="submenu_download" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						<div id="ActiveSubmenuItemIcon_download" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						<div id="ActiveSubmenuItemLabel_download" class="SubmenuitemLabel"><span style="color:white;text-shadow: #FF0404 1px 1px 10px;"><img src="" alt=""><span style="background: transparent url(/layouts/tibiarl/images/menu/bg_menu.gif)">Download Client</span></span></div>
						<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
  					</div>
				</a>
				<?PHP } ?>
				<a href="?subtopic=lostaccount">
  					<div id="submenu_lostaccount" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						<div id="ActiveSubmenuItemIcon_lostaccount" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						<div id="ActiveSubmenuItemLabel_lostaccount" class="SubmenuitemLabel"><span style="color:white;text-shadow: #FF0404 1px 1px 10px;"><img src="" alt=""><span style="background: transparent url(/layouts/tibiarl/images/menu/bg_menu.gif)">Recuperar Account</span></span></div>
						<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
  					</div>
				</a>
			</div>
		</div>
			<div id="team" class="menuitem">
				<span onclick="MenuItemAction('team')">
  					<div class="MenuButton" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/button-background6.gif);">
    					<div onmouseover="MouseOverMenuItem(this);" onmouseout="MouseOutMenuItem(this);"><div class="Button" style="background-image: url(<?PHP echo $layout_name; ?>/images/menu/button-background-over6.gif);"></div>
      					<span id="team_Lights" class="Lights">
							<div class="light_lu" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);"></div>
							<div class="light_ld" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);"></div>
							<div class="light_ru" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);"></div>
      					</span>
						<div id="team_Icon" class="Icon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-support.gif);"></div>
						<div id="team_Label" class="Label" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/label-support.gif);"></div>
						<div id="team_Extend" class="Extend" style="background-image: url(<?PHP echo $layout_name; ?>/images/general/plus.gif);"></div>
    				</div>
  				</div>
			</span>
			<div id="team_Submenu" class="Submenu">
				<a href="?subtopic=tibiarules">
  					
				</a>
				<a href="?subtopic=team">
  					<div id="submenu_team" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						<div id="ActiveSubmenuItemIcon_team" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						<div id="ActiveSubmenuItemLabel_team" class="SubmenuitemLabel"><span style="color:white;text-shadow: #FF0404 1px 1px 10px;"><img src="" alt=""><span style="background: transparent url(/layouts/tibiarl/images/menu/bg_menu.gif)">Support List</span></span></div>
						<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
  					</div>
					<a href="?subtopic=serverinfo">
  					<div id="submenu_serverinfo" class="Submenuitem" onmouseover="MouseOverSubmenuItem(this)" onmouseout="MouseOutSubmenuItem(this)">
						<div class="LeftChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
						<div id="ActiveSubmenuItemIcon_serverinfo" class="ActiveSubmenuItemIcon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);"></div>
						<div id="ActiveSubmenuItemLabel_serverinfo" class="SubmenuitemLabel"><span style="color:white;text-shadow: #FF0404 1px 1px 10px;"><img src="" alt=""><span style="background: transparent url(/layouts/tibiarl/images/menu/bg_menu.gif)">Server Info</span></span></div>
						<div class="RightChain" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);"></div>
  					</div>
				</a>
			</div>
		</div>
		
		
		<?PHP
			if($config['site']['shop_system']){
		?>
			<div id="shops" class="menuitem">
				<span onclick="MenuItemAction('shops')">
  					<div class="MenuButton" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/button-background7.gif);">
    					<div onmouseover="MouseOverMenuItem(this);" onmouseout="MouseOutMenuItem(this);"><div class="Button" style="background-image: url(<?PHP echo $layout_name; ?>/images/menu/button-background-over7.gif);"></div>
      					<span id="shops_Lights" class="Lights">
							<div class="light_lu" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);"></div>
							<div class="light_ld" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);"></div>
							<div class="light_ru" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);"></div>
      					</span>
					  	<div id="shops_Icon" class="Icon" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-shops.gif);"></div>
					  	<div id="shops_Label" class="Label" style="background-image:url(<?PHP echo $layout_name; ?>/images/menu/label-shops.gif);"></div>
					  	<div id="shops_Extend" class="Extend" style="background-image: url(<?PHP echo $layout_name; ?>/images/general/plus.gif);"></div>
    				</div>
  				</div>
			</span>
			<div id="shops_Submenu" class="Submenu">
				<a href='?subtopic=buypoints'>
  					<div id='submenu_buypoints' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
    					<div class='LeftChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
						<div id='ActiveSubmenuItemIcon_buypoints' class='ActiveSubmenuItemIcon' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);'></div>
						<div class="SubmenuitemLabel"><span style="color:yellow;text-shadow: #ff8400 1px 1px 10px; background: transparent url(/layouts/tibiarl/images/menu/bg_menu.gif)">Buy Points</span></div>
						<div class='RightChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
  					</div>
				</a>
			<a href='?subtopic=promocao'>
  					<div id='submenu_promocao' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
    					<div class='LeftChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
						<div id='ActiveSubmenuItemIcon_promocao' class='ActiveSubmenuItemIcon' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);'></div>
						<div class="SubmenuitemLabel"><span style="color:yellow;text-shadow: #ff8400 1px 1px 10px; background: transparent url(/layouts/tibiarl/images/menu/bg_menu.gif)">Promoções</span></div>
						<div class='RightChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
  					</div>
				</a>
			<a href='?subtopic=confirmacao'>
  					<div id='submenu_confirmacao' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
						<div class='LeftChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
						<div id='ActiveSubmenuItemIcon_confirmacao' class='ActiveSubmenuItemIcon' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);'></div>
						<div class="SubmenuitemLabel"><span style="color:yellow;text-shadow: #ff8400 1px 1px 10px; background: transparent url(/layouts/tibiarl/images/menu/bg_menu.gif)">Confirmação Points</span></div>
						<div class='RightChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
  					</div>
				</a>

				<a href='?subtopic=shopsystem'>
  					<div id='submenu_shopsystem' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
						<div class='LeftChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
						<div id='ActiveSubmenuItemIcon_shopsystem' class='ActiveSubmenuItemIcon' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);'></div>
						<div class="SubmenuitemLabel"><blink style="color: #18ff00; text-shadow: #ffffff 1px 1px 10px; background: transparent url(/layouts/tibiarl/images/menu/bg_menu.gif)">Shop Online</blink></div>
						<div class='RightChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
  					</div>
				</a>
				<a href='?subtopic=shopguild'>
  					<div id='submenu_shopguild' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
						<div class='LeftChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
						<div id='ActiveSubmenuItemIcon_shopguild' class='ActiveSubmenuItemIcon' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);'></div>
						<div class="SubmenuitemLabel"><blink style="color: #18ff00; text-shadow: #ffffff 1px 1px 10px; background: transparent url(/layouts/tibiarl/images/menu/bg_menu.gif)">Shop Guild</blink></div>
						<div class='RightChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
  					</div>
				</a>
				<?PHP
				if($logged){
				?>
				<a href='?subtopic=shopsystem&action=show_history'>
  					<div id='submenu_show_history' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
						<div class='LeftChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
						<div id='ActiveSubmenuItemIcon_show_history' class='ActiveSubmenuItemIcon' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);'></div>
						<div class='SubmenuitemLabel'>History</div>
						<div class='RightChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
  					</div>
				</a>
				<?PHP } ?>
				<?PHP
				if($group_id_of_acc_logged >= $config['site']['access_admin_panel']){
				?>
				<a href='?subtopic=shopadmin'>
  					<div id='submenu_shopadmin' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
						<div class='LeftChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
						<div id='ActiveSubmenuItemIcon_shopadmin' class='ActiveSubmenuItemIcon' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);'></div>
						<div class='SubmenuitemLabel'><font color=0099FF>Shop Admin</font></div>
						<div class='RightChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
  					</div>
				</a>
				<a href='?subtopic=shopguildadmin'>
  					<div id='submenu_shopguildadmin' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
						<div class='LeftChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
						<div id='ActiveSubmenuItemIcon_shopguildadmin' class='ActiveSubmenuItemIcon' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);'></div>
						<div class='SubmenuitemLabel'><font color=#EB8305>ShopGuild Admin</font></div>
						<div class='RightChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
  					</div>
				</a>
				<?PHP } ?>
			</div>
		</div>
		<?PHP } ?>
		<div id="MenuBottom" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/box-bottom.gif);"></div>
	</div>
	<script type="text/javascript">InitializePage();</script></div>
    	<div id="ContentColumn">
        	<div id="Content" class="Content">
            	<div id="ContentHelper">
				<script type="text/javascript" src="<?PHP echo $layout_name; ?>/newsticker.js"></script>
				<?PHP echo $news_content; ?>
  				<div id="news" class="Box">
    				<div class="Corner-tl" style="background-image:url(<?PHP echo $layout_name; ?>/images/content/corner-tl.gif);"></div>
					<div class="Corner-tr" style="background-image:url(<?PHP echo $layout_name; ?>/images/content/corner-tr.gif);"></div>
					<div class="Border_1" style="background-image:url(<?PHP echo $layout_name; ?>/images/content/border-1.gif);"></div>
					<div class="BorderTitleText" style="background-image:url(<?PHP echo $layout_name; ?>/images/content/title-background-green.gif);"></div>
    				<img id="ContentBoxHeadline" class="Title" src="pages/headline.php?txt=<?PHP echo ucwords(str_replace('_', ' ', strtolower($subtopic))); ?>" alt="Contentbox headline">
    				<div class="Border_2">
      					<div class="Border_3">
        					<div class="BoxContent" style="background-image:url(<?PHP echo $layout_name; ?>/images/content/scroll.gif);">
								<?PHP echo $main_content; ?>
        					</div>
      					</div>
    				</div>
					<div class="Border_1" style="background-image:url(<?PHP echo $layout_name; ?>/images/content/border-1.gif);"></div>
					<div class="CornerWrapper-b"><div class="Corner-bl" style="background-image:url(<?PHP echo $layout_name; ?>/images/content/corner-bl.gif);"></div></div>
					<div class="CornerWrapper-b"><div class="Corner-br" style="background-image:url(<?PHP echo $layout_name; ?>/images/content/corner-br.gif);"></div></div>
  				</div>
              	<div id="ThemeboxesColumn">
                	<div id="DeactivationContainerThemebox" onclick="DisableDeactivationContainer();"></div>
                	<div id="RightArtwork">
                  		<img id="Monster" src="images/monster/marid.gif" onclick="window.location = #" alt="Monster of the Week">
                  		<img id="PedestalAndOnline" src="<?PHP echo $layout_name; ?>/images/header/pedestal-and-online.gif" alt="Monster Pedestal and Players Online Box">
                  		<div id="PlayersOnline" onClick="window.location='?subtopic=whoisonline'">
		  				    <?PHP
			if($config['status']['serverStatus_online'] == 1)
				echo $config['status']['serverStatus_players'].'<br />Players Online';
			else
				echo '<font color="red"><b>Server<br />OFFLINE</b></font>';
		  ?></div>
        </div>
                	<div id="Themeboxes">
					
					
					
					
<?php
$skills = $SQL->query('SELECT * FROM players WHERE deleted = 0 AND group_id = 1 AND account_id != 1 ORDER BY level DESC LIMIT 10');
?>
<style type="text/css" media="all">
  .Toplevelbox {

    top: -4px;

    position: relative;

    margin-bottom: 10px;

    width: 170px;

    height: 300px;

  }

  .top_level_x {

    position: absolute;

    top: 29px;

    left: 6px;

    height: 290px;

    width: 168px;

    z-index: 20;

    text-align: center;

    padding-top: 6px;

    font-family: Tahoma, Geneva, sans-serif;

    font-size: 9.2pt;

    color: black;

    font-weight: bold;

    text-align: right;

    text-decoration: inherit;

    text-shadow: 0.1em 0.1em #333

  }

  .top_level {

    position: absolute;

    top: 29px;

    left: 6px;

    height: 300px;

    width: 168px;

    z-index: 20;

    text-align: center;

    padding-top: 6px;

    font-family: Tahoma, Geneva, sans-serif;

    font-size: 9.2pt;

    color: black;

    font-weight: bold;

    text-align: right;

    text-decoration: inherit;

    text-shadow: 0.1em 0.1em #333

  }

  #Topbar a {
  text-decoration: none;
  cursor: auto;
  }
  a.topfont {
    font-family: Verdana, Arial, Helvetica; 
    font-size: 11px; 
    color: #ffcc33;
    text-decoration: none
  }
  a:hover.topfont {
    font-family: Verdana, Arial, Helvetica; 
    font-size: 11px;  
    color: #CCC; 
    text-decoration:none
  }
</style>
<div id="Topbar" class="Themebox" style="background-image:url(<?PHP echo $layout_name; ?>/images/themeboxes/top_level.png);">
  <div class="top_level" style="background:url(<?PHP echo $layout_name; ?>/images/themeboxes/bg_top.png)" align="	">
    <?php 
    $a = 1;
    
	foreach($skills as $skill) {
      
	  echo '<div align="left">
	  <a href="?subtopic=characters&name='.$skill['name'].'" class="topfont">
        <font color="#CCC">&nbsp;&nbsp;&nbsp;&nbsp;'.$a.' - </font>'.$skill['name'].'
        <br>
        <small><font color="white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Level: ('.$skill['level'].')</font></small>
        <br>
      </a>
	  
	   <img src="/images/outfit.php?id='.$skill['looktype'].'&addons='.$skill['lookaddons'].'&head='.$skill['lookhead'].'&body='.$skill['lookbody'].'&legs='.$skill['looklegs'].'&feet='.$skill['lookfeet'].'" width="64" height="64" style="width: 64px; height: 64px; position: absolute; background-position: 0 0; background-repeat: no-repeat; left: -50px; margin-top: -70px;">

      </div>';
	  
      $a++;
    }
    ?>
    <div class="Bottom" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/box-bottom.gif); margin-top: 70px;; margin-left:-5px;">
</div>	
</div>

  


<div id="fb-root"></div>


</br>



<?PHP
$time = time();
$viewpoll = $SQL->query('SELECT * FROM z_polls where end > '.$time.' ORDER BY id DESC LIMIT 1');
foreach($viewpoll as $p)
$polls .= '<center>'.$p['question'].'</center>';
    if(count($p['id']) > 0)
     echo '<div id="CurrentPollBox" class="Themebox" style="background-image:url('.$layout_name.'/images/themeboxes/current-poll/currentpollbox.gif);">
      <div id="CurrentPollText">'.$polls.'</div>
      <a class="ThemeboxButton" href="?subtopic=polls&id= '.$p['id'].'" onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif);"><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);"></div>
        <div class="ButtonText" style="background-image:url('.$layout_name.'/images/buttons/_sbutton_votenow.gif);"></div>
      </a>
    <div class="Bottom" style="background-image:url('.$layout_name.'/images/general/box-bottom.gif);"></div>
    </div>';
?>
						
						

						<!-- networks theme box -->
						<?PHP
						$nF = $SQL->query("SELECT " .$SQL->fieldName('network_link'). " FROM " .$SQL->tableName('z_network_box'). " WHERE " .$SQL->fieldName('network_name'). " = 'facebook'")->fetch();
						$nT = $SQL->query("SELECT " .$SQL->fieldName('network_link'). " FROM " .$SQL->tableName('z_network_box'). " WHERE " .$SQL->fieldName('network_name'). " = 'twitter'")->fetch();
						?>
						<?PHP if(!empty($nF)){ ?>
						<div id="NetworksBox" class="Themebox" style="background-image:url(<?PHP echo $layout_name; ?>/images/themeboxes/networks/networksbox.png);">
  							<div id="FacebookBlock">
    							<div id="FacebookLikeBox">
      								<div class="fb-like-box fb_iframe_widget" data-href="https://www.facebook.com/<?PHP echo $nF['network_link']; ?>" data-width="175" data-height="180" data-show-faces="true" data-stream="false" data-border-color="none" data-header="false" fb-xfbml-state="rendered">
										<span style="vertical-align: bottom; width: 181px; height: 180px;">
										</span>
									</div>
    							</div>
    							<div id="FacebookSendBox">
      								<div class="fb-send fb_iframe_widget" data-href="https://www.facebook.com/<?PHP echo $nF['network_link']; ?>" data-width="50" data-height="20" fb-xfbml-state="rendered">
										<span style="vertical-align: bottom; width: 50px; height: 20px;">
										</span>
									</div>
    							</div>
    							<div id="FacebookLikes">
      								<div class="fb-like fb_edge_widget_with_comment fb_iframe_widget" data-href="https://www.facebook.com/<?PHP echo $nF['network_link']; ?>" data-send="false" data-width="225" data-show-faces="false" fb-xfbml-state="rendered">
										<span style="height: 28px; width: 225px;">
										</span>
									</div>
    							</div>
  							</div>
							<?PHP if(!empty($nT)){ ?>
  							<div id="TwitterBlock">
    							<a href="https://twitter.com/<?PHP echo $nT['network_link']; ?>" class="twitter-follow-button" data-show-count="false">Follow @<?PHP echo $nT['network_link']; ?></a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
  							</div>
							<?PHP } ?>
  							<div class="Bottom" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/box-bottom.gif);"></div>
						</div>
						<?PHP } ?>
						<?PHP if($config['site']['screenshot_page']){ ?>
  						<!-- screenshot theme box -->
  						<div id="ScreenshotBox" class="Themebox" style="background-image:url(<?PHP echo $layout_name; ?>/images/themeboxes/screenshot/screenshotbox.gif);">
    						<a href="#">
      							<img id="ScreenshotContent" class="ThemeboxContent" src="images/screenshots/witch_thumb.gif" alt="Screenshot of the Day">
    						</a>
  							<div class="Bottom" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/box-bottom.gif);"></div>
  						</div>
						<?PHP } ?>
    					<!-- current poll theme box -->
						<?PHP
    						$time = time();
							$viewpoll = $SQL->query("SELECT * FROM `z_polls` where end > '$time' ORDER BY id DESC LIMIT 1");
							foreach($viewpoll as $p){
							$polls .= '<center>'.$p['question'].'</center>';
								if(isset($p['id'])){
								 echo '<div id="CurrentPollBox" class="Themebox" style="background-image:url('.$layout_name.'/images/themeboxes/current-poll/currentpollbox.gif);">
								  <div id="CurrentPollText">'.$polls.'</div>
								  <a class="ThemeboxButton" href="index.php?subtopic=polls&id= '.$p['id'].'" onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif);"><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);"></div>
									<div class="ButtonText" style="background-image:url('.$layout_name.'/images/buttons/_sbutton_votenow.gif);"></div>
								  </a>
								<div class="Bottom" style="background-image:url('.$layout_name.'/images/general/box-bottom.gif);"></div>
								</div>';
								}
							}
							?>

                	</div>
              	</div>
            </div>
		</div>
        <div id="Footer">
        	Copyright by CipSoft GmbH. All rights reserved.<br>
            <a href="#">About CipSoft</a> | 
			<a href="#">Service Agreement</a> | 
			<a href="#">Privacy Policy</a>
        </div>
	</div>
</div>
</div>
</div>
</div>
<style type="text/css">
/*<![CDATA[*/
#fbplikebox{display: block;padding: 0;z-index: 99999;position: fixed;}
.fbplbadge {background-color:#3B5998;display: block;height: 150px;top: 50%;margin-top: -75px;position: absolute;left: -47px;width: 47px;background-image: url("http://3.bp.blogspot.com/-1GCgbuSZXK0/T38iRiVF41I/AAAAAAAABpg/WlGuQ3fi-Rs/s1600/vertical-right.png");background-repeat: no-repeat;overflow: hidden;-webkit-border-top-left-radius: 8px;-webkit-border-bottom-left-radius: 8px;-moz-border-radius-topleft: 8px;-moz-border-radius-bottomleft: 8px;border-top-left-radius: 8px;border-bottom-left-radius: 8px;}
/*]]>*/
</style>
<script type="text/javascript">
/*<![CDATA[*/
    (function(w2b){
        w2b(document).ready(function(){
            var $dur = "medium"; // Duration of Animation
            w2b("#fbplikebox").css({right: -250, "top" : 100 })
            w2b("#fbplikebox").hover(function () {
                w2b(this).stop().animate({
                    right: 0
                }, $dur);
            }, function () {
                w2b(this).stop().animate({
                    right: -250
                }, $dur);
            });
            w2b("#fbplikebox").show();
        });
    })(jQuery);
/*]]>*/
</script>
<div id="fbplikebox" style="right: -250px; top: 100px;">
    <div class="fbplbadge"></div> 
    <iframe src="http://www.facebook.com/plugins/likebox.php?href=https://www.facebook.com/newbaiak/?fref=ts/963936866981152?fref=tsref=hl&amp;width=250&amp;height=250&amp;colorscheme=light&amp;show_faces=true&amp;border_color=%23C4C4C4&amp;stream=false&amp;header=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:250px; height:250px;background:#FFFFFF;" allowtransparency="true"></iframe>
</div>

  
  <script type="text/javascript">
    // disable all control elements which are not part of the content container element
    if (g_Deactivated == true) {
      document.getElementById('LoginButtonContainer').style.zIndex = "1";
      document.getElementById('DeactivationContainer').style.display = "block";
      document.getElementById('DeactivationContainer').style.zIndex = "50";
      document.getElementById('DeactivationContainerThemebox').style.display = "block";
      document.getElementById('Monster').style.cursor = "auto";
      document.getElementById('PlayersOnline').style.cursor = "auto";
      document.getElementById('ThemeboxesColumn').style.opacity = "0.30";
      document.getElementById('ThemeboxesColumn').style.MozOpacity = "0.30";
      document.getElementById('ThemeboxesColumn').filters.alpha.opacity = "0.75";
      document.getElementById('ThemeboxesColumn').style.filter = "alpha(opacity=50); opacity: 0.30";
      document.getElementById('Monster').setAttribute("onclick", "")
      document.getElementById('PlayersOnline').setAttribute("onclick", "")
    }
  </script>
  
  

  	<div id="HelperDivContainer" style="background-image: url(<?PHP echo $layout_name; ?>/images/content/scroll.gif);">
  		<div class="HelperDivArrow" style="background-image: url(<?PHP echo $layout_name; ?>/images/content/helper-div-arrow.png);"></div>
  		<div id="HelperDivHeadline"></div>
  		<div id="HelperDivText"></div>
 		<center>
  			<img class="Ornament" src="<?PHP echo $layout_name; ?>/images/content/ornament.gif">
  		</center>
  	<br>
	
	</div>
// JavaScript Document
var snowStorm=(function(window,document){this.flakesMax=60;this.flakesMaxActive=60;this.animationInterval=40;this.excludeMobile=true;this.flakeBottom=null;this.followMouse=true;this.snowColor='#fff';this.snowCharacter='&bull;';this.snowStick=false;this.targetElement=null;this.useMeltEffect=true;this.useTwinkleEffect=false;this.usePositionFixed=false;this.freezeOnBlur=true;this.flakeLeftOffset=0;this.flakeRightOffset=0;this.flakeWidth=5;this.flakeHeight=5;this.vMaxX=2.5;this.vMaxY=2.5;this.zIndex=100000;var s=this,storm=this,i,isIE=navigator.userAgent.match(/msie/i),isIE6=navigator.userAgent.match(/msie 6/i),isWin98=navigator.appVersion.match(/windows 98/i),isMobile=navigator.userAgent.match(/mobile/i),isBackCompatIE=(isIE&&document.compatMode==='BackCompat'),noFixed=(isMobile||isBackCompatIE||isIE6),screenX=null,screenX2=null,screenY=null,scrollY=null,vRndX=null,vRndY=null,windOffset=1,windMultiplier=2,flakeTypes=6,fixedForEverything=false,opacitySupported=(function(){try{document.createElement('div').style.opacity='0.5';}catch(e){return false;}
return true;}()),didInit=false,docFrag=document.createDocumentFragment();this.timers=[];this.flakes=[];this.disabled=false;this.active=false;this.meltFrameCount=20;this.meltFrames=[];this.events=(function(){var old=(!window.addEventListener&&window.attachEvent),slice=Array.prototype.slice,evt={add:(old?'attachEvent':'addEventListener'),remove:(old?'detachEvent':'removeEventListener')};function getArgs(oArgs){var args=slice.call(oArgs),len=args.length;if(old){args[1]='on'+args[1];if(len>3){args.pop();}}else if(len===3){args.push(false);}
return args;}
function apply(args,sType){var element=args.shift(),method=[evt[sType]];if(old){element[method](args[0],args[1]);}else{element[method].apply(element,args);}}
function addEvent(){apply(getArgs(arguments),'add');}
function removeEvent(){apply(getArgs(arguments),'remove');}
return{add:addEvent,remove:removeEvent};}());function rnd(n,min){if(isNaN(min)){min=0;}
return(Math.random()*n)+min;}
function plusMinus(n){return(parseInt(rnd(2),10)===1?n*-1:n);}
this.randomizeWind=function(){var i;vRndX=plusMinus(rnd(s.vMaxX,0.2));vRndY=rnd(s.vMaxY,0.2);if(this.flakes){for(i=0;i<this.flakes.length;i++){if(this.flakes[i].active){this.flakes[i].setVelocities();}}}};this.scrollHandler=function(){var i;scrollY=(s.flakeBottom?0:parseInt(window.scrollY||document.documentElement.scrollTop||document.body.scrollTop,10));if(isNaN(scrollY)){scrollY=0;}
if(!fixedForEverything&&!s.flakeBottom&&s.flakes){for(i=s.flakes.length;i--;){if(s.flakes[i].active===0){s.flakes[i].stick();}}}};this.resizeHandler=function(){if(window.innerWidth||window.innerHeight){screenX=window.innerWidth-(!isIE?16:16)-s.flakeRightOffset;screenY=(s.flakeBottom?s.flakeBottom:window.innerHeight);}else{screenX=(document.documentElement.clientWidth||document.body.clientWidth||document.body.scrollWidth)-(!isIE?8:0)-s.flakeRightOffset;screenY=s.flakeBottom?s.flakeBottom:(document.documentElement.clientHeight||document.body.clientHeight||document.body.scrollHeight);}
screenX2=parseInt(screenX/2,10);};this.resizeHandlerAlt=function(){screenX=s.targetElement.offsetLeft+s.targetElement.offsetWidth-s.flakeRightOffset;screenY=s.flakeBottom?s.flakeBottom:s.targetElement.offsetTop+s.targetElement.offsetHeight;screenX2=parseInt(screenX/2,10);};this.freeze=function(){var i;if(!s.disabled){s.disabled=1;}else{return false;}
for(i=s.timers.length;i--;){clearInterval(s.timers[i]);}};this.resume=function(){if(s.disabled){s.disabled=0;}else{return false;}
s.timerInit();};this.toggleSnow=function(){if(!s.flakes.length){s.start();}else{s.active=!s.active;if(s.active){s.show();s.resume();}else{s.stop();s.freeze();}}};this.stop=function(){var i;this.freeze();for(i=this.flakes.length;i--;){this.flakes[i].o.style.display='none';}
s.events.remove(window,'scroll',s.scrollHandler);s.events.remove(window,'resize',s.resizeHandler);if(s.freezeOnBlur){if(isIE){s.events.remove(document,'focusout',s.freeze);s.events.remove(document,'focusin',s.resume);}else{s.events.remove(window,'blur',s.freeze);s.events.remove(window,'focus',s.resume);}}};this.show=function(){var i;for(i=this.flakes.length;i--;){this.flakes[i].o.style.display='block';}};this.SnowFlake=function(parent,type,x,y){var s=this,storm=parent;this.type=type;this.x=x||parseInt(rnd(screenX-20),10);this.y=(!isNaN(y)?y:-rnd(screenY)-12);this.vX=null;this.vY=null;this.vAmpTypes=[1,1.2,1.4,1.6,1.8];this.vAmp=this.vAmpTypes[this.type];this.melting=false;this.meltFrameCount=storm.meltFrameCount;this.meltFrames=storm.meltFrames;this.meltFrame=0;this.twinkleFrame=0;this.active=1;this.fontSize=(10+(this.type/5)*10);this.o=document.createElement('div');this.o.innerHTML=storm.snowCharacter;this.o.style.color=storm.snowColor;this.o.style.position=(fixedForEverything?'fixed':'absolute');this.o.style.width=storm.flakeWidth+'px';this.o.style.height=storm.flakeHeight+'px';this.o.style.fontFamily='arial,verdana';this.o.style.overflow='hidden';this.o.style.fontWeight='normal';this.o.style.zIndex=storm.zIndex;docFrag.appendChild(this.o);this.refresh=function(){if(isNaN(s.x)||isNaN(s.y)){return false;}
s.o.style.left=s.x+'px';s.o.style.top=s.y+'px';};this.stick=function(){if(noFixed||(storm.targetElement!==document.documentElement&&storm.targetElement!==document.body)){s.o.style.top=(screenY+scrollY-storm.flakeHeight)+'px';}else if(storm.flakeBottom){s.o.style.top=storm.flakeBottom+'px';}else{s.o.style.display='none';s.o.style.top='auto';s.o.style.bottom='0px';s.o.style.position='fixed';s.o.style.display='block';}};this.vCheck=function(){if(s.vX>=0&&s.vX<0.2){s.vX=0.2;}else if(s.vX<0&&s.vX>-0.2){s.vX=-0.2;}
if(s.vY>=0&&s.vY<0.2){s.vY=0.2;}};this.move=function(){var vX=s.vX*windOffset,yDiff;s.x+=vX;s.y+=(s.vY*s.vAmp);if(s.x>=screenX||screenX-s.x<storm.flakeWidth){s.x=0;}else if(vX<0&&s.x-storm.flakeLeftOffset<-storm.flakeWidth){s.x=screenX-storm.flakeWidth-1;}
s.refresh();yDiff=screenY+scrollY-s.y;if(yDiff<storm.flakeHeight){s.active=0;if(storm.snowStick){s.stick();}else{s.recycle();}}else{if(storm.useMeltEffect&&s.active&&s.type<3&&!s.melting&&Math.random()>0.998){s.melting=true;s.melt();}
if(storm.useTwinkleEffect){if(!s.twinkleFrame){if(Math.random()>0.9){s.twinkleFrame=parseInt(Math.random()*20,10);}}else{s.twinkleFrame--;s.o.style.visibility=(s.twinkleFrame&&s.twinkleFrame%2===0?'hidden':'visible');}}}};this.animate=function(){s.move();};this.setVelocities=function(){s.vX=vRndX+rnd(storm.vMaxX*0.12,0.1);s.vY=vRndY+rnd(storm.vMaxY*0.12,0.1);};this.setOpacity=function(o,opacity){if(!opacitySupported){return false;}
o.style.opacity=opacity;};this.melt=function(){if(!storm.useMeltEffect||!s.melting){s.recycle();}else{if(s.meltFrame<s.meltFrameCount){s.meltFrame++;s.setOpacity(s.o,s.meltFrames[s.meltFrame]);s.o.style.fontSize=s.fontSize-(s.fontSize*(s.meltFrame/s.meltFrameCount))+'px';s.o.style.lineHeight=storm.flakeHeight+2+(storm.flakeHeight*0.75*(s.meltFrame/s.meltFrameCount))+'px';}else{s.recycle();}}};this.recycle=function(){s.o.style.display='none';s.o.style.position=(fixedForEverything?'fixed':'absolute');s.o.style.bottom='auto';s.setVelocities();s.vCheck();s.meltFrame=0;s.melting=false;s.setOpacity(s.o,1);s.o.style.padding='0px';s.o.style.margin='0px';s.o.style.fontSize=s.fontSize+'px';s.o.style.lineHeight=(storm.flakeHeight+2)+'px';s.o.style.textAlign='center';s.o.style.verticalAlign='baseline';s.x=parseInt(rnd(screenX-storm.flakeWidth-20),10);s.y=parseInt(rnd(screenY)*-1,10)-storm.flakeHeight;s.refresh();s.o.style.display='block';s.active=1;};this.recycle();this.refresh();};this.snow=function(){var active=0,used=0,waiting=0,flake=null,i;for(i=s.flakes.length;i--;){if(s.flakes[i].active===1){s.flakes[i].move();active++;}else if(s.flakes[i].active===0){used++;}else{waiting++;}
if(s.flakes[i].melting){s.flakes[i].melt();}}
if(active<s.flakesMaxActive){flake=s.flakes[parseInt(rnd(s.flakes.length),10)];if(flake.active===0){flake.melting=true;}}};this.mouseMove=function(e){if(!s.followMouse){return true;}
var x=parseInt(e.clientX,10);if(x<screenX2){windOffset=-windMultiplier+(x/screenX2*windMultiplier);}else{x-=screenX2;windOffset=(x/screenX2)*windMultiplier;}};this.createSnow=function(limit,allowInactive){var i;for(i=0;i<limit;i++){s.flakes[s.flakes.length]=new s.SnowFlake(s,parseInt(rnd(flakeTypes),10));if(allowInactive||i>s.flakesMaxActive){s.flakes[s.flakes.length-1].active=-1;}}
storm.targetElement.appendChild(docFrag);};this.timerInit=function(){s.timers=(!isWin98?[setInterval(s.snow,s.animationInterval)]:[setInterval(s.snow,s.animationInterval*3),setInterval(s.snow,s.animationInterval)]);};this.init=function(){var i;for(i=0;i<s.meltFrameCount;i++){s.meltFrames.push(1-(i/s.meltFrameCount));}
s.randomizeWind();s.createSnow(s.flakesMax);s.events.add(window,'resize',s.resizeHandler);s.events.add(window,'scroll',s.scrollHandler);if(s.freezeOnBlur){if(isIE){s.events.add(document,'focusout',s.freeze);s.events.add(document,'focusin',s.resume);}else{s.events.add(window,'blur',s.freeze);s.events.add(window,'focus',s.resume);}}
s.resizeHandler();s.scrollHandler();if(s.followMouse){s.events.add(isIE?document:window,'mousemove',s.mouseMove);}
s.animationInterval=Math.max(20,s.animationInterval);s.timerInit();};this.start=function(bFromOnLoad){if(!didInit){didInit=true;}else if(bFromOnLoad){return true;}
if(typeof s.targetElement==='string'){var targetID=s.targetElement;s.targetElement=document.getElementById(targetID);if(!s.targetElement){throw new Error('Snowstorm: Unable to get targetElement "'+targetID+'"');}}
if(!s.targetElement){s.targetElement=(!isIE?(document.documentElement?document.documentElement:document.body):document.body);}
if(s.targetElement!==document.documentElement&&s.targetElement!==document.body){s.resizeHandler=s.resizeHandlerAlt;}
s.resizeHandler();s.usePositionFixed=(s.usePositionFixed&&!noFixed);fixedForEverything=s.usePositionFixed;if(screenX&&screenY&&!s.disabled){s.init();s.active=true;}};function doDelayedStart(){window.setTimeout(function(){s.start(true);},20);s.events.remove(isIE?document:window,'mousemove',doDelayedStart);}
function doStart(){if(!s.excludeMobile||!isMobile){if(s.freezeOnBlur){s.events.add(isIE?document:window,'mousemove',doDelayedStart);}else{doDelayedStart();}}
s.events.remove(window,'load',doStart);}
s.events.add(window,'load',doStart,false);return this;}(window,document));
	
</body>
</html>