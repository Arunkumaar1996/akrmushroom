<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
      * {
        margin: 0%;
        padding: 0%;
        box-sizing: border-box;

      }
      .body {
        width: 700px;
        height:auto;
        background-color: #fef9d9;
        margin: 3rem auto;
        box-shadow: 1px 2px 5px grey;
        border-radius: 5px;
      }
      .box h2 {
        background-color: #ffd5be;
        width: 600px;
        padding: 10px;
        text-align: center;
        border-radius: 5px;
      }
      .inner-box {
        background-color: #fffefe;
        height:auto;
        width: 600px;
        margin: 30px 0px;
        box-shadow: 0.5px 1px 4px grey;
        border-radius: 5px;
      }
      p{
        text-align: center;
        padding: 10px;
      }
      .fill-table{
        padding: 20px;
        text-align: center;
        box-shadow:0px 1px 5px grey ;
        }
        th,td{
          padding: 10px 30px;
          text-align: left;
        }
    </style>
  </head>
  <body>
    <div class="body" style="display:flex;justify-content: center;">
      <div class="inner-box">
        <div class="box">
          <h2>Dev heading</h2>
        </div>
        <div ><p>Please comfirm your email address</p></div>
        <div class="fill-table" style="display: flex; justify-content: center; align-items: center">
          <table>

        <tbody >
          <tr>
            <th>Name</th>
            <td>{{$data['customerName']}}</td>
          </tr>
          <tr>
            <th>Email Id</th>
            <td>{{$data['email']}}</td>
          </tr>
          <tr>
            <th>Contact No</th>
            <td>{{$data['contactNo']}}</td>
          </tr>
          <tr>
            <th>Your Comment</th>
            <td>{{$data['customerComment']}}</td>
          </tr>
        </tbody>
         </table>
        </div>
      </div>
    </div>
  </body>
</html>
