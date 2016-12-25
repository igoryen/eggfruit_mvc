@extends('layouts.default')


@section('header')
@stop

@section('content')

  <h1>My applications</h1>
  
    
  
  @if($applications->count())
    <table>  
      <thead>
        <tr>
          <th></th>
          <th>
            @if($sortby == 'date' && $order == 'desc'){{
              link_to_action(
                'ApplicationsController@index',
                'Date',
                array(
                  'sortby' => 'applied_date',
                  'order' => 'asc'
                )
              )
            }}
            @else{{
              link_to_action(
                'ApplicationsController@index',
                'Date',
                array(
                  'sortby' => 'applied_date',
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
          <th>Response Value</th>
          <th>Accepted?</th>
        </tr>
      </thead>
      <tbody>
    @foreach($applications as $application)
      <tr>
      <td>{{ link_to_route(
                'applications.edit', 
                'Edit',
                array($application->id), 
                array('class' => 'btn btn-info')) 
      }}</td>
      <td class="applic_table_date_cell">{{  link_to(
                "/applications/{$application->id}", 
                $application->applied_date) 
      }}</td>
      <td class="applic_table_cell">{{ link_to("{$application->company_url}",
                  $application->company_name,
                  array( 'id'=> 'company_url', 'target'=>'blank')
                  ) 
          }}</td> 
      <td class="applic_table_cell">{{ link_to("{$application->job_posting_url}",
                  $application->position_name,
                  array( 'id'=> 'job_posting_url', 'target'=>'blank')
                  )
          }}</td>
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