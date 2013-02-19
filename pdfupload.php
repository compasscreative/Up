<?php
/**
 * A class that makes PDF uploading a little easier.
 *
 * @package  UploadHandlers
 * @version  1.0
 * @author   Jonathan Reinink <jonathan@reininks.com>
 * @link     https://github.com/reinink/UploadHandlers
 */

namespace Reinink\UploadHandlers;

class PDFUpload extends FileUpload
{
	/**
	 * Create a new PDFUpload instance.
	 *
	 * @param	string	$file_types
	 * @return	void
	 */
	public function __construct($file_types = array('application/pdf'))
	{
		$this->file_types = $file_types;
	}
}