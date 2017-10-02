<?php

namespace KoninklijkeCollective\KoningKiyoh\Utility;

/**
 * Utility: Configuration
 *
 * @package KoninklijkeCollective\KoningKiyoh\Utility
 */
class ConfigurationUtility
{
    /**
     * @var array
     */
    static $configuration = [];

    /**
     * @return boolean
     */
    public static function isValid()
    {
        $settings = static::getKiyohSettings();
        return (is_array($settings) && !empty($settings['connectorCode']) && !empty($settings['reviewUrl']));
    }

    /**
     * @return array
     */
    public static function getKiyohSettings()
    {
        $configuration = static::getConfiguration();
        return (isset($configuration['kiyoh']) ? $configuration['kiyoh'] : $configuration['kiyoh.']);
    }

    /**
     * @return array
     */
    public static function getConfiguration()
    {
        if (empty(self::$configuration)) {
            $data = $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['koning_kiyoh'];
            if (!is_array($data)) {
                self::$configuration = (array)unserialize($data);
            } else {
                self::$configuration = $data;
            }
        }
        return self::$configuration;
    }
}
