@extends('layouts.default')


@section('header')
@stop

@section('content')

  <h1>My applications</h1>
  
    
  
  @if($applications->count())
    <table>  
      <thead>
        <tr>
          <th>
            @if($sortby == 'date' && $order == 'desc'){{
              link_to_action(
                'ApplicationsController@index',
                'Date',
                array(
                  'sortby' => 'ent_applied_date',
                  'order' => 'asc'
                )
              )
            }}
            @else{{
              link_to_action(
                'ApplicationsController@index',
                'Date',
                array(
                  'sortby' => 'ent_applied_date',
                  'order' => 'desc'
                )
              )
            }}
            @endif
          </th>
          <th>
            @if($sortby == 'company' && $order == 'asc'){{
              link_to_action(
                'ApplicationsController@index',
                'Company',
                array(
                  'sortby' => 'ent_company_name',
                  'order' => 'desc'
                )
              )
            }}
            @else{{
              link_to_action(
                'ApplicationsController@index',
                'Company',
                array(
                  'sortby' => 'ent_company_name',
                  'order' => 'asc'
                )
              )
            }}
            @endif
          </th>
          <th>Position</th>
        </tr>
      </thead>
      <tbody>
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