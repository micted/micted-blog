@extends('layouts.app')

@section('content')

<div class="card">

<div class="card-heading">

 Categories

</div>

<div class="card-body">
  <table class="table table-hover">
  
  <thead>
    
    <th>

     Category name

    </th>

   
    <th>
    
    Editing

    </th>

    <th>

    Deleting
    
    </th>
  
  </thead>

  <tbody>
  
  @if($categories->count()> 0)

    @foreach($categories as $category)

    <tr>
    
    <td>
    
     {{ $category->name}}
    
    </td>
    
    <td>

    <a href="{{ route('category.edit', ['id' => $category->id ]) }}" class="btn btn-xs btn-info"> EDIT </a>
    
    </td>

    <td>

      <a href="{{ route('category.delete', ['id' => $category->id ]) }}" class="btn btn-xs btn-danger"> DELETE </a>

   </td>
    
    </tr>
  
   @endforeach

   @else 

   <tr>
    
     <th colspan="5" class="text-center">No Categories</th>
    </tr>

    @endif

  </tbody>
  
  </table>
</div>
</div>


@stop