<?php

######## PLEASE PROVIDE Your Gmail Info. -  (ALLOW LESS SECURE APP ON GMAIL SETTING ) ########

$yourGmailAddress = 'raihanweb722@gmail.com';
$yourGmailPassword = 'webraihan';

##############################################################################################

session_start();
require_once("../../../../vendor/autoload.php");

$objectAddItem = new \App\Admin\AddItem();

if(isset($_REQUEST)){
    $email_list = $objectAddItem->get_email_list($_REQUEST);
    //var_dump($email_list);
    $objectAddItem->set_data($_REQUEST);
    $single_item = $objectAddItem->single_item();
}


?>



<!DOCTYPE html>

<head>
    <title>Email This To A Friend</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../resource/bootstrap/css/bootstrap.min.css">
    <script src="../../../resource/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../../resource/bootstrap/js/jquery.js"></script>


    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

    <script>tinymce.init({
            selector: 'textarea',  // change this value according to your HTML

            menu: {
                table: {title: 'Table', items: 'inserttable tableprops deletetable | cell row column'},
                tools: {title: 'Tools', items: 'spellchecker code'}

            }
        });


    </script>


</head>



<div class="container">
    <h2 style="color: #fff">Email This To A Friend</h2>
    <form  role="form" method="post" action="item_list.php">
        <div class="form-group">

            <textarea   rows="8" cols="160"  name="body" >
                <table class="table-responsive">
                    <thead>
                    <tr>
                    <th> Item name:</th>
                    <th> Item picture:</th>
                    <th> Item price</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?php echo $single_item->item_name; ?></td>
                        <td style="width: 300px; height: 150px;"><img src ="uploaded_files/<?php echo $single_item->item_picture; ?>"></td>
                        <td><?php echo $single_item->item_price; ?></td>
                    </tr>
                    </tbody>


                </table>
            </textarea>

        </div>

        <input class="btn btn-primary" type="submit" name="email_send" value="Send Email">

    </form>


    <?php
    if(isset($_REQUEST['email_send'])) {

        date_default_timezone_set('Etc/UTC');

        //Create a new PHPMailer instance
        $mail = new PHPMailer;
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 0;
        //Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';
        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
        // use
        // $mail->Host = gethostbyname('smtp.gmail.com');
        // if your network does not support SMTP over IPv6
        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587; //587
        //Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls'; //tls
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = $yourGmailAddress;
        //Password to use for SMTP authentication
        $mail->Password = $yourGmailPassword;
        //Set who the message is to be sent from

        foreach($email_list as $email) {
            $mail->setFrom($yourGmailAddress, 'BITM PHP');
            //Set an alternative reply-to address
            $mail->addReplyTo($yourGmailAddress, 'BITM PHP');
            //Set who the message is to be sent to

            //echo $_REQUEST['email']; die();

            $mail->addAddress($email->email);
            //Set the subject line
            $mail->Subject = $_REQUEST['subject'];
            //Read an HTML message body from an external file, convert referenced images to embedded,
            //convert HTML into a basic plain-text alternative body
            //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
            //Replace the plain text body with one created manually
            $mail->AltBody = 'This is a plain-text message body';

            $mail->Body = $_REQUEST['body'];


            if (!$mail->send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                Message::message("<strong>Success!</strong> Email has been sent successfully.");
                sleep(30);
                ?>
                <script type="text/javascript">
                    window.location.href = 'item_list.php';
                </script>
                <?php


            }
        }

    }


    ?>



</div>
</body>


</html>