<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'KiyOh reviews',
    'description' => 'Saves KiyOh reviews as TYPO3 records',
    'category' => 'library',
    'version' => '1.0.0',
    'state' => 'stable',
    'clearCacheOnLoad' => true,
    'author' => 'Jesper Paardekooper',
    'author_email' => 'j.paardekooper@develement.nl',
    'author_company' => 'DevElement',
    'constraints' => [
        'depends' => [
            'typo3' => '7.6.0-8.99.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'psr-4' => [
            'KoninklijkeCollective\\KoningKiyoh\\' => 'Classes'
        ]
    ],
];
