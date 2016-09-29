<?php

namespace Trungpv93\FileInfoPHP;

use finfo;

class FileInfo
{
	public function get($link)
	{
		// Remove all illegal characters from a url
		$link = filter_var($link, FILTER_SANITIZE_URL);

		$fileName = explode('?', pathinfo($link)['filename'])[0];

		// Validate url
		if (!filter_var($link, FILTER_VALIDATE_URL) === false) {
		 	$header = get_headers($link, 1);

			$file_info = [
				'name' => $fileName,
				'type' => 'URL',
				'mime' => isset($header['Content-Type']) ? explode(';', $header['Content-Type'])[0] : null,
				'size' => isset($header['Content-Length']) ? $header['Content-Length'] : null,
				'md5' => null,
				'last_modified' => isset($header['Last-Modified']) ? $header['Last-Modified'] : null
			];   

			if($header[0] == 'HTTP/1.1 200 OK'){
				$file_info['md5'] = md5_file($link);
			}
		} else {
			if (file_exists($link)) {
			    $finfo = new finfo(FILEINFO_MIME_TYPE);

				$file_info = [
					'name' => $fileName,
					'type' => 'PATH',
					'mime' => $finfo->file($link),
					'size' => filesize($link),
					'md5' => md5_file($link),
					'last_modified' => date("D, d M Y G:i:s", filemtime($link))
				];
			} else {
				$file_info = [
					'name' => $fileName,
					'type' => 'PATH',
					'mime' => null,
					'size' => null,
					'md5' => null,
					'last_modified' => null
				];
			}
		}

		$file_info['extension'] = pathinfo($link, PATHINFO_EXTENSION) == "" ? MimeType::get($file_info['mime']) : pathinfo($link, PATHINFO_EXTENSION);

		return $file_info;
	}
}
