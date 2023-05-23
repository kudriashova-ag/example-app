@if(session('cart'))

  <table class="table">
    @foreach(session('cart') as $product)
    <tr data-id="{{$product['id']}}">
      <td><img src="{{asset($product['image'])}}" alt="" style="width: 100px"></td>
      <td>{{$product['name']}}</td>
      <td>{{$product['qty']}}</td>
      <td>{{$product['price']}}</td>
      <td>
        {{-- <button class="btn btn-danger btn-sm remove" onclick="removeProduct({{$product['id']}})">&#10006;</button> --}}
        <button class="btn btn-danger btn-sm remove">&#10006;</button>
      </td>
    </tr>
    @endforeach
    <tr>
      <td colspan="5">Total: {{session('totalSum')}}</td>
    </tr>
  </table>

@else
<h4>Your cart is empty</h4>
@endif


{{-- 
'cart'=[
  '1'=>[
    'id'=>1,
    'name'
    'image'
    'price'
    'qty'
  ],
  '22'=>[
    'id'=>22,
    'name'
    'image'
    'price'
    'qty'
  ]
] --}}