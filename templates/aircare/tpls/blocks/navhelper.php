<?php
/**
 * @package   T3 Blank
 * @copyright Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$title_on_bread  = $this->params->get('title_on_bread');
$t3_slogan  = $this->params->get('slogan');
// sample code for get extra field from active menu item
$menu = JFactory::getApplication()->getMenu();
$active = $menu->getActive() ? $menu->getActive() : $menu->getDefault();
$mas_title = $active->params->get('masthead-title');
$mas_slogan = $active->params->get('masthead-slogan');
if ( $mas_slogan != '' ) {
	$slogan = $mas_slogan;
} else {
	$slogan = $t3_slogan;
}
if ( $mas_slogan == '' && $t3_slogan == '' ) {
	$no_slogan = ' noSlogan';
} else {
	$no_slogan = '';
}
$headerImg = $active->params->get('headerImg');
if ($headerImg != '' ) {
	$navHelperBg = ' style="background-image: url('. $headerImg .');"';
	$navHelperBgClass = ' hasBg';
} else {
	$navHelperBg = '';
	$navHelperBgClass = '';
}
$breadStyle = $active->params->get('breadStyle');
$offcanvasstyle = $this->params->get('offcanvasstyle');
?>

<?php if ($this->countModules('navhelper') || $this->countModules('navhelperbg') ) : ?>
	<!-- NAV HELPER -->
	<nav class="wrap parallax-3 t3-navhelper navhelper-<?php echo $breadStyle .''. $navHelperBgClass .''. $no_slogan; ?><?php echo $offcanvasstyle == 'style-1' ? ' nh-col-1 text-center' : ''; ?><?php $this->_c('navhelper, navhelperbg') ?>"<?php echo $navHelperBg; ?>>
		<?php if ($headerImg == '' && $this->countModules('navhelperbg') ) : ?>
		<jdoc:include type="modules" name="<?php $this->_p('navhelperbg') ?>" />
		<?php endif; ?>
		<div class="navhelperbg <?php echo ( $title_on_bread == 1 && $offcanvasstyle != 'style-1' ) ? 'withTitle' : ''; ?>">
			<div class="container-removed">
				<?php if ( $offcanvasstyle != 'style-1' ) : ?>
				<div class="row">
					<?php if ($title_on_bread) : ?>
					<div class="col-md-12">
						<hgroup class="titleSlogan">
							<h1 class="pageTitle"><?php
								// $mydoc = JFactory::getDocument();
								// $mytitle = $mydoc->getTitle();
									// $menu = &JSite::getMenu();
									// $active = $menu->getActive();
									// $menuname = $active->title;
									// $parentId = $active->tree[0];
									// $parentName = $menu->getItem($parentId)->title;
									// echo $parentName;

								if ($mas_title != '') {
									echo $mas_title;
								} else {
									$mydoc = JFactory::getDocument();
									$mytitle = $mydoc->getTitle();

									$titleString = JString::strpos($mytitle, '||');
									if ($mytitle != '' && $titleString !== false) {
										$realTitle = mb_substr($mytitle, 0, $titleString);
										$titleInfo = mb_substr($mytitle, $titleString + 2);

										echo $realTitle;
									} else {
										$realTitle = '';
										$titleInfo = $mytitle;
										echo $mytitle;
									}
								}
							?></h1>
							<?php if ($slogan || $mas_slogan) : ?>
								<h3 class="white"><?php echo $slogan ?></h3>
							<?php endif ?>

						</hgroup>

						<div class="jb-navhealper">
							<div class="row">
								<div class="container <?php echo $title_on_bread == 1 ? : 'col-xs-12'; ?>">
									<jdoc:include type="modules" name="<?php $this->_p('navhelper') ?>" />
								</div>
							</div>
						</div>
					</div>

					<?php endif; ?>

				</div>
				<?php else : ?>
					<jdoc:include type="modules" name="<?php $this->_p('navhelper') ?>" />
					<?php if ($title_on_bread) : ?>
					<hgroup class="titleSlogan">
						<h1 class="pageTitle"><?php
							// $mydoc = JFactory::getDocument();
							// $mytitle = $mydoc->getTitle();
								// $menu = &JSite::getMenu();
								// $active = $menu->getActive();
								// $menuname = $active->title;
								// $parentId = $active->tree[0];
								// $parentName = $menu->getItem($parentId)->title;
								// echo $parentName;

							if ($mas_title != '') {
								echo $mas_title;
							} else {
								$mydoc = JFactory::getDocument();
								$mytitle = $mydoc->getTitle();

								$titleString = JString::strpos($mytitle, '||');
								if ($mytitle != '' && $titleString !== false) {
									$realTitle = mb_substr($mytitle, 0, $titleString);
									$titleInfo = mb_substr($mytitle, $titleString + 2);

									echo $realTitle;
								} else {
									$realTitle = '';
									$titleInfo = $mytitle;
									echo $mytitle;
								}
							}
						?></h1>
						<?php if ($slogan || $mas_slogan) : ?>
							<h4 class="site-slogan"><?php echo $slogan ?></h4>
						<?php endif ?>
					</hgroup>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</div>
	</nav>
	<!-- //NAV HELPER -->
<?php endif ?>
