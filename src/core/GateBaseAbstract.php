<?php

namespace tugmaks\SMS\core;

/**
 * Description of ItakazanAbstract
 *
 * @author tugmkas
 */
abstract class GateBaseAbstract implements GateInterface {

    public $gateUrl;

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

}
