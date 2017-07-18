<?php

require_once dirname(__FILE__).'/res/TowalletResource.php';

class TowalletTransaction extends TowalletResource
{
    const ENDPOINT = 'transaction';

    /**
     * [list description]
     * @param  [type] $params    [description]
     * @param  [type] $publickey [description]
     * @param  [type] $secretkey [description]
     * @return [type]            [description]
     */
    public static function get($params = null, $publickey = null, $secretkey = null)
    {
        return parent::r_get(get_class(), self::getUrl(), $params, $publickey, $secretkey);
    }

    /**
     * [getUrl description]
     * @param  string $id [description]
     * @return [type]     [description]
     */
    private static function getUrl($id = '')
    {
        return TOWALLET_API_URL.self::ENDPOINT.'/'.$id;
    }
}
