<?php

namespace Robert430404\ImbuedPhp\Contracts;

/**
 * Interface ProcessorInterface
 *
 * @package Robert430404\ImbuedPhp\Contracts
 */
interface ProcessorInterface
{
	/**
	 * Kicks off the processing of the resource
	 *
	 * @return bool
	 */
	public function process(): bool;
}