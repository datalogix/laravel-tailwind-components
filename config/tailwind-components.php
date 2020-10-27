<?php

return [
    'prefix' => '',

    'components' => [
        'button' => [
            'aliases' => ['bt', 'btn'],
            'view' => 'tailwind-components::button',
            'class' => \Datalogix\TailwindComponents\Components\Button::class,
        ],

        'table' => [
            'view' => 'tailwind-components::table',
            'class' => \Datalogix\TailwindComponents\Components\Table::class,
        ],

        'table.heading' => [
            'aliases' => ['th', 'head', 'heading'],
            'view' => 'tailwind-components::table.heading',
            'class' => \Datalogix\TailwindComponents\Components\Table\Heading::class,
        ],

        'table.row' => [
            'aliases' => ['tr', 'row'],
            'view' => 'tailwind-components::table.row',
            'class' => \Datalogix\TailwindComponents\Components\Table\Row::class,
        ],

        'table.cell' => [
            'aliases' => ['td', 'cell'],
            'view' => 'tailwind-components::table.cell',
            'class' => \Datalogix\TailwindComponents\Components\Table\Cell::class,
        ],

        'form' => [
            'view' => 'tailwind-components::form',
            'class' => \Datalogix\TailwindComponents\Components\Form::class,
        ],

        'form.checkbox' => [
            'aliases' => ['checkbox'],
            'view' => 'tailwind-components::form.checkbox',
            'class' => \Datalogix\TailwindComponents\Components\Form\Checkbox::class,
        ],

        'form.errors' => [
            'aliases' => ['error', 'errors'],
            'view' => 'tailwind-components::form.errors',
            'class' => \Datalogix\TailwindComponents\Components\Form\Errors::class,
        ],

        'form.group' => [
            'aliases' => ['group'],
            'view' => 'tailwind-components::form.group',
            'class' => \Datalogix\TailwindComponents\Components\Form\Group::class,
        ],

        'form.input' => [
            'aliases' => ['input', 'field', 'text-field'],
            'view' => 'tailwind-components::form.input',
            'class' => \Datalogix\TailwindComponents\Components\Form\Input::class,
            'default_type' => 'text',
            'types_by_name' => [
                'color' => ['color'],
                'date' => ['date', 'birth_date'],
                'datetime-local' => ['datetime'],
                'email' => ['email'],
                'file' => ['image', 'picture', 'photo', 'logo', 'background', 'audio', 'video', 'file'],
                'password' => ['password', 'password_confirmation', 'new_password', 'new_password_confirmation'],
                'url' => ['url', 'website', 'youtube', 'vimeo', 'facebook', 'twitter', 'instagram', 'linkedin'],
                'time' => ['time'],
            ],
        ],

        'form.label' => [
            'aliases' => ['label'],
            'view' => 'tailwind-components::form.label',
            'class' => \Datalogix\TailwindComponents\Components\Form\Label::class,
        ],

        'form.radio' => [
            'aliases' => ['radio'],
            'view' => 'tailwind-components::form.radio',
            'class' => \Datalogix\TailwindComponents\Components\Form\Radio::class,
        ],

        'form.select' => [
            'aliases' => ['select'],
            'view' => 'tailwind-components::form.select',
            'class' => \Datalogix\TailwindComponents\Components\Form\Select::class,
        ],

        'form.submit' => [
            'aliases' => ['submit'],
            'view' => 'tailwind-components::form.submit',
            'class' => \Datalogix\TailwindComponents\Components\Form\Submit::class,
        ],

        'form.textarea' => [
            'aliases' => ['textarea'],
            'view' => 'tailwind-components::form.textarea',
            'class' => \Datalogix\TailwindComponents\Components\Form\Textarea::class,
        ],
    ],

    'themes' => [
        'default' => [
            'button' => [
                'container' => [
                    'class' => 'flex items-center justify-between',
                ],

                'button' => [
                    'class' => 'bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline',
                ],
            ],

            'table' => [
                'container' => [
                    'class' => 'align-middle min-w-full overflow-x-auto shadow overdlow-hidden sm:rounded-lg border-b border-gray-200',
                ],

                'table' => [
                    'class' => 'min-w-full divide-y divide-gray-200',
                ],

                'emptyText' => [
                    'class' => 'px-6 py-4 whitespace-no-wrap text-lg text-gray-700 text-center',
                ]
            ],

            'table.heading' => [
                'th' => [
                    'class' => 'px-6 py-3 bg-gray-100',
                ],
            ],

            'table.row' => [
                'tr' => [
                    'class' => 'bg-white',
                ],
            ],

            'table.cell' => [
                'td' => [
                    'class' => 'px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-700',
                ],
            ],

            'form' => [
                'container' => [],
            ],

            'form.checkbox' => [
                'container' => [
                    'class' => 'flex flex-col',
                ],

                'label' => [
                    'class' => 'flex items-center',
                ],

                'label_text' => [
                    'class' => 'ml-2',
                ],

                'checkbox' => [
                    'class' => 'form-checkbox',
                ],
            ],

            'form.errors' => [
                'container' => [
                    'class' => 'text-red-500 text-xs italic',
                ],
            ],

            'form.group' => [
                'container' => [
                    'class' => 'mb-4',
                ],

                'inline' => [
                    'class' => 'flex flex-wrap space-x-6',
                ],

                'block' => [],
            ],

            'form.input' => [
                'hidden' => [
                    'class' => 'hidden',
                ],

                'container' => [
                    'class' => 'mb-4',
                ],

                'label' => [
                    'class' => 'block',
                ],

                'input' => [
                    'class' => 'form-input block w-full',
                ],
            ],

            'form.label' => [
                'container' => [
                    'class' => 'block mb-1 text-gray-700',
                ],
            ],

            'form.radio' => [
                'container' => [],

                'label' => [
                    'class' => 'inline-flex items-center',
                ],

                'label_text' => [
                    'class' => 'ml-2',
                ],

                'radio' => [
                    'class' => 'form-radio',
                ],
            ],

            'form.select' => [
                'container' => [
                    'class' => 'mb-4',
                ],

                'label' => [
                    'class' => 'block',
                ],

                'multiselect' => [
                    'class' => 'form-multiselect block w-full',
                ],

                'select' => [
                    'class' => 'form-select block w-full',
                ],
            ],

            'form.submit' => [
                'container' => [
                    'class' => 'flex items-center justify-between',
                ],

                'button' => [
                    'class' => 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline',
                ],
            ],

            'form.textarea' => [
                'container' => [
                    'class' => 'mb-4',
                ],

                'label' => [
                    'class' => 'block',
                ],

                'textarea' => [
                    'class' => 'form-textarea block w-full',
                ],
            ],
        ],
    ],
];
