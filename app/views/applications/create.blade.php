@extends('layouts.default')

@section('content')

  <h2>Record a new application</h2>
  
  {{ Form::open(['route' => 'applications.store']) }}
  
    <div>
      {{ Form::label('ent_applied_date', 'App date') }}
      {{ Form::text('ent_applied_date') }}
      {{ $errors->first('ent_applied_date')}}
    </div>
  
    <div>
      {{ Form::label('ent_position_name', 'Position name') }}
      {{ Form::text('ent_position_name') }}
      {{ $errors->first(
          'ent_position_name',
          '<span class=error>:message</span>'
          )
      }}
    </div>
    
    <div>
      {{ Form::label('ent_job_posting_url', 'Position URL') }}
      {{ Form::text('ent_job_posting_url') }}
      {{ $errors->first('ent_job_posting_url')}}
    </div>
  
  
    <div>
      {{ Form::label('ent_company_name', 'Company') }}
      {{ Form::text('ent_company_name') }}
      {{ $errors->first('ent_company_name')}}
    </div>
  
    <div>
      {{ Form::label('ent_company_url', 'Company URL') }}
      {{ Form::text('ent_company_url') }}
      {{ $errors->first('ent_company_url')}}
    </div>
  
    <div>
      {{ Form::submit('Save the application') }}
    </div>
  
  {{ Form::close() }}
  
@stop