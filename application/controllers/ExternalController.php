<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class ExternalController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
       $base_url = "http://localhost:8080/NRServices/services/hello/hello/mike";
       
       $http_client = new Zend_Http_Client($base_url);
       
       $this->view->response = $http_client->request(Zend_Http_Client::GET);
       
       
    }
    
    public function curlAction()
    {
        $base_url = "http://localhost:8080/NRServices/services/hello/hello/jack";
        $config = array(
           'adapter' => 'Zend_Http_Client_Adapter_Curl',
           'curloptions' => array(CURLOPT_FOLLOWLOCATION => true)
       );
        
       $http_client = new Zend_Http_Client($base_url, $config);
       
       $this->view->response = $http_client->request(Zend_Http_Client::GET);
    }
}
?>
