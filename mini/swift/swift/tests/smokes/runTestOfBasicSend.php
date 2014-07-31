<?php

require_once dirname(__FILE__) . "/components/Runner.php";

class TestOfBasicSend extends Runner
{
  var $to;
  var $from;
  
  function go()
  {
    Swift_Errors::expect($e, "Swift_Exception");
      if (!$e) $swift =& new Swift($this->getConnection());
      $this->setSwiftInstance($swift);
      if (!$e) $message =& new Swift_Message("Smoke Test 1 - Basic");
      if (!$e) $message->setBody("This is just a basic test\n".
        "It has two lines and no special non-ascii characters.");
      if (!$e) $to =& new Swift_Address($GLOBALS["CONF"]->TO_ADDRESS, $GLOBALS["CONF"]->TO_NAME);
      if (!$e) $from =& new Swift_Address($GLOBALS["CONF"]->FROM_ADDRESS, $GLOBALS["CONF"]->FROM_NAME);
      if (!$e) $this->setSent($swift->send($message, $to, $from));
      if (!$e) $this->to = $to->build();
      if (!$e) $this->from = $from->build();
      if (!$e) $swift->disconnect();
    if ($e) {
      $this->failed = true;
      $this->setError($e->getMessage());
    }
    Swift_Errors::clear("Swift_Exception");
    $this->render();
  }
  
  function paintTestName()
  {
    echo "Test of Sending Basic E-Mail";
  }
  
  function paintTopInfo()
  {
    echo "A basic, 7 bit ascii email will be sent from Swift, to the account given in the test configuration.  Simply open up the email and " .
    "check that the details given below are accurate: " .
    "<ul><li>The subject of the message is \"<em>Smoke Test 1 - Basic</em>\"</li>" .
    "<li>The sender of the message is \"<em>" . htmlentities($this->from) . "</em>\"</li>" . 
    "<li>The recipient in the To: header is \"<em>" . htmlentities($this->to) . "</em>\"</li>" .
    "<li>The message body is<br />\"<em>This is just a basic test<br />
    It has two lines and no special non-ascii characters.</em>\"</li>" .
    "<li>The Date: header relects the date on the server.</li></ul>";
  }
  
  function paintImageName()
  {
    echo "smoke1.png";
  }
}

$runner =& new TestOfBasicSend();
$runner->go();
