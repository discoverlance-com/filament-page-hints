<?php

/**
 * Filament Page Hints Config
 */
return [
    /**
     * Filament page table
     */
    'table_name' => 'filament_page_hints',
    /**
     * This is the icon of the hint button in the topbar
     */
    'hint_icon' => 'heroicon-o-question-mark-circle',

    /**
     * The class of the hint button can be changed here
     */
    'hint_class' => 'w-6 h-6 cursor-pointer text-gray-800 dark:text-white',

    /**
     * Creating or updating a hint button color can be changed here
     */
    'upsert_hint_button_color' => 'success',
    'delete_hint_button_color' => 'warning',

    /**
     * Use this option to control whether you want to show the page hint resource in the navigation.
     */
    'show_resource_in_navigation' => true,
    /**
     * Rich Text Editor used for hints toolbar buttons can be edited here.
     */
    'toolbar_buttons' => [
        'blockquote',
        'bold',
        'bulletList',
        'codeBlock',
        'h3',
        'italic',
        'link',
        'orderedList',
        'strike',
    ],
];
