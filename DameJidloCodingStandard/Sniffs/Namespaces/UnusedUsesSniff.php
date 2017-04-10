<?php

namespace DameJidloCodingStandard\Sniffs\Namespaces;

use SlevomatCodingStandard\Sniffs\Namespaces\UnusedUsesSniff as SlevomatUnusedUsesSniff;



class UnusedUsesSniff extends SlevomatUnusedUsesSniff
{

	/**
	 * @var bool
	 */
	public $searchAnnotations = TRUE;

}
