@extends('layouts.app')

@section('content')

@include('admin.includes.errors')


<div class="card">

    <div class="card-header">

    Edit post: {{ $post->title }}
     
     </div>

    <div class="card-body">

      <form action="{{ route ('post.update', ['id' => $post->id]) }}" method="post" enctype="multipart/form-data">

         {{ csrf_field() }}
          <div class="form-group">

           <label for="title">Title</label>

           <input type="text" value="{{$post->title}}" name="title" class="form-control">
         
         </div>

         <div class="form-group">

           <label for="featured">Featured Image</label>

           <input type="file" name="featured" class="form-control" value="{{ $post->title }}">
         
         </div>

         <div class="form-group">
            <label for="category">Select a Category</label>
            <select name="category_id" id="category" class="form-control">
             
             @foreach($categories as $category)

                 <option value="{{ $category->id }}">{{ $category-> name }}</option>

              @endforeach
            
            </select>
            
         
         </div>

         <div class="form-group">

           <label for="content">Content</label>

           <textarea name="content" id="content" cols="5" rows="5" class="form-control ckeditor">{{ $post->content }}</textarea>
         
         </div>

         <div class="form-group">

          <div class="text-center">

            <button class="btn btn-success" type="submit">              
              UPDATE POST            

            </button>
          
          </div>
         
         </div>
      
      </form>
     
     </div>
  
  </div>
  
 
  <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'ckeditor' );
</script>
  @stop