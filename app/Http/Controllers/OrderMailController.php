<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
USE Illuminate\Http\Response;
use App\Http\Controllers\Session;

class OrderMailController extends Controller
{
    public static $STATUS_CODE= 200;

    public function mailSend(Request $request){
        //Controllern skall ha all info om mailet
        $mail = $_POST['email'];
        $to = "test@domain.com";	/* YOUR EMAIL HERE */
        $subject = "ORDER FRÅN CONFIGURATOR";
        $headers = "From: Quotation from CONFIGURATOR <noreply@yourdomain.com>";
        $message = "Beställning:<br>";
        $message .= "Modell: " . $_POST['answer_group_1'] . "<br>";
        $message .= "Färg: " . $_POST['color_group_1'] . "<br>";
        $message .= "Pelare: " . $_POST['pillar_group_1'] . "<br>";
//        $message .= "Storage: " . $_POST['answer_group_4'] . "<br>";

        $message .= "<br>Extra tillval:<br>" ;
        foreach($_POST['answers_5'] as $value)
        {
            $message .=   "- " .  trim(stripslashes($value)) . "<br>";
        };

        $message .= "<br>TOTALT: " . $_POST['hidden_total'] . "<br>";
        $message .= "<br>BESTÄLLARE:" ;
        $message .= "<br>Namn: " . $_POST['first_last_name'];
        $message .= "<br>Email: " . $_POST['email'];
        $message .= "<br>Telefon " . $_POST['telephone'];
        $message .= "<br>Företag: " . $_POST['foretag'];
//        $message .= "<br>Terms and conditions accepted: " . $_POST['terms'] . "<br>";

        //Receive Variable
//        $sentOk = mail($to,$subject,$message,$headers);

        //Confirmation page
        $user = "$mail";
        $usersubject = "Thank You";
        $userheaders = "From: info@configurator.com<br>";
        /*$usermessage = "Thank you for your time. Your quotation request is successfully submitted.<br>"; WITH OUT SUMMARY*/
        //Confirmation page WITH  SUMMARY
        $usermessage = "Thank you for your time. Your order request is successfully submitted. We will reply shortly.<br><br>BELOW A SUMMARY<br><br>$message";
        $email  = 'ordermail@designsupport.se';
        $details  = [
            'to' => $to,
            'subject' => $subject,
                'message'=> $message,
            'headers' => $headers
//            'title' => 'Mailorder',
//            'url' => 'https://remotestack.io',
        ];
             Mail::to($email)->send(new OrderMail($details));
        if (count(Mail::failures()) > 0) {
            \Session::put('error', 'Något gick fel, var vänlig försök igen. Går inte det, ring in din order på tfn: 12345678');
            return back()->with(['error', 'Något gick fel, var vänlig försök skicka din order igen!']);

        }
        else{

            \Session::put('success', 'Din order är på väg. Tack för din beställning!');
            return back()->with(['success','Tack för din order']);
     }
}
}
