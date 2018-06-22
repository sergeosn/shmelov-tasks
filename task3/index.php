<?php

class Emitter
{
    private $handlers;

    /**
     * Создает экземпляр класса Emitter.
     * @memberof Emitter
     */
    public function constructor()
    {
        $this->handlers = [];
    }

    /**
     * связывает обработчик с событием
     *
     * @param string event - событие
     * @param Handler handler - обработчик
     */
    public function on($event, $handler)
    {
        $this->handlers[] = [
            'event' => $event,
            'handler' => $handler,
        ];
    }

    /**
     * Генерирует событие -- вызывает все обработчики, связанные с событием и
     *                       передает им аргумент data
     *
     * @param string event
     * @param mixed data
     */
    public function emit($event, $data)
    {
        foreach ($this->handlers as $handler) {
            if ($handler['event'] == $event) {
                call_user_func($handler['handler'], $data);
            }
        }
    }
}
