<?php

namespace tugmaks\SMS\gates;

use tugmaks\SMS\core\ItakazanAbstract;

/**
 * Description of ItakazanGate
 *
 * @author tugmkas
 */
class ItakazanGate extends ItakazanAbstract {

    public $login;
    public $password;
    public $mac;

    public function __construct($params) {
        $this->login = $params['login'];
        $this->password = $params['password'];
        $this->mac = $params['mac'];
    }

    public function getBalance() {
        $xml = $this->prepareXml([
            'action' => 'balance',
        ]);
        $request = $this->request($xml);
        return $request;
    }

    public function createSignature($signture) {
        
    }

    public function deleteSignature($signture) {
        
    }

    public function getArchive() {
        
    }

    public function send($text, array $phones) {
        
    }

}
