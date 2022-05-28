<?php
namespace Jefferywork\PhpRequestLog\App;

class Logger {

    // 是否异步请求
    private $is_sync;

    private $table;

    private Request $request;

    public function __construct($url, $is_sync = true, $table = "") {
        $this->is_sync = $is_sync;
        $this->table = $table;
        $this->request = new Request($url);
    }

    public function debug($log_request)
    {
        $params = [
            'table' => $this->table,
            'class' => $this->getTraceClass(),
            'line' => $this->getTraceLine(),
            'log_request' => $log_request,
        ];
        if ($this->is_sync) {
            return $this->request->get($params);
        } else {
            return $this->request->getAsync($params);
        }
    }

    /**
     * 获取调用类
     *
     * @return string
     */
    private function getTraceClass()
    {
        return "";
    }

    /**
     * 获取调用类行号
     *
     * @return string
     */
    private function getTraceLine()
    {
        return "";
    }
}