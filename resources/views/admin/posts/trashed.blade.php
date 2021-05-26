@extends('layouts.app')

@section('content')

<div class="card">

<div class="card-heading">

 Trashed posts

</div>

<div class="card-body">

  <table class="table table-hover">
  
  <thead>
    
    <th>

     Image

    </th>

    <th>

     Title

    </th>
      
    
   
    <th>
    
    Edit

    </th>

    <th>

    Restore
    
    </th>

    <th>

    Destroy

   </th>

  </thead>

  <tbody>

  @if($posts->count()> 0)

  @foreach($posts as $post)

   <tr>
       <td><img src="{{ $post->featured }}" alt="{{$post->title}}" width="70px" height="50px"></td>
       <td>{{ $post->title }}</td>
       <td>Edit</td>
       <td>

         <a href="{{ route('posts.restore', ['id' => $post->id ]) }}" class="btn btn-success">Restore</a>
       
       </td>

       <td>

         <a data-target="#delete" data-postid={{$post->id}} data-toggle="modal" class="btn btn-danger">Delete</a>
       
       </td>
       
   </tr>

   @endforeach

   @else 
    <tr>
     <th colspan="5" class="text-center">No trashed posts</th>
    </tr>

    @endif

  </tbody>
  
  </table>

  </div>
  </div>


  @foreach($posts as $post)

  <!-- Modal -->
<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close ml-1" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
      </div>
      <form action="{{ route('posts.kill', ['id' => $post->id ] ) }}"  method="POST">
      		{{method_field('delete')}}
      		{{csrf_field()}}
	      <div class="modal-body">
				<p class="text-center">
					Are you sure you want to delete this?
				</p>
	      		<input type="hidden" name="post_id" id="post_id" value="">

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
	        <button type="submit" class="btn btn-danger">Yes, Delete</button>
	      </div>
      </form>
    </div>
  </div>
</div>

@endforeach

<!--modal script-->
<script>

$('#delete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var post_id = button.data('postid') 
      var modal = $(this)
      modal.find('.modal-body #post_id').val(post_id);
})
</script>

@stop