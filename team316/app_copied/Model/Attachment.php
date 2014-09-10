<?php
class Attachment extends Appmodel{
	public $actsAs = Array(
		'Upload.UploadE' => array(
			'photo'
			)
		);
}