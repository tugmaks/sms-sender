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
        $response = $this->request($xml);
        return ($response === null) ? false : $response->balance->{0};
    }

    public function addSignature($signture) {
        $xml = $this->prepareXml([
            'action' => 'sugnatureCreate',
            'signature' => $signture,
        ]);
        $response = $this->request($xml);
        return !$response ? true : false;
    }

    public function deleteSignature($signture) {
        $xml = $this->prepareXml([
            'action' => 'sugnatureDelete',
            'signature' => $signture,
        ]);
        $response = $this->request($xml);
        return !$response ? true : false;
    }

    public function getArchive() {
        $xml = $this->prepareXml([
            'action' => 'archive',
        ]);
        $response = $this->request($xml);
        return !$response ? $response->smsArchives : false;
    }

    public function send($text, array $phones) {
        $numbParts = ceil(count($phones) / 5000);
        for ($i = 0; $i <= $numbParts; $i++) {
            
        }
        $xml = $this->prepareXml([
            'action' => 'smsSendSameText',
            'unixTime' => time(),
        ]);
        $response = $this->request($xml);
        return !$response ? $response->smsArchives : false;
    }

}
