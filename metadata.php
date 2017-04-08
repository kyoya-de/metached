<?php
$moduleId   = 'kyoya-de/metached';
$modulePath = __DIR__ . "/{$moduleId}";

$sMetadataVersion = '1.1';

$aModule = [
    'id'          => $moduleId,
    'title'       => 'Metached',
    'description' => 'This is an OXID module to automically manage the activation state in OXID eShops. ' .
                     'It will keep the order of extension and their activation state.',
    'thumbnail'   => 'kyoya-de.github.png',
    'version'     => '1.0.0',
    'author'      => 'Stefan Krenz',
    'url'         => 'https://github.com/kyoya-de/metached',
    'email'       => 'info@kyoya.de',
    'extend'      => [
        'oxmoduleinstaller' => "{$moduleId}/core/MetachedOxModuleInstaller",
    ],
    'files'       => [
        'MetachedSortConfig' => "{$moduleId}/controller/admin/MetachedSortConfig.php",
        'ArrayUtils'         => "{$moduleId}/core/ArrayUtils.php",
        'ModuleSorter'       => "{$moduleId}/core/ModuleSorter.php",
    ],
    'templates'   => [
        'MetachedSortConfig.tpl' => "{$moduleId}/views/admin/tpl/MetachedSortConfig.tpl",
    ],
    'events'      => [],
    'blocks'      => [],
    'settings'    => [
        [
            'name'  => 'moduleSortDefinition',
            'type'  => 'aarr',
            'value' => [],
        ],
        [
            'group'       => 'defaults',
            'name'        => 'defaultUnknownPosition',
            'type'        => 'select',
            'constraints' => '-1|1',
            'value'       => -1,
        ],
    ],
];
