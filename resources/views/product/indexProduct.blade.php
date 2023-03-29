@include('partials.header')
<x-nav/>

<div class=" border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
    <span class="flex">
      <div class="py-1"></div>
      @if (Session::has('success'))
        {{Session::get('success')}}
      @endif
    </span>
</div>

<div class="items-center mb-12">
    <table class="table table-hover m-auto text-center table-auto">
      <thead>
        <tr class="bg-green-600">
          <th scope="col" class="border-b border-l">ID</th>
          <th scope="col" class="border-b border-l">Description</th>
          <th scope="col" class="border-b border-l">Quantity</th>
          <th scope="col" class="border-b border-l">Price</th>
          <th scope="col" class="border-b border-l">Edit</th>
          <th scope="col" class="border-b border-l">Delete</th>
        </tr>
      </thead>
      @foreach ($products as $product)
      <tbody>
        <tr>
          <th scope="row" class="border-b border-l">{{$product->id}}</th>
          <td class="border-b border-l">{{$product->description}}</td>
          <td class="border-b border-l">{{$product->quantity}}</td>
          <td class="border-b border-l">{{$product->price}}</td>
          <td class="border-b border-l"><a href="edit/{{$product->id}}">Edit </a></td>
          <td class="border-b border-l"><a href="delete/{{$product->id}}">Delete</a></td>
        </tr>
      </tbody>
      @endforeach
    </table>
</div>
@include('partials.footer')