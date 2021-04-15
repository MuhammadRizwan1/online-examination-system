<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
    div
  text-align: center
  text-transform: uppercase
  border: 1px solid tomato
  padding: 20px
  margin: 50px auto
  width: 250px
  background-color: #f6f6f6

@media print
  .content
    display: none



    body {
        background-color: #ebeff2
    }
    
    .card {
        background-color: white;
        border: none;
        border-radius: 5px;
        box-shadow: 5px 6px 6px 2px #e9ecef
    }
    
    .allergy {
        position: relative;
        bottom: 8px;
        color: grey
    }
    
    .head {
        color: #97989a;
        font-size: 12px
    }
    
    .bottom {
        color: grey;
        font-size: 14px
    }
</style>
</head>
<body>

    <div class="container mt-10 print">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card p-2 text-center">
                    <div class="row">
                        <div class="col-md-7 border-right no-gutters">
                            <div class="py-3">
                                <h4 class="text-secondary">{{ $std_info->name }}   {{ $std_info->id }}</h4>
                                <input type="hidden" id="id_field" name="id" value=" {{ $std_info->id }}">
                                <div class="allergy"><span></span></div>
                                <div class="stats">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex flex-column"> <span class="text-left head">DOB</span> <span class="text-left bottom">{{ $std_info->dob }}</span> </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column"> <span class="text-left head">Age</span> <span class="text-left bottom">22Y 4m</span> </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex flex-column"> <span class="text-left head">Weight</span> <span class="text-left bottom">168 lb</span> </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column"> <span class="text-left head">Height</span> <span class="text-left bottom">5'9"</span> </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="py-3">
                                <div> <span class="d-block head">Home Address</span> <span class="bottom">123 Broadway,New York,NY,10012</span> </div>
                                <div class="mt-4"> <span class="d-block head">Mobile Phone#</span> <span class="bottom">{{ $std_info->mobile_no }}</span> </div>
                                <div class="mt-4"> <span class="d-block head">Home Phone#</span> <span class="bottom">212 (213)-1234</span> </div>
                                <div class="mt-4"> <span class="d-block head">Work Phone#</span> <span class="bottom">718 (702)-9876</span> </div>
                                <div class="mt-4"> <span class="d-block head">Email:</span> <span class="bottom">{{ $std_info->email }}</span> </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
