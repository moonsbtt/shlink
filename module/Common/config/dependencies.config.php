<?php
use Acelaya\ZsmAnnotatedServices\Factory\V3\AnnotatedFactory;
use Doctrine\Common\Cache\Cache;
use Doctrine\ORM\EntityManager;
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Shlinkio\Shlink\Common\ErrorHandler;
use Shlinkio\Shlink\Common\Factory\CacheFactory;
use Shlinkio\Shlink\Common\Factory\EntityManagerFactory;
use Shlinkio\Shlink\Common\Factory\LoggerFactory;
use Shlinkio\Shlink\Common\Factory\TranslatorFactory;
use Shlinkio\Shlink\Common\Middleware\LocaleMiddleware;
use Shlinkio\Shlink\Common\Service\IpLocationResolver;
use Shlinkio\Shlink\Common\Twig\Extension\TranslatorExtension;
use Zend\I18n\Translator\Translator;
use Zend\ServiceManager\Factory\InvokableFactory;

return [

    'dependencies' => [
        'factories' => [
            EntityManager::class => EntityManagerFactory::class,
            GuzzleHttp\Client::class => InvokableFactory::class,
            Cache::class => CacheFactory::class,
            LoggerInterface::class => LoggerFactory::class,
            'Logger_Shlink' => LoggerFactory::class,

            Translator::class => TranslatorFactory::class,
            TranslatorExtension::class => AnnotatedFactory::class,
            LocaleMiddleware::class => AnnotatedFactory::class,

            IpLocationResolver::class => AnnotatedFactory::class,

            ErrorHandler\ContentBasedErrorHandler::class => AnnotatedFactory::class,
            ErrorHandler\ErrorHandlerManager::class => ErrorHandler\ErrorHandlerManagerFactory::class,
        ],
        'aliases' => [
            'em' => EntityManager::class,
            'httpClient' => GuzzleHttp\Client::class,
            'translator' => Translator::class,
            'logger' => LoggerInterface::class,
            Logger::class => LoggerInterface::class,
            AnnotatedFactory::CACHE_SERVICE => Cache::class,
        ],
    ],

];