<?php
/**
 * This file is part of OpenClinic
 *
 * Copyright (c) 2002-2004 jact
 * Licensed under the GNU GPL. For full terms see the file LICENSE.
 *
 * $Id: theme_new_form.php,v 1.1 2004/03/24 19:55:56 jact Exp $
 */

/**
 * theme_new_form.php
 ********************************************************************
 * Addition screen of a theme
 ********************************************************************
 * Author: jact <jachavar@terra.es>
 * Last modified: 24/03/04 20:55
 */

  ////////////////////////////////////////////////////////////////////
  // Controlling vars
  ////////////////////////////////////////////////////////////////////
  $tab = "admin";
  $nav = "themes";

  require_once("../shared/read_settings.php");
  require_once("../shared/login_check.php");
  require_once("../lib/input_lib.php");
  require_once("../shared/get_form_vars.php"); // to clean $postVars and $pageErrors

  // after login_check inclusion to avoid JavaScript mistakes in demo version
  $focusFormName = "forms[0]";
  $focusFormField = "theme_name";

  ////////////////////////////////////////////////////////////////////
  // Checking for query string flag to read data from database.
  // This is only used when copying an existing theme.
  ////////////////////////////////////////////////////////////////////
  if (isset($_GET["key"]))
  {
    $idTheme = $_GET["key"];

    include_once("../classes/Theme_Query.php");
    include_once("../lib/error_lib.php");

    $themeQ = new Theme_Query();
    $themeQ->connect();
    if ($themeQ->errorOccurred())
    {
      showQueryError($themeQ);
    }

    $themeQ->select($idTheme);
    if ($themeQ->errorOccurred())
    {
      $themeQ->close();
      showQueryError($themeQ);
    }
    $theme = $themeQ->fetchTheme();
    if ( !$theme )
    {
      showQueryError($themeQ, false);
    }
    else
    {
      $postVars["title_bg_color"] = $theme->getTitleBgColor();
      $postVars["title_font_family"] = $theme->getTitleFontFamily();
      $postVars["title_font_size"] = $theme->getTitleFontSize();
      $postVars["title_font_bold"] = ($theme->isTitleFontBold() ? "CHECKED" : "");
      $postVars["title_font_color"] = $theme->getTitleFontColor();
      $postVars["title_align"] = $theme->getTitleAlign();

      $postVars["body_bg_color"] = $theme->getBodyBgColor();
      $postVars["body_font_family"] = $theme->getBodyFontFamily();
      $postVars["body_font_size"] = $theme->getBodyFontSize();
      $postVars["body_font_color"] = $theme->getBodyFontColor();
      $postVars["body_link_color"] = $theme->getBodyLinkColor();

      $postVars["error_color"] = $theme->getErrorColor();

      $postVars["navbar_bg_color"] = $theme->getNavbarBgColor();
      $postVars["navbar_font_family"] = $theme->getNavbarFontFamily();
      $postVars["navbar_font_size"] = $theme->getNavbarFontSize();
      $postVars["navbar_font_color"] = $theme->getNavbarFontColor();
      $postVars["navbar_link_color"] = $theme->getNavbarLinkColor();

      $postVars["tab_bg_color"] = $theme->getTabBgColor();
      $postVars["tab_font_family"] = $theme->getTabFontFamily();
      $postVars["tab_font_size"] = $theme->getTabFontSize();
      $postVars["tab_font_bold"] = ($theme->isTabFontBold() ? "CHECKED" : "");
      $postVars["tab_font_color"] = $theme->getTabFontColor();
      $postVars["tab_link_color"] = $theme->getTabLinkColor();

      $postVars["table_border_color"] = $theme->getTableBorderColor();
      $postVars["table_border_width"] = $theme->getTableBorderWidth();
      $postVars["table_cell_padding"] = $theme->getTableCellPadding();
    }
    $themeQ->freeResult();
    $themeQ->close();
    unset($themeQ);
    unset($theme);
  }

  ////////////////////////////////////////////////////////////////////
  // Show page
  ////////////////////////////////////////////////////////////////////
  $title = _("Add New Theme");
  require_once("../shared/header.php");

  $returnLocation = "../admin/theme_list.php";

  ////////////////////////////////////////////////////////////////////
  // Navigation links
  ////////////////////////////////////////////////////////////////////
  require_once("../shared/navigation_links.php");
  $links = array(
    _("Admin") => "../admin/index.php",
    _("Themes") => $returnLocation,
    $title => ""
  );
  showNavLinks($links, "themes.png");
  unset($links);
?>

<script type="text/javascript" defer="defer">
<!--
function previewTheme()
{
  var secondaryWin = window.open("", "secondary", "resizable=yes,scrollbars=yes,width=535,height=400");

  document.forms[0].action = "../admin/theme_preview.php";
  document.forms[0].target = 'secondary';
  document.forms[0].submit();
}

function editTheme()
{
  document.forms[0].action = "../admin/theme_new.php";
  document.forms[0].target = '';
  document.forms[0].submit();
}
//-->
</script>

<?php
  echo '<p><a href="#" onclick="previewTheme(); return false;">' . _("Preview Theme") . "</a></p>\n";

  require_once("../shared/form_errors_msg.php");
?>

<form method="post" action="../admin/theme_new.php">
  <div>
<?php require_once("../admin/theme_fields.php"); ?>
  </div>
</form>

<?php require_once("../shared/footer.php"); ?>