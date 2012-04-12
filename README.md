##Install
Jpm.php copy to extentions dir

##Jqm::button()
###simple
src:

```php
<?php echo Jqm::button('hoge','#')?>
```

dist:

```html
<a data-role="button" href="#">hoge</a>
```

###theme
src:

```php
<?php echo Jqm::buttonD('hoge','#')?>
```

dist:

```html
<a data-theme="d" data-role="button" href="#">hoge</a>
```

###options & data-set

src:

```php
<?php echo Jqm::buttonD(
  'hoge',
  '/index',
  array(
    'data' => array(
      'icon'   => 'home',
      'iconpos'=> 'top'
    ),
    'class' => 'fuga'
  )
)?>
```

dist:

```html
<a class="fuga" data-theme="f" data-role="button" data-icon="home" data-iconpos="top" href="/index">hoge</a>
```

###opentag

src:

```php
<?php echo Jqm::openButtonC('/index',array('data-corner'=>true))?>
```

dist:

```html
<a data-corner="true" data-theme="c" data-role="button" href="#">
```

###closetag

src:

```php
<?php echo Jqm::closeButton()?>
```

dist:

```html
</a>
```

##Jqm::listview()
src:

```php
<?php echo Jqm::listviewA('hoge')?>
```

dist:

```html
<ul data-theme="a" data-role="listview">hoge</ul>
```
