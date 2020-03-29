<?php

namespace App\Http\Controllers\Admin;

use App\Dostave;
use App\Http\Controllers\SendNotification;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController
{
    public function index()
    {
        $currentUser = auth()->user();
        $getAndroidToken = false;


        $condition = '';
        $organization = $currentUser->name;

        if ($currentUser->getIsOrganizacijaAttribute()) {
            $condition = 'organization_id = ' . $currentUser->id;
            $organization = $currentUser->name;
        } else if ($currentUser->getIsVolonterAttribute()) {
            $condition = 'dostavljac_id = ' . $currentUser->id;
            $organization = $currentUser->organization->name;
        } else if ($currentUser->getIsOperaterAttribute()) {
            $condition = 'organization_id = ' . $currentUser->organization_id;
            $organization = $currentUser->organization->name;
        }


        $settings1 = [
            'chart_title' => 'Dostave',
            'chart_type' => 'line',
            'report_type' => 'group_by_date',
            'model' => 'App\\Dostave',
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'aggregate_function' => 'count',
            'filter_field' => 'created_at',
            'filter_days' => '14',
            'group_by_field_format' => 'd.m.Y H:i:s',
            'column_class' => 'col-md-12',
            'entries_number' => '5',
            'conditions' => [
                ['name' => 'Dostave', 'condition' => $condition, 'color' => 'black'],

            ],
        ];

        $chart1 = new LaravelChart($settings1);


        $androidApp = isset($_SERVER['HTTP_X_REQUESTED_WITH']) ? $_SERVER['HTTP_X_REQUESTED_WITH'] : 'empty';


        if ($androidApp == "com.android.volonteri2020") {

            $getAndroidToken = true;

        } else {
//            $notification = new SendNotification();
//            $notification->send();

        }


        return view('home', compact('chart1', 'organization', 'getAndroidToken'));
    }

    public function token($token)
    {

        if (!empty($token)) {
            $currentUser = auth()->user();
            $currentUser->update(['token' => $token]);
        }

    }
}
