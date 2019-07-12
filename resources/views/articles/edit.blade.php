@extends('layouts.app')


@section('content')


<h1 class="col-md-6"> Edit Article </h1>



   {{-- Form of Edit Article --}}
   
	<form method="POST" action="/articles/ {{ $article->id }}">
			

			@method('PATCH')
		    @csrf

		<div class="field">
			
			<label class="col-md-6"  for="title"> Title</label>	

			<div class="col-md-6" >
				
				<input type="text" name="title" placeholder="Title" class="form-control" value="{{ $article->title }}" required>
			</div>

		</div>
		    


		<div class="field">
			
		    <label class="col-md-6"  for="content"> content</label>	

			    <div class="col-md-6" >
				
					<textarea name="content" class="form-control" required>{{ $article->content }} </textarea> 
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
			
				<button type="submit" class="botton btn-link">Update Article</button> 
		    </div>
		 
		</div>




		</form>

		    @include('errors')

 	    <form method="POST" action="/articles/ {{ $article->id }}">
 	    	
		
			@method('DELETE')
		    @csrf


         <div class="field" style="margin-top: 20px;">
			
		  
		     <div class="col-md-6">
			
			<button type="submit" class="botton btn-link">Delete Article</button> 

		    </div>
		    
		 </div>

 	    </form>



@endsection

@section('javascript')
<script type="text/javascript">
    
    
    $('.tags').select2().val({{ json_encode($article->tags()->pluck('id'))}}).trigger('change');


</script>

@endsection