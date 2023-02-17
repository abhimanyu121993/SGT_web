<div class="modal-content">

<div class="modal-title">{{ isset($RoleEdit) ? 'Edit Role' : 'Add New Role' }}</div>

<form
                        action="{{ isset($RoleEdit) ? route(Session::get('guard').'.role-permission.role.update', $RoleEdit->id) : route(Session::get('guard').'.role-permission.role.store') }}"
                        method="POST">
                        @if (isset($RoleEdit))
                            @method('patch')
                        @endif
                        @csrf
                        <div class="row gy-4">
                            <div class="col s12">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="role" name="role"
                                        value="{{ isset($RoleEdit) ? $RoleEdit->role_name : '' }}" placeholder="Role Name">
                                    <button class="btn btn-primary" id="btn-btn"
                                        type="submit">{{ isset($RoleEdit) ? 'Update' : 'Submit' }}</button>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                    </form>

</div>                    