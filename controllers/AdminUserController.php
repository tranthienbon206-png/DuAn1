<?php

require_once 'models/userModel.php';

class AdminUserController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function index()
    {
        $userModel = new UserModel($this->db);
        $users = $userModel->getAllAdmin();

        include 'views/admin/userListView.php';
    }

    public function editForm($id)
    {
        $userModel = new UserModel($this->db);
        $user = $userModel->getUserById($id);

        include 'views/admin/userFormView.php';
    }

    public function update()
    {
        $userModel = new UserModel($this->db);
        $userModel->updateRoleStatus($_POST['id'], $_POST['role'], $_POST['status']);

        header('Location: ?action=admin_users');
        exit;
    }

    public function delete($id)
    {
        $userModel = new UserModel($this->db);
        $userModel->deleteUser($id);

        header('Location: ?action=admin_users');
        exit;
    }
}