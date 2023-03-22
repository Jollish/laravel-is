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

<div class="items-center">
<table class="table table-hover m-auto text-center table-auto">
  <thead>
    <tr class="bg-green-600">
      <th scope="col" class="border-b border-l">ID</th>
      <th scope="col" class="border-b border-l">Last Name</th>
      <th scope="col" class="border-b border-l">First Name</th>
      <th scope="col" class="border-b border-l">Email</th>
      <th scope="col" class="border-b border-l">Address</th>
      <th scope="col" class="border-b border-l">Edit</th>
      <th scope="col" class="border-b border-l">Delete</th>
    </tr>
  </thead>
  @foreach ($customers as $customer)
  <tbody>
    <tr>
      <th scope="row" class="border-b border-l">{{$customer->id}}</th>
      <td class="border-b border-l">{{$customer->lastName}}</td>
      <td class="border-b border-l">{{$customer->firstName}}</td>
      <td class="border-b border-l">{{$customer->email}}</td>
      <td class="border-b border-l">{{$customer->address}}</td>
      <td class="border-b border-l"><a href="edit/{{$customer->id}}">Edit </a></td>
      <td class="border-b border-l"><a href="delete/{{$customer->id}}">Delete</a></td>
    </tr>
  </tbody>
  @endforeach
</table>
</div>
@include('partials.footer')