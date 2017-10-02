<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

return [
    'ctrl' => [
        'title' => 'LLL:EXT:koning_kiyoh/Resources/Private/Language/locallang_be.xlf:tx_koningkiyoh_domain_model_company',
        'label' => 'name',
        'hideAtCopy' => true,
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'dividers2tabs' => true,
        'hideTable' => false,
        'rootLevel' => true,
        'delete' => 'deleted',
        'searchFields' => 'name, url, remote_identifier',
        'iconfile' => 'EXT:koning_kiyoh/Resources/Public/Icons/tx_koningkiyoh_domain_model_company.png',
    ],
    'interface' => [
        'showRecordFieldList' => 'remote_identifier, name, url, reviews'
    ],
    'types' => [
        0 => [
            'showitem' => 'remote_identifier, name, url, reviews'
        ]
    ],
    'columns' => [
        'remote_identifier' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:koning_kiyoh/Resources/Private/Language/locallang_be.xlf:tx_koningkiyoh_domain_model_company.remote_identifier',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'name' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:koning_kiyoh/Resources/Private/Language/locallang_be.xlf:tx_koningkiyoh_domain_model_company.name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'reviews' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:koning_kiyoh/Resources/Private/Language/locallang_be.xlf:tx_koningkiyoh_domain_model_company.reviews',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_koningkiyoh_domain_model_review',
                'foreign_table' => 'tx_koningkiyoh_domain_model_review',
                'foreign_field' => 'company',
                'minitems' => 0,
                'maxitems' => 9999,
            ],
        ]
    ]
];
