<?php
declare(strict_types = 1);

namespace DameJidloCodingStandard\Sniffs\TypeHints;

use SlevomatCodingStandard\Sniffs\TestCase;



class TypeHintDeclarationSniffTest extends TestCase
{

	public function testClassWithoutStrictTypesAndWithoutTypeHints() : void
	{
		$resultFile = $this->checkFile(__DIR__ . '/data/ClassWithoutStrictTypesAndWithoutTypeHints.php');

		$this->assertNoSniffErrorInFile($resultFile);
	}



	public function testClassWithStrictTypesAndWithoutTypeHints() : void
	{
		$resultFile = $this->checkFile(__DIR__ . '/data/ClassWithStrictTypesAndWithoutTypeHints.php');

		$this->assertSniffError($resultFile, 9, TypeHintDeclarationSniff::CODE_MISSING_PARAMETER_TYPE_HINT);
	}



	public function testClassWithStrictTypesAndWithTypeHints() : void
	{
		$resultFile = $this->checkFile(__DIR__ . '/data/ClassWithStrictTypesAndWithTypeHints.php');

		$this->assertNoSniffErrorInFile($resultFile);
	}

}
