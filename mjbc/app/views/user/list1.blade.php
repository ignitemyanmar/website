@extends('../admin')
@section('content')
<style type="text/css">
   .padding-5{padding: 5px;}
</style>
<!-- BEGIN PAGE -->  
   <div class="page-content">
      <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
               <div class="row-fluid">
                  <div class="span12">
                     <!-- BEGIN STYLE CUSTOMIZER -->
                     <div class="color-panel hidden-phone">
                        <div class="color-mode-icons icon-color"></div>
                        <div class="color-mode-icons icon-color-close"></div>
                        <div class="color-mode">
                           <p>THEME COLOR</p>
                           <ul class="inline">
                              <li class="color-black current color-default" data-style="default"></li>
                              <li class="color-blue" data-style="blue"></li>
                              <li class="color-brown" data-style="brown"></li>
                              <li class="color-purple" data-style="purple"></li>
                              <li class="color-white color-light" data-style="light"></li>
                           </ul>
                           <label class="hidden-phone">
                           <input type="checkbox" class="header" checked value="" />
                           <span class="color-mode-label">Fixed Header</span>
                           </label>                    
                        </div>
                     </div>
                     <!-- END BEGIN STYLE CUSTOMIZER -->   
                     <h3 class="page-title">
                      User List
                        <!-- <small>form wizard sample</small> -->
                     </h3>
                     <ul class="breadcrumb">
                        <li>
                           <i class="icon-home"></i>
                           <a href="/">Home</a> 
                           <span class="icon-angle-right"></span>
                        </li>
                        <li>
                           <a href="/itemlist"> User</a>
                           <span class="icon-angle-right"></span>
                        </li>
                        <li><a href="#">User List</a></li>
                     </ul>
                  </div>
               </div>
            <!-- END PAGE HEADER-->

            <!-- BEGIN PAGE CONTENT-->
               <div class="row-fluid">
                  <div class="responsive span12" data-tablet="span12" data-desktop="span12">
                     <div class="portlet box light-grey">
                        <div class="portlet-title">
                           <h4><i class="icon-user"></i>User List</h4>
                           <div class="actions">
                              
                           </div>
                        </div>
                        <div>&nbsp;</div>
                        @if(Session::has('message'))
                        <?php $message=Session::get('message'); ?>
                        <div class="row-fluid">
                           <div class="span9">
                              <label>Message:</label><textarea cols="40" rows="5">{{ $message}}  </textarea>
                           </div>
                        </div>
                        @endif

                        <div class="portlet-body">
                           <table class="table table-striped table-bordered table-advance table-hover">
                              <thead>
                                 <tr>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>User Level</th>
                                    <th>Action</th>
                                    <!-- <th></th> -->
                                 </tr>
                              </thead>
                              <tbody>
                           <form action = "/searchuser" method= "post" class="row">
                              <div class="row-fluid">
                                 <input name="keyword" type="text" class="m-wrap span6" placeholder = " Search User" data-required="true">
                              </div>
                              <div class="portlet-body">
                                 <input type = "submit" value = "Search" class="btn green button-submit" required>
                              </div>
                              <div class="row-fluid">
                                 <a href="/usercreate" class="btn green button-submit">Add New User</a>
                              </div>
                           </form>
                           <br><br>

               @if(count($response)==0)
                  There is no record in database.
               @else
                  Total Record : {{$totalCount}}
               @endif
                  
                     @foreach($response as $user)
                                 <tr>
                                    <td>{{$user['name']}}</td>
                                    <td>{{$user['email']}}</td>
                                    <td>{{$user['address']}}</td>
                                    <td>{{$user['role']}}</td>
                                    <td style="text-align:center;">
                                          <a href="/user-update/{{ $user['id'] }}"  class="btn green button-submit">Edit</a><br><br>
                                          <a href="deleteuser/{{ $user['id'] }}"   class="btn green button-submit">Delete</a>
                                    </td>
                                 </tr>
                     @endforeach
                     <tr><td colspan="8"><ul class="pagination">{{ $response->links() }}</ul></td></tr>        

                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
                  <div class="responsive span3 padding-5" data-tablet="span4" data-desktop="span4">
                   
                  </div>
               </div>
            <!-- END PAGE CONTENT-->         
         </div>
      <!-- END PAGE CONTAINER-->
   </div>
<!-- END PAGE -->  
   <script type="text/javascript" src="../../assets/data-tables/jquery.dataTables.js"></script>
@stop