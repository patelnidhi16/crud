<!doctype html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <title>User Form</title>
    <style>
        span {
            color: red;
        }

        .error {
            color: red;
        }

        .w-5 {
            display: none;
        }

        .relative inline-flex {
            float: right;
        }

        .border-gray-300 {
            float: right;
        }
    </style>
</head>

<body>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary float-right mx-2 my-2" data-toggle="modal" data-target="#insert">Insert
    </button>
    <a href="{{route('showform')}}" class="btn btn-success float-right mx-2 my-2">Show Student
    </a>

    <!-- Modal -->
    <div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registration form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form method="POST" id="form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mx-3">

                            <label for="name">Name:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="nidhi" name="name" value="{{old('name')}}">
                            <span class="mx-3 error_empty"></span>
                        </div>
                        <div class="form-group mx-3">

                            <label for="image">image:</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{old('image')}}">
                            <span class=" mx-3 error_empty"></span>
                        </div>
                        <div class="form-group mx-3">
                            <label for="email">Email:</label>
                            <input type="email" class="user form-control" id="email" placeholder="name@example.com" name="emil" value="{{old('emil')}}">
                            <span class="mx-3 error_empty"></span>
                        </div>
                        <div class="form-group mx-3">
                            <label for="mobile">Mobile:</label>
                            <input type="mobile" class="user form-control" id="mobile" placeholder="1234567890" name="mobile" value="{{old('mobile')}}">
                            <span class="mx-3 error_empty"></span>
                        </div>
                        <div class="form-group mx-3">
                            <label for="city">City</label>
                            <select class="user form-control" id="city" name="city">
                                <option value="" {{ old('city') == '' ? "selected" : "" }}>Select City</option>
                                <option value="1" {{ old('city') == 'billimora' ? "selected" : "" }}>billimora</option>
                                <option value="2" {{ old('city') == 'surat' ? "selected" : "" }}>surat</option>
                                <option value="3" {{ old('city') == 'dahod' ? "selected" : "" }}>dahod</option>
                                <option value="4" {{ old('city') == 'navsari' ? "selected" : "" }}>navsari</option>
                                <option value="5" {{ old('city') == 'valsad' ? "selected" : "" }}>valsad</option>
                            </select>

                        </div>
                        <div class="form-group mx-3">
                            <label for="address">Address</label>
                            <textarea class="user form-control" id="address" name="address">{{old('address')}}</textarea>
                            <span class="error_empty"></span>
                        </div>
                        <div class="form-group mx-3">
                            <label for="gender">Gender</label><br>
                            <input type="radio" name="gender" class="radio-button" id='gender' @if(old('gender')) checked @endif value="male">male
                            <input type="radio" name="gender" class="radio-button" id='gender' @if(old('gender')) checked @endif value="female">female

                        </div>
                        <span class="gender mx-3 "></span>
                        @error('gender') <span>{{$message}}</span>@enderror


                        <div class="mx-3">
                            <lable>Hobbie:</lable>
                            <div class="row">
                                <div class="form-check mx-3 ">
                                    <input class="form-check-input" type="checkbox" value="Reading" id="hobbie" name="hobbie[]" @if(old('hobbie')) checked @endif>
                                    <label class="form-check-label" for="hobbie">
                                        Reading
                                    </label>
                                </div>

                                <div class="form-check mx-3">
                                    <input class="form-check-input" type="checkbox" value="Dancing" id="hobbie" name="hobbie[]" @if(old('hobbie')) checked @endif>
                                    <label class="form-check-label" for="hobbie">
                                        Dancing
                                    </label>
                                </div>
                                <div class="form-check mx-3 ">
                                    <input class="form-check-input" type="checkbox" value="Singing" id="hobbie" name="hobbie[]" @if(old('hobbie')) checked @endif>
                                    <label class="form-check-label" for="hobbie">
                                        Singing
                                    </label>
                                </div>
                            </div>
                            <span class="hobbie mx-3"><span>
                                    <span class="mx-3"></span>
                        </div>
                        <button type="submit" class="btn btn-success mx-3 mt-2" id="insert_submit">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>



    <table class="table mx-3 ">
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Image</td>
            <td>Email</td>
            <td>Mobile</td>
            <td>City</td>
            <td>Address</td>
            <td>Gender</td>
            <td>Hobbie</td>
            <td>Action</td>
        </tr>
        @foreach($data as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td><img src="{{asset('/storage/'.$user->image)}}" height="50px"></img></td>
            <td>{{$user->emil}}</td>
            <td>{{$user->mobile}}</td>
            <td>{{$user->city}}</td>
            <td>{{$user->address}}</td>
            <td>{{$user->gender}}</td>
            <td>{{$user->hobbie}}</td>
            <td><a href="{{route('final_delete',$user->id)}}" type='button' dataid='{{$user->id}}' class='final_delete btn btn-danger'>Delete</a>&nbsp;<a href="{{route('restore',$user->id)}}" type='button' dataid='{{$user->id}}' class='restore btn btn-success'>Restore</a></td>
        </tr>
        @endforeach

    </table>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="update_form">
                        @csrf
                        <input type="hidden" name="id" class="id">
                        <div class="form-group">
                            <label for="update_name">Name:</label>
                            <input type="text" class="form-control @error('update_name') is-invalid @enderror" id="update_name" placeholder="update_name@example.com" name="update_name" value="{{old('update_name')}}">
                            <span></span>
                        </div>
                        <div class="form-group mx-3">
                            <label for="update_image">update_image:</label>
                            <input type="file" class="form-control @error('update_image') is-invalid @enderror" id="update_image" name="update_image" value="{{old('update_image')}}">
                            <span class=" mx-3 error_empty"></span>
                        </div>
                        <div class="form-group">
                            <label for="update_email">Email:</label>
                            <input type="email" class="user form-control" id="update_email" placeholder="name@example.com" name="update_email">
                            <span></span>
                        </div>
                        <div class="form-group">
                            <label for="update_mobile">Mobile:</label>
                            <input type="text" class="user form-control" id="update_mobile" placeholder="1234567890" name="update_mobile">
                            <span></span>
                        </div>
                        <div class="form-group">
                            <label for="update_city">City</label>
                            <select class="user form-control" id="update_city" name="update_city">
                                <option value="" {{ old('update_city') == '' ? "selected" : "" }}>Select City</option>
                                <option value="1" {{ old('update_city') == 'billimora' ? "selected" : "" }}>billimora</option>
                                <option value="2" {{ old('update_city') == 'surat' ? "selected" : "" }}>surat</option>
                                <option value="3" {{ old('update_city') == 'dahod' ? "selected" : "" }}>dahod</option>
                                <option value="4" {{ old('update_city') == 'navsari' ? "selected" : "" }}>navsari</option>
                                <option value="5" {{ old('update_city') == 'valsad' ? "selected" : "" }}>valsad</option>
                            </select>
                            @error('update_city') <span>{{$message}}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="update_address">Address</label>
                            <textarea class="user form-control" id="update_address" name="update_address">{{old('update_address')}}</textarea>
                            @error('update_address') <span>{{$message}}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="update_gender">Gender</label><br>
                            <input type="radio" name="update_gender" class="radio-button" id='update_gender' @if(old('update_gender')) checked @endif value="male">male
                            <input type="radio" name="update_gender" class="radio-button" id='update_gender' @if(old('update_gender')) checked @endif value="female">female
                        </div>
                        <span class="update_gender"></span>
                        @error('update_gender') <span>{{$message}}</span>@enderror
                        <div>
                            <lable>Hobbie:</lable>
                            <div class="form-check">
                                <input class="form-check-input hobbieupdate" type="checkbox" value="Reading" id="updatehobbie" name="updatehobbie[]" @if(old('updatehobbie')) checked @endif>
                                <label class="form-check-label" for="updatehobbie">
                                    Reading
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input hobbieupdate" type="checkbox" value="Dancing" id="updatehobbie" name="updatehobbie[]" @if(old('updatehobbie')) checked @endif>
                                <label class="form-check-label" for="updatehobbie">
                                    Dancing
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input hobbieupdate" type="checkbox" value="Singing" id="updatehobbie" name="updatehobbie[]" @if(old('updatehobbie')) checked @endif>
                                <label class="form-check-label" for="updatehobbie">
                                    Singing
                                </label>
                            </div>
                            <span class="updatehobbie"><span>
                                    @error('updatehobbie') <span>{{$message}}</span>@enderror
                        </div>
                        <button type="submit" class="btn btn-success" id="insert_submit">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('#form').validate({

            rules: {
                name: {
                    required: true,

                },
                image: {
                    required: true,
                },
                emil: {
                    required: true,
                    email: true
                },
                mobile: {
                    required: true,
                },
                city: {
                    required: true,

                },
                address: {
                    required: true,

                },
                gender: {
                    required: true,

                },

            },
            errorPlacement: function(error, element) {
                if (element.attr("name") == "gender") {
                    error.appendTo(".gender");
                }
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
            submitHandler: function(form) {
                // alert(1);
                $('.error_empty').html("");

                $.ajax({
                    url: '{{route("store")}}',
                    type: 'POST',
                    data: new FormData(form),
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        console.log(data);
                        var display = "";
                        $.each(data, function(key, value) {

                            display += "<tr><td>" + value.id + "</td><td>" + value.name + "</td><td><img src='/storage/" + value.image + "' height='50px'></img></td><td>" + value.image + "</td><td>" + value.emil + "</td><td>" + value.mobile + "</td><td>" + "</td><td>" + value.city + "</td><td>" + value.address + "</td><td>" + value.gender + "</td><td>" + value.hobbie + "</td><td><button type='button' class=' delete btn btn-danger'  dataid='" + value.id + "'>Delete</button>&nbsp;<button type='button' dataid='" + value.id + "' class='update btn btn-success' data-toggle='modal' data-target='#exampleModal'>Update</button></td></tr>";
                        });
                        // $('#insert').hide();
                        alert("data inserted sucessfully");

                        $('.table').html(display);
                        window.location.reload();
                    },
                    error: function(data) {
                        var errors = $.parseJSON(data.responseText);

                        $.each(errors.errors, function(key, value) {
                            console.log(key);
                            console.log(value);
                            $('#form').find('[name=' + key + ']').next('span').html(value[0]);
                        });
                    }
                });
            }


        });
        $(document).on('click', '.delete', function() {
            var id = $(this).attr('dataid');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{route("delete")}}',
                type: 'post',
                data: {
                    id: id
                },
                success: function(data) {
                    var display = "";
                    $.each(data, function(key, value) {

                        display += "<tr><td>" + value.id + "</td><td>" + value.name + "</td><td><img src='/storage/" + value.image + "' height='50px'></img></td><td>" + value.image + "</td><td>" + value.emil + "</td><td>" + value.mobile + "</td><td>" + "</td><td>" + value.city + "</td><td>" + value.address + "</td><td>" + value.gender + "</td><td>" + value.hobbie + "</td><td><button type='button' class=' delete btn btn-danger'  dataid='" + value.id + "'>Delete</button>&nbsp;<button type='button' dataid='" + value.id + "' class='update btn btn-success' data-toggle='modal' data-target='#exampleModal'>Update</button></td></tr>";
                    });
                    alert("data deleted sucessfully");
                    $('.table').html(display);
                }
            });
        });

      
    </script>
</body>

</html>