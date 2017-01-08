<?php

namespace AsyncPHP\Process;

interface Handler
{
    /**
     * @param string $id
     * @param string $command
     */
    public function start($id, $command);

    /**
     * @param string $id
     */
    public function running($id);

    /**
     * @param string $id
     */
    public function stop($id);
}
