@extends('layout')

@section('content')
	<div class="card">
	    <h1>Missing Alt Tag Audit</h1>
	    <hr />
	    <p><strong>Summary:</strong> There are {{ $missing_alt_count }} {{ $noun }} missing alt tags.</p>

		<table class="control">
            <tbody>
		    	@foreach ($assets as $asset)
			    	<tr>
			    		<td>
				    		<img src="{{ $asset['url'] }}" style="width: 50px; height: auto;" /> {{ $asset['title'] }}
			    		</td>
			    	</tr>
		    	@endforeach
		    </tbody>
		</table>
	</div>
@endsection
