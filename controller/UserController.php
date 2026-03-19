<?php
require __DIR__ . '/../core/Controller.php';
require __DIR__ . '/../core/Database.php';

class UserController extends Controller
{
    private $db;

    public function __construct()
    {
        $config = require __DIR__ . '/../config.php';
        $this->db = new Database($config['db']);
    }


    public function getUser()
    {
        $stmt = $this->db->query("SELECT * FROM users;");
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($users) {
            $this->json($users);
        } else {
            $this->json(["message" => "User Not Found"], 404);
        }
    }


    public function getUserById($id)
    {
        $stmt = $this->db->query("SELECT * FROM users WHERE userId = ?", [$id['id']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            $this->json($user);
        } else {
            $this->json(["message" => "User Not Found"], 404);
        }
    }

    public function createUser()
    {
        $input = $this->getInput();
        if (isset($input['email']) && !empty($input['password'])) {
            try {
                $this->db->query("INSERT INTO users (email, password) VALUES (?,?)", [$input['email'], $input['password']]);
                $this->json(["message" => "User Created"], 201);
            } catch (PDOException $e) {
                $this->json(["message" => "Database Error: " . $e->getMessage()], 500);
            }
        } else {
            $this->json(["message" => "Invalid Input"], 400);
        }
    }
}
