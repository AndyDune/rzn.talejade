<?
/**
 * ----------------------------------------------------
 * | Автор: Андрей Рыжов (Dune) <info@rznw.ru>         |
 * | Сайт: www.rznw.ru                                 |
 * | Телефон: +7 (4912) 51-10-23                       |
 * ----------------------------------------------------
 */

//autoload psr-0
spl_autoload_register(function ($className) {
    $includeNamespaces = [
        'Tale\Jade' => __DIR__ . '/vendor/talesoft/library',
    ];
    //$includePath = __DIR__ . '/vendor/zendframework/library';
    foreach ($includeNamespaces as $includeNamespace => $includePath) {
        if ($includeNamespace . '\\' === substr($className, 0, strlen($includeNamespace . '\\'))) {
            $fileName = '';
            if (false !== ($lastNsPos = strripos($className, '\\'))) {
                $namespace = substr($className, 0, $lastNsPos);
                $className = substr($className, $lastNsPos + 1);
                $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
            }
            $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

            $fileName = ($includePath !== null ? $includePath . DIRECTORY_SEPARATOR : '') . $fileName;
            if (is_readable($fileName)) {
                require $fileName;
            }
        }
    }
});



CModule::AddAutoloadClasses(
    "rzn.talejade"
);

