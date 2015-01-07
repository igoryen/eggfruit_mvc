@extends('layouts.default')


@section('header')
@stop

@section('content')

  <h1>My applications</h1>
  
  @if($applications->count())
    @foreach($applications as $application)
      <li>
        {{ link_to("/applications/{$application->ent_company_name}",
                  $application->ent_company_name) 
        }}
      </li>
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