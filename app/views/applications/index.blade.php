@extends('layouts.default')


@section('header')
@stop

@section('content')

  <h1>My applications</h1>
  
    
  
  @if($applications->count())
    <table>  
    @foreach($applications as $application)
    <tr>
      <td>{{ $application->ent_applied_date }}</td>
      <td>{{ link_to("{$application->ent_company_url}",
                  $application->ent_company_name,
                  array( 'id'=> 'ent_company_url', 'target'=>'blank')
                  ) 
          }}</td> 
      <td>{{ link_to("{$application->ent_job_posting_url}",
                  $application->ent_position_name,
                  array( 'id'=> 'ent_job_posting_url', 'target'=>'blank')
                  )
          }}</td>
    </tr>
    @endforeach
    </table>
  @else
    <li>
      Unfortunately, there are no applications.
    </li>
  @endif

@stop

@section('footer')
  <h4>This is my footer</h4>
@stop