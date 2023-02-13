<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center">{{$title}}</h1>
    <a href="{{route('customer.table')}}"> <button style="margin-left: 130px" class="btn btn-success">Customers table</button></a> <br><br>

    <h3 class="text-center">
      @if(session()->has('user_name'))
        {{{session()->get('user_name');}}}
        @else
        Blank
      @endif
    </h3>

<br><br>
    <div class="container">
                          <form method="POST" action="{{$url}}">
                            @csrf
                            <div class="row">
                              <div class="col-md-6 mb-4">
              
                                <div class="form-outline">
                                  <input type="text" name="name" id="firstName" value=""  class="form-control form-control-lg" />
                                  <label class="form-label" for="firstName"> Name</label>
                                </div>
              
                              </div>
                              <div class="col-md-6 mb-4 pb-2">
              
                                <div class="form-outline">
                                  <input type="email" name="email" id="emailAddress"  class="form-control form-control-lg" />
                                  <label class="form-label" for="emailAddress">Email</label>
                                </div>
                              </div>
                              <div class="form-outline">
                                <input type="text" name="password" id="emailAddress" class="form-control form-control-lg" />
                                <label class="form-label" for="emailAddress">Password</label> <br><br>
                              </div>
                              
                              
                            </div>
              
                            <div class="row">
                              <div class="col-md-6 mb-4">
              
                                <h6 class="mb-2 pb-1">Gender: </h6>
              
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input"  type="radio" name="gender" id="maleGender"
                                      value="M" 
                                      {{-- {{$customers->gender == "M" ? "checked" : ""}} --}}
                                      />
                                    <label class="form-check-label" for="maleGender">Male</label>
                                  </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input"  type="radio" name="gender" id="femaleGender"
                                    value="F" 
                                    {{-- {{$customers->gender == "F" ? "checked" : ""}} --}}
                                    />
                                  <label class="form-check-label" for="femaleGender">Female</label>
                                </div>
              
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="gender" id="otherGender"
                                    value="O" 
                                    {{-- {{$customers->gender == "O" ? "checked" : ""}} --}}
                                    />
                                  <label class="form-check-label" for="otherGender">Other</label>
                                </div>
              
                              </div>
                              <div class="col-md-6 mb-4 d-flex align-items-center">
              
                                <div class="form-outline datepicker w-100">
                                  <input type="date"  name="dob" class="form-control form-control-lg" id="birthdayDate" />
                                  <label for="birthdayDate"  class="form-label">Birthday</label>
                                </div>
                                
              
                              </div>
                            </div>
              
                            <div class="mt-4 pt-2">
                              <input class="btn btn-primary btn-lg" name="button" type="submit" value="Submit" />
                            </div>
              
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>