<?php

declare(strict_types=1);
/**
 * This is an extension of hyperf
 * Name hyperf action
 *
 * @link     https://github.com/wayhood
 * @license  https://github.com/wayhood/hyperf-action
 */
namespace DeathSatan\BtApi;

use GuzzleHttp\Client;

/**
 * @method array system_total() 系统统计
 * @method array get_disk_info() 磁盘信息
 * @method array get_network_info() 网络信息
 * @method array update_panel(bool $force = false,bool $check = false) 检测面板更新以及是否更新面板
 * @method int|string check_task_count() 监测是否有安装任务
 */
class BtManage
{
    protected string $server;

    protected string $secret_key;

    protected Client $client;

    public function __construct(string $server, string $secret_key, array $client = [])
    {
        $this->server = $server;
        $this->secret_key = $secret_key;
        $this->client = new Client($client);
    }

    /**
     * @param mixed $name
     * @param mixed $arguments
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function __call($name, $arguments)
    {
        $uri = $this->build_uri($name);
        $params = $this->parse_params($arguments);
        $response = $this->client->post($uri, [
            'form_params' => $params,
        ]);
        var_dump($response->getBody()->getContents());
        return json_decode((string) $response->getBody(), true);
    }

    protected function parse_params(array $params = []): array
    {
        $params['request_time'] = time();
        $params['request_token'] = md5($params['request_time'] . md5($this->secret_key));
        return $params;
    }

    /**
     * @param mixed $name
     * @throws \Exception
     */
    protected function build_uri($name): string
    {
        var_dump(rtrim($this->server, '/') . '/'
            . ltrim(ApiList::get($name), '/'));
        return rtrim($this->server, '/') . '/'
                . ltrim(ApiList::get($name), '/');
    }
}
