<?php
/**
 * @package   T3 Blank
 * @copyright Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// get params
$sitename  = $this->params->get('sitename');
$slogan    = $this->params->get('slogan', '');
$logotype  = $this->params->get('logotype', 'text');
$logoimage = $logotype == 'image' ? $this->params->get('logoimage', T3Path::getUrl('images/logo.png', '', true)) : '';
$logoimgsm = ($logotype == 'image' && $this->params->get('enable_logoimage_sm', 0)) ? $this->params->get('logoimage_sm', T3Path::getUrl('images/logo-sm.png', '', true)) : false;

if (!$sitename) {
	$sitename = JFactory::getConfig()->get('sitename');
}


?>

<!-- HEADER -->
<header id="t3-header" class="container t3-header">
	<div class="row">

		<!-- LOGO -->
		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 logo">
			<div class="logo-<?php echo $logotype, ($logoimgsm ? ' logo-control' : '') ?>">
				<a href="<?php echo JUri::base() ?>" title="<?php echo strip_tags($sitename) ?>">
					<?php if($logotype == 'image'): ?>
						<img class="logo-img" src="<?php echo JUri::base(true) . '/' . $logoimage ?>" alt="<?php echo strip_tags($sitename) ?>" />
					<?php endif ?>
					<?php if($logoimgsm) : ?>
						<img class="logo-img-sm" src="<?php echo JUri::base(true) . '/' . $logoimgsm ?>" alt="<?php echo strip_tags($sitename) ?>" />
					<?php endif ?>
					<span><?php echo $sitename ?></span>
				</a>
				<small class="site-slogan"><?php echo $slogan ?></small>
			</div>
		</div>
		<!-- //LOGO -->

		<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
		  <?php if ($this->countModules('head-contact')) : ?>
					<!-- HEAD CONTACT -->
					<div class="head-contact">
						<jdoc:include type="modules" name="<?php $this->_p('head-contact') ?>" style="raw" />
					</div>
					<!-- //HEAD CONTACT -->
			<?php endif ?>

			<!-- HEAD SEARCH -->
			<?php if ($this->countModules('head-search')) : ?>
				<div class="dropdown nav-search  pull-right <?php $this->_c('head-search') ?>">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
						<i class="fa fa-search"></i>
					</a>
					<div class="nav-child dropdown-menu">
						<div class="dropdown-menu-inner">
							<jdoc:include type="modules" name="<?php $this->_p('head-search') ?>" style="T3Xhtml" />
						</div>
					</div>
				</div>
			<?php endif ?>
			<!-- //HEAD SEARCH -->
		</div>




	</div>
</header>
<!-- //HEADER -->
