<?php

class HomeModel extends Model {

    public function Index() {

        if (isset($_POST['submit'])) {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $msg = $_POST['message'];

            //Check to see if there is header injections
            if ($this->hasHeaderInjections($name) || $this->hasHeaderInjections($email)) {
                die(); //Kill the existing code;
            }

            if (!$name || !$name || !$msg) {
                echo "<h4 class='error'>All fields are required!</h4><a href='contact.php' class='button-block'>Go back and try again</a>";
                exit;
            }

            $to = "omaima.aluani@gmail.com";

            $subject = "$name sent you a message via your contact form.";

            $message = "Name: $name\r\n";
            $message .= "Email: $email\r\n";
            $message .= "Messgae:\r\n$msg";

            //If the subscribe box was checked...

            if (isset($_POST['subscribe']) && $_POST['subscribe'] == 'Subscribe') {
                $message .= "\r\n\r\nPlease add $email to the mailing list.\r\n";
            }

            $massage = wordwrap($message, 72);

            //Set themail heaeders
            $headers = "MIME-Version 1.0\r\n";
            $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
            $headers .= "From: $name <$email>\r\n";
            $headers .= "X-Priority: 1\r\n";
            $headers .= "X-MSMail-Priority: High\r\n\r\n";

            //send the email
            //echo $email;
            mail($to, $subject, $message, $headers);
        }
    }

    function hasHeaderInjections($str) {
        return preg_match("/[\r\n]/", "", $str);
    }
}
