<?php

	namespace Reinink\Upload_Handlers;

	use Reinink\ImageMagick\ImageMagick;

	class ImageUpload extends FileUpload
	{
		private $im;

		public function __construct(ImageMagick $im)
		{
			$this->im = $im;
		}

		public function validate($upload_name)
		{
			// Parent validation
			if (!parent::validate($upload_name))
			{
				return false;
			}

			// Update ImageMagick object with file path
			$this->im->set_file_path($this->file_path);

			// Validate that this is an image by converting it to a jpg
			if ($this->im->convert($this->file_path . '.jpg'))
			{
				// Delete the original uploaded file
				@unlink($this->file_path);

				// Update object with new file
				$this->file_path = $this->file_path . '.jpg';

				return true;
			}
			else
			{
				$this->error = 'Unable to convert file to an image.';
				return false;
			}
		}

		public function width()
		{
			$size = getimagesize($this->file_path);
			return $size[0];
		}

		public function height()
		{
			$size = getimagesize($this->file_path);
			return $size[1];
		}
	}