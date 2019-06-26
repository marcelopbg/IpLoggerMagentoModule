<?php
 
namespace MarceloGuimar\Ip\Observer;
 
use \Psr\Log\LoggerInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\HTTP\PhpEnvironment\RemoteAddress; 
class Predispatch implements ObserverInterface
{
    protected $logger;
    protected $remoteAddress;
   
    public function __construct(LoggerInterface $logger, 
    RemoteAddress $remoteAddress)
    {
        $this->logger = $logger;
        $this->remoteAddress = $remoteAddress;
    }
 
    public function execute(Observer $observer)
    {   
        $ip = $this->remoteAddress->getRemoteAddress();
        $this->logger->warn('Ip do visitante: '.$ip);
    }
}