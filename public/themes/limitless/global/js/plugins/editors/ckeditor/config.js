/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.toolbar_MyToolbar = [		
		{ name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
		{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
		{ name: 'paragraph', items : [ 'JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote' ] },
		/*{ name: 'forms', items : [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },*/
		'/',/**/
		{ name: 'insert', items : [ 'Image','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe' ] },/**/		
		{ name: 'links', items : [ 'Link','Unlink','Anchor' ] },
		/*'/',
		{ name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },*/
		{ name: 'colors', items : [ 'TextColor','BGColor' ] },
		{ name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },
		{ name: 'tools', items : [ 'Maximize', 'ShowBlocks' ] },
		{ name: 'document', items : [ 'Source' ] },
	],
    config.toolbar_MyToolbarInline = [
        { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Strike', '-', 'RemoveFormat' ] },
        { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList' ] }
    ],
    config.toolbar_standard = [
        { name: 'stuff', items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo'] },
        { name: 'paragraf', items: ['NumberedList', 'BulletedList'] },

        { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'Superscript', 'Subscript'] },
        { name: 'colors', items: ['TextColor'] },
        { name: 'paragraph2', items: ['JustifyLeft', 'JustiftyCenter', 'JustifyRight', 'Outdent', 'Indent'] },
        '/',
        { name: 'document', items: ['Source'] }
    ]
	config.font_defaultLabel = 'Arial';
	config.fontSize_defaultLabel = '12px';
	config.contentsCss = 'custom.css';
};
