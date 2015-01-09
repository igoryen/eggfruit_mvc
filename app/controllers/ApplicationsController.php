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
    $applications = Application::orderBy('ent_company_name', 'asc')->get();
    return View::make('applications.index', compact('applications'));
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
  public function show($id)
  {
    //
  }


  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    //
  }


  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    //
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


}
