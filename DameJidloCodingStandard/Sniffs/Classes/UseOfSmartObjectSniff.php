<?php
declare(strict_types = 1);

namespace DameJidloCodingStandard\Sniffs\Classes;

use PHP_CodeSniffer_File;



class UseOfSmartObjectSniff implements \PHP_CodeSniffer_Sniff
{

	const SMART_OBJECT_CLASS_NAME = 'SmartObject';

	const CODE_USING_SMART_OBJECT_EXPECTED = 'UsingSmartObjectExpected';

	/**
	 * @inheritdoc
	 */
	public function register()
	{
		return [
			T_CLASS,
		];
	}



	/**
	 * @inheritdoc
	 */
	public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
	{
		if ($this->isClassExtendingAnother($phpcsFile)) {
			return;
		}

		if (!$this->isClassUsingSmartObject($phpcsFile, $stackPtr)) {
			$phpcsFile->addError('Class should either use SmartObject or extend another class.', $stackPtr, self::CODE_USING_SMART_OBJECT_EXPECTED);
		}
	}



	/**
	 * @param PHP_CodeSniffer_File $phpcsFile
	 * @return bool
	 */
	private function isClassExtendingAnother(PHP_CodeSniffer_File $phpcsFile) : bool
	{
		$tokens = $phpcsFile->getTokens();

		foreach ($tokens as $token) {
			if ($token['code'] === T_EXTENDS) {
				return TRUE;
			}
		}

		return FALSE;
	}



	/**
	 * @param PHP_CodeSniffer_File $phpcsFile
	 * @param $stackPtr
	 * @return bool
	 */
	private function isClassUsingSmartObject(PHP_CodeSniffer_File $phpcsFile, $stackPtr) : bool
	{
		$tokens = $phpcsFile->getTokens();
		$useStatementsPositions = $this->getAllUseStatementsInsideClassPositions($phpcsFile, $stackPtr);

		foreach ($useStatementsPositions as $position) {
			if (isset($tokens[$position]) && $tokens[$position]['content'] === self::SMART_OBJECT_CLASS_NAME) {
				return TRUE;
			}
		}

		return FALSE;
	}



	/**
	 * @param PHP_CodeSniffer_File $phpcsFile
	 * @param $stackPtr
	 * @return array
	 */
	private function getAllUseStatementsInsideClassPositions(PHP_CodeSniffer_File $phpcsFile, $stackPtr) : array
	{
		$useStatementsPositions = [];

		$tokens = $phpcsFile->getTokens();

		foreach ($tokens as $position => $token) {
			if ($position < $stackPtr) {
				continue;
			}

			if ($token['code'] === T_USE) {
				$useStatementsPositions[] = $position + 2;
			}
		}

		return $useStatementsPositions;
	}

}
