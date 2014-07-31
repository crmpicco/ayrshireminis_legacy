<?php

require_once $GLOBALS["CONF"]->SWIFT_LIBRARY_PATH . "/Swift/ConnectionBase.php";

class DummyConnection extends Swift_ConnectionBase
{
  function start() {}
  function stop() {}
  function read() {}
  function write($command, $end="\r\n") {}
  function isAlive() {}
}
