<?php
/**
 * SkinTemplate class for the Bauble skin
 */
class SkinBauble extends SkinTemplate {

	public $skinname = 'bauble';
	public $stylename = 'Bauble';
	public $template = 'BaubleTemplate';
	public $useHeadElement = true;

	/**
	 * Add CSS via ResourceLoader
	 */
	public function initPage(OutputPage $out) {

		$out->addMeta('viewport', 'width=device-width, initial-scale=1.0');

		$out->addModuleStyles(array(
			'mediawiki.skinning.interface',
			'mediawiki.skinning.content.externallinks',
			'skins.bauble'
		));

		$out->addModules( array(
			'skins.bauble.js'
		));
	}

	function setupSkinUserCss(OutputPage $out) {
		parent::setupSkinUserCss($out);
	}
}
