@extends('../admin')
@section('content')
   
        <div class="large-4 columns">&nbsp;</div>
        <div class="large-4 columns">
            <table class="" style="width:100% ;cell-spacing:0;">
                <thead>
                    <tr>
                        <th><h3>Reset Password</h3></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <form action="/resetpassword" method="post">
                               <input type="hidden" name='email' value="{{$email}}">
                               <label>Password</label> <input type="password" name='password' required>
                               <input type="hidden" name='randomno' value="{{$randomno}}">
                                <input type="submit" name="submit" value="Submit" class="button smalllogin round">
                            </form>
                            
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="large-4 columns">&nbsp;</div>
        <div style="clear:both;"></div>
@stop
