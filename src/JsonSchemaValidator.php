<?php

namespace Clevis\RestApi;

use Nette;
use Nette\Utils\Json;
use JsonSchema\Validator;
use Nette\FileNotFoundException;


/**
 * Kontroluje data proti JSON schématu
 */
class JsonSchemaValidator extends Nette\Object
{

	/** @var array */
	private $errors = array();

	/**
	 * Zkontroluje data proti zadanému schématu
	 *
	 * @param array|\StdClass
	 * @param string
	 * @return bool
	 */
	public function check($data, $schemaFile)
	{
		$validator = new Validator();
		$schema = $this->getSchema($schemaFile);

		$validator->check($data, Json::decode($schema));

		if ($validator->isValid()) return TRUE;

		$this->errors = $validator->getErrors();

		return FALSE;
	}

	/**
	 * Načte schéma ze souboru a vyřeší includy
	 *
	 * @param string
	 * @param string
	 */
	public function getSchema($schemaFile)
	{
		$schema = @file_get_contents($schemaFile);
		if ($schema === FALSE)
		{
			throw new FileNotFoundException("Schema file '$schemaFile' was not found.");
		}

		$that = $this;
		$schema = preg_replace_callback('/"\\$include":\\s*"([^"]+)"/',
			function ($match) use ($that, $schemaFile) {
				$include = $that->getSchema(dirname($schemaFile) . '/' . $match[1]);
				$include = trim($include);
				// ořízne počáteční a koncovou závorku - { } [ ]
				return substr($include, 1, -1);
			}, $schema);

		return $schema;
	}

	/**
	 * @return array
	 */
	public function getErrors()
	{
		return $this->errors;
	}

}
