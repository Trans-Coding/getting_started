<?php 
/* This is the standard template that is created by Laravel and the Blade templating engine for the built in MVC.*/
class ApplicationController extends Controller{
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id as an is to pull fromt he database
   * @return Response as a page to display to the user with the retrieved data
   * 
   * In this case, the page to display will grab the file from resources/views/applications/show.blade.php. Please refer to that page for the PHP/HTML drving the page. For practical purposes, I have included the show.blade.php page.
   */
  public function show($id)
  {
    $application = Application::find($id);
    //for the purposes of this display, I will fill in the array that would have been sent by the database
    $application = array(
      'reason1' => '<div>I have a great understanding of building relationships with customers. This comes from work at my current work, where we strive to create relationships between lenders and borrowers.</div>',
      'reason2' => '<div>I want to learn from new challenges in a place that harbors growth from its employees. BHHC seems an ideal place to thrive, in a new environment that will provide challenges to help me grow as I create great applications that make a difference in the world.</div>',
      'reason3' => '<div>I can make sophisticated calculators that run extremely fast on host machines! Example included and more advanced version found <a href="https://www.magillaloans.com/loans/calculators/affordability-calculator/">here</a>.</div>'
    );
    return view('applications.show', array('application' => $application));
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

?>