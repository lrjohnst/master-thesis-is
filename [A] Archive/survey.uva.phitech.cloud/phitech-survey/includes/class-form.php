<?php
class SurveyForms {

    public $forms = [
        'form_1' => [
            'name' => 'form_1',
            'gravity_form_id' => 2,
            'progress_percentage' => 5,
            'fields' => [
                ['name' => 'drivers_license', 'gravity_form_field_id' => 2],
                ['name' => 'mean_days_car_week', 'gravity_form_field_id' => 18],
                ['name' => 'ever_uses_nav', 'gravity_form_field_id' => 4],
                ['name' => 'which_nav_12m', 'gravity_form_field_id' => 5],
                ['name' => 'which_nav_12m_other', 'gravity_form_field_id' => 6],
                ['name' => 'which_nav_apps', 'gravity_form_field_id' => 7],
                ['name' => 'which_nav_apps_other', 'gravity_form_field_id' => 8],
            ],
        ],
        'form_2' => [
            'name' => 'form_2',
            'gravity_form_id' => 3,
            'progress_percentage' => 40,
            'fields' => [

                ['name' => '', 'gravity_forms_field_id' => 9],
            ]
        ],
    ];
    public $form = [];


    public function __construct(string $form_name = null)
    {
        if($form_name) {
            $this->form = $this->forms[$form_name];
        }
    }
}