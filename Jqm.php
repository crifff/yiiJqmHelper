<?php
/* vim: set expandtab tabstop=2 shiftwidth=2 softtabstop=2 filetype=php: */

class Jqm extends CHtml
{
   static public $defaultTheme='';
   static public $defaultTags=array(
    'button'=>'a',
    'listview'=>'ul',
    'page'=>'div',
    'content'=>'div',
    'header'=>'div',
    'footer'=>'div',
    'collapsible'=>'div',
    'collapsible-set'=>'div',
    'dialog'=>'div',
    'fieldcontain'=>'div',
    'navbar'=>'div',
  );

  public static function button(){
    return self::__callStatic('button',func_get_args());
  }

  public static function role($text='', $url='#', $htmlOptions=array(), $closeTag=true, $role)
  {
    $htmlOptions=self::dataProperty($htmlOptions,$role);
    if(self::$defaultTags[$role]==='a' && $url!=='')
      $htmlOptions['href']=CHtml::normalizeUrl($url);
    self::clientChange('click',$htmlOptions);
    return CHtml::tag(self::$defaultTags[$role],$htmlOptions,$text,$closeTag);
  }

  public static function __callStatic($name, $args)
  {
    $last=count($args)-1;
    if(count($args)===0 || !is_array($args[$last]) || isset($args[$last][0]))
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
      return CHtml::closeTag(self::$defaultTags[$role]);
    }
    else if($matches[0]==='open')
    {
      $closeTag=false;
      $role=strtolower($matches[1]);
      array_unshift($args,'');
    }
    else
      $role = strtolower(array_shift($matches));

    if(count($args)==2){
      $args=array($args[0],'',$args[1]);
    }
    $args[count($args)-1]['data-role']=$role;
    $args[]=$closeTag;
    $args[]=$role;
    return forward_static_call_array(array('self','role'),$args);
  }

  protected static function dataProperty($htmlOptions,$defaultRole)
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
    if(self::$defaultTheme && !isset($htmlOptions['data-theme']))
      $htmlOptions['data-theme']=self::$defaultTheme;

    return $htmlOptions;
  }
}
