@extends('layouts.default')

@section('content')

  <h2>Record a new application</h2>
  
  {{ Form::open(['route' => 'applications.store']) }}
  
  <table>
  
    <tr>
      <td>{{ Form::label('ent_applied_date', 'App date') }}</td>
      <td>{{ Form::text('ent_applied_date') }}</td>
      <td>{{ $errors->first('ent_applied_date')}}</td>
    </tr>
  
    <tr>
      <td>{{ Form::label('ent_position_name', 'Position name') }}</td>
      <td>{{ Form::text('ent_position_name') }}</td>
      <td>{{ $errors->first(
            'ent_position_name',
            '<span class=error>:message</span>'
              )
        }}</td>
    </tr>
    
    <tr>
      <td>{{ Form::label('ent_job_posting_url', 'Position URL') }}</td>
      <td>{{ Form::text('ent_job_posting_url') }}</td>
      <td>{{ $errors->first('ent_job_posting_url')}}</td>
    </tr>
  
  
    <tr>
      <td>{{ Form::label('ent_company_name', 'Company') }}</td>
      <td>{{ Form::text('ent_company_name') }}</td>
      <td>{{ $errors->first('ent_company_name')}}</td>
    </tr>
  
    <tr>
      <td>{{ Form::label('ent_company_url', 'Company URL') }}</td>
      <td>{{ Form::text('ent_company_url') }}</td>
      <td>{{ $errors->first('ent_company_url')}}</td>
    </tr>
  
    <tr>
      <td>{{ Form::submit('Save the application') }}</td>
    </tr>
  </table>
  {{ Form::close() }}
  
@stop