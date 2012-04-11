<?php
/* vim: set expandtab tabstop=2 shiftwidth=2 softtabstop=2 filetype=php: */
class JqmTest extends CDbTestCase
{
  public function testButton()
  {
    $this->assertEquals(
      '<a data-role="button">hoge</a>',
      Jqm::button('hoge')
    );
  }

  public function testButtonTheme()
  {
    $this->assertEquals(
      '<a data-theme="b" data-role="button" href="/index">hoge</a>',
      Jqm::buttonB('hoge','/index')
    );
  }

  public function testButtonOverrideTheme()
  {
    $this->assertEquals(
      '<a data-theme="c" data-role="button" href="#">hoge</a>',
      Jqm::button('hoge','#',array('data-theme'=>'c'))
    );
    $this->assertEquals(
      '<a data-theme="b" data-role="button" href="#">hoge</a>',
      Jqm::buttonB('hoge','#',array('data-theme'=>'c'))
    );
  }

  public function testOpenButton()
  {
    $this->assertEquals(
      '<a class="hoge" data-role="button" href="#">',
      Jqm::openButton('#',array('class'=>'hoge'))
    );
  }

  public function testCloseButton()
  {
    $this->assertEquals(
      '</a>',
      Jqm::closeButton()
    );
  }

  public function testOpenButtonTheme()
  {
    $this->assertEquals(
      '<a class="hoge" data-theme="d" data-role="button" href="#">',
      Jqm::openButtonD('#',array('class'=>'hoge'))
    );
  }

  public function testDataOptions()
  {
    $this->assertEquals(
      '<a data-theme="f" data-role="button" data-icon="home" data-iconpos="top" href="#">',
      Jqm::openButtonF('#',array('data'=>array('icon'=>'home','iconpos'=>'top')))
    );
  }

  public function testListview()
  {
    $this->assertEquals(
      '<ul data-role="listview">hoge</ul>',
      Jqm::listview('hoge')
    );
  }

  public function testListviewTheme()
  {
    $this->assertEquals(
      '<ul data-theme="c" data-role="listview">hoge</ul>',
      Jqm::listviewC('hoge')
    );
  }

  public function testOpenListview()
  {
    $this->assertEquals(
      '<ul data-role="listview">',
      Jqm::openListview()
    );
  }

  public function testClose()
  {
    $this->assertEquals(
      '</ul>',
      Jqm::closeListview()
    );
  }
  
  public function testOpenListviewTheme()
  {
    $this->assertEquals(
      '<ul data-theme="d" data-role="listview">',
      Jqm::openListviewD()
    );
  }

  public function testPageTheme()
  {
    $this->assertEquals(
      '<div data-role="page">hoge</div>',
      Jqm::page('hoge')
    );
  }

  public function testDialog()
  {
    $this->assertEquals(
      '<div class="fuga" data-theme="c" data-role="dialog" data-dom-cache="true" data-close-btn-text="hoge">',
      Jqm::openDialogC('hoge',array('data'=>array('dom-cache'=>'true','close-btn-text'=>'hoge'),'class'=>'fuga'))
    );
  }

  public function testDefaultTheme()
  {
    $this->assertEquals(
      '<div data-role="page">hoge</div>',
      Jqm::page('hoge')
    );
  }
}
