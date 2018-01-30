<?php
declare(strict_types = 1);

namespace DameJidloCodingStandard\Sniffs\TypeHints;

use SlevomatCodingStandard\Sniffs\TestCase;



class TypeHintDeclarationSniffTest extends TestCase
{

	public function testCi()
	{
		$this->assertEquals(1, 2, 'Intentionally making this build failed.');
	}



	public function testClassWithoutStrictTypesAndWithoutTypeHints()
	{
		$resultFile = $this->checkFile(__DIR__ . '/data/ClassWithoutStrictTypesAndWithoutTypeHints.php');

		$this->assertNoSniffErrorInFile($resultFile);
	}



	public function testClassWithStrictTypesAndWithoutTypeHints()
	{
		$resultFile = $this->checkFile(__DIR__ . '/data/ClassWithStrictTypesAndWithoutTypeHints.php');

		$this->assertSniffError($resultFile, 9, TypeHintDeclarationSniff::CODE_MISSING_PARAMETER_TYPE_HINT);
	}



	public function testClassWithStrictTypesAndWithTypeHints()
	{
		$resultFile = $this->checkFile(__DIR__ . '/data/ClassWithStrictTypesAndWithTypeHints.php');

		$this->assertNoSniffErrorInFile($resultFile);
	}

}
