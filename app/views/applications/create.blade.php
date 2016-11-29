@extends('layouts.default')

@section('content')

  <h2>Record a new application</h2>
  
  {{ Form::open(['route' => 'applications.store']) }}
  
  <table>
  
    <tr>
      <td>{{ Form::label('applied_date', 'App date') }}</td>
      <td>{{ Form::text('applied_date') }}</td>
      <td>{{ $errors->first('applied_date')}}</td>
      <td>Format options:
        <select id="format">
          <option value="yy-mm-dd">ISO 8601 - yy-mm-dd</option>
          <option value="mm/dd/yy">Default - mm/dd/yy</option>
          <option value="d M, y">Short - d M, y</option>
          <option value="d MM, y">Medium - d MM, y</option>
          <option value="DD, d MM, yy">Full - DD, d MM, yy</option>
          <option value="&apos;day&apos; d &apos;of&apos; MM &apos;in the year&apos; yy">With text - 'day' d 'of' MM 'in the year' yy</option>
        </select>
      </td>
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
      <td>{{ Form::submit('Save the application') }}</td>
    </tr>
  </table>
  {{ Form::close() }}
  
@stop