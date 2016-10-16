<?php
  include 'models/Participant.php';
  include 'models/Category.php';
  include 'models/Occupation.php';
  include 'models/Event.php';
  include 'models/RelatedInformation.php';
  include 'models/FavouriteApp.php';
  include 'models/RacePack.php';
  include 'models/Group.php';
  include 'models/ParticipantShuttle.php';

  class ParticipantsController
  {
      public function register()
      {
          if (empty($_SESSION['user'])) {
              header('Location: login');
              exit;
          }

          $register = DeliveryPrice::find('last');
          if (!$register->register_open) {
              header('Location: profile');
              exit;
          }

          $user = $_SESSION['user'];
          $member = Member::find($user['id']);

          if (!empty(end($member->participants))) {
              if (!empty(end($member->participants)->payments)) {
                  header('Location: profile');
                  exit;
              }
          }

          if (!empty($member->participants)) {
              if (empty(end(end($member->participants)->race_packs))) {
                  header('Location: race-packs-register');
                  exit;
              }
          }

          if (!empty($_SESSION['run_category'])) {
              $occupations = Occupation::all();
              $events      = Event::all();
              $relateds    = RelatedInformation::all();
              $apps        = FavouriteApp::all();
              $groups      = Group::all();
          } else {
              $categories = Category::all();
          }

          if (isset($_POST['submit'])) {
              if (empty($_SESSION['run_category'])) {
                  $_SESSION['run_category'] = $_POST['run_category'];
                  header('Location: participant-register');
                  exit;
              } else {
                  $bib_name                 = $_POST['bib_name'];
                  $emergency_contact_name   = $_POST['emergency_contact_name'];
                  $emergency_contact_number = $_POST['emergency_contact_number'];
                  $group_name               = $_POST['group_name'];
                  $occupation               = $_POST['occupation_id'];
                  $blood_type               = $_POST['blood_type'];
                  $medical_condition        = $_POST['medical_condition'];
                  $medical_desc             = $_POST['medical_desc'];
                  $first_run                = $_POST['first_run'];
                  $best_time                = $_POST['best_time'];
                  $event_information        = $_POST['event_information'];
                  $related_information      = $_POST['related_information'];
                  $favorit_run_app          = $_POST['favorit_run_app'];
                  $tshirt_size              = $_POST['tshirt_size'];

                  $attributes = array(
                    'emergency_contact_name' => $emergency_contact_name,
                    'bib_name'               => $bib_name,
                    'phone'                  => $emergency_contact_number,
                    'group_name'             => $group_name,
                    'blood_type'             => $blood_type,
                    'first_run'              => $first_run,
                    'occupation_id'          => $occupation,
                    'medical'                => $medical_condition,
                    'medical_desc'           => $medical_desc,
                    'event_id'               => $event_information,
                    'related_information_id' => $related_information,
                    'favourite_app_id'       => $favorit_run_app,
                    'tshirt_size'            => $tshirt_size,
                    'member_id'              => $user['id'],
                    'category_id'            => $_SESSION['run_category'],
                    'create_at'              => date('Y-m-d'),
                    'update_date'            => date('Y-m-d'),
                    'best_time'              => $best_time,
                   );

                  $user_participant = new Participant($attributes);
                  $user_participant->status = false;
                  if ($user_participant->save()) {
                      header('Location: race-packs-register');
                      exit;
                  }
              }
          }

          include 'views/participants/register.php';
      }

      public function racePackRegister()
      {
          if (empty($_SESSION['user'])) {
              header('Location: login');
              exit;
          }
          $shuttles = Shuttle::all();
          $user = $_SESSION['user'];

          $member = Member::find_by_id($user['id']);

          if (empty($member)) {
              header('Location: profile');
              exit;
          }

          if (!empty(end($member->participants))) {
              if (!empty(end($member->participants)->payments)) {
                  header('Location: profile');
                  exit;
              }
          }

          if (!empty(end($member->participants))) {
              $participant_id = end($member->participants)->id;
              $cities = City::find_all_by_pack(true);
              $provinces = Province::find_all_by_pack(true);
              if (isset($_POST['submit'])) {
                  $name = $_POST['name'];
                  $email = $member->email;
                  $address = $_POST['address'];
                  $city = $_POST['city_id'];
                  $province = $_POST['province_id'];
                  $post_code = $_POST['post_code'];
                  $phone = $_POST['phone'];
                  $shuttle_bus_id = $_POST['shuttle_bus_id'];
                  $attributes = array(
            'name' => $name,
            'email' => $email,
            'address' => $address,
            'city_id' => $city,
            'province_id' => $province,
            'postal_code' => $post_code,
            'phone' => $phone,
            'shuttle_id' => $shuttle_bus_id,
            'create_at' => date('Y-m-d'),
            'update_date' => date('Y-m-d'),
            'participant_id' => $participant_id,
          );

                  $delivery = DeliveryPrice::find('last');

                  if (!empty($name)) {
                      $race_pack = new RacePack($attributes);
                      $race_pack->price = $delivery->price;
                      $race_pack->save();
                  }

                  if (!empty($shuttle_bus_id)) {
                      $memberShuttle = array('participant_id' => $participant_id, 'shuttle_id' => $shuttle_bus_id);
                      $member_shuttle = new ParticipantShuttle($memberShuttle);
                      $member_shuttle->save();
                  }

                  header('Location: payment-list');
                  exit;
              } else {
                  $msg = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; update failed</div>";
              }
          } else {
              header('Location: participant-register');
              exit;
          }
          include 'views/race_packs/register.php';
      }

      public function payments()
      {
          if (empty($_SESSION['user'])) {
              header('Location: login');
              exit;
          }

          $user = $_SESSION['user'];
          $member = Member::find($user['id']);

          if (!empty(end($member->participants))) {
              if (!empty(end($member->participants)->payments)) {
                  header('Location: profile');
                  exit;
              }
          }

          $delivery = DeliveryPrice::find('last');
          $_SESSION['shuttle'] = null;
          $_SESSION['pack'] = null;

          if (empty(end($member->participants))) {
              header('Location: profile');
              exit;
          } else {
              $_SESSION['participant'] = end($member->participants)->id;
          }

          if (isset($_POST['submit'])) {
              header('Location: profile');
              exit;
          }

          include 'views/race_packs/paymentlist.php';
      }

      public function editRacePack($id)
      {
          if (empty($_SESSION['user'])) {
              header('Location: login');
              exit;
          }

          $shuttles = Shuttle::all();
          $user = $_SESSION['user'];
          $member = Member::find($user['id']);

          if (!empty(end($member->participants))) {
              if (!empty(end($member->participants)->payments)) {
                  header('Location: profile');
                  exit;
              }
          }

          $race_pack = RacePack::find_by_id($id);

          if (empty($race_pack)) {
              header('Location: profile');
              exit;
          }

          if (!empty(end($member->participants))) {
              $participant_id = end($member->participants)->id;
              $cities = City::find_all_by_pack(true);
              $provinces = Province::find_all_by_pack(true);
              if (isset($_POST['submit'])) {
                  $name = $_POST['name'];
                  $email = $member->email;
                  $address = $_POST['address'];
                  $city = $_POST['city_id'];
                  $province = $_POST['province_id'];
                  $post_code = $_POST['post_code'];
                  $phone = $_POST['phone'];
                  $shuttle_bus_id = isset($_POST['check_shuttle']) ? $_POST['shuttle_bus_id'] : null;
                  $attributes = array(
            'name' => $name,
            'email' => $email,
            'address' => $address,
            'city_id' => $city,
            'province_id' => $province,
            'postal_code' => $post_code,
            'phone' => $phone,
            'shuttle_id' => $shuttle_bus_id,
            'create_at' => date('Y-m-d'),
            'update_date' => date('Y-m-d'),
            'participant_id' => $participant_id,
          );

                  $delivery = DeliveryPrice::find('last');

                  $race_pack->price = $delivery->price;

                  if (empty($_POST['check_pack'])) {
                      $race_pack->delete();
                      header('Location: payment-list');
                      exit;
                  }
                  $findparticipantshuttle = ParticipantShuttle::find_by_shuttle_id_and_participant_id($shuttle_bus_id, $participant_id);

                  if (!empty($shuttle_bus_id)) {
                      if (!empty($findparticipantshuttle)) {
                          $memberShuttle = array('participant_id' => $participant_id, 'shuttle_id' => $shuttle_bus_id);
                          $findparticipantshuttle->update_attributes($memberShuttle);
                      } else {
                          $memberShuttle = array('participant_id' => $participant_id, 'shuttle_id' => $shuttle_bus_id);
                          $member_shuttle = new ParticipantShuttle($memberShuttle);
                          $member_shuttle->save();
                      }
                  } else {
                      if (!empty($findparticipantshuttle)) {
                          $findparticipantshuttle->delete();
                      }
                  }

                  if ($race_pack->update_attributes($attributes)) {
                      header('Location: payment-list');
                      exit;
                  }
              } else {
                  $msg = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; update failed</div>";
              }
          } else {
              header('Location: participant-register');
              exit;
          }
          include 'views/race_packs/edit.php';
      }

      public function edit($id)
      {
          if (empty($_SESSION['user'])) {
              header('Location: login');
              exit;
          }
          $user = $_SESSION['user'];
          $member = Member::find_by_id($user['id']);

          if (!empty(end($member->participants))) {
              if (!empty(end($member->participants)->payments)) {
                  header('Location: profile');
                  exit;
              }
          }

          $user_participant = Participant::find_by_id($id);

          if (empty($user_participant)) {
              header('Location: profile');
              exit;
          }

          $occupations = Occupation::all();
          $events = Event::all();
          $relateds = RelatedInformation::all();
          $apps = FavouriteApp::all();
          $categories = Category::all();
          $groups = Group::all();

          if (isset($_POST['submit'])) {
              $bib_name = $_POST['bib_name'];
              $emergency_contact_name = $_POST['emergency_contact_name'];
              $emergency_contact_number = $_POST['emergency_contact_number'];
              $group_name = $_POST['group_name'];
              $occupation = $_POST['occupation_id'];
              $blood_type = $_POST['blood_type'];
              $medical_condition = $_POST['medical_condition'];
              $medical_desc = $_POST['medical_desc'];
              $first_run = $_POST['first_run'];
              $best_time = $_POST['best_time'];
              $event_information = $_POST['event_information'];
              $related_information = $_POST['related_information'];
              $favorit_run_app = $_POST['favorit_run_app'];
              $tshirt_size = $_POST['tshirt_size'];
              $category_id = $_POST['category_id'];

              $attributes = array(
          'emergency_contact_name' => $emergency_contact_name,
          'bib_name' => $bib_name,
          'phone' => $emergency_contact_number,
          'group_name' => $group_name,
          'blood_type' => $blood_type,
          'first_run' => $first_run,
          'occupation_id' => $occupation,
          'medical' => $medical_condition,
          'medical_desc' => $medical_desc,
          'event_id' => $event_information,
          'related_information_id' => $related_information,
          'favourite_app_id' => $favorit_run_app,
          'tshirt_size' => $tshirt_size,
          'category_id' => $category_id,
          'create_at' => date('Y-m-d'),
          'update_date' => date('Y-m-d'),
          'best_time' => $best_time,
         );

              if ($user_participant->update_attributes($attributes)) {
                  $msg = "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span> &nbsp; update success</div>";
          //if(!empty($user_participant->race_packs)){
            if (!empty(end($user_participant->race_packs))) {
                header('Location: edit-race-pack'.end($user_participant->race_packs)->id);
            } else {
                header('Location: race-packs-register');
            }
          //}else{
            //  header("Location: race-packs-register");
            //}
          exit;
              }
          }
          include 'views/participants/edit-participant.php';
      }

      public function checkShuttle()
      {
          $shuttle_id = @$_POST['shuttle'];
          $shuttle = Shuttle::find($shuttle_id);

          $total = $shuttle->capacity - count($shuttle->race_packs);
          if ($total <= $shuttle->capacity) {
              echo json_encode(array('data' => true));
          } else {
              echo json_encode(array('data' => false));
          }
      }
  }
