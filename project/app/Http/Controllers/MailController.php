<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Session;
use App\User;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
class MailController extends Controller


{
    public function createMail()
    {
        return view('adminPanel.mail.index');
    }

    
    // public function composeEmail(Request $request) {
    //             $user = DB::table('newsletters')->get();
    //             require base_path("vendor/autoload.php");
    //             $mail = new PHPMailer(true);
    //           // Email server settings
    //           $mail->SMTPDebug = 0;
    //           $mail->isSMTP();
    //           $mail->Host = 'smtp.hostinger.in';             //  smtp host
    //           $mail->SMTPAuth = true;
    //           $mail->Username   = 'it@subscribegreens.com';                            //'imbabushaheb1010@gmail.com';                     //SMTP username
    //           $mail->Password   = 'Password@12';         // sender password
    //           $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
    //           $mail->Port = 587;                          // port - 587/465
   
    //     foreach($user as $rw)
    //          {
    //              $mail->setFrom('it@subscribegreens.com', 'Scoutin Online');
    //              $mail->addAddress($rw->email);
    //              $mail->isHTML(true);                // Set email content format to HTML              
    //              $mail->Subject = $request->get('subject');
    //              $mail->Body    = $mail->content;
    //              $mail->AltBody = "plain text version of email body";
    //          }
    //         //  dd($mail->Body);
    //          if(!$mail->send()) 
    //          {
                 
    //            return back()->with("failed", "Email not sent.")->withErrors($mail->ErrorInfo);
    //          }
             
           
    //          session()->flash('message', 'Mail Sent');
    //          return back();
         
       
    //  }
     public function composeEmail(Request $request) 
     {
      $user = DB::table('newsletters')->get();
     //dd($user->email);
     foreach($user as $email)
     {
      $useremail = $email->email;
      $data = $request->all();
      $sub = $request->subject;
      $content = $request->faqContent;
      unset($data['_token']);

    //   $checkMail = Mail::send('subscribe.email', $data, function ($message) use($email) {
    //       $message->to($email, 'scoutinOnline')->subject('New Subscriber (scoutinOnline.com)');
    //       $message->from('admin@scoutinonline.com', 'scoutinOnline.com');
    //   });

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: ScoutIn Online <dev@devs.pearl-developer.com>' . "\r\n";
        $subject = $sub;
        $message =  $content; 
       
        mail($useremail,$subject,$message,$headers);
   
   }
      if (count(Mail::failures()) > 0) {

          return redirect()->back()->with('error', "information sended error.....");

      } else {
          // echo "No errors, all sent successfully!";
          return redirect()->back()->with('success', "information sended.....");
          
      }
 }
 
}