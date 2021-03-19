<?php

declare(strict_types=1);

return [
    'preset' => 'default',
    'exclude' => [
        '.idea/',
        '.docker/',
        'vendor/',
        'var/',
        'phpinsights.php',
    ],
    'remove' => [
        SlevomatCodingStandard\Sniffs\Classes\SuperfluousInterfaceNamingSniff::class,
        SlevomatCodingStandard\Sniffs\Classes\SuperfluousExceptionNamingSniff::class,
        SlevomatCodingStandard\Sniffs\Classes\SuperfluousTraitNamingSniff::class,
        NunoMaduro\PhpInsights\Domain\Insights\ForbiddenTraits::class,
    ],
    'config' => [
        PHP_CodeSniffer\Standards\Generic\Sniffs\Files\LineLengthSniff::class => [
            'lineLimit' => 120,
            'absoluteLineLimit' => 120,
            'ignoreComments' => false,
        ],
        SlevomatCodingStandard\Sniffs\TypeHints\PropertyTypeHintSniff::class => [
            'exclude' => [
                'src/Domain/Exceptions/PostAlreadyExistsException.php',
            ],
        ],
    ],
];
