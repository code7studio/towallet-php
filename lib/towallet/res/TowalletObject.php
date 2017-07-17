<?php

class TowalletObject
{
    // Towallet public key.
    protected $_publickey;
    // Towallet secret key.
    protected $_secretkey;

    /**
     * [__construct description]
     * @param [type] $publickey [description]
     * @param [type] $secretkey [description]
     */
    protected function __construct($publickey = null, $secretkey = null)
    {
        if ($publickey !== null) {
            $this->_publickey = $publickey;
        } else {
            $this->_publickey = TOWALLET_PUBLIC_KEY;
        }

        if ($secretkey !== null) {
            $this->_secretkey = $secretkey;
        } else {
            $this->_secretkey = TOWALLET_SECRET_KEY;
        }
    }
}
