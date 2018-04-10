<?php

class ShareModel extends Model {

    public function Index() {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($post['submit'])) {
            //Check if every neccesserary input is filled!
            if (empty($post['title']) && strlen($post['body']) == 16) {
                Messages::setMsg('Please fill in the title and the body.', 'error');
            } elseif (empty($post['title'])) {
                Messages::setMsg('Please fill in the title of your post.', 'error');
            } elseif (strlen($post['body']) == 16) {
                Messages::setMsg('Please fill in the body of your post.', 'error');
            } else {
                
          
                // Insert into MySQL
                $this->query('INSERT INTO shares (title, body, user_name, user_id, profile_shares) VALUES(:title, :body, :user_name, :user_id, :profile_shares)');
                $this->bind(':title', $post['title']);
                $this->bind(':body', $post['body']);
                $this->bind(':user_name', $_SESSION['user_data']['name']);
                $this->bind(':user_id', 1);
                $this->bind('profile_shares', $_SESSION['user_data']['profile']);
                $this->execute();
                
            }
        }

        if(isset($post['submit-comment'])){
            if(strlen($post['comment']) > 0){
                $this->query('INSERT INTO comment (share_id, user_name, body, profile) VALUES(:share_id, :user_name, :body, :profile)');
                $this->bind(':share_id', $post['comment_id']);
                $this->bind(':user_name', $_SESSION['user_data']['name']);
                $this->bind(':body', $post['comment']);
                $this->bind(':profile', $_SESSION['user_data']['profile']);
                $this->execute();
            } else {
                Messages::setMsg('You have to fill the input comment section!', 'error');
            }
        } 
      
        //fetching the comments
        $this->query('SELECT * FROM comment');
        $comments = $this->resultSet();
        
         
        //fetching the posts
        $this->query('SELECT * FROM shares ORDER BY create_date DESC');
        $rows = $this->resultSet();
        
        //return posts and commnets!
        return $results = array(
            'rows'=> $rows,
            'comments' => $comments
        );
    }
}
