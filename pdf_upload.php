<?php

	namespace Reinink\Upload_Handlers;

	use \finfo;

	class PDFUpload extends FileUpload
	{
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