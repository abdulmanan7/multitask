<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bitrix_api
{
  protected $ci;
  protected $CRM_AUTH   = FALSE;
  protected $AUTH   = FALSE;
  protected $CRM_LOGIN    = "abdul.manan.afridi@gmail.com";
  protected $CRM_PASSWORD = "coray848@";
  protected $CRM_HOST   = "codeme2016.bitrix24.com";
  protected $CRM_PORT   = "443";
  protected $CRM_PATH       = "/crm/configs/import/lead.php";

  public function __construct($props = array())
  {
    $this->ci =& get_instance();
    if (count($props) > 0)
    {
      $this->initialize($props);
    }
  }
  function initialize($config = array()){
    foreach ($config as $key => $val) {
      $this->$key=$val;
    }
  }
  function save_lead($leadData){
// POST processing
      // $leadData = $_POST['DATA'];

  // get lead data from the form
      // $leadData = array(
      //  'TITLE' => $leadData['TITLE'],
      //  'COMPANY_TITLE' => $leadData['COMPANY_TITLE'],
      //  'NAME' => $leadData['NAME'],
      //  'LAST_NAME' => $leadData['LAST_NAME'],
      //  'COMMENTS' => $leadData['COMMENTS'],
      //  'ADDRESS' => "Dowra Road Afridi Abad ",
      //  'EMAIL_HOME' =>"ahmadNazw@gmail.com",
      //  );

      // append authorization data
    if ($this->CRM_AUTH)
    {
      $leadData['AUTH']   = $this->CRM_AUTH;
    }
    else
    {
      $leadData['LOGIN']  = $this->CRM_LOGIN;
      $leadData['PASSWORD']   = $this->CRM_PASSWORD;
    }

      // open socket to CRM
    $fp = fsockopen("ssl://".$this->CRM_HOST, $this->CRM_PORT, $errno, $errstr, 30);
    if ($fp)
    {
        // prepare POST data
      $strPostData = '';
      foreach ($leadData as $key => $value)
        $strPostData .= ($strPostData == '' ? '' : '&').$key.'='.urlencode($value);

        // prepare POST headers
      $str  = "POST ".$this->CRM_PATH." HTTP/1.0\r\n";
      $str .= "Host: ".$this->CRM_HOST."\r\n";
      $str .= "Content-Type: application/x-www-form-urlencoded\r\n";
      $str .= "Content-Length: ".strlen($strPostData)."\r\n";
      $str .= "Connection: close\r\n\r\n";

      $str .= $strPostData;

        // send POST to CRM
      fwrite($fp, $str);

        // get CRM headers
      $result = '';
      while (!feof($fp))
      {
        $result .= fgets($fp, 128);
      }
      fclose($fp);

        // cut response headers
      $response = explode("\r\n\r\n", $result);

      //$output = '<pre>'.print_r($response[1], 1).'</pre>';
      //{'error':'201','ID':'6','error_message':'Lead has been added.','AUTH':'65498b98c545a3c3f49a9624654f2401'}
      $out = str_replace("'", '"', $response[1]);
      $this->save_log(json_decode($out),$leadData);
    }
    else
    {
      echo 'Connection Failed! '.$errstr.' ('.$errno.')';
    }
  }
  function save_log($params='')
  {
    if (isset($params->ID) && $params->ID > 0) {
    $data = array(
      'id' => $params->ID,
      'status_code' => $params->error,
      'status_message' => $params->error_message,
      'auth' => $params->AUTH,
      'vorname' => $leadData['TITLE'],
      'email' => $leadData['EMAIL_HOME']

      );
    $this->ci->db->insert('bitrix_log',$data);
    }
  }
}
/* End of file bitrix.php */
/* Location: ./application/libraries/bitrix.php */