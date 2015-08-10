/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.filebrowserUploadUrl = '/packages/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl = '/packages/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	
	config.toolbar = 'TadToolbar';	//FULL	全部
	config.toolbar_TadToolbar =
	[
		['Source','-','Templates','-','Cut','Copy','Paste','PasteText','PasteFromWord'],
		['Undo','Redo','-','Find','Replace','-','SelectAll'],
		['Image','Flash','Table','-','Link','Unlink','Anchor'],//['Save'],
		'/',
		['Bold','Italic','Underline','Subscript','Superscript','Strike','-','RemoveFormat'],
		['NumberedList','BulletedList'],
		['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
		['Font','Format','FontSize','TextColor','BGColor']
	];
	
};
