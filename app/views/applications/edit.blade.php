@extends('layouts.default')

@section('content')

  <h2>Edit an application</h2>
  
  {{  
    Form::model(
      $application, 
      ['route' => ['applications.update', $application->id]],
      ['method' => 'put']
    ) 
  }}
    
  <table>
  
    <tr>
      <td>{{ Form::label('applied_date', 'App date') }}</td>
      <td>{{ Form::text('applied_date') }}</td>
      <td>{{ $errors->first('applied_date')}}</td>
    </tr>
  
    <tr>
      <td>{{ Form::label('position_name', 'Position name') }}</td>
      <td>{{ Form::text('position_name') }}</td>
      <td>{{ $errors->first(
            'position_name',
            '<span class=error>:message</span>'
              )
        }}</td>
    </tr>
    
    <tr>
      <td>{{ Form::label('job_posting_url', 'Position URL') }}</td>
      <td>{{ Form::text('job_posting_url') }}</td>
      <td>{{ $errors->first('job_posting_url')}}</td>
    </tr>
  
  
    <tr>
      <td>{{ Form::label('company_name', 'Company') }}</td>
      <td>{{ Form::text('company_name') }}</td>
      <td>{{ $errors->first('company_name')}}</td>
    </tr>
  
    <tr>
      <td>{{ Form::label('company_url', 'Company URL') }}</td>
      <td>{{ Form::text('company_url') }}</td>
      <td>{{ $errors->first('company_url')}}</td>
    </tr>

    <tr>
      <td>{{ Form::label('recruiter', 'Recruiter') }}</td>
      <td>{{ Form::text('recruiter') }}</td>
      <td>{{ $errors->first('recruiter')}}</td>
    </tr>

    <tr>
      <td>{{ Form::label('interview_date', 'Interview Date') }}</td>
      <td>{{ Form::text('interview_date') }}</td>
      <td>{{ $errors->first('interview_date')}}</td>
    </tr>

    <tr>
      <td>{{ Form::label('response_date', 'Response Date') }}</td>
      <td>{{ Form::text('response_date') }}</td>
      <td>{{ $errors->first('response_date')}}</td>
    </tr>

    <tr>
      <td>{{ Form::label('response_value', 'Response Value') }}</td>
      <td>{{ Form::text('response_value') }}</td>
      <td>{{ $errors->first('response_value')}}</td>
    </tr>

    <tr>
      <td>{{ Form::label('accepted', 'Accepted?') }}</td>
      <td>{{ Form::text('accepted') }}</td>
      <td>{{ $errors->first('accepted')}}</td>
    </tr>
  
    <tr>
      <td>{{ Form::submit('Save the Edit') }}</td>
    </tr>
  </table>
  {{ Form::close() }}
  
@stop