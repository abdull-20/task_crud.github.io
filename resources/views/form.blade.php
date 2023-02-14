<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Form</title>
    <style>
        thead{
            border-bottom: 2px solid black;
        }
        </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <h2 align="center">Form</h2>
            <form action="{{ route('form.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="offset-md-3 col-md-6 offset-md-3">                
            <label for="">Name</label>
            <input type="text" placeholder="Enter Your Name" name="name" class="form-control" value="{{ old('name') }}">
            <span class="text-danger">
                @error('name')    
                {{ $message }}                
                @enderror
            </span>
            </div>
            <div class="offset-md-3 col-md-6 offset-md-3">                
            <label for="">Father Name</label>
            <input type="text" placeholder="Enter Your Father's Name" name="father_name" class="form-control" value="{{ old('father_name') }}">
            <span class="text-danger">
                @error('father_name') 
                {{ $message }}                      
                @enderror
            </span>
            </div>
            <div class="offset-md-3 col-md-6 offset-md-3">                
            <label for="">Email</label>
            <input type="email" placeholder="Enter Your Email" name="email" class="form-control" value="{{ old('email') }}">
            <span class="text-danger">
                @error('email')      
                {{ $message }}                 
                @enderror
            </span>
            </div>
            <div class="offset-md-3 col-md-6 offset-md-3">                
            <label for="">Cv</label>
            <input type="file" name="image" class="form-control">
             <span class="text-danger">
                @error('image')      
                  {{ $message }}                 
                @enderror
            </span>
            </div>
            <div class="offset-md-3 col-md-6 offset-md-3">                
                <label for="">Phone</label>
                <input type="number" placeholder="Enter Your Phone" name="phone" class="form-control" value="{{ old('phone') }}">
                <span class="text-danger">
                    @error('phone')   
                    {{ $message }}                    
                    @enderror
                </span>
            </div>
            <div class="offset-md-3 col-md-6 offset-md-3 mt-3">                
            <input type="submit" class="form-control btn btn-warning">
            </div>
        </div>
    </div>
    </form>   
    {{-- // display the session Message --}}
    @if (session()->has('crud_status'))        
    <p class="alert alert-success container fw-bold my-3">
        {{ session()->get('crud_status') }}
    </p>
    @endif
    <table border="2px solid black" class="table container mt-3 table-striped table-dark" cellpadding="0" cellspacing="0" align="center">
        <thead class="thead-dark">
            <tr>
                <th>S.No</th>
                <th>Name</th>
                <th>Father Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Cv</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($retrives as $retrive)
                
            <tr>
                <td>{{ $retrive->id }}</td>
                <td>{{ $retrive->name }}</td>
                <td>{{ $retrive->father_name }}</td>
                <td>{{ $retrive->email }}</td>
                <td>{{ $retrive->phone }}</td>
                <td><img src="{{ asset('storage/'.$retrive->image) }}" width="150px" alt="no image"></td>
              <td>
                <a href="form/{{ $retrive->id }}/edit" class="btn btn-primary btn-sm">Update</a>
                    <form action="{{ route('form.destroy',$retrive->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="handleBtn({{ $retrive->id }})" class="btn btn-danger btn-sm">Delete</button></td>
                    </form>
            </tr>
        </tbody>
            @endforeach
          
    </table>
</body>
</html>