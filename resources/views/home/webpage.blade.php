<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-sm">
        <form id="formWeb" >
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="value1">Value 1:</label>
                    <input type="text" class="form-control" id="value1" name="value1" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="value2">Value 2:</label>
                    <input type="text" class="form-control" id="value2" name="value2" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="operation">Operation</label>
                    <select id="operation" class="form-control" name="operation" required>
                        <option value="add">Add</option>
                        <option value="sub">Subtract</option>
                        <option value="div">Divide</option>
                        <option value="mul">Multiply</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <button type="submit" class="btn btn-primary" id="calculate">Calculate</button>
                </div>
            </div>
            <p>Result: <span id="result"></span></p>
            
            <div id="error"></div>
        </form>
    </div>
  </div>
</div>




</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
<script>

console.log('load')

$('#calculate').click((e)=>{
    e.preventDefault()
    $("#formWeb").validate({
        rules: {
            value1: {
            required: true,
            digits: true
            },
            value2: {
            required: true,
            digits: true
            },
        }
    });

    if ($("#formWeb").valid()) {
        data = $("#formWeb").serialize()
        $.ajax({
                url:'/ajaxrequest?'+data,
                type:'GET',
                dataType: 'json',

                success: function( result ) {
                    $("#result").html(result.data)
                }
            });
    }
})
</script>
</html>