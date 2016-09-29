<?php

namespace Trungpv93\FileInfoPHP;

class FileInfoPHPFacade extends \Illuminate\Support\Facades\Facade
{
	protected static function getFacadeAccessor()
	{
		return FileInfo::class;
	}
}
