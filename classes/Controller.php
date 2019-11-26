<?php

/**
 * Class Controller
 */
class Controller
{
    /**
     * Process actions
     *
     * @return void
     * @throws Exception
     */
    public function process()
    {
        $response = $this->_getProcessedActionState($this->getCurlResult());
        if (!$response) {
            throw new Exception('Nothing to do or unknown error occurred.');
        }
    }

    /**
     * @return bool|string
     */
    private function getCurlResult()
    {
        return Logic::process();
    }

    /**
     * Process action
     *
     * @param $result
     * @return bool Process state
     */
    private function _getProcessedActionState($result)
    {
        return View::show($result);
    }

}
