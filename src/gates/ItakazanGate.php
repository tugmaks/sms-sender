<?php

namespace tugmaks\SMS\gates;

use tugmaks\SMS\core\ItakazanAbstract;

/**
 * Description of ItakazanGate
 *
 * @author tugmkas
 */
class ItakazanGate extends ItakazanAbstract {

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
        return ($response === null) ? false : (float) $response->getElementsByTagName('balance')->item(0)->nodeValue;
    }

    public function getSignatures() {
        $xml = $this->prepareXml([
            'action' => 'balance',
        ]);
        $response = $this->request($xml);
        $signatures = [];
        foreach ($response->getElementsByTagName('signature') as $signature) {
            $signatures[] = $signature->nodeValue;
        }
        return ($response === null) ? false : $signatures;
    }

    public function getPrices() {
        $xml = $this->prepareXml([
            'action' => 'balance',
        ]);
        $response = $this->request($xml);
        $price = [];
        foreach ($response->getElementsByTagName('price')->item(0)->attributes as $key => $value) {
            $price[$key] = (float) $value->nodeValue;
        }
        return ($response === null) ? false : $price;
    }

    public function addSignature($signature) {
        $xml = $this->prepareXml([
            'action' => 'signatureCreate',
            'signature' => $signature,
        ]);
        $response = $this->request($xml);
        return ($response === null) ? false : true;
        
    }

    public function deleteSignature($signature) {
        $xml = $this->prepareXml([
            'action' => 'signatureDelete',
            'signature' => $signature,
        ]);
        $response = $this->request($xml);
        return ($response === null) ? false : false;
    }

    public function getArchive() {
        $xml = $this->prepareXml([
            'action' => 'archive',
        ]);
        $response = $this->request($xml);
        return ($response === null) ? $response->smsArchives : false;
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
