<?php
/**
 * Created by PhpStorm.
 * User: yuri
 * Date: 18.06.18
 * Time: 21:55
 */

namespace app\components;


use app\models\Airport;
use app\models\Flight;
use yii\base\Component;
use yii\httpclient\Client;

class SearchFlight extends Component
{
    public $path = __DIR__ . '/../data/task_xml.xml';

    public function sendAndSave()
    {
        $client = new Client();

        $client->setTransport(new FileTransport(['path' => $this->path]));
        $request = $client->createRequest();
        $response = $request->send();
        $data = $client->getParser(Client::FORMAT_XML)->parse($response);

        $flights = $this->getFlights($data);
        $result = [
            'inserted' => 0,
            'errors'   => [],
        ];
        foreach ($flights as $flight) {
            $model = new Flight($flight);
            if ($model->save())
                $result['inserted'] += 1;
            else
                $result['errors'][] = $model->errors;
        }

        return $result;
    }

    private function getFlights($data)
    {
        $result = [];
        foreach ($data['ShopOptions'] as $shopOption) {
            $adult = $child = $infant = 0;
            $price = $shopOption['ShopOption']['@attributes']['Total'];
            foreach ($shopOption['ShopOption']['FareInfo']['Fares']['Fare'] as $fare) {
                switch ($fare['PaxType']['@attributes']['AgeCat']) {
                    case 'ADT':
                        $adult += $fare['PaxType']['@attributes']['Count'];
                        break;
                    case 'CLD':
                        $child += $fare['PaxType']['@attributes']['Count'];
                        break;
                    case 'INF':
                        $infant += $fare['PaxType']['@attributes']['Count'];
                        break;
                }
            }

            foreach ($shopOption['ShopOption']['ItineraryOptions']['ItineraryOption'] as $itineraryOption) {
                $back = strpos($itineraryOption['@attributes']['ODRef'], 'back') !== false;
                $from = $itineraryOption['@attributes']['From'];
                $to = $itineraryOption['@attributes']['To'];
                $start = '';
                $stop = '';
                foreach ($itineraryOption['FlightSegment'] as $flightSegment) {
                    $time = (new \DateTime($flightSegment['Departure']['@attributes']['Time']))
                        ->format('Y-m-d H:i:s');
                    if (!$start || $start > $time) $start = $time;

                    $time = (new \DateTime($flightSegment['Arrival']['@attributes']['Time']))
                        ->format('Y-m-d H:i:s');
                    if (!$stop || $stop < $time) $stop = $time;
                }
                $result[] = [
                    'from'   => Airport::searchByCode($from)->id,
                    'to'     => Airport::searchByCode($to)->id,
                    'back'   => $back,
                    'start'  => $start,
                    'stop'   => $stop,
                    'adult'  => $adult,
                    'child'  => $child,
                    'infant' => $infant,
                    'price'  => $price,
                ];
            }
        }

        return $result;
    }
}