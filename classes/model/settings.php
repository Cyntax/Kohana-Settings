<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Settings Model
 *
 * @package    Kohana-Settings
 * @category   Modules
 * @author     Cyntax Technologies Dev Team
 * @copyright  (c) 2009-2012 Cyntax Technologies
 * @license    http://code.cyntax.com/licenses/cyntax-open-technology
 */
class Model_Settings extends Model
{
	// loads all configuration items from table
	public function load()
	{	
		return DB::select()
			->from('settings')
			->as_object()
			->execute()
			->as_array('name', 'value');
	}
	
	// add a new configuration item
	public function add($name, $value)
	{
		try {
			$results = DB::insert('settings',
					array('name', 'value')
				)
				->values(array($name, $value))
				->execute();
			
			return $results;
		}
		catch(Exception $e)
		{
			return false;
		}
	}
	
	// set value for a single configuration item
	public function set($name, $value)
	{
		try {
			$data = array(
				'value' => $value,
			);
			
			$result = DB::update('settings')
				->set($data)
				->where('name', '=', $name)
				->execute();
	
			return $result;
		}
		catch(Exception $e)
		{
			return false;
		}
	}
	
	// retrieve a single configuration item
	public function get($name, $default = NULL)
	{
		$results = DB::select()
			->from('settings')
			->where('name', '=', $name)
			->as_object()
			->execute();

		return count($results) > 0 ? $results[0]->value : $default;
	}
}
// End of Model Settings