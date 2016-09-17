<?php
  class PaymentsController{
    public function process(){
      if(empty($_SESSION['user'])){
        header('Location: login');
        exit;
      }

      //if(empty($_SESSION['participant'])){
        //header("Location: profile");
        //exit;
      //}

      $user = $_SESSION['user'];
      $member = Member::find_by_id($user['id']);
      
      $payment = new Payment();

      if(isset($_POST['submit'])){
        //$participant = Participant::find_by_id($_SESSION['participant']);
        $participant = Participant::find_by_id(end($member->participants)->id);
        $delivery = DeliveryPrice::find('last');

        $category_price = $participant->category->price;
        $race_pack_price = $delivery->price;
        $shuttle_price = end($participant->shuttles)->price;

        $race_delivery = !empty(end($participant->race_packs)) ? $delivery->price : 0;

          if(!empty($_SESSION['shuttle'])){
             $pariticipantshuttle = ParticipantShuttle::find_by_shuttle_id($_SESSION['shuttle']);
             $pariticipantshuttle->delete();
          }
          if(!empty($_SESSION['pack'])){
            $member_race = RacePack::find_by_id($_SESSION['pack']);
            $member_race->delete();
          }

        if(!empty($_POST['voucher_code'])){
          $voucher_code = $_POST['voucher_code'];
          $voucher = Voucher::find_by_code($voucher_code);
          $date = date('Y-m-d');
          $expired_date = date_format($voucher->expire_date, 'Y-m-d');

          $voucher_price = $voucher->master_voucher->nilai;
          
          $shuttle_price = !empty($_SESSION['shuttle']) ? 0 : $shuttle_price;
          $race_delivery = !empty($_SESSION['pack']) ? 0 : $race_delivery;          
          
          if($voucher->master_voucher->type == 'persentase'){
            $discount = ($category_price+$race_delivery+$shuttle_price)*$voucher->master_voucher->nilai;
          }else{
            $discount = ($category_price+$race_delivery+$shuttle_price) - ($voucher->master_voucher->nilai);
          }
          
          $amount = ($category_price+$race_delivery+$shuttle_price) - $discount;

          if($date <= $expired_date){
            $payment->voucher_id = $voucher->id;
            $payment->participant_id = $participant->id;
            $payment->amount = $amount;
            $payment->create_at = date('Y-m-d');
            $payment->race_pack = $race_delivery;
            $payment->shuttle_bus = $shuttle_price;
            $payment->run = $category_price;
            $payment->discount = $discount;
            if($payment->save()){
              $this->sendEmail($member, $participant, $payment);
              $_SESSION['payment'] = $payment->id;
              header("Location: profile");
              exit;
            }else{
              exit;
            }
          }else{
            $msg = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; voucher code has expired</div>";
            header("Location: payment-list");
            exit;
          }
        }else{
          $shuttle_price = !empty($_SESSION['shuttle']) ? 0 : $shuttle_price;
          $race_delivery = !empty($_SESSION['pack']) ? 0 : $race_delivery;
          $payment->participant_id = $participant->id;
          $payment->amount = ($category_price+$race_delivery+$shuttle_price);
          $payment->race_pack = $race_delivery;
          $payment->shuttle_bus = $shuttle_price;
          $payment->run = $category_price;
          $payment->create_at = date('Y-m-d');
          $payment->discount = $discount;
          $payment->pay=true;
          if($payment->save()){
            $_SESSION['shuttle'] = null;
            $_SESSION['pack'] = null;
            $_SESSION['payment'] = $payment->id;
            $this->sendEmail($member, $participant, $payment);
            header("Location: checkout-payment");
            exit;
          }else{
            header("Location: payment-list");
            exit;
          }
        }
      }
    }

    public function checkout(){
      $id = $_SESSION['payment'];
      $payment = Payment::find_by_id($id);
      if(empty($_SESSION['user'])){
        header('Location: login');
        exit;
      }
      if(empty($payment)){
        header("Location: profile");
        exit;
      }
      if(isset($_POST['submit'])){
        if(!empty($payment)){
          $payment->update_attributes(array('pay'=>true));
          header("Location: profile");
          exit;
        }
      }
      include("views/payments/checkout.php");
    }

    public function checkVoucher(){
      $voucher_code = @$_POST['voucher_code'];
      $voucher = Voucher::find_by_code_and_used($voucher_code, false);
      if(!empty($voucher)){
        if($voucher->expire_date > $date){
          $price = $voucher->master_voucher->nilai;
          $type = $voucher->master_voucher->type;
          $message = null;
          $code = $voucher->code;
        }else{
          $price = 0;
          $type = null;
          $code = null;
          $message = 'sudah digunakan';
        }
      }else{
        $price = 0;
        $type = null;
        $code = null;
        $message = 'invalid';
      }
      $results = json_encode(['price'=>$price,'message'=>$message, 'code'=>$code, 'type'=>$type]);
      echo $results;
    }

    public function removePack(){
      $pack = @$_POST['race_pack_id'];
      $_SESSION['pack'] = $pack;
      $results = json_encode(true);
      echo $results;
    }

    public function removeShuttle(){
      $shuttle = @$_POST['shuttle_id'];
      $_SESSION['shuttle'] = $shuttle;
      $results = json_encode(true);
      echo $results;
    }

  private function sendEmail($member, $participant, $payment){
      $subject = "[Titan Run] Invoice";

      $headers   = array();
      $headers[] = "MIME-Version: 1.0";
      $headers[] = "Content-type: text/html; charset=iso-8859-1";
      $headers[] = "From: no-reply <noreply@titanrun.com>";
      $headers[] = "Reply-To: ".$member->first_name." <".$member->email.">";
      $headers[] = "Subject: ".$subject;
      $headers[] = "X-Mailer: PHP/".phpversion();

      $message = '<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Invoice Mail</title>
  <style>
  	.email-body{background:#fff;}
		.email-container {max-width:500px;margin: 0 auto;}
		.header {background:url("http://titan-run.id/img/bg1.jpg");background-position:center;background-size:cover;padding:50px;}
		.header hgroup {text-align:center;font-family:verdana;}
		.header hgroup h1 {font-size: 2em;color: #fff;font-weight: bold;letter-spacing:.3em;text-transform:uppercase;}
		.header hgroup h2 {padding:20px 0 0 0;font-size:.75em;color:#121212;}
		.section1 {padding:20px;color:#666;font-family: verdana;background: #ecf0f1;}
		.section1 h1 {font-size:1.2em;color: #121212;}
		.section1 h2 {color:#121212;font-size:1.2em;}
		.section1 p {line-height:1.5em;padding: 20px 0;font-size:.75em;}
		.section1 img {width:100%;padding-top:20px;}
		.section1 a.vip {color:#fff;padding: 10px 20px;background:#3498db;text-decoration: none;}
		.footer{padding:20px;text-align:center;background:#1D1E20;color:#959595;font-family: Arial;}
		.tg  {border-collapse:collapse;border-spacing:0;}
		.tg td{padding:5px;font-size: 8pt;}
		.tg th{font-weight:normal;}
		.tg .tg-yw4l{vertical-align:top;}

		.tg  {border-collapse:collapse;border-spacing:0;}
		.tg td.borderedtop{border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-top-width:1px;border-bottom-width:1px;font-size:8pt;padding: 10px;}
		.tg th.borderedtop{border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-top-width:1px;border-bottom-width:1px;font-size: 9pt;font-weight: bold;padding: 10px;}
		.tg .tg-yw4l{vertical-align:top}
		.tg td.noborder{overflow:hidden;word-break:normal;border:none;font-size:8pt;padding: 10px;}
  </style>
</head><body>';

      $message .='<div class="email-body">
	  <div class="email-container">
	    <div class="header">
	      <hgroup>
	      	<div align="middle">
	      		<img src="http://titan-run.id/img/logotitan.png" alt="logo titan run">
	      	</div>
	        <h1>Thank You</h1>   
	      </hgroup>      
	    </div>
	    <div class="section1">
	      <h1>Payment Details</h1>
	      <hr style="border:1px solid #AABCCF;">
	      <p>'.$member->first_name.' '.$member->last_name.',<br>Terima kasih, transaksi Anda berhasil, berikut adalah informasi: </p>';
      
      $message .= '<table class="tg">
				  <tr>
				    <td class="tg-yw4l">Status transaksi</td>
				    <td class="tg-yw4l">:</td>
				    <td class="tg-yw4l">Sukses</td>
				  </tr>
				  <tr>
				    <td class="tg-yw4l">Total Pembayaran</td>
				    <td class="tg-yw4l">:</td>
				    <td class="tg-yw4l">Rp'.$payment->amount.'</td>
				  </tr>
				  <tr>
				    <td class="tg-yw4l">Metode Transaksi</td>
				    <td class="tg-yw4l">:</td>
				    <td class="tg-yw4l">Online</td>
				  </tr>
				  <tr>
				    <td class="tg-yw4l">Order ID</td>
				    <td class="tg-yw4l">:</td>
				    <td class="tg-yw4l">#'.$payment->id.'</td>
				  </tr>
				  <tr>
				    <td class="tg-yw4l">Waktu Transaksi</td>
				    <td class="tg-yw4l">:</td>
				    <td class="tg-yw4l">'.date_format($payment->create_at, "d-m-Y H:i").'</td>
				  </tr>
				  <tr>
				  	<td></td>
				  </tr>
				  <tr>
				    <td class="tg-yw4l" colspan="2">Berikut rincian pesanan anda :</td>
				  </tr>
				</table><br />';
      
      $message .= '<table class="tg" style="width:100%;">
				  <tr>
				    <th class="tg-yw4l borderedtop">Nama</th>
				    <th class="tg-yw4l borderedtop">Jumlah</th>
				    <th class="tg-yw4l borderedtop">Harga Satuan</th>
				    <th class="tg-yw4l borderedtop">Harga</th>
				  </tr>
				  <tr>
				    <td class="tg-yw4l borderedtop">[tr] '.$participant->category->name.'</td>
				    <td class="tg-yw4l borderedtop">1</td>
				    <td class="tg-yw4l borderedtop">Rp'.$payment->run.'</td>
				    <td class="tg-yw4l borderedtop">Rp'.$payment->run.'</td>
				  </tr>
				  <tr>
				    <td class="tg-yw4l borderedtop">Reg. Pack</td>
				    <td class="tg-yw4l borderedtop">1</td>
				    <td class="tg-yw4l borderedtop">Rp'.($payment->race_pack ? $payment->race_pack : 0).'</td>
				    <td class="tg-yw4l borderedtop">Rp'.($payment->race_pack ? $payment->race_pack : 0).'</td>
				  </tr>
				  <tr>
				    <td class="tg-yw4l borderedtop">Reg. Shuttle</td>
				    <td class="tg-yw4l borderedtop">1</td>
				    <td class="tg-yw4l borderedtop">Rp'.($payment->shuttle_bus ? $payment->shuttle_bus : 0).'</td>
				    <td class="tg-yw4l borderedtop">Rp'.($payment->shuttle_bus ? $payment->shuttle_bus : 0).'</td>
				  </tr>
				  <tr>
				    <td class="tg-yw4l borderedtop">Voucher code:'.$payment->voucher->code.'</td>
				    <td class="tg-yw4l borderedtop">1</td>
				    <td class="tg-yw4l borderedtop">Rp'.($payment->discount ? $payment->discount : 0).'</td>
				    <td class="tg-yw4l borderedtop">Rp'.($payment->discount ? $payment->discount : 0).'</td>
				  </tr>
				  <tr>
				    <td class="tg-yw4l borderedtop"></td>
				    <td class="tg-yw4l borderedtop"></td>
				    <td class="tg-yw4l borderedtop">Jumlah Pembayaran</td>
				    <td class="tg-yw4l borderedtop">Rp'.$payment->amount.'</td>
				  </tr>
				</table>
				<p>
					Untuk informasi lebih lanjut mengenai pembelian anda, silahkan hubungi:
				</p>

	    </div>
	    <div class="footer">
			  <p>Copyright TITAN RUN 2016. All rights reserved</p>
	    </div>
	  </div>
	</div>
</body>
</html>';
      
      $msg = "<div class='alert alert-success'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered, please login !</div>";
      
      mail($member->email, $subject, $message, implode("\r\n", $headers));
    }  
  }
?>