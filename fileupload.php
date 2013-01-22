<?php

	namespace Reinink\Upload_Handlers;

	class FileUpload
	{
		public $file_path;
		public $file_name;
		public $error;

		public function validate($upload_name)
		{
			// Check if upload variable exists
			if (!isset($_FILES[$upload_name]))
			{
				$this->error = 'Requested file upload "' . $upload_name . '" not found.';
				return false;
			}

			// Verify this is a multipart request
			if(!isset($_SERVER['CONTENT_TYPE']) or strpos(strtolower($_SERVER['CONTENT_TYPE']), 'multipart/') !== 0)
			{
				$this->error = 'This is not a multipart request.';
				return false;
			}

			// Verify this is an uploaded file (security)
			if (!is_uploaded_file($_FILES[$upload_name]['tmp_name']))
			{
				$this->error = 'Possible file upload attack!';
				return false;
			}

			// Validate file size
			if ($_FILES[$upload_name]['size'] == 0)
			{
				$this->error = 'The file is empty.';
				return false;
			}

			// Update object
			$this->file_path = $_FILES[$upload_name]['tmp_name'];
			$this->file_name = $_FILES[$upload_name]['name'];

			return true;
		}

		public function save($dest_path)
		{
			// Get path info
			$path = pathinfo($dest_path);

			// Create folder if it doesn't exist
			if (!is_dir($path['dirname']))
			{
				if (!@mkdir($path['dirname']))
				{
					$this->error = 'Unable to create directory.';
					return false;
				}
			}

			// Move file to folder
			if (@rename($this->file_path, $dest_path))
			{
				return true;
			}
			else
			{
				$this->error = 'Unable to save file.';
				return false;
			}
		}
	}