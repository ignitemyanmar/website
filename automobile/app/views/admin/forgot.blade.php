@extends('../admin')
@section('content')
   
        <div class="large-4 columns">&nbsp;</div>
        <div class="large-4 columns">
            <table class="" style="width:100% ;cell-spacing:0;">
                <thead>
                    <tr>
                        <th><h3>Forgot Password</h3></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            @if (Session::has('flash_error'))
                                <div id="flash_error">{{ Session::get('flash_error') }}</div>
                            @endif
                            <form action="forgotpassword" method="post">
                               <label>Email</label> <Input type="email" name='email' required>
                                <Input type="submit" name="submit" value="Submit" class="button smalllogin round">
                            </form>
                            
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="large-4 columns">&nbsp;</div>
        <div style="clear:both;"></div>
@stop
