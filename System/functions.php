<?php
/*发送邮件方法
 *@param $to：接收者 $title：标题 $content：邮件内容
 *@return bool true:发送成功 false:发送失败
 */

function sendMail($to,$content){
    require_once("class.phpmailer.php");
    require_once("class.smtp.php");
    require_once(ROOT."./emailConfig.php");
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth=true;
    $mail->Host = $emailConfig['host'];//'smtp.yeah.net';
    $mail->Port = $emailConfig['port'];
    $mail->CharSet = 'UTF-8';
    $mail->FromName = $emailConfig['fromName'];
    $mail->Username =$emailConfig['user'];
    $mail->Password = $emailConfig['pwd'];
    $mail->From = $emailConfig['from'];
    $mail->isHTML(true);
    $mail->addAddress($to);
    $mail->Subject = $emailConfig['title'];
    $mail->Body = $content;//添加邮件正文 上方将isHTML设置成了true，则可以是完整的html字符串 如：使用file_get_contents函数读取本地的html文件
    //简单的判断与提示信息
    if($mail->send()) {
        return true;
    }else{
        return false;
    }
}
?>
