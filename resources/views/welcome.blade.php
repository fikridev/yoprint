<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="shortcut icon" href="#">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <title>YoPrint</title>

        <style>
          table.dataTable thead th {
              border-top: 1px solid #111;
          }

          table.dataTable {
            padding-top:10px;
            
          }
          
          body{
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: #5256ad;
          }

          .drag-area{
            border: 2px dashed #fff;
            height: auto;
            width: auto;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction:column;
            padding: 20px;
            border-radius: 5px;

          }

          .drag-area.active{
            border: 2px solid #fff;
          }

          .drag-area .icon{
            font-size: 50px;
            color:#fff;
          }

          .drag-area header{
            font-size: 25px;
            color:#fff;
          }

          .drag-area span{
            font-size: 25px;
            color:#fff;
          }

          .drag-area button{
            padding: 5px 10px;
            font-size: 20px;
            font-weight: 500;
            border:none;
            outline:none;
            background: #fff;
            color:#5256ad;
            border-radius: 5px;
            margin-top:5px;
            cursor: pointer;
          }
          
        </style>
    </head>
    <body>
      <div class="container mt-3">
        {{-- <div class="drag-area">
          <div class="icon">
            <i class="fa fa-cloud-upload"></i>
          </div>
          <header> Drag And Drop File To Upload </header>
          <span>Or</span>
          <button>Browse file</button>
        </div> --}}
        <div class="mb-3">
          <form action="{{route('importCSV')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input name="file" type="file" id="uploaded-file" class="dropify" data-height="300"/>
            <button type="submit" class="btn btn-success mt-3">Upload File</button>
        </form>
        </div>
        <div class="card-deck mb-3 text-center">
          <table class="table text-nowrap text-md-nowrap table-bordered mg-b-0" id="order-list-table">
            <thead>
              <tr>
                <th scope="col">Time</th>
                <th scope="col">File Name</th>
                <th scope="col">Upload Status</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>


      <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script src="{{ mix('js/app.js') }}"></script>
      <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
      <script>
              $('.dropify').dropify();
      </script>


<script>
    // const dropArea = document.querySelector(".drag-area");

    // let file;

    // //user drag into area
    // dropArea.addEventListener("dragover", (event)=>{
    //   event.preventDefault();
    //   dropArea.classList.add("active");
    // })
    
    // //user drag out of area
    // dropArea.addEventListener("dragleave", ()=>{
    //   dropArea.classList.remove("active");
    // })

    // //user drop of area
    // dropArea.addEventListener("drop", ()=>{
    //   event.preventDefault();
    //   //Only select first file if multiple files selected by user
    //   file = event.dataTransfer.files[0];
    //   let fileName = file.name;
    //   let fileSize = file.size;
    //   let fileType = file.type;
    //   console.log(fileName)

    //   let validExtensions = ["text/csv","application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"];
    //   if(validExtensions.includes(fileType)){
      
    //     let fileReader = new FileReader();
    //     console.log(fileReader.onload)
    //     // fileReader.onload = readSuccess;
    //     // function readSuccess(event){
    //     //   let fileURL = fileReader.result;
    //     //   console.log(fileURL)
    //     //   // dropArea.append('<i class="fa fa-file-o"></i>');
    //     // }
    //   }else{
    //     alert("This is not a csv file");
    //     dropArea.classList.remove("active");
    //   }
    // })

</script>
      <script>
        $(document).ready( function () {
            var url = "{{ route('order-lists') }}"
            $('#order-list-table').DataTable({
              bPaginate: false,
              bLengthChange: false,
              bFilter: false,
              ajax: url,
              columns: [
                {
                  data: 'time',
                  name: 'time'
                },
                {
                  data: 'filename',
                  name: 'filename'
                },
                {
                  data: 'status',
                  name: 'status'
                },
              ],


            });
        } );
      </script>
    </body>
</html>
    