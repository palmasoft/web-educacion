<?php
/**
 * @package   TP_Runway
 * @copyright Copyright (C) 2015 - 2023 Open Source Matters, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 */

 defined('_JEXEC') or die;
 ?>

 <!-- TOPBAR -->
 <?php if ($this->countModules('topbar-left') || $this->countModules('topbar-right') ) : ?>
 <div id="jb-topbar" class="wrap  hidden-xs">
	<div class="container">
		<div class="row">
      <div class="jb-topbar col-lg-offset-3 col-lg-9">
    		<?php if ($this->countModules('topbar-left')) : ?>
    			<div class="col-xs-12 col-sm-6 col-md-5 col-lg-6 text-left t3-topbar-1  <?php $this->_c('topbar-left') ?>">
    				<jdoc:include type="modules" name="<?php $this->_p('topbar-left') ?>" style="T3Xhtml" />
    			</div>
    		<?php endif ?>

    		<?php if ($this->countModules('topbar-right')) : ?>
    			<div class="col-xs-12 col-sm-6 col-md-7 col-lg-6 t3-topbar-2 <?php $this->_c('topbar-right') ?>">
    				<jdoc:include type="modules" name="<?php $this->_p('topbar-right') ?>" style="T3Xhtml" />
    			</div>
    		<?php endif ?>
		</div>
  </div>
	</div>
</div>
<?php endif ?>
 <!-- //TOPBAR -->
