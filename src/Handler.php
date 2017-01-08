<?php

namespace AsyncPHP\Process;

interface Handler
{
    /**
     * @param string $id
     * @param string $command
     * @param bool $background
     */
    public function start($id, $command, $background = false);

    /**
     * @param string $id
     *
     * @return bool
     */
    public function running($id);

    /**
     * @param string $id
     */
    public function stop($id);
}
