<?php

namespace tugmaks\SMS\core;

/**
 * Description of ItakazanAbstract
 *
 * @author tugmkas
 */
abstract class GateBaseAbstract implements GateInterface {

    public $gateUrl;
    public $error;

    /**
     * @inheritdoc
     */
    public function getGateUrl() {
        return $this->gateUrl;
    }

    /**
     * @inheritdoc
     */
    public function setGateUrl($url) {
        $this->gateUrl = $url;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getGateError() {
        return $this->error;
    }

    /**
     * @inheritdoc
     */
    public function setGateError($error) {
        $this->error = $error;
        return $this;
    }

}
