<?php

namespace tugmaks\SMS\core;

/**
 *
 * @author tugmkas
 * This interface should be implemented by all Gate classes
 */
interface GateInterface {

    /**
     * Get gate url
     * @return string
     */
    public function getGateUrl();

    /**
     * Set gate url
     * @return GateInterace
     */
    public function setGateUrl($url);
}
