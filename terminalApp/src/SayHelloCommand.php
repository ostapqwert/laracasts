<?php
namespace Acme;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class SayHelloCommand extends Command {

    public function configure()
    {
        $this->setName('sayHello')
            ->setDescription('Say hello to any')
            ->addArgument('name', InputArgument::REQUIRED, 'Your name')
        ->addOption('greeting', null, InputOption::VALUE_OPTIONAL, 'default greeting', 'Hello Default');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
       $message = sprintf('%s, %s', $input->getOption('greeting'), $input->getArgument('name'));

       $output->writeln($message);
    }
}