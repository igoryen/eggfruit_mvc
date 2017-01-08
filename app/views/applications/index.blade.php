@extends('layouts.default')

@section('header')
@stop

@section('content')

  <h1>My applications</h1>

  <h2>Total applications: {{ $applications->count() }} = 2017 ({{  $total17 }}) + 2016 ({{  $total16 }}) + 2015 ({{  $total15 }}) </h2>


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

      @if( $application->accepted == "0" || $time_since->days > 30 )
        <tr class="crossed_row">
      @else 
        <tr>
      @endif

      <td class="applic_table_edit_cell date">{{ link_to_route(
                'applications.edit', 
                'Edit',
                array($application->id), 
                array('class' => 'btn btn-info')) 
      }}</td>
      
      <td class="applic_table_company_cell">
                  {{ link_to("{$application->company_url}",
                  $application->company_name,
                  array( 'class'=> 'company_url', 'target'=>'blank')
                  ) 
          }}</td> 
      <td class="applic_table_cell">
                  {{ link_to("{$application->job_posting_url}",
                  $application->position_name,
                  array( 'class'=> 'job_posting_url', 'target'=>'blank')
                  )
          }}</td>
      <td class="applic_table_date_cell date">{{ $application->applied_date }}</td>
      <td class="applic_table_interview_cell">
        @if( $application->interview_date != "0000-00-00") 
          {{ $application->interview_date }}
        @endif
      </td>
      <td class="applic_table_cell date">
        @if( $application->response_date != "0000-00-00") 
          {{ $application->response_date }}
        @endif
      </td>
      <td class="applic_table_cell">{{ $application->response_value }}</td>
      <td class="applic_table_cell">{{ $application->accepted }}</td>
    </tr>
    @endforeach
      </tbody>
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