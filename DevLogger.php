<?php

namespace CleantalkSP\Common\Helpers;

/**
 * Class DevLogger
 * Base logger class intended to be extended.
 * Child classes should override the write() method to implement custom logging behavior.
 *
 * @package       CleantalkSP\Common\Helpers
 * @author        Cleantalk team (welcome@cleantalk.org)
 * @copyright (C) CleanTalk team (http://cleantalk.org)
 * @license       GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 * @see           https://github.com/CleanTalk/security-malware-firewall
 */
class DevLogger
{
    public static function write($msg, $context = null)
    {
        if ( ! is_string($msg) ) {
            return;
        }
        error_log($msg); // phpcs:ignore
    }
}
