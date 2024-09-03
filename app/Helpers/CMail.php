<?php

  namespace App\Helpers;

  use PHPMailer\PHPMailer\Exception;
  use PHPMailer\PHPMailer\PHPMailer;

  class CMail
  {
    public static function send($config){
      //Create an instance; passing `true` enables exceptions
      $mail = new PHPMailer(true);

      try{
        //Server settings
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->CharSet    = 'UTF-8';
        $mail->Host       = config('services.mail.host');
        $mail->SMTPAuth   = true;
        $mail->Username   = config('services.mail.username');
        $mail->Password   = config('services.mail.password');
        $mail->SMTPSecure = config('services.mail.encryption');
        $mail->Port       = config('services.mail.port');

        //Recipients
        $mail->setFrom(
          isset($config['from_address']) ? $config['from_address'] : config('services.mail.from.address'),
          isset($config['from_address']) ? $config['from_name'] : config('services.mail.from_name')
        );
        $mail->addAddress($config['recipient_address'],isset($config['recipient_name']) ? $config['recipient_name'] : null);

        //Content
        $mail->isHTML(true);
        $mail->Subject = $config['subject'];
        $mail->Body    = $config['body'];

        if(!$mail->send()){
          return false;
        }else{
          return true;
        }

      } catch(Exception $e){
        return false;
      }

      /*} catch(Exception $e){
        dd('Excepción al enviar correo: '.$e->getMessage());
        return false;
      }*/
    }

  }

