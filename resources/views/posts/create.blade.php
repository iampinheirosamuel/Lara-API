@extends ('layout')

@section ('content')
 <h1>Create a new blog post<h1>
 	<br>

  <form method="POST" action="/posts">
    
    {{ csrf_field() }}

  <div class="form-group">
    <label for="exampleInputEmail1">Post Title</label>
    <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title"> 
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Post Body</label>
    <input type="text" class="form-control" name="body" id="exampleInputPassword1" placeholder="Body">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>

</form>
@endsection