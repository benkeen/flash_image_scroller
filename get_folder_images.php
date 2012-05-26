<?php

/*----------------------------------------------------------------------------*\
  Script:  get_folder_images
  Purpose: A little script to dynamically read the contents of an image folder 
           - which should contain thumbnails ONLY! -  and output its contents 
           into a Flash Image Scroller-readable format.

  Notes:   In order for this script to work, you need to do the following:
           1. Update the two settings below for your server: the URL of the 
              folder containing your images, and the directory path to that 
              same folder. 
           2. Make sure that the folder you specified only contains THUMBNAILS
              and not the full-sized images themselves.  
           3. In your webpage, specify this file (get_folder_images.php) as the 
              value of the "sourceFile" setting. For more information on 
              how to configure it in your webpage, read the "Installation / How 
              to fail gracefully" section here:

              http://www.benjaminkeen.com/software/image_scroller/

\*----------------------------------------------------------------------------*/

// ---------------------------------------------------------
// You MUST update these settings!
$image_folder_dir = "./image_folder";
$image_folder_url = "http://www.yoursite.com/image_folder";
// ---------------------------------------------------------

$count = 1;
if ($handle = opendir($image_folder_dir))
{
  while (false !== ($file = readdir($handle)))
  {
    if ($file != '.' && $file != '..')
    {
      echo "&thumbURL{$count}=$image_folder_url/{$file}"
         . "&target{$count}=_blank&";
      $count++;
    }
  }
  closedir($handle);
}

?>

