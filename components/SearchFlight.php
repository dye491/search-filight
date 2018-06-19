<?php
/**
 * Created by PhpStorm.
 * User: yuri
 * Date: 18.06.18
 * Time: 21:55
 */

namespace app\components;


use yii\base\Component;
use yii\httpclient\Client;

class SearchFlight extends Component
{
    private $_sender;

/*    public function __construct($sender)
    {
        $this->_sender = $sender;
    }*/

    public function sendAndSave()
    {
        $client = new Client();
        $client->setTransport(new FileTransport(['path'=>__DIR__ . '/../data/task_xml.xml']));
        $request = $client->createRequest();
        $response = $request->send();
//        $response->setFormat(Client::FORMAT_XML);
        $data = $client->getParser(Client::FORMAT_XML)->parse($response);
        return $data;
    }
}