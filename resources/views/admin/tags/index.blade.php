@extends('layouts.app')

@section('content')

<div class="card">

<div class="card-heading">

 Tags

</div>

<div class="card-body">
  <table class="table table-hover">
  
  <thead>
    
    <th>

     Name

    </th>

   
    <th>
    
    Editing

    </th>

    <th>

    Deleting
    
    </th>
  
  </thead>

  <tbody>
  
  @if($tags->count()> 0)

    @foreach($tags as $tag)

    <tr>
    
    <td>
    
     {{ $tag->tag }}
    
    </td>
    
    <td>

    <a href="{{ route('tag.edit', ['id' => $tag->id ]) }}" class="btn btn-xs btn-info"> EDIT </a>
    
    </td>

    <td>

      <a href="{{ route('tag.delete', ['id' => $tag->id ]) }}" class="btn btn-xs btn-danger"> DELETE </a>

   </td>
    
    </tr>
  
   @endforeach

   @else 

   <tr>
    
     <th colspan="5" class="text-center">No Tags</th>
    </tr>

    @endif

  </tbody>
  
  </table>
</div>
</div>


@stop