@extends ('layout')

@section ('content')

<br><br>
 <h1>{{ $post->title}}<h1>
 <hr>
 <br>
 <small>{{ $post->body}}</small>

 @foreach($post->comments as $comment)
    
   <hr>
   <li class="list-group-item">
   	<strong>
   	 
   	    <small>{{ $comment->created_at->diffForHumans() }}</small>

   	 </strong>
   	 <br>

   	 <small>{{ $comment->body }}</small>
   	 
   </li>
 @endforeach

   <form method="POST" action="/posts/{{ $post->id }}/comments">
    
    {{ csrf_field() }}

  <div class="form-group">
   
    <textarea type="text" class="form-control" name="body"  aria-describedby="emailHelp" placeholder="Your Comment Here">
    	
    </textarea>
    
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>

</form>

@endsection