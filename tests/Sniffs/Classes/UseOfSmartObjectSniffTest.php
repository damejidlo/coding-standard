<?php
declare(strict_types = 1);

namespace DameJidloCodingStandard\Sniffs\Classes;

use SlevomatCodingStandard\Sniffs\TestCase;



class UseOfSmartObjectSniffTest extends TestCase
{

	public function testInvalidClass()
	{
		$resultFile = $this->checkFile(__DIR__ . '/data/EmptyClass.php');

		$this->assertSniffError($resultFile, 6, UseOfSmartObjectSniff::CODE_USING_SMART_OBJECT_EXPECTED);
	}



	/**
	 * @dataProvider getValidClasses
	 */
	public function testValidClasses(string $filename)
	{
		$resultFile = $this->checkFile($filename);

		$this->assertNoSniffErrorInFile($resultFile);
	}



	/**
	 * @return array
	 */
	public function getValidClasses() : array
	{
		return [
			[__DIR__ . '/data/ClassUsingSmartObject.php'],
			[__DIR__ . '/data/ClassExtendingAnother.php'],
		];
	}

}
