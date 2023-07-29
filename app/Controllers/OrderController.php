<?php

namespace App\Controllers;

use App\Models\ServiceModel;
use App\Models\OrderModel;
use App\Models\OrderServicesModel;
use App\Controllers\BaseController;

class OrderController extends BaseController
{
    public function index()
    {
        //
    }

    public function create()
    {
        helper('form');

        $model = model(ServiceModel::class);

        $data = [
            'title' => 'Dashboard',
            'services' => $model->getServices(),
        ];

        // Checks whether the form is submitted.
        if (!$this->request->is('post')) {
            // The form is not submitted, so returns the form.

            return view('dashboard', $data);
        }

        $post = $this->request->getPost(['services[]']);

        // Checks whether the submitted data passed the validation rules.
        // TODO validate atleast 1 services is checked
        // if (!$this->validateData($post, [
        //     'title' => 'required|max_length[255]|min_length[3]',
        //     'body'  => 'required|max_length[5000]|min_length[10]',
        // ])) {
        //     // The validation fails, so returns the form.
        //     return view('templates/header', ['title' => 'Create a news item'])
        //         . view('news/create')
        //         . view('templates/footer');
        // }

        $total_price = 0;
        foreach ($data['services'] as $service) {
            foreach ($post['services[]'] as $ordered_service_id) {
                if ($service['id'] == $ordered_service_id) {
                    $total_price += $service['price'];
                }
            }
        }

        // echo $total_price;
        // echo user()->id;

        $model = model(OrderModel::class);
        $model->insert([
            'user_id' => user()->id,
            'total_price'  => $total_price,
        ]);

        $order_id = $model->insertID();
        foreach ($post['services[]'] as $ordered_service_id) {
            $model = model(OrderServicesModel::class);
            $model->insert([
                'order_id' => $order_id,
                'service_id'  => $ordered_service_id,
            ]);
        }

        $data = ['post' => $post];

        return view('debug', $data);
        // return view('dashboard', $data);
    }
}
