@extends('admin.layouts.mater');

@section('title')
    Chi tiết danh mục sản phẩm: {{ $model->name }}
@endsection

@section('content')

    <table class="table text-center">
       <tr>
            <th>Trường</th>
            <th>Gía trị</th>

        </tr>
        @foreach ($model->toArray() as $key => $value)
            {{-- @dd($item); --}}
            <tr>
                <td>{{$key}}</td>
           <td>
                @php
              if($key == 'cover'){
                    $url= \Storage::url($value);
                    echo "<img src=\"$url\" alt=\"\" width=\"50px\">";
                }
              else if(\Str::contains( $key,'is_')){
                    echo $value
                    ? '<span class="badge bg-primary">YES</span>'
                    : '<span class="badge bg-danger">NO</span>';
                }
              else{
                 echo $value;
                 }
                  @endphp

            </td>                                                                       </td                                        >

    </tr>
        @endforeach
    </table>


@endsection
