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
        $ordered_services = [];
        foreach ($data['services'] as $service) {
            foreach ($post['services[]'] as $ordered_service_id) {
                if ($service['id'] == $ordered_service_id) {
                    $total_price += $service['price'];
                    array_push($ordered_services, $service);
                }
            }
        }

        // echo $total_price;
        // echo user()->id;

        // TODO split this into function later
        // func save order to db
        $order = [
            'user_id' => user()->id,
            'total_price'  => $total_price,
        ];
        $model = model(OrderModel::class);
        $model->insert($order);

        // TODO split this into function later
        // func save ordered services to db
        $order_id = $model->insertID();

        foreach ($post['services[]'] as $ordered_service_id) {
            $model = model(OrderServicesModel::class);

            $ordered_service = [
                'order_id' => $order_id,
                'service_id'  => $ordered_service_id,
            ];

            $model->insert($ordered_service);
        }

        $data = [
            'order_id' => $order_id,
            'order' => $order,
            'ordered_services' => $ordered_services
        ];

        // return view('test', $data);
        return view('payment_order', $data);
        // return view('dashboard', $data);
    }

    public function process_payment()
    {
        helper('form');

        $order_id = $this->request->getPost(['order_id']);
        $service_model = model(OrderModel::class);

        // Check if the order with the given order_id exists before attempting to update
        $order = $service_model->find($order_id);
        if (!$order) {
            // Handle the case when the order doesn't exist
            echo "Order not found.";
            return;
        }

        // Update the record with the given order_id
        $service_model->set('is_paid', true)->where('id', $order_id)->update();


        // Redirect to dashboard after payment success
        return redirect()->to('admin');
    }
}
