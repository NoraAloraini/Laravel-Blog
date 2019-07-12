@extends('layouts.app')


@section('content')


	<h1 class="col-md-6"> Create New Article </h1>


    {{-- Form of create New Project--}}

	<form method="POST" action="/articles">

	{{csrf_field() }}


		<div class="field">
				

			<div class="col-md-6" style="margin-top: 20px;">
				
				<input input type="text" name="title" class="form-control {{$errors->has('title') ? 'is-danger' : ''}}" placeholder="Article Title" value="{{ old('title')}}">

			</div>
		</div>
			    


		<div class="field">
				

			<div class="col-md-6" style="margin-top: 20px;">
				
				<textarea name="content" class="form-control {{$errors->has('content') ? 'is-danger' : ''}}" placeholder="Article Content" >{{ old('content')}}</textarea> 
			</div>
 		</div>


		<div class="field">
				

			<div class="col-md-6" style="margin-top: 20px;">
				
				<select class="form-control tags" name="tags[]" multiple>
					@foreach ($tags as $tag)

						<option value="{{$tag -> id}}"> {{$tag-> tag }}</option>

					@endforeach

				</select>
			</div>
		</div>

		<div class="field">
				
			  
			 <div class="col-md-6" style="margin-top: 20px;">
				
				<button type="submit" class="botton btn-link">Create New Article</button> 
			 </div>
			
		</div>



		@include('errors')

	</form>


@endsection


@section('javascript')
<script type="text/javascript">
    

    $('.tags').select2();

</script>

@endsection
