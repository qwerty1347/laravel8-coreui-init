<?php

use Illuminate\Support\Facades\Log;

if (!function_exists("logMessage")) {
    /**
     * 슬랙 logging 채널로 메세지 전송하는 메소드
     *
     * @param   string  $channel    로그 채널
     * @param   string  $level      로그 레벨
     * @param   string  $message    로그 메세지
     * @param   array   $logData    로그 데이터
     *
     * @return  void
     */
    function logMessage(string $channel, $level, string $message, array $logData=[])
    {
        Log::channel($channel)->$level($message, $logData);
    }
}

if (!function_exists("isDirectoryExists")) {
    /**
     * 지정된 디렉토리가 존재하지 않으면 디렉토리를 생성하는 메소드
     *
     * @param   string   $message
     *
     * @return  string
     */
    function isDirectoryExists(string $path): string
    {
        if (!is_dir($path)) {
            mkdir($path, 0755, true);
            chmod($path, 0707);
        }

        return $path;
    }
}

