<?php

namespace App\Services;

class LoggerServices
{
    protected string $path = 'assets/log';
    protected string $file_name = 'log.txt';


    public function saveLog(string $text): void
    {
        if (!file_exists($this->path)) {
            mkdir($this->path, 0777, true);
        }
        $content = "User: " . $_SERVER['REMOTE_ADDR'] . " - " . "[" . date("d/m/y H:i:s") . "] " . $text . PHP_EOL;
        file_put_contents($this->path . "/" . $this->file_name, $content, FILE_APPEND);
    }
}