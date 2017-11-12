<?php

namespace App\Http;


class Flash
{

    /**
     * @param string $title
     * @param string $message
     */
    public function notice(string $title, string $message)
    {
        return $this->create($title, $message,'info');
    }

    /**
     * @param string $title
     * @param string $message
     */
    public function success(string $title, string $message)
    {
       return  $this->create($title,$message,'success');
    }

    /**
     * @param string $title
     * @param string $message
     */
    public function error(string $title, string $message)
    {
        return $this->create($title,$message,'error');
    }
    /**
     * @param string $title
     * @param string $message
     * @param string $level
     * @param string $key
     */
    private function create(string $title, string $message, string $level, string $key = 'flash_message')
  {
     return  session()->flash($key,[
          'title' => $title,
          'message' => $message,
          'level'  => $level
      ]);
  }

}