<?php
/**
*
* @package phpBB Extension - Poster IP in viewtopic
* @copyright (c) 2020 RMcGirr83 (Rich McGirr)
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace rmcgirr83\posteripinviewtopic;

/**
* Extension class for custom enable/disable/purge actions
*/
class ext extends \phpbb\extension\base
{
	/** @var string Require phpBB 3.2.0 */
	const PHPBB_MIN_VERSION = '3.3';
	/**
	 * Enable extension if phpBB version requirement is met
	 *
	 * @return bool
	 * @access public
	 */
	public function is_enableable()
	{
		$config = $this->container->get('config');

		$enableable = (phpbb_version_compare($config['version'], self::PHPBB_MIN_VERSION, '>='));
		if (!$enableable)
		{
			$language = $this->container->get('language');
			$language->add_lang('common', 'rmcgirr83/posteripinviewtopic');

			trigger_error($language->lang('EXTENSION_REQUIREMENTS', self::PHPBB_MIN_VERSION), E_USER_WARNING);
		}

		return $enableable;
	}
}
