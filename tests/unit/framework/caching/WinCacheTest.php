<?php
namespace yiiunit\framework\caching;

use yii\caching\WinCache;

/**
 * Class for testing wincache backend
 */
class WinCacheTest extends CacheTestCase
{
	private $_cacheInstance = null;

	/**
	 * @return WinCache
	 */
	protected function getCacheInstance()
	{
		if (!extension_loaded('wincache')) {
			$this->markTestSkipped("Wincache not installed. Skipping.");
		}

		if (!ini_get('wincache.ucenabled')) {
			$this->markTestSkipped("Wincache user cache disabled. Skipping.");
		}

		if ($this->_cacheInstance === null) {
			$this->_cacheInstance = new WinCache();
		}
		return $this->_cacheInstance;
	}
}
