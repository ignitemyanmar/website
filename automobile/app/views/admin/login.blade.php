@extends('../admin')
@section('content')
    @if(Auth::check())
    @else
            <div class="large-4 columns">&nbsp;</div>
            <div class="large-4 columns">
                <table class="loginform" style="width:100%;margin-top:20%; cell-spacing:0;">
                    <thead>
                        <tr>
                            <th><h2 class="title text-center">Login</h2></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <!-- check for login error flash var -->
                                @if (Session::has('flash_error'))
                                    <div id="flash_error">{{ Session::get('flash_error') }}</div>
                                @endif
                                    {{ Form::open(array('url' => '/imeauto', 'method' => 'post')) }}

                                    <!-- username field -->
                                    <p>
                                        {{ Form::label('username', 'Username') }}<br/>
                                        {{ Form::text('username', Input::old('username')) }}
                                    </p>

                                    <!-- password field -->
                                    <p> 
                                        {{ Form::label('password', 'Password') }}<br/>
                                        {{ Form::password('password') }}
                                    </p>

                                    <!-- submit button -->
                                    <p>{{ Form::submit('Login',array('class'=>'button smalllogin round')) }}</p>

                                    {{ Form::close() }}
                                @endif
                            

                            </td>
                        </tr>
                        <tr>
                            <td><a href="/forgotpassword">Forgot your Password?</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="large-4 columns">&nbsp;</div>
      
        <div style="clear:both;"></div>
@stop
