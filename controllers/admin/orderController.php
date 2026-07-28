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
}