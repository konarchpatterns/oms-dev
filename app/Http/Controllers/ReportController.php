<?php

namespace App\Http\Controllers;
use App\Company_Master;
use App\User;
use App\Company_disposition;
use Mail;
use PHPJasper\PHPJasper;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function showreport(){
          $companyids=Company_Master::all();
          $userids=User::all();
          return view('report.dispositionreport.view',compact('companyids','userids'));
    }
    public function allcomapnydispositionreport(Request $request){
      // dd($request->all());
  
      if($request->submit1 == "Generate"){
        
        $input =base_path().'/vendor/geekcom/phpjasper-laravel/examples/datewiseallcompanydisposition.jasper';
        $output = base_path().'/vendor/geekcom/phpjasper-laravel/examples/'.time().'datewiseallcompanydisposition';
        $ext="pdf";
        $jasper = new PHPJasper;
        $options = [
          'format' => ['pdf'],
          'locale' => 'en',
          'params' => ['startdate'=>$request->startdate,'enddate'=>$request->enddate],
          'db_connection' => [
              'driver' => 'mysql',
              'host' => '127.0.0.1',
              'port' => '3306',
              'database' => 'patternscrm',
              'username' => 'root',
          ]
        ];
        $jasper->process(
                $input,
                $output,
                $options
        )->execute();
       }
      if($request->submit2 == "Generate"){
         foreach ($request->companyid as $key => $value) {   
            $check=Company_disposition::where('company_id','=',$value)->whereDate('created_at', '>=', date($request->startdate))->get();
      if(count($check) > 0){
          
        $input =base_path().'/vendor/geekcom/phpjasper-laravel/examples/onlycompanywise.jasper';
        $output = base_path().'/vendor/geekcom/phpjasper-laravel/examples/'.time().'onlycompanywise';
        $ext="pdf";
        $jasper = new PHPJasper;
        $options = [
          'format' => ['pdf'],
          'locale' => 'en',
          'params' => ['startdate'=>$request->startdate,'enddate'=>$request->enddate,'companyid'=>$value],
          'db_connection' => [
              'driver' => 'mysql',
              'host' => '127.0.0.1',
              'port' => '3306',
              'database' => 'patternscrm',
              'username' => 'root',    
          ]
        ];
        $jasper->process(
                $input,
                $output,
                $options
      )->execute();
        //send email
         foreach ($request->mailid as  $value1) {   
         $sendmail=$value1;
                $smtpAddress = 'smtp.gmail.com';
                $port = 587;
                $encryption = 'tls';
                $yourEmail = 'pdivyarajsinhvaghela88@gmail.com';
                $yourPassword = 'p@tternsb@pu123';
                   // Prepare transport
                $transport = (new \Swift_SmtpTransport($smtpAddress, $port, $encryption))
                        ->setUsername($yourEmail)
                        ->setPassword($yourPassword);
                $mailer = new \Swift_Mailer($transport);
                    // Send email
                $message = (new \Swift_Message("User Dispositionreport"))
                     ->setFrom([ $yourEmail => $yourEmail])
                     ->setTo([$sendmail => $sendmail])
                     // If you want plain text instead, remove the second paramter of setBody
                     
                     ->setBody("<html>".$usernamess->name." Disposition Report</html>", 'text/html');
                     $attach=Swift_Attachment::fromPath($output.'.pdf');
                     $message->attach($attach);
                $mailer->send($message);
         
        //end mail 
        } 
      }
      else{
        dd("No Data Found");
      }
      }
    }
     if($request->submit3 == "Generate"){
        foreach ($request->userid as $key => $value) {         
            $usernames=User::select('name')->where('id',$value)->get();
            foreach ($usernames as $usernamess) {
             
            }
            $username=$usernamess->name;
            $check=Company_disposition::where('user_id','=',$value)->whereDate('created_at', '>=', date($request->startdate))->get();
      if(count($check) > 0){
          
        $input =base_path().'/vendor/geekcom/phpjasper-laravel/examples/onlyuser.jasper';
        $output = base_path().'/vendor/geekcom/phpjasper-laravel/examples/'.time().'onlyuser';
        $ext="pdf";
        $jasper = new PHPJasper;
        $options = [
          'format' => ['pdf'],
          'locale' => 'en',
          'params' => ['startdate'=>$request->startdate,'enddate'=>$request->enddate,'userid'=>$value,'username'=>$usernamess->name],
          'db_connection' => [
              'driver' => 'mysql',
              'host' => '127.0.0.1',
              'port' => '3306',
              'database' => 'patternscrm',
              'username' => 'root',
            
              
          ]
        ];
        $jasper->process(
                $input,
                $output,
                $options
      )->execute();
//save(public_path('uploads/'.$output.'.pdf')); 
         //send booking mail when book appoinment by user
               // $sendmail=auth()->user()->email;
      // foreach ($request->mailid as  $value1) {   
      //    $sendmail=$value1;
      //           $smtpAddress = 'smtp.gmail.com';
      //           $port = 587;
      //           $encryption = 'tls';
      //           $yourEmail = 'pdivyarajsinhvaghela88@gmail.com';
      //           $yourPassword = 'p@tternsb@pu123';
      //              // Prepare transport
      //           $transport = (new \Swift_SmtpTransport($smtpAddress, $port, $encryption))
      //                   ->setUsername($yourEmail)
      //                   ->setPassword($yourPassword);
      //           $mailer = new \Swift_Mailer($transport);
      //               // Send email
      //           $message = (new \Swift_Message("User Dispositionreport"))
      //                ->setFrom([ $yourEmail => $yourEmail])
      //                ->setTo([$sendmail => $sendmail])
      //                // If you want plain text instead, remove the second paramter of setBody
                     
      //                ->setBody("<html>".$usernamess->name." Disposition Report</html>", 'text/html');
      //                $attach=Swift_Attachment::fromPath($output.'.pdf');
      //                $message->attach($attach);
      //           $mailer->send($message);
         
        //end mail 
      //  }        
       }
      
    else{
        // dd("No Data Found");
      }
    }
   }
}
}