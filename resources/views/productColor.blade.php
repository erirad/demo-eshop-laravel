<option disabled>Select Color</option>
@foreach($oneSize->hasManyColors as $getcolor)
<option value="{{$getcolor->color}}">{{$getcolor->color}} , {{$getcolor->quantity}} vnt.</option>
@endforeach
