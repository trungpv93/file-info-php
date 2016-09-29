# file-info-php
Detect file info from local or remote file (URL).

##Installation
```html
composer require trungpv93/file-info-php
```

## Usage


```html
$finfo = new \Trungpv93\FileInfoPHP\FileInfo();
$i = $finfo->get($link);
```

### Laravel support

add provider and alias in config/app.php

```html
'providers' => [
    ...
    Trungpv93\FileInfoPHP\FileInfoPHPServiceProvider::class
]

...

'aliases' => [
    ...
    'FileInfo'	=> Trungpv93\FileInfoPHP\FileInfoPHPFacade::class,
],
```

and in laravel you use it

```html
    FileInfo::get($link);
```

## Licence
MIT
