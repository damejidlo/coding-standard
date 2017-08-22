<?php
declare(strict_types = 1);

namespace DameJidloCodingStandard\Helpers\WhiteSpace;

use PHP_CodeSniffer_File;



/**
 * Copyright (c) 2012 Tomas Votruba (http://tomasvotruba.cz)
 * Originally part of zenify/coding-standard.
 */
final class EmptyLinesResizer
{

	public static function resizeLines(
		PHP_CodeSniffer_File $file,
		int $position,
		int $currentLineCount,
		int $desiredLineCount
	) {
		if ($currentLineCount > $desiredLineCount) {
			self::reduceBlankLines($file, $position, $currentLineCount, $desiredLineCount);

		} else {
			self::increaseBlankLines($file, $position, $currentLineCount, $desiredLineCount);
		}
	}


	private static function reduceBlankLines(PHP_CodeSniffer_File $file, int $position, int $from, int $to)
	{
		for ($i = $from; $i > $to; $i--) {
			$file->fixer->replaceToken($position, '');
			$position++;
		}
	}


	private static function increaseBlankLines(PHP_CodeSniffer_File $file, int $position, int $from, int $to)
	{
		for ($i = $from; $i < $to; $i++) {
			$file->fixer->addContentBefore($position, PHP_EOL);
		}
	}

}
