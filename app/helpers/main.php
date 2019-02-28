<?php
function toggle_select($var,$select)
{
  return $var === $select ? 'selected="selected"' : '';
}

function mark_link($link,$classname = 'active')
{
  return preg_match("|$link|",$_SERVER['REQUEST_URI']) ? $classname : '';
}
