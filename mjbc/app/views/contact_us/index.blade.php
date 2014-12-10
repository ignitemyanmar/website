@extends('../master')
@section('content')
{{HTML::style('../slider/css/demo.css')}}
	<style type="text/css">
	.mm_heading{font-size: 21px; margin-bottom: 1.5rem;}
	</style>
	<?php 
		$zawgyi='';
		if(Session::get('language')=='myanmar')
		$zawgyi='zg';
	?>
	<div class="row {{$zawgyi}}">
		<div class="large-3 medium-3 columns left_padding_none">
			@include('include.leftnav')
		</div>
		<div class="large-9 medium-9 columns right_padding_none">
			@if($response)
				@if(Session::get('language')=='myanmar')
					<h3 class="Zawgyi-One mm_heading">ဆက္သြယ္ရန္</h3>
					<p>
					သင္စုံစမ္းခ်င္ေသာအခ်က္အလက္မ်ားကုိ ဖုန္းႏွင့္ျဖစ္ေစ၊ အီးေမးႏွင့္ျဖစ္ေစ ရုံးခ်ိန္အတြင္း မနက္ ၉နာရီ မွညေန ၄နာရီအတြင္း  စုံစမ္းႏုိင္ပါသည္။.
					</p>
					<br>
					<h4 class="Zawgyi-One mm_heading">{{$response->name_mm}}</h4>
					<div class="row">
						<div class="large-2 medium-2 columns"><b>Address</b></div>
						<div class="large-10 medium-10 columns">
							<p>{{$response->address_mm}}</p>
						</div>
					</div>
					<div class="row">
						<div class="large-2 medium-2 columns"><b>Tel</b></div>
						<div class="large-10 medium-10 columns"> <p>{{$response->phone}}</p></div>
					</div>
					<div class="row">
						<div class="large-2 medium-2 columns"><b>E-mail</b></div>
						<div class="large-10 medium-10 columns"><p>{{$response->email}}</p></div>
					</div>
					<div class="row">
						<div class="large-2 medium-2 columns"><b>Website</b></div>
						<div class="large-10 medium-10 columns"><p>www.mjbc.com</p></div>
					</div>
				@elseif(Session::get('language')=='japan')
					<h3>お問い合わせ</h3>
					<p>私たちは、電話または電子メールで任意のクエリに回答をいたします。メールにてご連絡するためには、フォームにご記入ください。あるいは、（金曜の午後4:00、月曜日9:00 AM）に、私達に直接話をしたいはずです。</p>
					<div class="br_line">&nbsp;</div>
					<br>
					

					<h4>{{$response->name_jp}}</h4>
					<div class="row">
						<div class="large-2 medium-2 columns"><b>アドレス</b></div>
						<div class="large-10 medium-10 columns">
							<p>{{$response->address_jp}}</p>
						</div>
					</div>
					<div class="row">
						<div class="large-2 medium-2 columns"><b>このような</b></div>
						<div class="large-10 medium-10 columns"> <p>{{$response->phone}}</p></div>
					</div>
					<div class="row">
						<div class="large-2 medium-2 columns"><b>メール</b></div>
						<div class="large-10 medium-10 columns"><p>{{$response->email}}</p></div>
					</div>
					<div class="row">
						<div class="large-2 medium-2 columns"><b>ウェブサイト</b></div>
						<div class="large-10 medium-10 columns"><p>www.mjbc.com</p></div>
					</div>
				@else
					<h3>Contact Us</h3>
					<p>
					We will be pleased to answer any queries by telephone or email. 
					In order to contact us by email, please fill in the form.
					Alternatively, should you wish to speak to us directly, 
					at (9:00 AM to 4:00 PM, Monday to Friday).
					</p>
					<div class="br_line">&nbsp;</div>
					<br>

					<h4>{{$response->name}}</h4>
					<div class="row">
						<div class="large-2 medium-2 columns"><b>Address</b></div>
						<div class="large-10 medium-10 columns">
							<p>{{$response->address}}</p>
						</div>
					</div>
					<div class="row">
						<div class="large-2 medium-2 columns"><b>Tel</b></div>
						<div class="large-10 medium-10 columns"> <p>{{$response->phone}}</p></div>
					</div>
					<div class="row">
						<div class="large-2 medium-2 columns"><b>E-mail</b></div>
						<div class="large-10 medium-10 columns"><p>{{$response->email}}</p></div>
					</div>
					<div class="row">
						<div class="large-2 medium-2 columns"><b>Website</b></div>
						<div class="large-10 medium-10 columns"><p>www.mjbc.com</p></div>
					</div>
				@endif
				
			@endif
			
			<br><br>
			@if(Session::get('language')=='japan')
				<?php 
					$name="名前"; 
					$emailaddress="メールアドレス"; 
					$subject="件名"; 
					$message="メッセージ";
					$sendmessage="メッセージを送信"; 
				?>
			@elseif(Session::get('language')=='myanmar')
				<?php 
					$name="အမည္"; 
					$emailaddress="အီးေမး လိပ္စာ"; 
					$subject="အေၾကာင္းအရာ"; 
					$message="ေပးပုိ႕ခ်င္သည့္အခ်က္အလက္မ်ား";
					$sendmessage="ပုိ႔ရန္"; 
				?>
			@else
				<?php 
					$name="Name"; 
					$emailaddress="Email Address"; 
					$subject="Subject"; 
					$message="Message";
					$sendmessage="Send Message"; 
				?>
			@endif
			<div class="row">
				<div class="large-6 columns nopadding">
					<form action="/" class="add-newform" method="get" style="margin:5px;">
		                <div class="row">
		                  <div class="large-12 columns"><input type="text" name='name' placeholder="{{$name}}"></div>
		                </div>
		                <div class="row">
		                  <div class="large-12 columns"><input type="text" name='email' placeholder="{{$emailaddress}}"></div>
		                </div>
		                <div class="row">
		                  <div class="large-12 columns"><input type="text" name='subject' placeholder="{{$subject}}"></div>
		                </div>
		                <div class="row">
		                  <div class="large-12 columns"><textarea name="message" style="min-height:240px;margin-left:0;" placeholder="{{$message}}"></textarea></div>
		                </div>
		                <div class="row">
		                  <div class="large-12 columns right"><input type="submit" class="btn search btn-primary ayar-wagaung" value="{{$sendmessage}}"></div>
		                </div>
		            </form>
            	</div>
				<div class="large-6 columns"><img src="../img/map.png"></div>
				
			</div>
			

			<div class="br_line">&nbsp;</div><br><br>
		</div>
	</div>
	<br>
	
@stop
