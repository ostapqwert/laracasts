<?php

abstract class Logger
{

    const DEBUG = 1;
    const CRITICAL = 2;
    const NOTICE = 4;

    protected $mask = 0;

    /**
     * @var Logger
     */
    protected $next;

    /**
     * @param $mask
     */
    public function __construct($mask)
    {
        $this->mask = $mask;
    }

    /**
     * @param string $message
     * @param int $priority
     */
    public function message($message, $priority)
    {
        if ($this->mask & $priority) {
            $this->_writeMessage($message);
        }

        if ($this->getNext()) {
            $this->getNext()->message($message, $priority);
        }
    }

    abstract protected function _writeMessage($message);

    /**
     * @param Logger $next
     */
    public function setNext(Logger $next)
    {
        $this->next = $next;
    }

    /**
     * @return Logger
     */
    public function getNext()
    {
        return $this->next;
    }
}



################################



class ConsoleLogger extends Logger
{
    protected function _writeMessage($message)
    {
        echo 'CONSOLE echo '.$message . PHP_EOL;
    }
}

class FileLogger extends Logger
{
    protected function _writeMessage($message)
    {
        // $f = fopen("error.log", "a");
        // fwrite($f, $message . PHP_EOL);
        // fclose($f);
        echo "writing to file {$message} \n";
    }
}

class EmailLogger extends Logger
{
    protected function _writeMessage($message)
    {
        //mail("developer@example.com", "error", $message);

        echo "sending email {$message} \n";
    }
}


//какие ошибки бдует отлавливать

$logger = new ConsoleLogger(Logger::NOTICE);
$file = new FileLogger(Logger::CRITICAL | Logger::DEBUG | Logger::NOTICE);
$mail = new EmailLogger(Logger::CRITICAL);

$logger->setNext($file);
$file->setNext($mail);


// передаем ошибки
$logger->message("Notice message", Logger::NOTICE);
$logger->message("Debug message", Logger::DEBUG);
$logger->message("Critical error", Logger::CRITICAL);
