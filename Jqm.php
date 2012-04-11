<?php
/* vim: set expandtab tabstop=2 shiftwidth=2 softtabstop=2 filetype=php: */

class Jqm extends CHtml
{
  public static $defaultTags=array(
    'button'=>'a',
    'listview'=>'ul',
  );

  public static function button($text='', $url='#', $htmlOptions=array(), $closeTag=true)
  {
    $htmlOptions=self::dataProperty($htmlOptions,'button');
    if($url!=='')
      $htmlOptions['href']=self::normalizeUrl($url);
    self::clientChange('click',$htmlOptions);
    return self::tag(self::$defaultTags['button'],$htmlOptions,$text,$closeTag);
  }

  public static function listview($text, $htmlOptions=array(), $closeTag=true)
  {
    $htmlOptions=self::dataProperty($htmlOptions,'listview');
    return self::tag(self::$defaultTags['listview'],$htmlOptions,$text,$closeTag);
  }

  public static function __callStatic($name, $args)
  {
    if(count($args)===0 || !is_array($args[count($args)-1]))
      $args[]=array();

    if(ctype_upper(substr($name,-1,1)))
    {
      $theme=strtolower(substr($name,-1,1));
      $args[count($args)-1]['data-theme']=$theme;
    }

    $matches = preg_split('/(?=[A-Z])/',$name);
    $closeTag=true;

    if($matches[0]==='close')
    {
      $role=strtolower($matches[1]);
      return self::closeTag(self::$defaultTags[$role]);
    }
    else if($matches[0]==='open')
    {
      $closeTag=false;
      $role=strtolower($matches[1]);
      array_unshift($args,'');
    }
    else
      $role = strtolower(array_shift($matches));

    if(method_exists(__CLASS__,$role))
    {
      $args[count($args)-1]['data-role']=$role;
      $args[]=$closeTag;
      return forward_static_call_array(array('self',$role),$args);
    }
  }

  protected static function dataProperty($htmlOptions,$defaultRole,$defaultTheme='a')
  {
    if(isset($htmlOptions['data']))
    {
      foreach($htmlOptions['data'] as $property => $value)
      {
        $htmlOptions['data-'.$property] = $value;
      }
      unset($htmlOptions['data']);
    }
    if(!isset($htmlOptions['data-role']))
      $htmlOptions['data-role']=$defaultRole;
    if(!isset($htmlOptions['data-theme']))
      $htmlOptions['data-theme']=$defaultTheme;

    return $htmlOptions;
  }
}
