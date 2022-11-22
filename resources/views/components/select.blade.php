<select  id="{{$id}}" name="{{$name}}" class="form-control">
    @foreach ($arr as $item)
        <option value="{{$item->id}}">{{$item->descripcion}}</option>
    @endforeach
</select>
