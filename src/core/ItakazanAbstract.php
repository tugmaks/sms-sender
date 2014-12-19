<?php

namespace tugmaks\SMS\core;

use ASK\XmlBuilder\XmlBuilder;

/**
 * Description of ItakazanAbstract
 *
 * @author tugmkas
 */
abstract class ItakazanAbstract extends GateBaseAbstract {

    public $login;
    public $password;
    public $mac;

    /**
     *
     * @property array $_codes List of codes returned by service;
     */
    private $_codes = [
        1 => 'удачная операция',
        800 => 'ошибка парсера (кривая xml)',
        700 => 'action указан неверно',
        499 => 'не достаточно переданных параметров, пустые значения xml или нет обязательных параметров',
        500 => 'логин или пароль неверны',
        501 => 'пользователь существует, не зарегистрирован mac- адрес',
        502 => 'пользовательские данные верны, нет даты регистрации mac-адреса',
        503 => 'пользовательские данные верны, истек период использования ПО',
        504 => 'не все тарифы пользователя определены',
        505 => 'пользователь заблокирован',
        600 => 'не определен signature',
        610 => 'не определен numbParts',
        611 => 'не определен part',
        612 => 'не определен signature',
        613 => 'не определен text',
        614 => 'не определен phone',
        615 => 'не определен onlyDelivery',
        616 => 'не определен unixTime',
        617 => 'нет предыдущих xml частей',
        618 => 'превышено допустимое количество получателей',
        619 => 'нет ни одного валидного телефонного номера получателя',
    ];

    /**
     *
     * @property string $gateUrl Url of gate
     */
    public $gateUrl = 'http://service.itakazan.ru/index.php?r=xmlService/default';

    /**
     * Get code representation returned by service
     * @param integer $code
     * @return GateInterace
     */
    public function getCode($code) {
        return array_key_exists($code, $this->_codes) ? $this->_codes[$code] : 'Unknown error';
    }

    /**
     * Get Balance
     * @return string balance or false
     */
    abstract public function getBalance();

    /**
     * Get list of allowed signatures
     * @return array list of singatures or false
     */
    abstract public function getSignatures();

    /**
     * Create signature
     * @return mixed true or error code
     */
    abstract public function addSignature($signture);

    /**
     * Get Balance
     * @return mixed true or error code
     */
    abstract public function deleteSignature($signture);

    /**
     * Get Balance
     * @return mixed array of archive or error code
     */
    abstract public function getArchive();

    /**
     * Get Balance
     * @return string or error code
     */
    abstract public function send($text, array $phones);

    /**
     * Request to service via curl
     * @return string response
     */
    public function request($xml) {
        $ch = curl_init($this->gateUrl);
        curl_setopt($ch, CURLOPT_MUTE, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        $response = simplexml_load_string($output);

        //Handle the error if exists
        if ((integer) $response->code->{0} == 1) {
            $this->setError(null);
            return $output;
        } else {
            $this->setError($this->_codes[(integer) $response->code]);
            return null;
        }
    }

    public function prepareXml($data) {
        $xmlBuilder = new XmlBuilder();

        $xmlBuilder->element('data')->reference($params)->end();
        $params->element('login', $this->login)->end();
        $params->element('pass', $this->password)->end();
        $params->element('mac', $this->mac)->end();
        foreach ($data as $key => $value) {
            $params->element($key, $value)->end();
        }

        return $xmlBuilder->getXml(true);
    }

}
