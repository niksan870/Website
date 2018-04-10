<?php

class UserModel extends Model {

    public function register() {
// Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $password = md5($post['password']);

        if ($post['submit']) {
            if ($post['name'] == '' || $post['email'] == '' || $post['password'] == '' || empty($post['password-verify'])) {
                Messages::setMsg('Please Fill In All Fields', 'error');
                return;
            } elseif ($post['password'] != $post['password-verify']) {
                Messages::setMsg('Passwords are not equal', 'error');
                return;
            } elseif (strlen($post['password']) < 5) {
                Messages::setMsg('Password must be at least 6 chars', 'error');
                return;
            } elseif (!preg_match("/^[a-zA-Z ]*$/", $post['name'])) {
                Messages::setMsg('Only letters and white space allowed', 'error');
                return;
            } elseif (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
                Messages::setMsg('Invalid email format', 'error');
                return;
            }

// Insert into MySQL
            $this->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');
            $this->bind(':name', $post['name']);
            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);
            $this->execute();
// Verify
            if ($this->lastInsertId()) {
// Redirect
                header('Location: ' . ROOT_URL . 'users/login');
            }
        }
        return;
    }

    public function login() {
// Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

//encoded password
        $password = md5($post['password']);

        if ($post['submit']) {

// Compare Login
            $this->query('SELECT * FROM users WHERE email = :email AND password = :password');
            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);
            $row = $this->single();

            if ($row) {
                $_SESSION['is_logged_in'] = true;
                $_SESSION['user_data'] = array(
                    "id" => $row['id'],
                    "name" => $row['name'],
                    "email" => $row['email'],
                    "profile" => $row['profile']
                );
                if (empty($_SESSION['user_data']['profile'])) {
                    $_SESSION['user_data']['profile'] = 'assets/img/default.png';
                    echo $_SESSION['user_data']['profile'];
                }
                header('Location: ' . ROOT_URL . 'shares');
            } else {
                echo Messages::setMsg('Wrong username or password!', 'error');
            }
        }
        return;
    }

    public function profile() {

        if (isset($_FILES['profile']) === true) {
            if (empty($_FILES['profile']['name']) === true) {
                echo Messages::setMsg('Please chose a file!', 'error');
            } else {
                //img extensions
                $allowed = array('jpg', 'jpeg', 'gif', 'png');


                $file_name = $_FILES['profile']['name'];
                $file_extn = strtolower(end(explode('.', $file_name)));
                $file_temp = $_FILES['profile']['tmp_name'];
                $fileSize = $_FILES['file']['size'];

                if (in_array($file_extn, $allowed)) {
                    $user_id = $_SESSION['user_data']['id'];
                    $file_path = 'assets/img/profile/' . substr(md5(time()), 0, 10) . '.' . $file_extn;
                    move_uploaded_file($file_temp, $file_path);

                    //Setting the new profile Path
                    $this->query("UPDATE users SET profile = :profile WHERE id = :id");
                    $this->bind(':profile', $file_path);
                    $this->bind(':id', $user_id);
                    $this->execute();

                    //Updates the profile pic with refreshing the Db
                    $this->query("SELECT profile FROM users WHERE id = :id");
                    $this->bind(':id', $user_id);
                    $res = $this->single();
                    $_SESSION['user_data']['profile'] = $res['profile'];

                    $this->query("UPDATE shares SET profile_shares = :profile_shares WHERE user_name = :user_name");
                    $this->bind(':profile_shares', $_SESSION['user_data']['profile']);
                    $this->bind(':user_name', $_SESSION['user_data']['name']);
                    $this->execute();

                    header('Location: ' . ROOT_URL . 'users/profile');
                } else {
                    echo Messages::setMsg('Incorrect file type. Allowed: ', 'error');
                    echo implode(', ', $allowed);
                }
            }
        }

        return $results = array(
            "this_user_posts" => $this->user_posts()
        );
        
    }

    public function user_posts() {
        $this->query('SELECT * FROM shares WHERE user_name = :user_name ORDER BY create_date DESC');
        $this->bind(':user_name', $_SESSION['user_data']['name']);
        $rows = $this->resultSet();
        return $rows;
    }

       

}
