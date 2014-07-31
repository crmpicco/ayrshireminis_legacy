<?php

class TestOfImage extends UnitTestCase
{
  function setUp()
  {
    Swift_Errors::reset();
  }
  
  function testImageTypeIsDetected()
  {
    $image = new Swift_Message_Image(new Swift_File($GLOBALS["CONF"]->FILES_PATH . "/manchester.jpeg"));
    $this->assertEqual("image/jpeg", $image->getContentType());
    
    $image = new Swift_Message_Image(new Swift_File($GLOBALS["CONF"]->FILES_PATH . "/gecko.png"));
    $this->assertEqual("image/png", $image->getContentType());
    
    $image = new Swift_Message_Image(new Swift_File($GLOBALS["CONF"]->FILES_PATH . "/durham.gif"));
    $this->assertEqual("image/gif", $image->getContentType());
  }
  
  function testExceptionIsThrownIfWrongFileTypeGiven()
  {
    $image = new Swift_Message_Image(new Swift_File($GLOBALS["CONF"]->FILES_PATH . "/cv.pdf"));
    $this->assertError();
  }
  
  function testFilenameSetsInConstructor()
  {
    $image = new Swift_Message_Image(new Swift_File($GLOBALS["CONF"]->FILES_PATH . "/manchester.jpeg"));
    $this->assertEqual("manchester.jpeg", $image->getFileName());
    
    $image = new Swift_Message_Image(new Swift_File($GLOBALS["CONF"]->FILES_PATH . "/manchester.jpeg"), "joe.gif");
    $this->assertEqual("joe.gif", $image->getFileName());
  }
}
