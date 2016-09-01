<?php
declare(strict_types = 1);

namespace DameJidloStandard\Sniffs\Classes;

use SlevomatCodingStandard\Sniffs\Classes\UnusedPrivateElementsSniff as SlevomatUnusedPrivateElementsSniff;



class UnusedPrivateElementsSniff extends SlevomatUnusedPrivateElementsSniff
{

	/**
	 * @var string[]
	 */
	public $alwaysUsedPropertiesAnnotations = [
		'@ORM\Column',
		'@ORM\ManyToOne',
		'@ORM\OneToMany',
		'@ORM\ManyToMany',
		'@ORM\JoinColumn',
	];

}
