 <!-- Modal Trigger -->
 <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>
  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h5>Change Password</h5>
      <div class="section">
        <div class="card-content">
            @if($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="text-red">{{ $error }}</div>
                @endforeach
            @endif
            <div class="live-preview">
                <form
                    action="{{route('auth.update-password', Auth::guard('admin')->user()->id) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf                    
                    <div class="row gy-4">
                        <div class="col-xxl-3 col-md-6">
                        <div class="input-group col s4">
                                <input type="password" class="form-control" id="old_password" name="old_password"
                                    value="{{ isset($user) ? $user->password : '' }}"
                                    placeholder="Old Password">
                                <label class="active" for="password">{{__('user.old_password')}}</label>
                            </div>
                            <div class="input-group col s4">
                                <input type="password" class="form-control" id="password" name="new_password"
                                    value="{{ isset($user) ? $user->password : '' }}"
                                    placeholder="New password">
                                <label class="active" for="password">{{__('user.new_password')}}</label>
                            </div>
                            <div class="input-group col s4">
                                <input type="text" class="form-control" id="cnew_password" name="cnew_password"
                                    value=""
                                    placeholder="Confirm Password">
                                <label class="active" for="cpassword">{{__('user.cpassword')}}</label>
                            </div>
                           
                            </div>
                            <div class="row col s12 mt-2">
                                <div class="input-group col s4">
                                    <button class="btn btn-primary" id="btn-btn" type="submit">Submit</button>
                                </div>
                            </div>
                        </div>

                        <!--end col-->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Agree</a>
    </div>
  </div>