<?php
declare(strict_types = 1);

namespace DameJidloStandard\Sniffs\Namespaces;

use SlevomatCodingStandard\Sniffs\Namespaces\UnusedUsesSniff as SlevomatUnusedUsesSniff;



class UnusedUsesSniff extends SlevomatUnusedUsesSniff
{

	/**
	 * @var bool
	 */
	public $searchAnnotations = TRUE;

}
