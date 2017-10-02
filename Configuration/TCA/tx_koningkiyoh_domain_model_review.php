<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

return [
    'ctrl' => [
        'title' => 'LLL:EXT:koning_kiyoh/Resources/Private/Language/locallang_be.xlf:tx_koningkiyoh_domain_model_review',
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
        'iconfile' => 'EXT:koning_kiyoh/Resources/Public/Icons/tx_koningkiyoh_domain_model_review.png',
    ],
    'interface' => [
        'showRecordFieldList' => 'remote_identifier, name, review_date, score, positive_comment, negative_comment, reaction, recommendation, image, company'
    ],
    'types' => [
        0 => [
            'showitem' => 'remote_identifier, name, review_date, score, positive_comment, negative_comment, reaction, recommendation, image, company'
        ]
    ],
    'columns' => [
        'remote_identifier' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:koning_kiyoh/Resources/Private/Language/locallang_be.xlf:tx_koningkiyoh_domain_model_review.remote_identifier',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'name' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:koning_kiyoh/Resources/Private/Language/locallang_be.xlf:tx_koningkiyoh_domain_model_review.name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'review_date' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:koning_kiyoh/Resources/Private/Language/locallang_be.xlf:tx_koningkiyoh_domain_model_review.review_date',
            'config' => [
                'type' => 'input',
                'eval' => 'date'
            ]
        ],
        'score' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:koning_kiyoh/Resources/Private/Language/locallang_be.xlf:tx_koningkiyoh_domain_model_review.score',
            'config' => [
                'type' => 'input',
                'eval' => 'int'
            ]
        ],
        'positive_comment' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:koning_kiyoh/Resources/Private/Language/locallang_be.xlf:tx_koningkiyoh_domain_model_review.positive_comment',
            'config' => [
                'type' => 'text'
            ]
        ],
        'negative_comment' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:koning_kiyoh/Resources/Private/Language/locallang_be.xlf:tx_koningkiyoh_domain_model_review.negative_comment',
            'config' => [
                'type' => 'text'
            ]
        ],
        'reaction' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:koning_kiyoh/Resources/Private/Language/locallang_be.xlf:tx_koningkiyoh_domain_model_review.reaction',
            'config' => [
                'type' => 'text'
            ]
        ],
        'recommendation' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:koning_kiyoh/Resources/Private/Language/locallang_be.xlf:tx_koningkiyoh_domain_model_review.recommendation',
            'config' => [
                'type' => 'check'
            ]
        ],
        'image' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:koning_kiyoh/Resources/Private/Language/locallang_be.xlf:tx_koningkiyoh_domain_model_review.image',
            'config' => [
                'type' => 'input'
            ]
        ],
        'company' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:koning_kiyoh/Resources/Private/Language/locallang_be.xlf:tx_koningkiyoh_domain_model_review.company',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_koningkiyoh_domain_model_company'
            ],
        ],
    ]
];
