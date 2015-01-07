@extends('layouts.default')


@section('header')
@stop

@section('content')

  <h1>My applications</h1>
  
  @if($applications->count())
    @foreach($applications as $application)
      <div>
        {{ $application->ent_applied_date }}
        {{ link_to("{$application->ent_company_url}",
                  $application->ent_company_name,
                  array( 'id'=> 'ent_company_url', 'target'=>'blank')
                  ) 
        }} - 
        {{ link_to("{$application->ent_job_posting_url}",
                  $application->ent_position_name,
                  array( 'id'=> 'ent_job_posting_url', 'target'=>'blank')
                  )
        }}
      </div>
    @endforeach
  @else
    <li>
      Unfortunately, there are no applications.
    </li>
  @endif

@stop

@section('footer')
  <h4>This is my footer</h4>
@stop