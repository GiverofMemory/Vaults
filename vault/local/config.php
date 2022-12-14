<?php if (!defined('PmWiki')) exit();
##  This is a sample config.php file.  To use this file, copy it to
##  local/config.php, then edit it for whatever customizations you want.
##  Also, be sure to take a look at httpsss://www.pmwiki.org/wiki/Cookbook
##  for more details on the customizations that can be added to PmWiki.

######################
##Custom added lines##
##Custom added lines##
######################
## For more info: https://www.pmwiki.org/wiki/PmWiki/EditVariables

########### Cookbooks###########
########### Cookbooks###########

##Site Dump##
include_once("cookbook/sitedump.php");

##Section Edit##
include_once("cookbook/sectionedit.php");
$SectionEditLinkText = "";
$SectionEditHeaderLinkSpan = 1;
$SectionEditWithoutHeaders = false;
$SectionEditAutoDepth = 5;
$SectionEditHorzLines = true;

##Media Cat## Turned off so categories showed in the groupheader
include_once("$FarmD/cookbook/mediacat.php");
$AutoCreate['/^Category\./'] = array('ctime' => $Now, 'text' => $page['text']);

##Title Dict Index##
include_once('cookbook/titledictindex.php');
include_once('cookbook/titledictindexn.php');
include_once('cookbook/extdictindex.php');
$DictIndexShowLetterLinksByDefault = false;
$DictIndexShowLetterLinksByDefaultn = false;

##http variables##
include_once("$FarmD/cookbook/httpvariables.php");
$FmtPV['$HTTPVariablesAvailable'] = true;

############ END Cookbooks ##############
############ END Cookbooks ##############

########### Uploads ###########
$UploadPrefixFmt = '/$Group/$Name';
##  Enable uploads and set a site-wide default upload password.
$EnableUpload = 1;
$UploadPermAdd = 0;
## upload password can edit Main/HomePage and Site/Sidebar, and also upload files and set passwords on pages
# $DefaultPasswords['upload'] = pmcrypt('vault');
# $UploadDirQuota = 100000000; # limit total uploads to 100000KB (100MB)
# $UploadMaxSize = 52000; # limit each upload to 52KB
$UploadDir = "/Vaults-main/vault/uploads";
$UploadUrlFmt = "http://localhost/vault/uploads";
$LinkUploadCreateFmt = "<a rel='nofollow' class='createlinktext' href='\$LinkUpload'>\$LinkText</a>";

########### Skin ###########
$Skin = 'vector';
$GUIButtonDirUrlFmt = '$FarmPubDirUrl/skins/vector/guiedit';
$AutomaticChangeSummaries = 1;
$AutoCreateTalkPages = true;
$TalkPageTemplate = '$SiteGroup.TalkTemplate';
$VectorJumpBoxEnabled = true;

########### Talk Pages ###########
##  For the base name without the group, use {{$BaseName}$Name}
$BaseNamePatterns['/(-Talk|-Users|-Index)$/i'] = '';

########### Templates ###########
$EditTemplatesFmt = '{$Group}.Template';

########## Ref count ############
include_once("$FarmD/scripts/refcount.php");

########## Privacy ############
## These don't seem to work (nothing is logged) with any setting see vaults.php for the lines.
$EnableRevUserAgent = 0;  ## 1 means enable logging of users browser info when making a revision or post
$EnableRevHostIP = 0;     ## 1 means enable logging of users IP Address when making a revision or post
$EnablePostUserAgent = 0; ## 1 means enable logging of users browser info when making a new post
$EnablePostHostIP = 0;    ## 1 means enable logging of users IP Address when making a new post

########## Time Format ##########
##  The default setting of $TimeFmt is "%B %d, %Y, at %I:%M %p", which displays the name of the month (d), year (I), minutes (%M), and am/pm setting (%p)
##  The documentation for strftime (http://www.php.net/strftime) describes the various %-parameters that are available.
##  $TimeFmt='%m-%d-%Y %H:%M';     # mm-dd-yy hh:mm
##  $TimeFmt="%d.%m.%G, at %R %Z"; # german (ISO year) format
##  $TimeFmt='%F %R';              # yyyy-mm-dd hh:mm - International Standard ISO 8601
##  $TimeFmt='%Y %b %a %e %R';     # logical-scale full: (example: 2007 Jan Fri 26 00:29)
##  $TimeFmt='%Y %b%e %R UTC';     # logical-scale short: (example: 2007 Jan26 00:29 UTC)
##  $TimeFmt='%Y %b %e %R UTC';     # logical-scale short: (example: 2007 Jan 26 00:29 UTC)
$TimeFmt='%e %b %Y %R UTC';     # logical-scale short: similar to wikipedia (example: 26 Jan 2007 00:29 UTC)

########## Redirect #############
##  Redirect delay doesn't actually bring you to the page you are redirected from
##  $RedirectDelay = 2;

####################
##End custom lines##
##End custom lines##
####################

##disable nofollow for external links (so it improves web ranking of linked pages)
$UrlLinkFmt = "<a class='urllink' href='\$LinkUrl' target='_blank' title='\$LinkAlt'>\$LinkText</a>";

##$WikiTitle is the name that appears in the browser's title bar.
$WikiTitle = 'Vaults';

## Insert Table of Contents
$PmTOC['Enable'] = 1;
$PmTOC['EnableBacklinks'] = 1;

##  $ScriptUrl is the URL for accessing wiki pages with a browser.
##  $PubDirUrl is the URL for the pub directory.
## Eliminate "vaults.php" from URLs set enabelpathinfo to 0?
$EnablePathInfo = 1;
$ScriptUrl = 'http://localhost/vault/vaults.php';
$PubDirUrl = 'http://localhost/vault/pub';
$FarmPubDirUrl = 'http://localhost/vault/pub'; ##usually defaults to $pubdirurl

##  If you want to use URLs of the form .../vaults.php/Group/PageName
##  instead of .../vaults.php?p=Group.PageName, try setting
##  $EnablePathInfo below.  Note that this doesn't work in all environments,
##  it depends on your webserver and PHP configuration.  You might also
##  want to check https://www.pmwiki.org/wiki/Cookbook/CleanUrls more
##  details about this setting and other ways to create nicer-looking urls.
##  Enablepathinfo moved above.

## $PageLogoUrl is the URL for a logo image -- you can change this
## to your own logo.
$PageLogoUrl = "$PubDirUrl/skins/pmwiki/NV120.png";
$PageLogoAltUrl = "$PubDirUrl/skins/pmwiki/NV35.png"; 	# Mobile View



## If you want to have a custom skin, then set $Skin to the name
## of the directory (in pub/skins/) that contains your skin files.
## See PmWiki.Skins and Cookbook.Skins.
## Moved into custom code section at top.

#################
####Passwords####
#################
## You'll probably want to set an administrative password that you
## can use to get into password-protected pages.  Also, by default
## the "attr" passwords for the PmWiki and Main groups are locked, so
## an admin password is a good way to unlock those.  See PmWiki.Passwords
## and PmWiki.PasswordsAdmin, also PmWiki.Security is useful.
## How to create hashed passwords like this: PmWiki.PasswordsAdmin#crypt
# $DefaultPasswords['attr'] = pmcrypt('vault');
## admin password (and possibly attr) can edit the Site/Site and other Site/ pages and access and edit the SiteAdmin/ group and override all other passwords
# $DefaultPasswords['admin'] = pmcrypt('vault');
## edit password can edit other Main pages, PmWiki, NatureVault and other WikiGroups created by users (that don't have thier own passwords set using: https://www.pmwiki.org/wiki/PmWiki/Passwords)
# $DefaultPasswords['edit'] = pmcrypt('vault');
## ***upload password*** (found above in uploads section) is the same as edit password but can upload/attach files
# $DefaultPasswords['upload'] = pmcrypt('');


## Unicode (UTF-8) allows the display of all languages and all alphabets.
## Highly recommended for new wikis.
include_once("scripts/xlpage-utf-8.php");

## If you're running a publicly available site and allow anyone to
## edit without requiring a password, you probably want to put some
## blocklists in place to avoid wikispam.  See PmWiki.Blocklist.
# $EnableBlocklist = 1;                    # enable manual blocklists
# $EnableBlocklist = 10;                   # enable automatic blocklists

##  PmWiki comes with graphical user interface buttons for editing;
##  to enable these buttons, set $EnableGUIButtons to 1.
$EnableGUIButtons = 1;

##  To enable markup syntax from the Creole common wiki markup language
##  (https://www.wikicreole.org/), include it here:
include_once("scripts/creole.php");

##  Some sites may want leading spaces on markup lines to indicate
##  "preformatted text blocks", set $EnableWSPre=1 if you want to do
##  this.  Setting it to a higher number increases the number of
##  space characters required on a line to count as "preformatted text".
# $EnableWSPre = 1;   # lines beginning with space are preformatted (default)
# $EnableWSPre = 4;   # lines with 4 or more spaces are preformatted
# $EnableWSPre = 0;   # disabled

##  MOVED to upload section above
##  If you want uploads enabled on your system, set $EnableUpload=1.
##  You'll also need to set a default upload password, or else set
##  passwords on individual groups and pages.  For more information
##  see PmWiki.UploadsAdmin.
# $EnableUpload = 1;
# $DefaultPasswords['upload'] = pmcrypt('secret');
$UploadPermAdd = 0; # Recommended for most new installations

##  Setting $EnableDiag turns on the ?action=diag and ?action=phpinfo
##  actions, which often helps others to remotely troubleshoot
##  various configuration and execution problems.
# $EnableDiag = 1;                         # enable remote diagnostics

##  By default, PmWiki doesn't allow browsers to cache pages.  Setting
##  $EnableIMSCaching=1; will re-enable browser caches in a somewhat
##  smart manner.  Note that you may want to have caching disabled while
##  adjusting configuration files or layout templates.
# $EnableIMSCaching = 1;                   # allow browser caching

##  Set $SpaceWikiWords if you want WikiWords to automatically
##  have spaces before each sequence of capital letters.
# $SpaceWikiWords = 1;                     # turn on WikiWord spacing

##  Set $EnableWikiWords if you want to allow WikiWord links.
##  For more options with WikiWords, see scripts/wikiwords.php .
# $EnableWikiWords = 1;                    # enable WikiWord links

##  $DiffKeepDays specifies the minimum number of days to keep a page's
##  revision history.  The default is 3650 (approximately 10 years).
$DiffKeepDays=730000;                        # keep page history at least 2000 years

## By default, viewers are prevented from seeing the existence
## of read-protected pages in search results and page listings,
## but this can be slow as PmWiki has to check the permissions
## of each page.  Setting $EnablePageListProtect to zero will
## speed things up considerably, but it will also mean that
## viewers may learn of the existence of read-protected pages.
## (It does not enable them to access the contents of the pages.)
$EnablePageListProtect = 0;

##  The refcount.php script enables ?action=refcount, which helps to
##  find missing and orphaned pages.  See PmWiki.RefCount.
# if ($action == 'refcount') include_once("scripts/refcount.php");

##  The feeds.php script enables ?action=rss, ?action=atom, ?action=rdf,
##  and ?action=dc, for generation of syndication feeds in various formats.
if ($action == 'rss')  include_once("scripts/feeds.php");  # RSS 2.0
if ($action == 'atom') include_once("scripts/feeds.php");  # Atom 1.0
if ($action == 'dc')   include_once("scripts/feeds.php");  # Dublin Core
if ($action == 'rdf')  include_once("scripts/feeds.php");  # RSS 1.0

##  By default, pages in the Category group are manually created.
##  Uncomment the following line to have blank category pages
##  automatically created whenever a link to a non-existent
##  category page is saved.  (The page is created only if
##  the author has edit permissions to the Category group.)
$AutoCreate['/^Category\\./'] = array('ctime' => $Now);

##  PmWiki allows a great deal of flexibility for creating custom markup.
##  To add support for '*bold*' and '~italic~' markup (the single quotes
##  are part of the markup), uncomment the following lines.
##  (See PmWiki.CustomMarkup and the Cookbook for details and examples.)
Markup("'~", "<'''''", "/'~(.*?)~'/", "<i>$1</i>");        # '~italic~'
Markup("'*", "<'''''", "/'\\*(.*?)\\*'/", "<b>$1</b>");    # '*bold*'

##  If you want to have to approve links to external sites before they
##  are turned into links, uncomment the line below.  See PmWiki.UrlApprovals.
##  Also, setting $UnapprovedLinkCountMax limits the number of unapproved
##  links that are allowed in a page (useful to control wikispam).
# $UnapprovedLinkCountMax = 10;
# include_once("scripts/urlapprove.php");

##  The following lines make additional editing buttons appear in the
##  edit page for subheadings, lists, tables, etc.
# $GUIButtons['h2'] = array(400, '\\n!! ', '\\n', '$[Heading]',
#                     '$GUIButtonDirUrlFmt/h2.gif"$[Heading]"');
# $GUIButtons['h3'] = array(402, '\\n!!! ', '\\n', '$[Subheading]',
#                     '$GUIButtonDirUrlFmt/h3.gif"$[Subheading]"');
# $GUIButtons['indent'] = array(500, '\\n->', '\\n', '$[Indented text]',
#                     '$GUIButtonDirUrlFmt/indent.gif"$[Indented text]"');
# $GUIButtons['outdent'] = array(510, '\\n-<', '\\n', '$[Hanging indent]',
#                     '$GUIButtonDirUrlFmt/outdent.gif"$[Hanging indent]"');
# $GUIButtons['ol'] = array(520, '\\n# ', '\\n', '$[Ordered list]',
#                     '$GUIButtonDirUrlFmt/ol.gif"$[Ordered (numbered) list]"');
# $GUIButtons['ul'] = array(530, '\\n* ', '\\n', '$[Unordered list]',
#                     '$GUIButtonDirUrlFmt/ul.gif"$[Unordered (bullet) list]"');
# $GUIButtons['hr'] = array(540, '\\n----\\n', '', '',
#                     '$GUIButtonDirUrlFmt/hr.gif"$[Horizontal rule]"');
# $GUIButtons['table'] = array(600,
#                       '||border=1 width=80%\\n||!Hdr ||!Hdr ||!Hdr ||\\n||     ||     ||     ||\\n||     ||     ||     ||\\n', '', '',
#                     '$GUIButtonDirUrlFmt/table.gif"$[Table]"');
