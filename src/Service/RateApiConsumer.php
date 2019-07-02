<?php

namespace App\Service;

use GuzzleHttp\ClientInterface;
use Psr\SimpleCache\CacheInterface;

class RateApiConsumer
{
    protected $client;
    protected $cache;

    public function __construct(ClientInterface $client, CacheInterface $cache)
    {
        $this->client = $client;
        $this->cache = $cache;
    }

    public function getRate()
    {
        if (!$this->cache->has('btc') || !$this->cache->has('ltc') ||
            !$this->cache->has('eth') || !$this->cache->has('xrp')) {
            $this->setInCache();
        }
        $results = [
            'btc' => $this->cache->get('btc'),
            'eth' => $this->cache->get('eth'),
            'ltc' => $this->cache->get('ltc'),
            'xrp' => $this->cache->get('xrp')
        ];
        return $results;
    }

    protected function setInCache()
    {
        $request = $this->client->request('GET', 'https://www.worldcoinindex.com/apiservice/v2getmarkets?' . http_build_query([
                'key' => 'PgoC3T0awfAO6bgNjKAHG3t9pZjoFr',
                'fiat' => 'eur'
            ]));
        $data = json_decode($request->getBody()->getContents(),true);
        foreach ($data['Markets'][0] as $result) {
            if ($result['Label'] === 'BTC/EUR') {
                $this->cache->set('btc', $result['Price'], 3600);
            }
            if ($result['Label'] === 'LTC/EUR') {
                $this->cache->set('ltc', $result['Price'], 3600);
            }
            if ($result['Label'] === 'ETH/EUR') {
                $this->cache->set('eth', $result['Price'], 3600);
            }
            if ($result['Label'] === 'XRP/EUR') {
                $this->cache->set('xrp', $result['Price'], 3600);
            }
        }
    }
}