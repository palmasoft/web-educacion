<?php
/**
 * @package    Hotspots
 * @author     DanielDimitrov <daniel@compojoom.com>
 * @date       31.07.14
 *
 * @copyright  Copyright (C) 2008 - 2013 compojoom.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */
defined('_JEXEC') or die('Restricted access');

// Mootools has to load first. Otherwise we run into google maps issues with bind
JHTML::_('behavior.framework');

$doc = JFactory::getDocument();
$doc->addScript(HotspotsHelperUtils::getGmapsUrl());

$editor = JFactory::getEditor();
JHTML::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.keepalive');



JHTML::_('stylesheet', 'media/com_hotspots/css/hotspots-backend.css');
JHTML::_('script', 'media/com_hotspots/js/fixes.js');

JHTML::_('script', 'media/com_hotspots/js/moo/Class.SubObjectMapping.js');
JHTML::_('script', 'media/com_hotspots/js/moo/Map.js');
JHTML::_('script', 'media/com_hotspots/js/moo/Map.Extras.js');
JHTML::_('script', 'media/com_hotspots/js/moo/Map.Marker.js');
JHTML::_('script', 'media/com_hotspots/js/moo/Map.InfoWindow.js');
JHTML::_('script', 'media/com_hotspots/js/moo/Map.Geocoder.js');

JHTML::_('script', 'media/com_hotspots/js/helpers/helper.js');

JHTML::_('script', 'media/com_hotspots/js/core.js');
JHTML::_('script', 'media/com_hotspots/js/sandbox.js');
JHTML::_('script', 'media/com_hotspots/js/modules/submit.js');

$localization = HotspotsHelperUtils::getJsLocalization();
$options      = HotspotsHelperUtils::getJSVariables();
$domready     = <<<ABC
window.addEvent('domready', function() {
	hotspots = new compojoom.hotspots.core();
	{$options}
	hotspots.DefaultOptions.centerType = 0;
	hotspots.addSandbox('map-add', hotspots.DefaultOptions);
	hotspots.addModule('submit',hotspots.DefaultOptions);
	hotspots.startAll();
});
ABC;

$doc->addScriptDeclaration($domready);

echo CompojoomHtmlCtemplate::getHead(HotspotsHelperMenu::getMenu(), 'cpanel', '', '');
?>
	<script type="text/javascript">
		Joomla.submitbutton = function (button) {
			var form = document.getElementById('adminForm');
			if (button == 'hotspot.cancel' || document.formvalidator.isValid(form)) {
				<?php echo $this->form->getField('hotspotText')->save(); ?>
				Joomla.submitform(button, form);
				return true;
			}

			jQuery('html, body').animate({
				scrollTop: 0
			}, 500);

			return false;
		}
	</script>

	<form role="form" action="<?php echo JRoute::_('index.php?option=com_hotspots&view=hotspot&id=' . (int) $this->hotspot->id); ?>"
		method="post" class="form-horizontal" name="adminForm" id="adminForm" enctype="multipart/form-data">
		<div class="row">
			<div class="col-sm-8">
				<div class="box-info">
					<h2><?php echo empty($this->hotspot->id) ? JText::_('COM_HOTSPOTS_NEW_HOTSPOT') : JText::sprintf('COM_HOTSPOTS_EDIT_HOTSPOT', $this->hotspot->id); ?></h2>

					<div class="form-group">
						<?php echo $this->form->getLabel('title'); ?>
						<div class="col-sm-10">
							<?php echo $this->form->getInput('title'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo $this->form->getLabel('alias'); ?>
						<div class="col-sm-10">
							<?php echo $this->form->getInput('alias'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo $this->form->getLabel('catid'); ?>
						<div class="col-sm-10">
							<?php echo $this->form->getInput('catid'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo $this->form->getLabel('state'); ?>
						<div class="col-sm-10">
							<?php echo $this->form->getInput('state'); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 compojoom-control-label">
							<?php echo JText::_('JFIELD_ACCESS_LABEL'); ?>
						</label>

						<div class="col-sm-10">
							<?php echo $this->form->getInput('access'); ?>
						</div>
					</div>

					<?php if ($this->canDo->get('core.admin')): ?>
						<div class="form-group">
							<label class="col-sm-2 compojoom-control-label"><?php echo JText::_('JGLOBAL_ACTION_PERMISSIONS_LABEL'); ?></label>

							<div class="col-sm-10">
								<div class="blank">
									<button type="button" class="btn btn-default" onclick="document.location.href='#access-rules';">
										<?php echo JText::_('JGLOBAL_PERMISSIONS_ANCHOR'); ?>
									</button>
								</div>
							</div>
						</div>
					<?php endif; ?>

					<div class="form-group">
						<?php echo $this->form->getLabel('language'); ?>
						<div class="col-sm-10">
							<?php echo $this->form->getInput('language'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo $this->form->getLabel('id'); ?>
						<div class="col-sm-10">
							<?php echo $this->form->getInput('id'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo $this->form->getLabel('picture'); ?>
						<div class="col-sm-10">
							<?php echo $this->form->getInput('picture'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo $this->form->getLabel('hotspotText'); ?>
						<div class="col-sm-10">
							<?php echo $this->form->getInput('hotspotText'); ?>
						</div>
					</div>
					<div class="clr"></div>

					<div id="custom-fields" class="text-right"></div>

					<h2><?php echo JText::_('COM_HOTSPOTS_LOCATION_DETAILS'); ?></h2>

					<div id="hotspots-geolocation-info"></div>
					<div id="hotspots-geolocation">
						<img src="<?php echo JURI::root() ?>/media/com_hotspots/images/utils/person.png" alt="find my location"
							title="<?php echo JText::_('COM_HOTSPOTS_FIND_MY_LOCATION'); ?>" />
					</div>
					<div>

						<div class="form-group">
							<?php echo $this->form->getLabel('street'); ?>
							<div class="col-sm-9">
								<?php echo $this->form->getInput('street'); ?>
							</div>
						</div>

						<?php if (HotspotsHelperSettings::get('user_interface', 1) == 0) : ?>

							<div class="form-group">
								<?php echo $this->form->getLabel('plz'); ?>
								<div class="col-sm-10">
									<?php echo $this->form->getInput('plz'); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $this->form->getLabel('town'); ?>
								<div class="col-sm-10">
									<?php echo $this->form->getInput('town'); ?>
								</div>
							</div>
						<?php else: ?>
							<div class="form-group">
								<?php echo $this->form->getLabel('town'); ?>
								<div class="col-sm-10">
									<?php echo $this->form->getInput('town'); ?>
								</div>
							</div>
							<div class="form-group">
								<?php echo $this->form->getLabel('plz'); ?>
								<div class="col-sm-10">
									<?php echo $this->form->getInput('plz'); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $this->form->getLabel('administrative_area_level_1'); ?>
								<div class="col-sm-10">
									<?php echo $this->form->getInput('administrative_area_level_1'); ?>
								</div>
							</div>
						<?php endif; ?>
						<div class="form-group">
							<?php echo $this->form->getLabel('country'); ?>
							<div class="col-sm-10">
								<?php echo $this->form->getInput('country'); ?>
							</div>
						</div>
						<div class="form-group">
							<?php echo $this->form->getLabel('sticky', 'params'); ?>
							<div class="col-sm-10">
								<?php echo $this->form->getInput('sticky', 'params'); ?>
							</div>
						</div>

						<div id="map-add"
							title="<?php echo JText::_('COM_HOTSPOTS_MOVE_MARKER_DRAG'); ?>"></div>

						<div class="row offset2">
							<div class="col-sm-6">
								<?php echo $this->form->getLabel('gmlat'); ?>
								<?php echo $this->form->getInput('gmlat'); ?>
							</div>
							<div class="col-sm-6">
								<?php echo $this->form->getLabel('gmlng'); ?>
								<?php echo $this->form->getInput('gmlng'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="box-info full">
					<ul class="nav nav-tabs nav-justified">
						<li class="active">
							<a data-toggle="tab" href="#publishing">
								<?php echo JText::_('COM_HOTSPOTS_FIELDSET_PUBLISHING'); ?>
							</a>
						</li>
						<li>
							<a data-toggle="tab" href="#hs-custom">
								<?php echo JText::_('COM_HOTSPOTS_MARKER_FIELDSET_OPTIONS'); ?>
							</a>
						</li>
					</ul>
					<div class="tab-content">
						<div id="publishing" class="tab-pane active">
							<div class="form-group">
								<?php echo $this->form->getLabel('created_by'); ?>
								<div class="col-sm-8">
									<?php echo $this->form->getInput('created_by'); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $this->form->getLabel('created_by_alias'); ?>
								<div class="col-sm-8">
									<?php echo $this->form->getInput('created_by_alias'); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $this->form->getLabel('created'); ?>
								<div class="col-sm-8">
									<?php echo $this->form->getInput('created'); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $this->form->getLabel('publish_up'); ?>
								<div class="col-sm-8">
									<?php echo $this->form->getInput('publish_up'); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $this->form->getLabel('publish_down'); ?>
								<div class="col-sm-8">
									<?php echo $this->form->getInput('publish_down'); ?>
								</div>
							</div>

							<?php if ($this->hotspot->modified_by) : ?>
								<div class="form-group">
									<?php echo $this->form->getLabel('modified_by'); ?>
									<div class="col-sm-8">
										<?php echo $this->form->getInput('modified_by'); ?>
									</div>
								</div>

								<div class="form-group">
									<?php echo $this->form->getLabel('modified'); ?>
									<div class="col-sm-8">
										<?php echo $this->form->getInput('modified'); ?>
									</div>
								</div>
							<?php endif; ?>
						</div>
						<div id="hs-custom" class="tab-pane">
							<?php echo $this->loadTemplate('params'); ?>
						</div>
					</div>

				</div>
			</div>
		</div>

		<?php if ($this->canDo->get('core.admin')): ?>
			<div class="row">
				<div class="col-sm-12">
					<div id="access-rules" class="box-info">
						<h2><?php echo JText::_('COM_HOTSPOTS_FIELDSET_RULES'); ?></h2>
						<?php echo $this->form->getInput('rules'); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<input type="hidden" name="task" value="" />
		<input type="hidden" id="hotspot-id" name="hotspot-id" value="<?php echo (int) $this->hotspot->id; ?>" />
		<?php echo JHTML::_('form.token'); ?>
	</form>

<?php
// Show Footer
echo CompojoomHtmlCTemplate::getFooter(HotspotsHelperBasic::getFooterText());
