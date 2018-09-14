<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_footer
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
?>
<div class="module">

	<!-- BACK TOP TOP BUTTON -->
	<div id="back-to-top" data-spy="affix" data-offset-top="300" class="back-to-top hidden-xs hidden-sm affix-top">
	  <button class="btn btn-primary" title="Back to Top"><i class="fa fa-angle-up"></i></button>
	</div>
	<!-- BACK TO TOP BUTTON -->
	
	<small><?php echo $lineone; ?> Created with <span style="color: #e02c3f">♥</span> by <a href="http://www.joomlabuff.com/" title="Visit joomlabuff.com!" <?php echo method_exists('T3', 'isHome') && T3::isHome() ? '' : 'rel="nofollow"' ?>>JoomlaBuff.com</a></small>
	<small><?php //echo JText::_( 'MOD_FOOTER_LINE2' ); ?></small>
</div>
