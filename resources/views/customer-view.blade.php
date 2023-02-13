<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

   <div class="container">

    <h1 class="text-center">Register Customer</h1> <br>
    <a href="{{route('customer.trash')}}"> <button class="btn btn-danger">Trashed Customer</button></a>
    <a href="{{route('register')}}"> <button class="btn btn-success">Add Customer</button></a> <br><br>

    {{-- Search here --}}
    <div class="form-group ">
        <form action="" method="get">
        <input  class="form-control" type="search" name="search" placeholder="Search Here" value="{{$search}}"> <br>
        <button class="btn btn-primary">Search</button>
    </form>
    <a href="{{url('/customer/view')}}">
        <button style="margin-top: -67px; margin-left: 100px;" class="btn btn-primary">Reset</button>
        </a>

    </div>
   <table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Gender</th>
        <th>Dob</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach( $customers as $customer)
         <tr>
        <td>{{$customer->id}}</td>
        <td>{{$customer->name}}</td>
        <td>{{$customer->email}}</td>
        <td>{{$customer->password}}</td>
        <td>
          @if($customer->gender == "M")
          Male
          @elseif($customer->gender == "F")
          Female
          @else
          Other
          @endif
        </td>
        <td>{{$customer->dob}}</td>
        <td>
          @if($customer->status == "1")
          Active
          @else
          Not Active
          @endif
        </td>
        <td>
          <a href="{{route('customer.delete',['id'=>$customer->id])}}"><span class="btn btn-danger">Trash</span></a>
          <a href="{{route('customer.edit',['id'=>$customer->id])}}"><span class="btn btn-success">Update</span></a>
        </td>
      </tr>
      @endforeach
        <tr>
            <td colspan="8">
                {{-- {{$customers->links()}} --}}

            </td>
        </tr>
    </tbody>
   </table>
</div>
  </body>
</html>
