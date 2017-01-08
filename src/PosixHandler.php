<?php

namespace AsyncPHP\Process;

class PosixHandler implements Handler
{
    /**
     * @var int
     */
    private $pid = 0;

    /**
     * @inheritdoc
     *
     * @param string $id
     * @param string $command
     */
    public function start($id, $command)
    {
        passthru("ASYNCPHP_PROCESS_ID={$id} {$command}");
    }

    /**
     * @inheritdoc
     *
     * @param string $id
     *
     * @return bool
     */
    public function running($id)
    {
        exec("ps -wwwE | grep \"[A]SYNCPHP_PROCESS_ID={$id}\"", $output);

        if (count($output)) {
            $line = trim($output[0]);
            $values = explode(" ", $line);

            $this->pid = (int) $values[0];

            return true;
        }

        return false;
    }

    /**
     * @inheritdoc
     *
     * @param string $id
     */
    public function stop($id)
    {
        if ($this->running($id) && $this->pid) {
            exec("kill -9 {$this->pid}");
        }
    }
}
