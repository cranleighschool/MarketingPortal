@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        @if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                	<h2 class="panel-title pull-left" style="padding-top:7.5px;">Submissions</h2>
                	<div class="btn-group pull-right">
                		<a href="{{route('{school}.submissions.create', ['school'=>$school->slug])}}" class="btn btn-sm btn-success">Add New</a>
                	</div>
                </div>
                <div class="panel-body">
                
                	<table class="table table-hover table-condensed">
                		<thead>
                			<th>Title</th>
                			<th>Date Created</th>
                			<th></th>
                		</thead>
                    @foreach($submissions as $submission)
                    	<tbody>
                    		<tr>

                    			<td>
                    				<a href="{{route('{school}.submissions.edit', ['school'=>$school->slug, 'id'=>$submission->id])}}">{{$submission->title}}</a>
								</td>
                    			<td>{{$submission->updated_at}}</td>
                    			<td>

                    				<a href="{{route('{school}.submissions.edit', ['school'=>$school->slug, 'id'=>$submission->id])}}" class="btn btn-sm btn-primary">Edit</a>

                    				<a href="{{route('{school}.submissions.show', ['school'=>$school->slug,'id'=>$submission->id])}}" class="btn btn-sm btn-info">Show</a>
                    				{!! Form::deleteButton(route('{school}.submissions.destroy', ['school'=>$school->slug, 'id'=>$submission->id])) !!}

                    			</td>
                    		</tr>
                    	</tbody>
                    @endforeach
                	</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
