<?php
class ContactModel
{
    private $conn;

    public function __construct($connection)
    {
        $this->conn = $connection;
    }

    public function saveMessage($data)
    {
        $stmt = $this->conn->prepare("
            INSERT INTO contact_messages (user_id, full_name, email, phone, subject, message)
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        return $stmt->execute([
            $data['user_id'],
            $data['full_name'],
            $data['email'],
            $data['phone'],
            $data['subject'],
            $data['message'],
        ]);
    }
}