<?php
/* vim: set expandtab tabstop=2 shiftwidth=2 softtabstop=2 filetype=php: */
class JqmTest extends CDbTestCase
{
  public function testButton()
  {
    $this->assertEquals(
      '<a data-role="button" data-theme="a" href="#">hoge</a>',
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
      '<a class="hoge" data-role="button" data-theme="a" href="#">',
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
}
