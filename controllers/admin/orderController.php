<?php
require_once __DIR__ . '/../../models/orderModel.php';

class AdminOrderController
{
	public function index()
	{
		$orderModel = new orderModel();
		$orders = $orderModel->getAll();

		include __DIR__ . '/../../views/admin/orderListView.php';
	}

	public function detail($id)
	{
    	$orderModel = new orderModel();
    	$orderDetails = $orderModel->getOrderDetail($id);
    	include __DIR__ . '/../../views/admin/orderDetailView.php';
	}
}