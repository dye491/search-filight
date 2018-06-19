<?php
/**
 * Created by PhpStorm.
 * User: yuri
 * Date: 19.06.18
 * Time: 9:43
 */

namespace app\components;


use yii\httpclient\Exception;
use yii\httpclient\Request;
use yii\httpclient\Response;
use yii\httpclient\Transport;

class FileTransport extends Transport
{
    public $path;

    /**
     * Performs given request.
     * @param Request $request request to be sent.
     * @return Response response instance.
     * @throws Exception on failure.
     */
    public function send($request)
    {
        $responseBody = file_get_contents($this->path);
        return $request->client->createResponse($responseBody);
    }
}