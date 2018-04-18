<?php
declare(strict_types = 1);

namespace DameJidloCodingStandard\Sniffs\TypeHints;

use SlevomatCodingStandard\Helpers\TokenHelper;
use SlevomatCodingStandard\Sniffs\TypeHints\TypeHintDeclarationSniff as SlevomatTypeHintDeclarationSniff;



class TypeHintDeclarationSniff extends SlevomatTypeHintDeclarationSniff
{

	public function process(\PHP_CodeSniffer\Files\File $phpcsFile, $pointer) : void
	{
		if ($this->hasStrictTypesDeclared($phpcsFile)) {
			parent::process($phpcsFile, $pointer);
		}
	}



	private function hasStrictTypesDeclared(\PHP_CodeSniffer\Files\File $phpcsFile) : bool
	{
		$tokens = $phpcsFile->getTokens();

		$pointer = TokenHelper::findNext($phpcsFile, T_OPEN_TAG, 0);
		if ($pointer === NULL) {
			return FALSE;
		}

		$pointer = TokenHelper::findNext($phpcsFile, T_DECLARE, $pointer + 1);
		if ($pointer === NULL) {
			return FALSE;
		}

		$pointer = TokenHelper::findNext($phpcsFile, T_EQUAL, $pointer + 1);
		if ($pointer === NULL) {
			return FALSE;
		}

		$pointer = TokenHelper::findNext($phpcsFile, T_LNUMBER, $pointer + 1);
		if ($pointer === NULL) {
			return FALSE;
		}

		return $tokens[$pointer]['content'] === '1';
	}

}
