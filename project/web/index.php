<?php

require __DIR__ . '/../vendor/autoload.php';
try {
    $application = new \Project\Application();
    $application->setEnv(\Perfumer\Framework\Application\Application::HTTP);
    $application->run();
}catch (Throwable $e){
    var_dump($e->getMessage());
}