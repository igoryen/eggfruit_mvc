@extends('layouts.default')

@section('header')
@stop

@section('content')

<php?

?>
  <div class="panel">
    <h1>My applications</h1>
    <div class="today">Today <span class="hazy">({{ $today }})</span>: <span class="todays-number">{{ $asoftoday }}</span></div>
    <div class="total">Total applications: {{ $applications->count() }} = 2017 ({{  $total17 }}) + 2016 ({{  $total16 }}) + 2015 ({{  $total15 }}) </div>
    <div class="refusals">Refusals: {{ $refusals }} = 2017 ({{ $refusals17 }}) + 2016 ({{ $refusals16 }}) + 2015 ({{ $refusals15 }})</div>
    <div class="refusals">Ignores: {{ $ignores }} <<< FIX THIS!!!</div>
  </div>

  <div class="table">
    @if($applications->count())
      <table class="applied">  
        <thead>
          <tr>
            <th></th>
            
            <th>
              @if($sortby == 'company' && $order == 'asc'){{
                link_to_action(
                  'ApplicationsController@index',
                  'Company',
                  array(
                    'sortby' => 'company_name',
                    'order' => 'desc'
                  )
                )
              }}
              @else{{
                link_to_action(
                  'ApplicationsController@index',
                  'Company',
                  array(
                    'sortby' => 'company_name',
                    'order' => 'asc'
                  )
                )
              }}
              @endif
            </th>
            <th>
              @if($sortby == 'company' && $order == 'asc'){{
                link_to_action(
                  'ApplicationsController@index',
                  'Position',
                  array(
                    'sortby' => 'position_name',
                    'order' => 'desc'
                  )
                )
              }}
              @else{{
                link_to_action(
                  'ApplicationsController@index',
                  'Position',
                  array(
                    'sortby' => 'position_name',
                    'order' => 'asc'
                  )
                )
              }}
              @endif
            </th>
            <th>Recruiter</th>
            <th>
              @if($sortby == 'date' && $order == 'desc'){{
                link_to_action(
                  'ApplicationsController@index',
                  'Applied',
                  array(
                    'sortby' => 'applied_date',
                    'order' => 'asc'
                  )
                )
              }}
              @else{{
                link_to_action(
                  'ApplicationsController@index',
                  'Applied',
                  array(
                    'sortby' => 'applied_date',
                    'order' => 'desc'
                  )
                )
              }}
              @endif
            </th>
            <th>Phone Interview</th>
            <th>Interview</th>
            <th>Response Date</th>
            <th>Response Value</th>
            <th>Accepted?</th>
          </tr>
        </thead>
        <tbody>
      @foreach($applications as $application)
        <?php
          $date_today = date_create(date("Y-m-d"));
          $date_apply = date_create($application->applied_date);
          $time_since = date_diff($date_today, $date_apply);
        ?>

        @if( $time_since->days > 30 && $application->accepted != "0" )
          <tr class="crossed_row">
        @elseif( $application->accepted == "0" )
          <tr class="rejected_row">
        @else 
          <tr>
        @endif

        <td class="edit">{{ link_to_route(
                  'applications.edit', 
                  'Edit',
                  array($application->id), 
                  array('class' => 'btn btn-info')) 
        }}</td>
        
        <td class="company">
                    {{ link_to("{$application->company_url}",
                    $application->company_name,
                    array( 'class'=> 'company_url', 'target'=>'blank')
                    ) 
            }}</td> 

        <td>
                    {{ link_to("{$application->job_posting_url}",
                    $application->position_name,
                    array( 'class'=> 'job_posting_url', 'target'=>'blank')
                    )
            }}</td>
        <td>{{ $application->recruiter }}</td>
        <td class="date">{{ $application->applied_date }}</td>
        <td class="interview">
          @if( $application->phone_interview_date != "0000-00-00") 
            {{ $application->phone_interview_date }}
          @endif
        </td>
        <td class="interview">
          @if( $application->interview_date != "0000-00-00") 
            {{ $application->interview_date }}
          @endif
        </td>
        <td class="response date">
          @if( $application->response_date != "0000-00-00") 
            {{ $application->response_date }}
          @endif
        </td>
        <td>{{ $application->response_value }}</td>
        <td>{{ $application->accepted }}</td>
      </tr>
      @endforeach
        </tbody>
      </table>
    @else
      <li>
        Unfortunately, there are no applications.
      </li>
    @endif
  </div>

@stop

@section('footer')
  <h4>This is my footer</h4>
@stop