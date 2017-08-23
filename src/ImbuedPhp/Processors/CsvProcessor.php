<?php

namespace Robert430404\ImbuedPhp\Processors;

use Illuminate\Database\Eloquent\Model;
use Robert430404\ImbuedPhp\Contracts\ProcessorInterface;
use Robert430404\ImbuedPhp\Exceptions\ProcessorRuntimeError;

/**
 * Class CsvProcessor
 *
 * @package Robert430404\ImbuedPhp\Processors
 */
class CsvProcessor implements ProcessorInterface
{
	/**
	 * @var string
	 */
	private $csvPath;

	/**
	 * @var Model
	 */
	private $model;

	/**
	 * @var array
	 */
	private $labels;

	/**
	 * CsvProcessor constructor.
	 *
	 * Creates the processor and injects the resource path
	 *
	 * @param string $csvPath
	 */
	public function __construct(string $csvPath, Model $model = null)
	{
		$this->csvPath = $csvPath;
		$this->model = $model;
	}

	/**
	 * Kicks off the processing of the resource
	 *
	 * @return bool
	 *
	 * @throws ProcessorRuntimeError
	 */
	public function process(): bool
	{
		$this
			->resolveResource()
			->processRows();

		return true;
	}

	/**
	 * Resolves the resource and opens the stream.
	 *
	 * @return CsvProcessor
	 *
	 * @throws ProcessorRuntimeError
	 */
	private function resolveResource(): CsvProcessor
	{
		return $this;
	}

	/**
	 * Processes the rows
	 *
	 * @return CsvProcessor
	 */
	private function processRows(): CsvProcessor
	{
		return $this;
	}

	/**
	 * Processes the row and inserts it into the database.
	 *
	 * @return CsvProcessor
	 *
	 * @throws ProcessorRuntimeError
	 */
	private function processRow(array $row): CsvProcessor
	{
		if ($this->model instanceof Model) {
			foreach ($this->labels as $label) {
				$this->model->$label = $row[$label];
			}

			$this->model->save();
		}

		return $this;
	}
}