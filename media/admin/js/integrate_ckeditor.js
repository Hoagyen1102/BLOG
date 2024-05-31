if($('#editor1').length){
	CKEDITOR.replace('editor1', {});
	CKEDITOR.config.baseFloatZIndex = 100001;
	CKEDITOR.config.height = 700;
	if(ckcontent)	CKEDITOR.instances['editor1'].setData(ckcontent);
}
if($('#descriptioneditor').length){
	CKEDITOR.replace('descriptioneditor', {});
	CKEDITOR.config.baseFloatZIndex = 100001;
	CKEDITOR.config.height = 700;
	if(ckdescription)	CKEDITOR.instances['descriptioneditor'].setData(ckdescription);
}
if($('#contenteditor').length){
	CKEDITOR.replace('contenteditor', {});
	CKEDITOR.config.baseFloatZIndex = 100001;
	CKEDITOR.config.height = 700;
	if(ckcontent)	CKEDITOR.instances['contenteditor'].setData(ckcontent);
}