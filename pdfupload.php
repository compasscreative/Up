<?php
/**
 * A class that makes PDF uploading a little easier.
 *
 * @package  Upload_Handlers
 * @version  1.0
 * @author   Jonathan Reinink <jonathan@reininks.com>
 * @link     https://github.com/reinink/Upload_Handlers
 */

namespace Reinink\Upload_Handlers;

use \finfo;

class PDFUpload extends FileUpload
{
	/**
	 * Validate the uploaded file.
	 *
	 * @param	string	$upload_name
	 * @return	bool
	 */
	public function validate($upload_name)
	{
		// Parent validation
		if (!parent::validate($upload_name))
		{
			return false;
		}

		// Setup Fileinfo to check mime type
		$file_info = new finfo(FILEINFO_MIME);

		// Make sure this file is a PDF document
		if ($file_info->file($this->file_path) === 'application/pdf; charset=binary')
		{
			return true;
		}
		else
		{
			$this->error = 'File is not a PDF document.';
			return false;
		}
	}
}