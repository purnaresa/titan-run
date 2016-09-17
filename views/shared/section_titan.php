 <!-- Section INFO TITAN RUN -->
 <section id="about" class="text-center">
   <div class="container content-about">
     <div class="col-md-4 title-about">
       <h3>TITAN RUN 2016</h3>
       <h2>INFO</h2>
       <br/><br/><br/>
       <div class="modal fade" id="inforeward" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
         <div class="modal-dialog">
           <div class="modal-content">
             <div class="modal-header" align="center">
               <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
                 <span class="sr-only">Close</span></button>
             </div>
             <div class="modal-body">
               <img class="img-responsive" src="img/podium prizes.png" alt="prize" />
             </div>
           </div>
         </div>
       </div>
     </div>
     <div class="col-md-8">
       <div class="col-md-6 info-1">
         <h4>REGISTRATION PERIOD</h4>
         <p>Registration closes by July 10<sup>th</sup>, 2016 or if the quota is fulfilled</p>
         <div></div>
         <h4>RACE PACK COLLECTION</h4>
         <h3>29-30 July 2016</h3>
		 <h3>11:00 AM - 07:00 PM</h3>
         <h3><small>at</small> MALL ALAM SUTERA</h3>
         <div>
          <a href="" data-toggle="modal" data-target="#modaldoc" class="btn btn-checker spacedoc">
            Documents required for collection</a>
        </div>
        <br><br>
        <div></div>
        <p>All participants must collect their race pack during the collection day that has been scheduled 
          <a class="yellow">or it may be sent via delivery services with IDR 25K delivery cost</a>
          <h4 class="top-space-delivery">RACE PACK DELIVERY</h4>
          <a href="login" class="btn btn-checker">
           CHECK AIRWAYBILL NUMBER
         </a>
       </div>
       <div class="col-md-6 info-2">
         <h4>RACE PACK CONTENTS </h4>
         <ol style="list-style: none;">
           <li>
            <a href="#" data-toggle="modal" data-target="#modalrace" class="btn btn-checker spacedoc2">
              Runner's Entitlements</a>
           </li>
         </ol> 
         <h4>SHUTTLE BUS LOCATION</h4>
         <div class="busloc">
           <table>
             <?php foreach($shuttles as $bus): 
			 	
					if($bus->name!='Depok'){
					
			 ?>
              
              <tr>
                <td style="min-width: 70px;"><?php echo $bus->name; ?></td>
                <td style="alignment-adjust: central;"><?php echo $bus->capacity; ?></td>
                <td style="padding-left:15px;alignment-adjust: central;">
				<?php 
					if($bus->name=='Bekasi'){
						echo '03:30 AM';
					}
					if($bus->name=='Citos'){
						echo '03:30 AM';
					}
					if($bus->name=='Slipi'){
						echo '03:30 AM';
					}
					if($bus->name=='FX'){
						echo '03:30 AM';
					}
				?>
                </td>
              </tr>
             <?php 
				}
			 endforeach; ?>
           </table>
           <br>
         </div>
         <br><br>
         <h4 class="podium-h4">PODIUM PRIZES</h4>
         <br>
         <div class="busloc">
          <a href="" class="btn btn-checker top-space-prizes" data-toggle="modal" data-target="#inforeward" align="middle">PRIZES</a>
          <br>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include "section_gallery.php"; ?>

<?php include "section_race_location.php"; ?>

<?php include "section_race_result.php"; ?>