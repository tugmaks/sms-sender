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
     * @param string $url
     */
    public function setGateUrl($url);

    /**
     * Set gate error
     * @param mixed $error
     * @return GateInterace
     */
    public function setGateError($error);

    /**
     * Get gate error
     * @return mixed. Gate error representation returned by service or null if no error
     */
    public function getGateError();
}
