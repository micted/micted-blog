@extends('layouts.app')

@section('content')

         

        <div class="col-lg-3">
         <div class="card">
                <div class="card-header bg-success text-center">POSTED</div>               
                
                <div class="card-body">
                  <h1 class="text-center">{{ $posts_count }}</h1>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
         <div class="card">
                <div class="card-header bg-info text-center">TRASHED POSTS</div>               
                
                <div class="card-body">
                  <h1 class="text-center">{{ $trashed_count }}</h1>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
         <div class="card">
                <div class="card-header bg-danger text-center">USERS</div>               
                
                <div class="card-body">
                  <h1 class="text-center">{{ $users_count }}</h1>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
         <div class="card">
                <div class="card-header bg-success text-center">CATEGORIES</div>               
                
                <div class="card-body">
                  <h1 class="text-center">{{ $categories_count }}</h1>
                </div>
            </div>
        </div>


        
  
@endsection
