@extends("layouts.ownersLayout")
@section('info')
@if (Session::has('status'))
     {{ Session::get('status') }}
 @endif
 {{Session::get('info')}}
@endsection
@section('owners')
  @foreach($owners as $value)
  <tr>
    <td> {{$value->name}} </td>
    <td> {{$value->surname}} </td>
    <td> {{$value->from_date}} </td>
    <td> {{$value->to_date}} </td>
  <td> {{$value->car->reg_number}} </td>
    <td> {{$value->car->brand}} </td>
    <td> {{$value->car->model}} </td>
    <td><a href="{{route('owners.edit', ['id'=>$value->id])}}">Edit</a></td>
    <td>
      <form action="{{route('owners.destroy', ['id'=> $value->id])}}" method="post">
          {{ csrf_field() }}
        <button type="submit" class="fas fa-trash-alt p-1"></button>
      </form>
    </td>
  </tr>
  @endforeach
@endsection
@section('content')
    {{$owners->links()}}
@endsection
