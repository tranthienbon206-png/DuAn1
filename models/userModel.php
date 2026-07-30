<?php

class UserModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Lấy user theo ID
    public function getUserById($id)
    {
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Lấy user theo Email
    public function getUserByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Đăng ký
    public function createUser($name, $email, $password, $address, $phone)
    {
        $sql = "INSERT INTO users(name, email, password, address, phone)
                VALUES(?, ?, ?, ?, ?)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $name,
            $email,
            password_hash($password, PASSWORD_DEFAULT),
            $address,
            $phone
        ]);
    }

    // Đăng nhập
    public function loginUser($email, $password)
    {
        $user = $this->getUserByEmail($email);

        if (!$user) {
            return false;
        }

        if (password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }

    // Cập nhật thông tin
    public function updateUser($id, $name, $address, $phone)
    {
        $sql = "UPDATE users
                SET name = ?, address = ?, phone = ?
                WHERE id = ?";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $name,
            $address,
            $phone,
            $id
        ]);
    }

    // Đổi mật khẩu
    public function changePassword($id, $password)
    {
        $sql = "UPDATE users
                SET password = ?
                WHERE id = ?";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            password_hash($password, PASSWORD_DEFAULT),
            $id
        ]);
    }

    // Xóa tài khoản
    public function deleteUser($id)
    {
        $sql = "DELETE FROM users WHERE id = ?";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([$id]);
    }
    // ================== DÙNG CHO ADMIN ==================

    // Danh sách toàn bộ người dùng
    public function getAllAdmin()
    {
        $sql = "SELECT * FROM users ORDER BY id DESC";
        $stmt = $this->db->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Cập nhật vai trò + trạng thái (admin sửa)
    public function updateRoleStatus($id, $role, $status)
    {
        $sql = "UPDATE users SET role = ?, status = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([$role, $status, $id]);
    }
}
