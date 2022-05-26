<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUpload;

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes();
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', '2fa']], function () {
// directions
    Route::get('/dashboard', '\App\Http\Controllers\TasksController@index')->name('dashboard');
    Route::get('/task','\App\Http\Controllers\TasksController@add')->name('add');
    Route::post('/task','\App\Http\Controllers\TasksController@create')->name('create');
    Route::get('/task/v/{task}','\App\Http\Controllers\TasksController@view')->name('view');
    Route::get('/task/{task}','\App\Http\Controllers\TasksController@edit')->name('edit');
    Route::post('/task/{task}','\App\Http\Controllers\TasksController@update')->name('update');

    Route::get('/upload-file', [FileUpload::class, 'createForm']);
    Route::post('/upload-file', [FileUpload::class, 'fileUpload'])->name('fileUpload');
    Route::get('/file/{file}', [FileUpload::class, 'fileEdit'])->name('docs');
    Route::post('/file/{file}', [FileUpload::class, 'fileUpdate'])->name('fileUpdate');

    Route::get('/', 'HomeController@index')->name('home');

// added
	Route::get('/test', "RfiController@test");
// Uncomfirmed
    Route::delete('uncomfirmeds/destroy', 'UncomfirmedController@massDestroy')->name('uncomfirmeds.massDestroy');
    Route::resource('uncomfirmeds', 'UncomfirmedController');

    // Assigned Transports
    Route::delete('assigned-transports/destroy', 'AssignedTransportsController@massDestroy')->name('assigned-transports.massDestroy');
    Route::resource('assigned-transports', 'AssignedTransportsController');

    // Assigned Deliveres
    Route::delete('assigned-deliveres/destroy', 'AssignedDeliveresController@massDestroy')->name('assigned-deliveres.massDestroy');
    Route::resource('assigned-deliveres', 'AssignedDeliveresController');

    // Offerings
    Route::delete('offerings/destroy', 'OfferingsController@massDestroy')->name('offerings.massDestroy');
    Route::resource('offerings', 'OfferingsController');

    // Control
    Route::delete('controls/destroy', 'ControlController@massDestroy')->name('controls.massDestroy');
    Route::resource('controls', 'ControlController');
    // Rfi
    Route::delete('rfis/destroy', 'RfiController@massDestroy')->name('rfis.massDestroy');
    Route::post('rfis/media', 'RfiController@storeMedia')->name('rfis.storeMedia');
    Route::post('rfis/ckmedia', 'RfiController@storeCKEditorImages')->name('rfis.storeCKEditorImages');
    Route::post('rfis/parse-csv-import', 'RfiController@parseCsvImport')->name('rfis.parseCsvImport');
    Route::post('rfis/process-csv-import', 'RfiController@processCsvImport')->name('rfis.processCsvImport');
    Route::resource('rfis', 'RfiController');

    // Rfq
    Route::delete('rfqs/destroy', 'RfqController@massDestroy')->name('rfqs.massDestroy');
    Route::post('rfqs/media', 'RfqController@storeMedia')->name('rfqs.storeMedia');
    Route::post('rfqs/ckmedia', 'RfqController@storeCKEditorImages')->name('rfqs.storeCKEditorImages');
    Route::post('rfqs/parse-csv-import', 'RfqController@parseCsvImport')->name('rfqs.parseCsvImport');
    Route::post('rfqs/process-csv-import', 'RfqController@processCsvImport')->name('rfqs.processCsvImport');
    Route::post('rfqs/addRfqRoute', 'RfqController@addRfqRoute')->name('rfqs.addRfqRoute');
	Route::post('rfqs/saveRouteValue', 'RfqController@saveRouteValue')->name('rfqs.saveRouteValue');
    Route::post('rfqs/showRouteValues', 'RfqController@showRouteValues')->name('rfqs.showRouteValues');
    Route::post('rfqs/removeRfqRoute', 'RfqController@removeRfqRoute')->name('rfqs.removeRfqRoute');
    Route::post('rfqs/addVisibility', 'RfqController@addVisibility')->name('rfqs.addVisibility');
    Route::post('rfqs/removeVisibility', 'RfqController@removeVisibility')->name('rfqs.removeVisibility');
    Route::post('rfqs/changeStatus', 'RfqController@changeStatus')->name('rfqs.changeStatus');
    Route::post('rfqs/addRouteAdditionalFields', 'RfqController@addRouteAdditionalFields')->name('rfqs.addRouteAdditionalFields');
    Route::post('rfqs/removeRouteAdditionalFields', 'RfqController@removeRouteAdditionalFields')->name('rfqs.removeRouteAdditionalFields');
    Route::post('rfqs/changeRouteAdditionalFields', 'RfqController@changeRouteAdditionalFields')->name('rfqs.changeRouteAdditionalFields');
    Route::get('rfqs/changeUserRole', 'RfqController@changeUserRole')->name('rfqs.changeUserRole');
    Route::resource('rfqs', 'RfqController');


    // Contactperson
    Route::delete('contactpeople/destroy', 'ContactpersonController@massDestroy')->name('contactpeople.massDestroy');
    Route::resource('contactpeople', 'ContactpersonController');

        // Rfifill
    Route::delete('rfifills/destroy', 'RfifillController@massDestroy')->name('rfifills.massDestroy');
    Route::resource('rfifills', 'RfifillController');

//added



    // Contact
    Route::resource('contacts', 'ContactController');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
	Route::post('users/upload', 'UsersController@uploadUsers')->name('users.uploadUsers');
    Route::resource('users', 'UsersController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Team
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::resource('teams', 'TeamController');

    // Typecompany
    Route::delete('typecompanies/destroy', 'TypecompanyController@massDestroy')->name('typecompanies.massDestroy');
    Route::resource('typecompanies', 'TypecompanyController');

    // Typeperevoz
    Route::delete('typeperevozs/destroy', 'TypeperevozController@massDestroy')->name('typeperevozs.massDestroy');
    Route::resource('typeperevozs', 'TypeperevozController');

    // Countries
    Route::delete('countries/destroy', 'CountriesController@massDestroy')->name('countries.massDestroy');
    Route::post('countries/parse-csv-import', 'CountriesController@parseCsvImport')->name('countries.parseCsvImport');
    Route::post('countries/process-csv-import', 'CountriesController@processCsvImport')->name('countries.processCsvImport');
    Route::resource('countries', 'CountriesController');

    // Mycompan
    Route::delete('mycompans/destroy', 'MycompanController@massDestroy')->name('mycompans.massDestroy');
    Route::post('mycompans/media', 'MycompanController@storeMedia')->name('mycompans.storeMedia');
    Route::post('mycompans/ckmedia', 'MycompanController@storeCKEditorImages')->name('mycompans.storeCKEditorImages');
    Route::resource('mycompans', 'MycompanController');

    // Typedolgnosti
    Route::delete('typedolgnostis/destroy', 'TypedolgnostiController@massDestroy')->name('typedolgnostis.massDestroy');
    Route::resource('typedolgnostis', 'TypedolgnostiController');

    // Driver
    Route::delete('drivers/destroy', 'DriverController@massDestroy')->name('drivers.massDestroy');
    Route::post('drivers/media', 'DriverController@storeMedia')->name('drivers.storeMedia');
    Route::post('drivers/ckmedia', 'DriverController@storeCKEditorImages')->name('drivers.storeCKEditorImages');
    Route::post('drivers/parse-csv-import', 'DriverController@parseCsvImport')->name('drivers.parseCsvImport');
    Route::post('drivers/process-csv-import', 'DriverController@processCsvImport')->name('drivers.processCsvImport');
    Route::resource('drivers', 'DriverController');

    // Adr
    Route::delete('adrs/destroy', 'AdrController@massDestroy')->name('adrs.massDestroy');
    Route::resource('adrs', 'AdrController');

    // Forms
    Route::delete('forms/destroy', 'AdrController@massDestroy')->name('forms.massDestroy');
    Route::resource('forms', 'FormsController');
    Route::resource('formsItems', 'FormsItemsController');
    Route::post('formsValues/save', 'FormsValuesController@save')->name('formsValues.save');
    Route::get('formsValues/results', 'FormsValuesController@results')->name('formsValues.results');
    Route::get('formsValues/showResult', 'FormsValuesController@showResult')->name('formsValues.showResult');
	Route::post('formsValues/addPartners', 'FormsValuesController@addPartners')->name('formsValues.addPartners');
	Route::post('formsValues/addPartnersGroup', 'FormsValuesController@addPartnersGroup')->name('formsValues.addPartnersGroup');
    Route::resource('formsValues', 'FormsValuesController');

    // Typeload
    Route::delete('typeloads/destroy', 'TypeloadController@massDestroy')->name('typeloads.massDestroy');
    Route::resource('typeloads', 'TypeloadController');

    // Auto
    Route::delete('autos/destroy', 'AutoController@massDestroy')->name('autos.massDestroy');
    Route::post('autos/media', 'AutoController@storeMedia')->name('autos.storeMedia');
    Route::post('autos/ckmedia', 'AutoController@storeCKEditorImages')->name('autos.storeCKEditorImages');
    Route::post('autos/parse-csv-import', 'AutoController@parseCsvImport')->name('autos.parseCsvImport');
    Route::post('autos/process-csv-import', 'AutoController@processCsvImport')->name('autos.processCsvImport');
    Route::resource('autos', 'AutoController');

    // Holiday
    Route::delete('holidays/destroy', 'HolidayController@massDestroy')->name('holidays.massDestroy');
    Route::resource('holidays', 'HolidayController');

    // Perevozklient
    Route::delete('perevozklients/destroy', 'PerevozklientController@massDestroy')->name('perevozklients.massDestroy');
    Route::resource('perevozklients', 'PerevozklientController');

    // Zakazchikklient
    Route::delete('zakazchikklients/destroy', 'ZakazchikklientController@massDestroy')->name('zakazchikklients.massDestroy');
    Route::post('zakazchikklients/parse-csv-import', 'ZakazchikklientController@parseCsvImport')->name('zakazchikklients.parseCsvImport');
    Route::post('zakazchikklients/process-csv-import', 'ZakazchikklientController@processCsvImport')->name('zakazchikklients.processCsvImport');
    Route::resource('zakazchikklients', 'ZakazchikklientController');

    // Pointload
    Route::delete('pointloads/destroy', 'PointloadController@massDestroy')->name('pointloads.massDestroy');
    Route::post('pointloads/media', 'PointloadController@storeMedia')->name('pointloads.storeMedia');
    Route::post('pointloads/ckmedia', 'PointloadController@storeCKEditorImages')->name('pointloads.storeCKEditorImages');
    Route::post('pointloads/parse-csv-import', 'PointloadController@parseCsvImport')->name('pointloads.parseCsvImport');
    Route::post('pointloads/process-csv-import', 'PointloadController@processCsvImport')->name('pointloads.processCsvImport');
    Route::resource('pointloads', 'PointloadController');

    // Gruz
    Route::delete('gruzs/destroy', 'GruzController@massDestroy')->name('gruzs.massDestroy');
    Route::resource('gruzs', 'GruzController');

    // Titilegruz
    Route::delete('titilegruzs/destroy', 'TitilegruzController@massDestroy')->name('titilegruzs.massDestroy');
    Route::resource('titilegruzs', 'TitilegruzController');

    // Unitmas
    Route::delete('unitmas/destroy', 'UnitmasController@massDestroy')->name('unitmas.massDestroy');
    Route::resource('unitmas', 'UnitmasController');

    // Typekuzova
    Route::delete('typekuzovas/destroy', 'TypekuzovaController@massDestroy')->name('typekuzovas.massDestroy');
    Route::post('typekuzovas/parse-csv-import', 'TypekuzovaController@parseCsvImport')->name('typekuzovas.parseCsvImport');
    Route::post('typekuzovas/process-csv-import', 'TypekuzovaController@processCsvImport')->name('typekuzovas.processCsvImport');
    Route::resource('typekuzovas', 'TypekuzovaController');

    // Typeunload
    Route::delete('typeunloads/destroy', 'TypeunloadController@massDestroy')->name('typeunloads.massDestroy');
    Route::resource('typeunloads', 'TypeunloadController');

    // Ltlftl
    Route::delete('ltlftls/destroy', 'LtlftlController@massDestroy')->name('ltlftls.massDestroy');
    Route::resource('ltlftls', 'LtlftlController');

    // Trebovan
    Route::delete('trebovans/destroy', 'TrebovanController@massDestroy')->name('trebovans.massDestroy');
    Route::resource('trebovans', 'TrebovanController');

    // Trandoc
    Route::delete('trandocs/destroy', 'TrandocController@massDestroy')->name('trandocs.massDestroy');
    Route::resource('trandocs', 'TrandocController');

    // Valutand
    Route::delete('valutands/destroy', 'ValutandController@massDestroy')->name('valutands.massDestroy');
    Route::post('valutands/parse-csv-import', 'ValutandController@parseCsvImport')->name('valutands.parseCsvImport');
    Route::post('valutands/process-csv-import', 'ValutandController@processCsvImport')->name('valutands.processCsvImport');
    Route::resource('valutands', 'ValutandController');

    // Zakazhik Perevoz
    Route::delete('zakazhik-perevozs/destroy', 'ZakazhikPerevozController@massDestroy')->name('zakazhik-perevozs.massDestroy');
    Route::post('zakazhik-perevozs/parse-csv-import', 'ZakazhikPerevozController@parseCsvImport')->name('zakazhik-perevozs.parseCsvImport');
    Route::post('zakazhik-perevozs/process-csv-import', 'ZakazhikPerevozController@processCsvImport')->name('zakazhik-perevozs.processCsvImport');
    Route::resource('zakazhik-perevozs', 'ZakazhikPerevozController');

    // Zakazgrup
    Route::delete('zakazgrups/destroy', 'ZakazgrupController@massDestroy')->name('zakazgrups.massDestroy');
    Route::resource('zakazgrups', 'ZakazgrupController');

    // Perevoz Exp
    Route::delete('perevoz-exps/destroy', 'PerevozExpController@massDestroy')->name('perevoz-exps.massDestroy');
    Route::post('perevoz-exps/parse-csv-import', 'PerevozExpController@parseCsvImport')->name('perevoz-exps.parseCsvImport');
    Route::post('perevoz-exps/process-csv-import', 'PerevozExpController@processCsvImport')->name('perevoz-exps.processCsvImport');
    Route::resource('perevoz-exps', 'PerevozExpController');

    // Perevozchik Perevoz
    Route::delete('perevozchik-perevozs/destroy', 'PerevozchikPerevozController@massDestroy')->name('perevozchik-perevozs.massDestroy');
    Route::resource('perevozchik-perevozs', 'PerevozchikPerevozController');

    // Zakaznagruz
    Route::delete('zakaznagruzs/destroy', 'ZakaznagruzController@massDestroy')->name('zakaznagruzs.massDestroy');
    Route::post('zakaznagruzs/parse-csv-import', 'ZakaznagruzController@parseCsvImport')->name('zakaznagruzs.parseCsvImport');
    Route::post('zakaznagruzs/process-csv-import', 'ZakaznagruzController@processCsvImport')->name('zakaznagruzs.processCsvImport');
    Route::resource('zakaznagruzs', 'ZakaznagruzController');

    // Offer
    Route::delete('offers/destroy', 'OfferController@massDestroy')->name('offers.massDestroy');
    Route::post('offers/parse-csv-import', 'OfferController@parseCsvImport')->name('offers.parseCsvImport');
    Route::post('offers/process-csv-import', 'OfferController@processCsvImport')->name('offers.processCsvImport');
    Route::resource('offers', 'OfferController');

    // Nooffer
    Route::delete('nooffers/destroy', 'NoofferController@massDestroy')->name('nooffers.massDestroy');
    Route::post('nooffers/parse-csv-import', 'NoofferController@parseCsvImport')->name('nooffers.parseCsvImport');
    Route::post('nooffers/process-csv-import', 'NoofferController@processCsvImport')->name('nooffers.processCsvImport');
    Route::resource('nooffers', 'NoofferController');

    // Naznapere
    Route::delete('naznaperes/destroy', 'NaznapereController@massDestroy')->name('naznaperes.massDestroy');
    Route::post('naznaperes/parse-csv-import', 'NaznapereController@parseCsvImport')->name('naznaperes.parseCsvImport');
    Route::post('naznaperes/process-csv-import', 'NaznapereController@processCsvImport')->name('naznaperes.processCsvImport');
    Route::resource('naznaperes', 'NaznapereController');

    // Naznaotm
    Route::delete('naznaotms/destroy', 'NaznaotmController@massDestroy')->name('naznaotms.massDestroy');
    Route::post('naznaotms/parse-csv-import', 'NaznaotmController@parseCsvImport')->name('naznaotms.parseCsvImport');
    Route::post('naznaotms/process-csv-import', 'NaznaotmController@processCsvImport')->name('naznaotms.processCsvImport');
    Route::resource('naznaotms', 'NaznaotmController');

    // Upravlenie
    Route::delete('upravlenies/destroy', 'UpravlenieController@massDestroy')->name('upravlenies.massDestroy');
    Route::post('upravlenies/parse-csv-import', 'UpravlenieController@parseCsvImport')->name('upravlenies.parseCsvImport');
    Route::post('upravlenies/process-csv-import', 'UpravlenieController@processCsvImport')->name('upravlenies.processCsvImport');
    Route::resource('upravlenies', 'UpravlenieController');

    // Valuta
    Route::delete('valuta/destroy', 'ValutaController@massDestroy')->name('valuta.massDestroy');
    Route::post('valuta/parse-csv-import', 'ValutaController@parseCsvImport')->name('valuta.parseCsvImport');
    Route::post('valuta/process-csv-import', 'ValutaController@processCsvImport')->name('valuta.processCsvImport');
    Route::resource('valuta', 'ValutaController');

    // Typeolpata
    Route::delete('typeolpata/destroy', 'TypeolpataController@massDestroy')->name('typeolpata.massDestroy');
    Route::resource('typeolpata', 'TypeolpataController');

    // Autotypload
    Route::delete('autotyploads/destroy', 'AutotyploadController@massDestroy')->name('autotyploads.massDestroy');
    Route::post('autotyploads/parse-csv-import', 'AutotyploadController@parseCsvImport')->name('autotyploads.parseCsvImport');
    Route::post('autotyploads/process-csv-import', 'AutotyploadController@processCsvImport')->name('autotyploads.processCsvImport');
    Route::resource('autotyploads', 'AutotyploadController');

    // Autobirga
    Route::delete('autobirgas/destroy', 'AutobirgaController@massDestroy')->name('autobirgas.massDestroy');
    Route::post('autobirgas/parse-csv-import', 'AutobirgaController@parseCsvImport')->name('autobirgas.parseCsvImport');
    Route::post('autobirgas/process-csv-import', 'AutobirgaController@processCsvImport')->name('autobirgas.processCsvImport');
    Route::resource('autobirgas', 'AutobirgaController');

    // Custom
    Route::delete('customs/destroy', 'CustomController@massDestroy')->name('customs.massDestroy');
    Route::post('customs/parse-csv-import', 'CustomController@parseCsvImport')->name('customs.parseCsvImport');
    Route::post('customs/process-csv-import', 'CustomController@processCsvImport')->name('customs.processCsvImport');
    Route::resource('customs', 'CustomController');

    // Marka
    Route::delete('markas/destroy', 'MarkaController@massDestroy')->name('markas.massDestroy');
    Route::post('markas/parse-csv-import', 'MarkaController@parseCsvImport')->name('markas.parseCsvImport');
    Route::post('markas/process-csv-import', 'MarkaController@processCsvImport')->name('markas.processCsvImport');
    Route::resource('markas', 'MarkaController');

    // Rolecomp
    Route::delete('rolecomps/destroy', 'RolecompController@massDestroy')->name('rolecomps.massDestroy');
    Route::resource('rolecomps', 'RolecompController');

    // Typeloaddest
    Route::delete('typeloaddests/destroy', 'TypeloaddestController@massDestroy')->name('typeloaddests.massDestroy');
    Route::post('typeloaddests/parse-csv-import', 'TypeloaddestController@parseCsvImport')->name('typeloaddests.parseCsvImport');
    Route::post('typeloaddests/process-csv-import', 'TypeloaddestController@processCsvImport')->name('typeloaddests.processCsvImport');
    Route::resource('typeloaddests', 'TypeloaddestController');

    // Catware
    Route::delete('catware/destroy', 'CatwareController@massDestroy')->name('catware.massDestroy');
    Route::resource('catware', 'CatwareController');

    // Typeloadunload
    Route::delete('typeloadunloads/destroy', 'TypeloadunloadController@massDestroy')->name('typeloadunloads.massDestroy');
    Route::post('typeloadunloads/parse-csv-import', 'TypeloadunloadController@parseCsvImport')->name('typeloadunloads.parseCsvImport');
    Route::post('typeloadunloads/process-csv-import', 'TypeloadunloadController@processCsvImport')->name('typeloadunloads.processCsvImport');
    Route::resource('typeloadunloads', 'TypeloadunloadController');

    // Sourcegood
    Route::delete('sourcegoods/destroy', 'SourcegoodController@massDestroy')->name('sourcegoods.massDestroy');
    Route::resource('sourcegoods', 'SourcegoodController');

    // Logistgroup
    Route::delete('logistgroups/destroy', 'LogistgroupController@massDestroy')->name('logistgroups.massDestroy');
    Route::post('logistgroups/parse-csv-import', 'LogistgroupController@parseCsvImport')->name('logistgroups.parseCsvImport');
    Route::post('logistgroups/process-csv-import', 'LogistgroupController@processCsvImport')->name('logistgroups.processCsvImport');
    Route::resource('logistgroups', 'LogistgroupController');

    // Filial
    Route::delete('filials/destroy', 'FilialController@massDestroy')->name('filials.massDestroy');
    Route::resource('filials', 'FilialController');

    // City
    Route::delete('cities/destroy', 'CityController@massDestroy')->name('cities.massDestroy');
    Route::resource('cities', 'CityController');

    // Typeloaddestination
    Route::delete('typeloaddestinations/destroy', 'TypeloaddestinationController@massDestroy')->name('typeloaddestinations.massDestroy');
    Route::post('typeloaddestinations/parse-csv-import', 'TypeloaddestinationController@parseCsvImport')->name('typeloaddestinations.parseCsvImport');
    Route::post('typeloaddestinations/process-csv-import', 'TypeloaddestinationController@processCsvImport')->name('typeloaddestinations.processCsvImport');
    Route::resource('typeloaddestinations', 'TypeloaddestinationController');

    // Typestatus
    Route::delete('typestatuses/destroy', 'TypestatusController@massDestroy')->name('typestatuses.massDestroy');
    Route::post('typestatuses/parse-csv-import', 'TypestatusController@parseCsvImport')->name('typestatuses.parseCsvImport');
    Route::post('typestatuses/process-csv-import', 'TypestatusController@processCsvImport')->name('typestatuses.processCsvImport');
    Route::resource('typestatuses', 'TypestatusController');

    // Statuszaya
    Route::delete('statuszayas/destroy', 'StatuszayaController@massDestroy')->name('statuszayas.massDestroy');
    Route::post('statuszayas/parse-csv-import', 'StatuszayaController@parseCsvImport')->name('statuszayas.parseCsvImport');
    Route::post('statuszayas/process-csv-import', 'StatuszayaController@processCsvImport')->name('statuszayas.processCsvImport');
    Route::resource('statuszayas', 'StatuszayaController');

    // Lastevents
    Route::delete('lastevents/destroy', 'LasteventsController@massDestroy')->name('lastevents.massDestroy');
    Route::post('lastevents/parse-csv-import', 'LasteventsController@parseCsvImport')->name('lastevents.parseCsvImport');
    Route::post('lastevents/process-csv-import', 'LasteventsController@processCsvImport')->name('lastevents.processCsvImport');
    Route::resource('lastevents', 'LasteventsController');

    // Filialmain
    Route::delete('filialmains/destroy', 'FilialmainController@massDestroy')->name('filialmains.massDestroy');
    Route::resource('filialmains', 'FilialmainController');

    // Dopeq
    Route::delete('dopeqs/destroy', 'DopeqController@massDestroy')->name('dopeqs.massDestroy');
    Route::resource('dopeqs', 'DopeqController');

    // Other
    Route::delete('others/destroy', 'OtherController@massDestroy')->name('others.massDestroy');
    Route::resource('others', 'OtherController');

    // Condtorg
    Route::delete('condtorgs/destroy', 'CondtorgController@massDestroy')->name('condtorgs.massDestroy');
    Route::resource('condtorgs', 'CondtorgController');

    // Typepack
    Route::delete('typepacks/destroy', 'TypepackController@massDestroy')->name('typepacks.massDestroy');
    Route::resource('typepacks', 'TypepackController');

    // Condpay
    Route::delete('condpays/destroy', 'CondpayController@massDestroy')->name('condpays.massDestroy');
    Route::resource('condpays', 'CondpayController');

    // Monitorng
    Route::delete('monitorngs/destroy', 'MonitorngController@massDestroy')->name('monitorngs.massDestroy');
    Route::resource('monitorngs', 'MonitorngController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::resource('products', 'ProductController');

    // Type Palet
    Route::delete('type-palets/destroy', 'TypePaletController@massDestroy')->name('type-palets.massDestroy');
    Route::resource('type-palets', 'TypePaletController');

    // Listproduct
    Route::delete('listproducts/destroy', 'ListproductController@massDestroy')->name('listproducts.massDestroy');
    Route::resource('listproducts', 'ListproductController');

    // Doc Ttn
    Route::delete('doc-ttns/destroy', 'DocTtnController@massDestroy')->name('doc-ttns.massDestroy');
    Route::resource('doc-ttns', 'DocTtnController');

    // Favouritel
    Route::delete('favouritels/destroy', 'FavouritelController@massDestroy')->name('favouritels.massDestroy');
    Route::resource('favouritels', 'FavouritelController');

    // Favouritea
    Route::delete('favouriteas/destroy', 'FavouriteaController@massDestroy')->name('favouriteas.massDestroy');
    Route::resource('favouriteas', 'FavouriteaController');

    // Draft
    Route::delete('drafts/destroy', 'DraftController@massDestroy')->name('drafts.massDestroy');
    Route::resource('drafts', 'DraftController');

    // Drafta
    Route::delete('drafta/destroy', 'DraftaController@massDestroy')->name('drafta.massDestroy');
    Route::resource('drafta', 'DraftaController');

    // Archive
    Route::delete('archives/destroy', 'ArchiveController@massDestroy')->name('archives.massDestroy');
    Route::resource('archives', 'ArchiveController');

    // Archivea
    Route::delete('archiveas/destroy', 'ArchiveaController@massDestroy')->name('archiveas.massDestroy');
    Route::resource('archiveas', 'ArchiveaController');

    // My
    Route::delete('mies/destroy', 'MyController@massDestroy')->name('mies.massDestroy');
    Route::resource('mies', 'MyController');

    // Mya
    Route::delete('myas/destroy', 'MyaController@massDestroy')->name('myas.massDestroy');
    Route::resource('myas', 'MyaController');

    // Offerg
    Route::delete('offergs/destroy', 'OffergController@massDestroy')->name('offergs.massDestroy');
    Route::resource('offergs', 'OffergController');

    // Offera
    Route::delete('offeras/destroy', 'OfferaController@massDestroy')->name('offeras.massDestroy');
    Route::resource('offeras', 'OfferaController');

    // Partner Bb
    Route::delete('partner-bbs/destroy', 'PartnerBbController@massDestroy')->name('partner-bbs.massDestroy');
    Route::post('partner-bbs/media', 'PartnerBbController@storeMedia')->name('partner-bbs.storeMedia');
    Route::post('partner-bbs/ckmedia', 'PartnerBbController@storeCKEditorImages')->name('partner-bbs.storeCKEditorImages');
    Route::post('partner-bbs/parse-csv-import', 'PartnerBbController@parseCsvImport')->name('partner-bbs.parseCsvImport');
    Route::post('partner-bbs/process-csv-import', 'PartnerBbController@processCsvImport')->name('partner-bbs.processCsvImport');
    Route::resource('partner-bbs', 'PartnerBbController');

    // Partnerblock
    Route::delete('partnerblocks/destroy', 'PartnerblockController@massDestroy')->name('partnerblocks.massDestroy');
    Route::post('partnerblocks/parse-csv-import', 'PartnerblockController@parseCsvImport')->name('partnerblocks.parseCsvImport');
    Route::post('partnerblocks/process-csv-import', 'PartnerblockController@processCsvImport')->name('partnerblocks.processCsvImport');
    Route::resource('partnerblocks', 'PartnerblockController');

    // Partnergroup
    Route::delete('partnergroups/destroy', 'PartnergroupController@massDestroy')->name('partnergroups.massDestroy');
    Route::resource('partnergroups', 'PartnergroupController');

    // Partnerz
    Route::delete('partnerzs/destroy', 'PartnerzController@massDestroy')->name('partnerzs.massDestroy');
    Route::resource('partnerzs', 'PartnerzController');

    // Partnerp
    Route::delete('partnerps/destroy', 'PartnerpController@massDestroy')->name('partnerps.massDestroy');
    Route::resource('partnerps', 'PartnerpController');

    // Partnerm
    Route::delete('partnerms/destroy', 'PartnermController@massDestroy')->name('partnerms.massDestroy');
    Route::resource('partnerms', 'PartnermController');

    // Partneri
    Route::delete('partneris/destroy', 'PartneriController@massDestroy')->name('partneris.massDestroy');
    Route::resource('partneris', 'PartneriController');

    // Partnerb
    Route::delete('partnerbs/destroy', 'PartnerbController@massDestroy')->name('partnerbs.massDestroy');
    Route::resource('partnerbs', 'PartnerbController');

    // Companyinfo
    Route::delete('companyinfos/destroy', 'CompanyinfoController@massDestroy')->name('companyinfos.massDestroy');
    Route::resource('companyinfos', 'CompanyinfoController');

   // Apoint
    Route::delete('apoints/destroy', 'ApointController@massDestroy')->name('apoints.massDestroy');
    Route::post('apoints/parse-csv-import', 'ApointController@parseCsvImport')->name('apoints.parseCsvImport');
    Route::post('apoints/process-csv-import', 'ApointController@processCsvImport')->name('apoints.processCsvImport');
    Route::resource('apoints', 'ApointController');

    // Good
    Route::delete('goods/destroy', 'GoodController@massDestroy')->name('goods.massDestroy');
    Route::post('goods/parse-csv-import', 'GoodController@parseCsvImport')->name('goods.parseCsvImport');
    Route::post('goods/process-csv-import', 'GoodController@processCsvImport')->name('goods.processCsvImport');
    Route::resource('goods', 'GoodController');

    // Pack
    Route::delete('packs/destroy', 'PackController@massDestroy')->name('packs.massDestroy');
    Route::resource('packs', 'PackController');

    // Bpoit
    Route::delete('bpoits/destroy', 'BpoitController@massDestroy')->name('bpoits.massDestroy');
    Route::post('bpoits/parse-csv-import', 'BpoitController@parseCsvImport')->name('bpoits.parseCsvImport');
    Route::post('bpoits/process-csv-import', 'BpoitController@processCsvImport')->name('bpoits.processCsvImport');
    Route::resource('bpoits', 'BpoitController');

    // Rfqcountry
    Route::delete('rfqcountries/destroy', 'RfqcountryController@massDestroy')->name('rfqcountries.massDestroy');
    Route::post('rfqcountries/parse-csv-import', 'RfqcountryController@parseCsvImport')->name('rfqcountries.parseCsvImport');
    Route::post('rfqcountries/process-csv-import', 'RfqcountryController@processCsvImport')->name('rfqcountries.processCsvImport');
    Route::resource('rfqcountries', 'RfqcountryController');

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
    Route::get('team-members', 'TeamMembersController@index')->name('team-members.index');
    Route::post('team-members', 'TeamMembersController@invite')->name('team-members.invite');


    // Quotes
    Route::post('leads/parse-csv-import', 'LeadsController@parseCsvImport')->name('leads.parseCsvImport');
    Route::post('leads/process-csv-import', 'LeadsController@processCsvImport')->name('leads.processCsvImport');
    Route::get('leads/history', 'LeadsController@history')->name('leads.history');
    Route::post('leads/attachTransportCompany', 'LeadsController@attachTransportCompany')->name('leads.attachTransportCompany');
    Route::post('leads/changeQuoteStatus', 'LeadsController@changeQuoteStatus')->name('leads.changeQuoteStatus');
    Route::resource('leads', 'LeadsController');
    Route::get('quotes-tarifs/generate-queue', 'QuotesTarifsController@generate_queue')->name('quotesTarifs.generate_queue');
    Route::get('quotes-tarifs/change-queue-type', 'QuotesTarifsController@change_queue_type')->name('quotesTarifs.change_queue_type');
    Route::get('quotes-tarifs/clear-queue', 'QuotesTarifsController@clear_queue')->name('quotesTarifs.clear_queue');
    Route::resource('quotes-tarifs', 'QuotesTarifsController');


});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
        Route::post('profile/two-factor', 'ChangePasswordController@toggleTwoFactor')->name('password.toggleTwoFactor');
    }
});
Route::group(['namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Two Factor Authentication
    if (file_exists(app_path('Http/Controllers/Auth/TwoFactorController.php'))) {
        Route::get('two-factor', 'TwoFactorController@show')->name('twoFactor.show');
        Route::post('two-factor', 'TwoFactorController@check')->name('twoFactor.check');
        Route::get('two-factor/resend', 'TwoFactorController@resend')->name('twoFactor.resend');
    }
});
