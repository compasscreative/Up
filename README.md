Up
==

## Upload a file

```php
<?php

use Reinink\Up\FileUpload;

// Create an file uploader
$upload = new FileUpload();

// Validate uploaded file
// "file" if the post filename
if (!$upload->validate('file'))
{
	// Do something with $upload->error
}

// Save the file
$upload->save('destination.ext');
```

## Upload an image

```php
<?php

use Reinink\Magick\Magick;
use Reinink\Up\ImageUpload;

// Create an image uploader (requires Magick class)
$upload = new ImageUpload(new Magick);

// Validate uploaded file
// "image" if the post filename
if (!$upload->validate('image'))
{
	// Do something with $upload->error
}

// Save the file
$upload->save('destination.jpg');
```

## Upload an PDF document

```php
<?php

use Reinink\Up\PDFUpload;

// Create an PDF uploader
$upload = new PDFUpload();

// Validate uploaded file
// "pdf" if the post filename
if (!$upload->validate('pdf'))
{
	// Do something with $upload->error
}

// Save the file
$upload->save('destination.pdf');
```