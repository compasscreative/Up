<?php
/**
 * A class that makes MP3 uploading a little easier.
 *
 * @package  UploadHandlers
 * @version  1.0
 * @author   Jonathan Reinink <jonathan@reininks.com>
 * @link     https://github.com/reinink/UploadHandlers
 */

namespace Reinink\UploadHandlers;

class MP3Upload extends FileUpload
{
	/**
	 * Create a new MP3Upload instance.
	 *
	 * @param	string	$file_types
	 * @return	void
	 */
	public function __construct($file_types = array('audio/mpeg'))
	{
		$this->file_types = $file_types;
	}
}