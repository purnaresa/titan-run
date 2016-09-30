<?php
  session_start();

  require_once('vendor/activerecord/ActiveRecord.php');
  require_once('vendor/routing/router.php');

  require_once('vendor/bulletproof/src/bulletproof.php');
  require_once('vendor/strana/src/Strana/ConfigHelper.php');
  require_once('vendor/strana/src/Strana/Paginator.php');

  foreach (glob("controllers/*.php") as $filename)
  {
    include $filename;
  }

  ActiveRecord\Config::initialize(function($cfg)
  {
    $cfg->set_model_directory('models');
    $cfg->set_connections(array('development' => 'mysql://asep:password@localhost/db_titanrun'));
   // $cfg->set_connections(array('production' => 'mysql://mockup:panmaydigital1234#@localhost/mockup_titanrun2016'));
   //http://image.titaninfra.com/phpmyadmin/index.php?token=183db3205ae47cf84eb7388b086b479e
	$cfg->set_connections(array('production' => 'mysql://root@localhost/titanruntest'));


	
	  
    // you can change the default connection with the below
    $cfg->set_default_connection('production');
  });

  $route = new Router();
  
  $route->map("admin", "Admins::admin");
  $route->map("admin/dashboards", "Admins::index");
  $route->map("admin/login", "Admins::login");
  $route->map("admin/logout", "Admins::logout");

  $route->map("admin/categories", "AdminCategories::index");
  $route->map("admin/new-category", "AdminCategories::create");
  $route->map("admin/edit-category:id", "AdminCategories::edit",array("id"=>"[0-9]+"));
  $route->map("admin/delete-category:id", "AdminCategories::delete",array("id"=>"[0-9]+"));

  $route->map("admin/shuttles", "AdminShuttles::index");
  $route->map("admin/new-shuttle", "AdminShuttles::create");
  $route->map("admin/edit-shuttle:id", "AdminShuttles::edit",array("id"=>"[0-9]+"));
  $route->map("admin/delete-shuttle:id", "AdminShuttles::delete",array("id"=>"[0-9]+"));

  $route->map("admin/cities", "AdminCities::index");
  $route->map("admin/new-city", "AdminCities::create");
  $route->map("admin/edit-city:id", "AdminCities::edit",array("id"=>"[0-9]+"));
  $route->map("admin/delete-city:id", "AdminCities::delete",array("id"=>"[0-9]+"));

  $route->map("admin/members", "AdminMembers::index");
  $route->map("admin/detail:id", "AdminMembers::show",array("id"=>"[0-9]+"));
  $route->map("admin/delete:id", "AdminMembers::delete",array("id"=>"[0-9]+"));

  $route->map("admin/provinces", "AdminProvinces::index");
  $route->map("admin/new-province", "AdminProvinces::create");
  $route->map("admin/edit-province:id", "AdminProvinces::edit",array("id"=>"[0-9]+"));
  $route->map("admin/delete-province:id", "AdminProvinces::delete",array("id"=>"[0-9]+"));

  $route->map("admin/companies", "AdminCompanies::index");
  $route->map("admin/new-company", "AdminCompanies::create");
  $route->map("admin/edit-company:id", "AdminCompanies::edit",array("id"=>"[0-9]+"));
  $route->map("admin/delete-company:id", "AdminCompanies::delete",array("id"=>"[0-9]+"));

  $route->map("admin/related-informations", "AdminRelateds::index");
  $route->map("admin/new-related", "AdminRelateds::create");
  $route->map("admin/edit-related:id", "AdminRelateds::edit",array("id"=>"[0-9]+"));
  $route->map("admin/delete-related:id", "AdminRelateds::delete",array("id"=>"[0-9]+"));

  $route->map("admin/occupations", "AdminOccupations::index");
  $route->map("admin/new-occupation", "AdminOccupations::create");
  $route->map("admin/edit-occupation:id", "AdminOccupations::edit",array("id"=>"[0-9]+"));
  $route->map("admin/delete-occupation:id", "AdminOccupations::delete",array("id"=>"[0-9]+"));

  $route->map("admin/run-apps", "AdminRunApps::index");
  $route->map("admin/new-run_app", "AdminRunApps::create");
  $route->map("admin/edit-run_app:id", "AdminRunApps::edit",array("id"=>"[0-9]+"));
  $route->map("admin/delete-run_app:id", "AdminRunApps::delete",array("id"=>"[0-9]+"));

  $route->map("admin/events", "AdminEvents::index");
  $route->map("admin/new-event", "AdminEvents::create");
  $route->map("admin/edit-event:id", "AdminEvents::edit",array("id"=>"[0-9]+"));
  $route->map("admin/delete-event:id", "AdminEvents::delete",array("id"=>"[0-9]+"));

  $route->map("admin/master-events", "AdminMasterEvents::index");
  $route->map("admin/new-master-event", "AdminMasterEvents::create");
  $route->map("admin/edit-master-event:id", "AdminMasterEvents::edit",array("id"=>"[0-9]+"));
  $route->map("admin/delete-master-event:id", "AdminMasterEvents::delete",array("id"=>"[0-9]+"));

  $route->map("admin/master-vouchers", "AdminMasterVouchers::index");
  $route->map("admin/new-master-voucher", "AdminMasterVouchers::create");
  $route->map("admin/edit-master-voucher:id", "AdminMasterVouchers::edit",array("id"=>"[0-9]+"));
  $route->map("admin/delete-master-voucher:id", "AdminMasterVouchers::edit",array("id"=>"[0-9]+"));

  $route->map("admin/vouchers", "AdminVouchers::index");
  $route->map("admin/new-voucher", "AdminVouchers::create");
  $route->map("admin/edit-voucher:id", "AdminVouchers::edit",array("id"=>"[0-9]+"));
  $route->map("admin/delete-voucher:id", "AdminVouchers::edit",array("id"=>"[0-9]+"));

  $route->map("admin/groups", "AdminGroups::index");
  $route->map("admin/new-group", "AdminGroups::create");
  $route->map("admin/edit-group:id", "AdminGroups::edit",array("id"=>"[0-9]+"));
  $route->map("admin/delete-group:id", "AdminGroups::delete",array("id"=>"[0-9]+"));

  $route->map("admin/delivery_prices", "AdminDeliveryPrices::index");
  $route->map("admin/new-delivery_price", "AdminDeliveryPrices::create");
  $route->map("admin/edit-delivery_price:id", "AdminDeliveryPrices::edit",array("id"=>"[0-9]+"));
  $route->map("admin/delete-delivery_price:id", "AdminDeliveryPrices::delete",array("id"=>"[0-9]+"));
  $route->map("admin/change-status:id", "AdminDeliveryPrices::changeStatus",array("id"=>"[0-9]+"));

  $route->map("admin/race-results", "AdminRaceResults::index");
  $route->map("admin/export-race-results", "AdminRaceResults::export");

  $route->map("", "Homes::index");
  $route->map("home", "Homes::index");
  $route->map("setuserdata", "Homes::setUserData");
  $route->map("language", "Homes::language");
  $route->map('pic2go', 'Homes::pictogo');

  $route->map("galleries", "Galleries::index");
  $route->map("gallery-moment:year", "Galleries::moment",array("year"=>"[0-9]+"));
  $route->map("gallery/:id", "Galleries::show",array("id"=>"[0-9]+"));

  $route->map("verify:token", "Users::verifyEmail");
  $route->map("setting", "Users::setting");
  $route->map("register", "Users::register");
  $route->map("login", "Users::login");
  $route->map("logout", "Users::logout");
  $route->map("profile", "Users::profile");
  $route->map("load-cities", "Users::loadCities");
  $route->map("load-cities-pack", "Users::loadCitiesPack");
  $route->map("load-provinces", "Users::loadProvinces");

  $route->map("edit-participant:id", "Participants::edit",array("id"=>"[0-9]+"));
  $route->map("participant-register", "Participants::register");
  $route->map("race-packs-register", "Participants::racePackRegister");
  $route->map("payment-list", "Participants::payments");
  $route->map("edit-race-pack:id","Participants::editRacePack",array("id"=>"[0-9]+"));
  $route->map("check-shuttle","Participants::checkShuttle");
  
  $route->map("add-races", "RaceResults::addRaces");
  $route->map("load-charts", "RaceResults::loadCharts");
  $route->map("race-results", "RaceResults::index");
  $route->map("race-result/:id", "RaceResults::show", array("id"=>"[0-9]+"));

  $route->map("new-password:token", "Passwords::newPassword");
  $route->map("change-password", "Passwords::changePassword");
  $route->map("forgot-password", "Passwords::forgotPassword");

  $route->map("process-payment", "Payments::process");
  $route->map("checkout-payment", "Payments::checkout");
  $route->map("check-voucher", "Payments::checkVoucher");
  $route->map("remove-pack", "Payments::removePack");
  $route->map("remove-shuttle", "Payments::removeShuttle");

  $route->map("remove-event:id", "RaceResults::removeEvent", array("id"=>"[0-9]+"));
  
  $route->map("admin/delete-gallery:id", "AdminGalleries::delete",array("id"=>"[0-9]+"));
  $route->map("admin/edit-gallery:id", "AdminGalleries::edit",array("id"=>"[0-9]+"));
  $route->map("admin/new-gallery", "AdminGalleries::create");
  $route->map("admin/galleries", "AdminGalleries::index");

  $route->run();
?>