<?php

class ApplicationsController extends \BaseController {

  protected $application;
  
  public function __construct(Application $application) {
    $this->application = $application;
  }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index(){
    $sortby = Input::get('sortby'); // 2
    $order = Input::get('order'); // 3
    
    if($sortby && $order){
      $applications = $this->application->orderBy($sortby, $order)->get();
    }
    else{
      $applications = $this->application->orderBy('applied_date', 'desc')->get();
    }
    date_default_timezone_set('America/Toronto');
    $today = date('Y-m-d');
    $asoftoday = $this->application->where('applied_date', '=', date('Y-m-d'))->count();
    $total17 = $this->application->whereBetween('applied_date', ['2017-01-01', '2017-12-31'])->count();
    $total16 = $this->application->whereBetween('applied_date', ['2016-01-01', '2016-12-31'])->count();
    $total15 = $this->application->whereBetween('applied_date', ['2015-01-01', '2015-12-31'])->count();
    $totalApp = $this->application->whereBetween('applied_date', ['2016-01-01', '2017-12-31'])->count();
    $total = $this->application->get()->count();
    // $refusals = $this->application->where('accepted', '=', 0)->count();
    $refusals15 = $this->application->where('accepted', '=', 0)->whereBetween('response_date', ['2015-01-01', '2015-12-31'])->count();
    $refusals16 = $this->application->where('accepted', '=', 0)->whereBetween('response_date', ['2016-01-01', '2016-12-31'])->count();
    $refusals17 = $this->application->where('accepted', '=', 0)->whereBetween('response_date', ['2017-01-01', '2017-12-31'])->count();
    $refusals = $refusals16 + $refusals17;
    $interviews17 = $this->application->whereBetween('interview_date', ['2016-01-01', '2016-12-31'])->count();

    $monthago = date('Y-m-d', strtotime("-1 month"));


    $ignores = $this->application->where('applied_date', '>', $monthago)->count();
    // $ignores = $ignores->count();
    
    return View::make('applications.index', 
      compact('applications', 'sortby', 'order', 'today', 'asoftoday', 'total', 'total15','total16','total17', 'refusals', 'refusals15','refusals16', 'refusals17','ignores',
        'interviews17', 'totalApp'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create(){
    return View::make('applications.create');
  }


  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(){
    $input = Input::all();
    if(! $this->application->fill($input)->isValid()){
      return Redirect::back()->withInput()->withErrors($this->application->errmsgs);
    }
    $validation = Validator::make(Input::all(), Application::$val_rules);
    if($validation->fails()){
      return Redirect::back()->withInput()->withErrors($validation->messages());
    }
    $this->application->save();
    return Redirect::route('applications.index');
   }
  


  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id){
    $app = $this->application->find($id);
    return View::make('applications.show', ['application' => $app]);
  }


  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id){
    $application = $this->application->find($id);

    if (is_null($application)){
      return Redirect::route('applications.index');
    }
    return View::make(
      'applications.edit', 
      compact('application'));
  }


  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id){
    $input = Input::all();
    $validation = Validator::make($input, Application::$val_rules);
    if($validation->passes()){
      $app = $this->application->find($id);
      $app->update($input);
      return Redirect::route('applications.show', $id);
    }
    return Redirect::route('applications.edit', $id)
      ->withInput()
      ->withErrors($validation)
      ->withMessage('message', "Validation errors!");
  }


  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    //
  }

  // Methods to do test show() and edit()
  // 
  // applications/1
  public function testShow(){
    $this->mock->shouldReceive('find')
               ->once()
               ->with(1);

    $this->call('GET', 'applications/1');
    $this->assertResponseOk();
  }
  // applications/1/edit
  public function testEdit(){
    $this->call('GET', 'applications/1/edit');
    $this->assertResponseOk();
  }
  
}
