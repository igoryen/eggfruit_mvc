@extends('layouts.default')

@section('content')

  <h2>This application</h2>
  
  
  
  <table>
  
    <tr>
      <td>{{ $application->applied_date }}</td>
    </tr>
  
    <tr>
      <td>{{ $application->position_name }}</td>
    </tr>
    
    <tr>
      <td>{{ $application->job_posting_url }}</td>
    </tr>
  
  
    <tr>
      <td>{{ $application->company_name }}</td>
    </tr>
  
    <tr>
      <td>{{ $application->company_url }}</td>

    </tr>

  </table>
  
@stop