@extends('layouts.app')

@section('content')

@include('admin.includes.errors')


<div class="card">

    <div class="card-header">

     Create new post
     
     </div>

    <div class="card-body">

      <form action="{{ route ('post.store') }}" method="post"  enctype="multipart/form-data">

         {{ csrf_field() }}
          <div class="form-group">

           <label for="title">Title</label>

           <input type="text" name="title" class="form-control">
         
         </div>

         <div class="form-group">

           <label for="featured">Featured Image</label>

           <input type="file" name="featured" class="form-control">
         
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

           <textarea name="content" id="content" cols="5" rows="5" class="form-control ckeditor"></textarea>
         
         </div>

         <div class="form-group">

          <div class="text-center">

            <button class="btn btn-success" type="submit">              
              POST            

            </button>
          
          </div>
         
         </div>
      
      </form>
     
     </div>
  
  </div>


<!--ck editor script-->
 
  <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'ckeditor' );
</script>
  @stop