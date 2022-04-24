<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="shortcut icon" href="#">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
        <title>YoPrint</title>

        <style>
          table.dataTable thead th {
              border-top: 1px solid #111;
          }

          table.dataTable {
            padding-top:10px;
            
          }
 
        </style>
    </head>
    <body>
        <div class="container mt-3">
          <div class="mb-3">
                <input type="file" id="uploaded-file" class="dropify" data-height="300"/>
                <button class="btn btn-success mt-3">Upload File</button>
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
    