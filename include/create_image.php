<?php
//Start the session so we can store what the security code actually is

//Send a generated image to the browser
create_image();
exit();

function create_image()
{
    //Let's generate a totally random string using md5
    $md5_hash = md5(rand(0,999)); 
    //We don't need a 32 character long string so we trim it down to 5 
    $security_code = substr($md5_hash, 15, 5); 

    //Set the cookie to store the security code
    setcookie('key',$security_code,time()+9999,'/','',0);

    //Set the image width and height
    $width = 60;
    $height = 23; 

    //Create the image resource 
    $image = ImageCreate($width, $height);  

    //We are making three colors, white, black and gray
    $black = ImageColorAllocate($image, 0, 0, 0);
    $blue = ImageColorAllocate($image, 47, 151, 255);
	$blue2 = ImageColorAllocate($image, 0, 116, 232);
    $grey = ImageColorAllocate($image, 104, 104, 104);

    //Make the background black 
    ImageFill($image, 0, 0, $blue2); 

    //Add randomly generated string in white to the image
    ImageString($image, 5, 8, 3, $security_code, $black); 

    //Throw in some lines to make it a little bit harder for any bots to break 
    ImageRectangle($image,0,0,$width-1,$height-1,$grey); 
    Imageline($image, 0, $height/1.7, $width, $height/1.7, $grey); 
    Imageline($image, $width/2, 0, $width/2, $height, $grey); 
 
    //Tell the browser what kind of file is come in 
    Header("Content-Type: image/jpeg"); 

    //Output the newly created image in jpeg format 
    ImageJpeg($image);
   
    //Free up resources
    ImageDestroy($image);
}
?>