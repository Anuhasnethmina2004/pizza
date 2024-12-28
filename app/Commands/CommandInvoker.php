<?php

namespace App\Commands;

class CommandInvoker
{
    protected $commands = [];

    public function addCommand(Command $command)
    {
        $this->commands[] = $command;
    }

    public function executeCommands()
    {
        foreach ($this->commands as $command) {
            $command->execute();
        }
        $this->commands = []; // Clear commands after execution
    }
}
