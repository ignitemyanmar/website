<?php
	Route::get('tripautocreate',       'ApiController@tripautocreate');
	Route::get('/', function(){return Redirect::to('bus');});
	Route::get('bus', 								'HomeController@index');
	Route::get('triplist',							'HomeController@searchTrip');
	Route::get('bus_seat_choose',					'HomeController@getchoosebusseat');
	Route::post('ticket/order',						'HomeController@postOrder');
	Route::get('cartview/{id}',						'HomeController@getcart');
	Route::resource('checkout', 					'HomeController@checkout');

	Route::get('operators/agent/{id}',				'ReportController@getOperatorsbyAgent');
	Route::get('agents/operator/{id}',				'ReportController@getAgentsbyOperator');
	Route::get('triplist/{id}/agent',				'ReportController@getTripslistreportOperator');

	Route::post('saleticket',						'ApiController@postSale');
	
	Route::group(array('before' => 'auth'), function()
	{
		//operator report
		Route::get('report/operator/trip/dateranges',	'ReportController@getTripslistreportOperator');
		Route::get('triplist/{date}/daily',				'ReportController@getTripsSellingReportbyDaily');
		// Route::get('triplist/{busid}/busid',			'ReportController@getTripsSellingReportbyBusid');

		//agent report
		Route::get('report/agent/trip/dateranges',		'ReportController@getTripslistdaterangeAgent');
		Route::get('agent/triplist/{date}/daily',		'ReportController@getTripsSellingReportbyDailyAgent');
		Route::get('triplist/{busid}/busid',			'ReportController@getTripsSellingReportbyBusid');

		
		//Trip Date Reports
		Route::get('report/dailybydeparturedate',			'ReportController@getDailyReportByDepartureDate');
		Route::get('report/dailybydeparturedate/search',	'ReportController@getDailyReportByDepartureDatesearch');
		Route::get('report/dailybydeparturedate/busid',		'ReportController@getDailyReportbydepartdateandbusid');
		Route::get('report/dailybydeparturedate/detail',	'ReportController@getDailyReportbydepartdatedetail');

		Route::get('report/dailycarandadvancesale',			'ReportController@getDailyReportforTrip');
		Route::get('report/dailycarandadvancesale/search',	'ReportController@getDailyReportforTrip');
		Route::get('report/dailycarandadvancesale/time',	'ReportController@getDailyReportforTripFilterbyTime');
		Route::get('report/dailycarandadvancesale/date',	'ReportController@getDailyAdvancedByFilterDate');
		Route::get('report/dailycarandadvancesale/detail',	'ReportController@getDetailDailyReportforBus');

		Route::get('report/seatoccupiedbybus',				'ReportController@getSeatOccupancyReport');
		Route::get('report/seatoccupiedbybus/search',		'ReportController@getSeatOccupancyReport');
		Route::get('report/seatoccupiedbybus/detail',		'ReportController@getSeatOccupancydetail');

		Route::post('report/customers/update',				'ReportController@postCustomerInfoUpdate');

		//seatoccupiedbybus
		// Route::get('report/seatoccupiedbybus',			'SeatOccupiedByBusController@index');
		Route::get('report/seatoccupiedbytrip',			'ReportController@getSeatOccupancyBytrip');

		Route::get('triplist/agentreport/{id}/dateragne','ReportController@getTripslistreport');
	

		///////////////Admin Route Begin//////////////////////////////////////
		Route::get('agents/create',			'AgentController@getAddagent');
		Route::post('addagent',				'AgentController@postAddagent');
		Route::get('agentlist',				'AgentController@showAgentList');
		Route::get('agent-update/{id}',  	'AgentController@getEditAgent');
		Route::post('updateagent/{id}',  	'AgentController@postEditAgent');
		Route::post('delagent',          	'AgentController@postdelBusClass');
		Route::get('deleteagent/{id}',   	'AgentController@getDeleteAgent');
		Route::post('searchagent',       	'AgentController@postSearchAgent');

		Route::get('agentgroup/create',			'AgentGroupController@getAddagentgroup');
		Route::post('addagentgroup',			'AgentGroupController@postAddagentgroup');
		Route::get('agentgrouplist',	    	'AgentGroupController@showAgentgroupList');
		Route::get('agentgroup-update/{id}',  	'AgentGroupController@getEditAgentgroup');
		Route::post('updateagentgroup/{id}',  	'AgentGroupController@postEditAgentgroup');
		Route::post('delagentgroup',          	'AgentGroupController@postdelAgentgroup');
		Route::get('deleteagentgroup/{id}',   	'AgentGroupController@getDeleteAgentgroup');
		Route::post('searchagentgroup',       	'AgentGroupController@postSearchAgentgroup');

		Route::get('trip/create', 			'TripController@getAddtrip');
		Route::post('addtrip',				'TripController@postAddtrip');
		// Route::get('triplist',				'TripController@showTriplist');
		Route::get('trip-update/{id}', 		'TripController@getEditTrip');
		Route::post('updatetrip/{id}', 		'TripController@postEditTrip');
		Route::post('deltrip',          	'TripController@postdelTrip');
		Route::get('deletetrip/{id}',   	'TripController@getDeleteTrip');
		Route::post('searchtrip',      		'TripController@postSearchTrip');

		Route::get('busclass/create',		'BusClassController@getAddBusClasses');
		Route::post('addbusclass',			'BusClassController@postAddBusClasses');
		Route::get('busclasslist',			'BusClassController@showBusClassList');	
		Route::get('busclass-update/{id}',  'BusClassController@getEditBusClass');
		Route::post('updatebusclass/{id}',  'BusClassController@postEditBusClass');
		Route::post('delbusclass',          'BusClassController@postdelBusClass');
		Route::get('deletebusclass/{id}',   'BusClassController@getDeleteBusClass');
		Route::post('searchbusclass',       'BusClassController@postSearchBusClass');

		Route::get('operators/create',		'OperatorController@getAddOperator');
		Route::post('addoperator',			'OperatorController@postAddOperator');
		Route::get('operatorlist',			'OperatorController@showOperatorlist');	
		Route::get('operator-update/{id}',  'OperatorController@getEditOperator');
		Route::post('updateoperator/{id}',  'OperatorController@postEditOperator');
		Route::post('deloperator',          'OperatorController@postdelOperator');
		Route::get('deleteoperator/{id}',   'OperatorController@getDeleteOperator');
		Route::post('searchoperator',       'OperatorController@postSearchOperator');

		Route::get('seatlayout/create',			'SeatLayoutController@getAddSeatLayout');
		Route::post('addseatlayout',			'SeatLayoutController@postAddSeatLayout');
		Route::get('seatlayoutlist',			'SeatLayoutController@showSeatLayoutList');
		Route::get('seatlayout-update/{id}',  	'SeatLayoutController@getEditSeatLayout');
		Route::post('updateseatlayout/{id}',  	'SeatLayoutController@postEditSeatLayout');
		Route::post('delseatlayout',          	'SeatLayoutController@postdelSeatLayout');
		Route::get('deleteseatlayout/{id}',   	'SeatLayoutController@getDeleteSeatLayout');
		Route::post('searchseatlayout',       	'SeatLayoutController@postSearchSeatLayout');
		Route::get('seatlayoutframe',			'SeatLayoutController@postSeatLayout');

		Route::get('commissiontypecreate',		'CommissionTypeController@getAddcommissiontype');
		Route::post('addcommissiontype',		'CommissionTypeController@postAddCommissiontype');
		Route::get('commissiontypelist',	    'CommissionTypeController@showCommissiontypeList');
		Route::get('commissiontype-update/{id}','CommissionTypeController@getEditCommissiontype');
		Route::post('updatecommissiontype/{id}','CommissionTypeController@postEditCommissiontype');
		Route::post('delcommissiontype',        'CommissionTypeController@postdelCommissiontype');
		Route::get('deletecommissiontype/{id}', 'CommissionTypeController@getDeleteCommissiontype');
		Route::post('searchcommissiontype',     'CommissionTypeController@postSearchCommissiontype');

		Route::get('city/create',		'CityController@getAddCity');
		Route::post('addcity',			'CityController@postAddCity');
		Route::get('citylist',	    	'CityController@showCityList');
		Route::get('city-update/{id}',	'CityController@getEditCity');
		Route::post('updatecity/{id}',	'CityController@postEditCity');
		Route::post('delcity',        	'CityController@postdelCity');
		Route::get('deletecity/{id}', 	'CityController@getDeleteCity');
		Route::post('searchcity',     	'CityController@postSearchCity');

		Route::get('tickettypes/create',			'TicketTypeController@getAddTicketType');
		Route::post('addtickettype',			'TicketTypeController@postAddTicketType');
		Route::get('tickettypelist',	    	'TicketTypeController@showTicketTypeList');
		Route::get('tickettype-update/{id}',	'TicketTypeController@getEditTicketType');
		Route::post('updatetickettype/{id}',	'TicketTypeController@postEditTicketType');
		Route::post('deltickettype',        	'TicketTypeController@postdelTicketType');
		Route::get('deletetickettype/{id}', 	'TicketTypeController@getDeleteTicketType');
		Route::post('searchtickettype',     	'TicketTypeController@postSearchTicketType');

		Route::get('usercreate',		'UserController@getAddUser');
		Route::post('adduser',			'UserController@postAddUser');
		Route::get('userlist',	    	'UserController@showTicketTypeList');
		Route::get('user-update/{id}',	'UserController@getEditTicketType');
		Route::post('updateuser/{id}',	'UserController@postEditTicketType');
		Route::post('deluser',        	'UserController@postdelTicketType');
		Route::get('deleteuser/{id}', 	'UserController@getDeleteTicketType');
		Route::post('searchuser',     	'UserController@postSearchTicketType');

		Route::get('seatplans/create',			'SeatPlanController@getAddSeatPlan');
		Route::get('makeseatplan',				'SeatPlanController@postSeatPlan');
		Route::post('addseatplan',     			'SeatPlanController@postAddSeatPlan');
		Route::get('seatplanlist',     			'SeatPlanController@showSeatPlanList');
		Route::get('seatplan-update/{id}',  	'SeatPlanController@getEditSeatPlan');
		Route::post('updateseatplan/{id}',  	'SeatPlanController@postEditSeatPlan');
		Route::post('delseatplan',          	'SeatPlanController@postdelSeatPlan');
		Route::get('deleteseatplan/{id}',   	'SeatPlanController@getDeleteSeatPlan');
		Route::post('searchseatplan',       	'SeatPlanController@postSearchSeatPlan');
		Route::get('seatplandetail/{id}/seat_plan_id',		'SeatPlanController@getSeatPlanDetail');

		Route::get('seatplan/update/{planid}',     		'SeatPlanController@getEdit');

	});

	Route::filter('guest',              'UserController@filterguest');
	Route::filter('auth',               'UserController@filterauth');
	Route::get('register',              'UserController@adduser1');
	Route::get('user',              'UserController@adduser1');
	Route::get('easyticket-admin',      array('as'=>'easyticket-admin','uses'=>'UserController@getLogin'))->before('guest');
	Route::post('administration',       'UserController@postLogin');
	Route::get('users-logout',          array('as'=>'logout','uses'=>'UserController@getLogout'))->before('auth');   
	Route::post('users-register', 		'UserController@postUserRegister');

	Route::post('user-login',          			  		'ApiController@postLogin');
	Route::post('user-register',          		  		'ApiController@postUserRegister');

	
	Route::post('oauth/access_token', function()
	{
	    $response = AuthorizationServer::performAccessTokenFlow();
		if($response->getStatusCode() === 200) {
			$user = array(
	              'email' => Input::get('username'),
	              'password' => Input::get('password')
	          	);
	      	if(Auth::attempt($user)) {
	          	$response = json_decode($response->getContent());
	          	if(Auth::user()->type == "operator"){
	          		$operator = Operator::whereuser_id(Auth::user()->id)->first();
					$operator_id=$operator->id;
					$response->user['id'] = $operator->id;
					$response->user['name'] = $operator->name;
					$response->user['type'] = Auth::user()->type;
					ApiController::tripautocreate($operator_id);
					return Response::json($response);
	          	}
	          	if(Auth::user()->type == "admin"){
	          		$admin = User::whereid(Auth::user()->id)->first();
					$response->user['id'] = $admin->id;
					$response->user['name'] = $admin->name;
					$response->user['type'] = Auth::user()->type;
					return Response::json($response);
	          	}
	          	if(Auth::user()->type == "agent"){
	          		$agent = Agent::whereuser_id(Auth::user()->id)->first();
					$response->user['id'] = $agent->id;
					$response->user['name'] = $agent->name;
					$response->user['type'] = Auth::user()->type;
					return Response::json($response);
	          	}
	      	}	 
		}
		return $response;
	});

	Route::group(array('before' => 'oauth'), function()
	{
	    Route::get('/', function()
	    {
	        return View::make('hello');
	    });

	    Route::post('ticket_types',                     'ApiController@postTicketType');
		Route::get('ticket_types',                      'ApiController@getTicketType');
		Route::get('ticket_types/{id}',                 'ApiController@getTicketTypeById');
		Route::post('ticket_types/update/{id}',			'ApiController@putTicketType');
		Route::post('ticket_types/delete/{id}',         'ApiController@deleteTicketType');

		Route::post('city',                           	'ApiController@postCity');
		Route::get('city',                  	  	  	'ApiController@getAllCity');
		Route::get('city/{id}',                  	  	'ApiController@getCityInfo');
		Route::post('city/{id}',						'ApiController@putupdateCity');
		Route::post('city/delete/{id}',					'ApiController@deleteCity');

		Route::post('operator',                       	'ApiController@postOperator');
		Route::get('operator',                  	  	'ApiController@getAllOperator');
		Route::get('operator/{id}',                   	'ApiController@getOperatorInfo');
		Route::post('operator/update/{id}',             'ApiController@putupdateOperator');
		Route::post('operator/delete/{id}',             'ApiController@deleteOperator');

		Route::post('agentgroup',                     	'ApiController@postAgentgroup');
		Route::get('agentgroup',              		  	'ApiController@getAgentgroup');
		Route::get('agentgroup/{id}',             		'ApiController@getAgentGroupinfo');
		Route::post('agentgroup/update/{id}',           'ApiController@updateAgentGroupinfo');
		Route::post('agentgroup/delete/{id}',           'ApiController@deleteAgentGroupinfo');
		
		Route::post('agent',                          	'ApiController@postAgent');
		Route::get('agent',							  	'ApiController@getAllAgent');
		Route::get('agent/{id}',					  	'ApiController@getAgentInfo');
		Route::post('agent/update/{id}',				'ApiController@updateAgentInfo');
		Route::post('agent/delete/{id}',				'ApiController@deleteAgent');

		Route::get('customer/agentgroup',				'ApiController@getCustomerlistByAgentGroup');
		Route::get('customer/agent',					'ApiController@getCustomerlistByAgent');
		Route::get('customer/operator',					'ApiController@getCustomerlistByOperator');

		Route::post('occurance/bus',                  	'ApiController@postBusOccurance');
		Route::get('busoccurance/{id}',         		'ApiController@getBusOccuranceInfo');
		Route::post('busoccurance/update/{id}',         'ApiController@updateBusOccurance');
		Route::post('busoccurance/delete/{id}',         'ApiController@deleteBusOccurance');

		Route::post('holidays', 						'ApiController@postHolidays');
		Route::get('holidays/operator', 				'ApiController@getHolidaysbyOperator');

		Route::resource('busoccurance/create/daily',    'ApiController@postBusOccuranceAutoCreate');
		Route::resource('busoccurance/create/custom',  'ApiController@postBusOccuranceAutoCreateCustom');
		Route::resource('busoccurance/create/montofri', 'ApiController@postBusOccuranceMonToFri');
		
		Route::get('busoccurancelist/schedule/{type}',  'ApiController@getBusOccuranceSchedule');
		Route::post('seatlayout',                  	  	'ApiController@postSeatLayout');
		Route::post('seatplan',                  	  	'ApiController@postSeatplan');

		Route::post('trip',                       	  'ApiController@postTrip');
		Route::post('trip/{id}',                      'ApiController@putTrip');
		Route::post('trips',                       	  'ApiController@postTrip');
		Route::get('trip',                  	  	  'ApiController@getAllTrip');
		Route::get('trip/{id}',                  	  'ApiController@getTripInfo');
		Route::get('tripsbyfrom-to',                  'ApiController@getTripInfobyfromto');
		
		Route::get('triplists',             		  'ApiController@getTripListsbyFromTo');
		Route::post('triplists/holiday',              'ApiController@postTripHolidays');
		Route::post('triplists/holiday/update',       'ApiController@postTripHolidaysupdate');
		Route::post('triplists/holiday/delete',       'ApiController@postTripHolidaysdelete');
		Route::get('triplists/holiday',               'ApiController@getTripHolidays');
		Route::get('triplists/holiday/trip',          'ApiController@getTripHolidaysbyTrip');

		
		Route::get('trips',                       	  'ApiController@getTrip');
		Route::get('seatplan/tripcreate/{opertorid}', 'ApiController@getSeatPlanforTripcreate');
		
		Route::get('busoccurancelist',			  	  'ApiController@getBusOccuranceList');
		
		Route::post('busclasses',					  'ApiController@postClasses');
		Route::get('busclasses',			  		  'ApiController@getClasses');
		Route::get('busclasses/{id}',			  	  'ApiController@getClassesinfo');
		Route::post('busclasses/update/{id}',		  'ApiController@getClassesUpdate');
		Route::post('busclasses/delete/{id}',		  'ApiController@getClassesdelete');
		

		Route::get('seatlayouts',					  'ApiController@getSeatLayouts');
		Route::get('seatplansbyoperator',			  'ApiController@getSeatplans');
		Route::get('seatplan',						  'ApiController@getSeatPlan');
		Route::get('time',						  	  'ApiController@getTime');
		Route::post('sale',						  	  'ApiController@postSale');
		Route::post('sale/{id}/delete',				  'ApiController@deleteSaleOrder');
		Route::post('sale/comfirm',					  'ApiController@postSaleComfirm');
		
		Route::post('commissiontype',				  'ApiController@postCommissiontype');
		Route::get('commissiontype',				  'ApiController@getCommissiontype');
		Route::get('commissiontype/{id}',			  'ApiController@getCommissiontypeInfo');
		Route::post('commissiontype/update/{id}',	  'ApiController@getCommissiontypeUpdate');
		Route::post('commissiontype/delete/{id}',	  'ApiController@getCommissiontypeDelete');


		Route::get('report/agent/childs',             'ApiController@getAgentgroupbyid');
		Route::get('report/operator/agents', 		  'ApiController@getAgentsByOperatorRp');
		Route::get('report/agent/operators', 		  'ApiController@getOperatorsByAgentRp');
		Route::get('report/agent/invoice/trip',       'ApiController@getSaleReportbyAgentGroup');
		Route::get('report/agent/trip/date',       	  'ApiController@getTripsReportByDaily');
		Route::get('report/agent/trip',            	  'ApiController@getTripReportByDateRanges');
		Route::get('report/agent/seat/trip',       	  'ApiController@getSeatReportByTrip');

		Route::get('report/operator/trip/date',      		'ApiController@getTripsReportByDaily');
		Route::get('report/operator/trip',            		'ApiController@getTripReportByDateRanges');
		Route::get('report/operator/seat/trip',       		'ApiController@getSeatReportByTrip');
		Route::get('report/operator/invoice/trip',    		'ApiController@getSaleReportbyOperatorInvoice');
		Route::get('report/operator/seat/tripbybus',  		'ApiController@getSeatOccupiedReportByBus');
		Route::get('report/operator/seatplan',        		'ApiController@getSeatOccupancyReport');
		
		Route::post('report/customer/update',          		'ApiController@postCustomerInfoUpdate');
		
		Route::get('report/bus/daily',             	  		'ApiController@getDailyReportforTrip');
		Route::get('report/bus/daily/time',           		'ApiController@getDailyReportforTrip');
		Route::get('report/bus/daily/busid',          		'ApiController@getDetailDailyReportforBus');
		Route::get('report/bus/daily/seatoccupied',   		'ApiController@getSeatOccupancyReportbyBusid');
		Route::get('report/soldtrips/advance/daily',  		'ApiController@getDailyAdvancedTrips');
		Route::get('report/soldtrips/advance/daily/date',  	'ApiController@getDailyAdvancedByFilterDate');
		
		Route::get('report/bus/daily/agent',             	 'ApiController@getDailyReportforTripByAgent');

		Route::get('report/tripdate/operator/daily',          'ApiController@getDailyReportbydeparturedate');
		Route::get('report/tripdate/operator/busid',          'ApiController@getDailyReportbydepartdateandbusid');
		Route::get('report/tripdate/operator/detail',         'ApiController@getDailyReportbydepartdatedetail');

		Route::get('tripreportbydaily',               			'ApiController@getTripsReportByDailyMod');
		Route::get('citiesbyagent',       			  			'ApiController@getCitiesByagentId');
		Route::get('citiesbyoperator',       		  			'ApiController@getCitiesByoperatorId');
		Route::get('timesbyagent',       			  			'ApiController@getTimesByagentId');
		Route::get('timesbyoperator',       		  			'ApiController@getTimesByOperatorId');


		Route::post('showtimes',						'MovieApiController@postShowTime');
		Route::get('showtimes',							'MovieApiController@getShowTime');
		Route::get('showtimes/{id}',					'MovieApiController@getShowTimeInfo');
		Route::post('showtimes/update/{id}',			'MovieApiController@updateShowTime');
		Route::post('showtimes/delete/{id}',			'MovieApiController@deleteShowTime');

		Route::post('cities',							'MovieApiController@postCity');
		Route::get('cities',							'MovieApiController@getCities');
		Route::get('cities/{id}',						'MovieApiController@getCityInfo');
		Route::post('cities/update/{id}',				'MovieApiController@updateCity');
		Route::post('cities/delete/{id}',				'MovieApiController@deleteCity');

		Route::post('cinema',							'MovieApiController@postCinema');
		Route::get('cinema',							'MovieApiController@getCinemas');
		Route::get('cinema/{id}',						'MovieApiController@getCinemaInfo');
		Route::post('cinema/update/{id}',				'MovieApiController@updateCinema');
		
		Route::post('movies',							'MovieApiController@postMovie');
		Route::get('movies',							'MovieApiController@getMovies');
		Route::get('movies/{id}',						'MovieApiController@getMovieInfo');
		Route::post('movies/update/{id}',				'MovieApiController@updateMovie');

		Route::post('ticketclass',							'MovieApiController@postTicketClass');
		Route::get('ticketclass',							'MovieApiController@getticketclass');
		Route::get('ticketclass/{id}',						'MovieApiController@getTicketClassInfo');
		Route::post('ticketclass/update/{id}',				'MovieApiController@updateTicketClass');

		Route::post('subcinema',							'MovieApiController@postSubCinema');
		Route::get('subcinema',								'MovieApiController@getSubCinema');
		Route::get('subcinema/{id}',						'MovieApiController@getSubCinemaInfo');
		Route::post('subcinema/update/{id}',				'MovieApiController@updateSubCinema');

	});

	Route::get('404', function()
	{
	    return View::make('error.404');
	});
	Route::get('500', function()
	{
	    return View::make('error.500');
	});
